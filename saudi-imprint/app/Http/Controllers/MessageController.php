<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        //retrieve all messages where the user is either the sender or reciever
        $conversations = Message::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique(function ($item) use ($user) {
                // ensure only one chat(latest msg) per person the user has talked to is shown
                // by removing duplicates based on the other user's id
                return $item->sender_id == $user->id ? $item->receiver_id : $item->sender_id;
                
            })//find the other user involved in the conversation
            ->map(function ($message) use ($user) {
                $otherUserId = $message->sender_id == $user->id ? $message->receiver_id : $message->sender_id;
                $otherUser = User::find($otherUserId);
                
                return [
                    'user' => $otherUser,
                    'last_message' => $message,
                    'unread_count' => Message::where('sender_id', $otherUserId)
                        ->where('receiver_id', $user->id)
                        ->where('is_read', false)
                        ->count()
                ];
            });
        
        return view('messages.index', compact('conversations'));
    }
    
    public function show(User $otherUser)
    {
        $user = Auth::user();
        
        // Mark all messages from the other user as read
        Message::where('sender_id', $otherUser->id)
            ->where('receiver_id', $user->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);
        
        // Get messages between these two users
        $messages = Message::where(function ($query) use ($user, $otherUser) {
            $query->where('sender_id', $user->id)
                  ->where('receiver_id', $otherUser->id);
        })->orWhere(function ($query) use ($user, $otherUser) {
            $query->where('sender_id', $otherUser->id)
                  ->where('receiver_id', $user->id);
        })->orderBy('created_at')->get();
        
        
   
    
        return view('messages.show', compact('messages', 'otherUser'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string',
            'tour_id' => 'nullable|exists:tours,id',
        ]);
        
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'tour_id' => $request->tour_id,
            'content' => $request->content,
        ]);
        
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
    
    public function startConversation($tourId)
    {
        $tour = Tour::findOrFail($tourId);
        
        // Redirect to the message page with the guide
        // return redirect()->route('messages.show', $tour->guide_id);
        return redirect()->route('messages.show', $tour->guide);

    }
    
    public function getUnreadCount()
    {
        $user = Auth::user();
        $unreadCount = Message::where('receiver_id', $user->id)
            ->where('is_read', false)
            ->count();
            
        return response()->json(['unread_count' => $unreadCount]);
    }
}