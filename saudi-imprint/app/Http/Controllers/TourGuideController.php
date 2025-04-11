<?php

namespace App\Http\Controllers;
use App\Models\TourGuide;
use App\Models\Tour;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class TourGuideController extends Controller
{

    public function pendingApproval()
    {
        return view('TourGuide.pending_approval');
    }
    
    public function rejected()
    {
        return view('TourGuide.rejected');
    }
    

    public function showCompleteProfileForm()
{
    $user = Auth::user();
    $tourGuide = $user->tourGuide;
    
    /// Double check they're allowed to complete profile
    if (!$tourGuide || $tourGuide->status !== 'verified') {
        if ($tourGuide && $tourGuide->status === 'pending_verification') {
            return redirect()->route('TourGuide.pending_approval');
        } elseif ($tourGuide && $tourGuide->status === 'rejected') {
            return redirect()->route('TourGuide.rejected');
        }
        return redirect()->route('home');
    }
    
    return view('TourGuide.complete_profile', compact('user', 'tourGuide'));
}



public function saveCompleteProfile(Request $request)
{
    $user = Auth::user();
    $tourGuide = $user->tourGuide;
    
    // Validate form data
    $validated = $request->validate([
        'bio' => 'required|string|max:500',
        'skills' => 'required|string|max:255',
        'languages' => 'required|array|min:1',
        'ROO' => 'required|array|min:1',
        'years_experience' => 'required|integer|min:0',
        'prefrences' => 'required|array|min:1',
    
    ]);
    
    // Update the tour guide profile
    $tourGuide->fill($validated);
    $tourGuide->profile_info_completed = true;
    $tourGuide->save();
    
    return redirect()->route('TourGuide.dashboard')
        ->with('success', 'Profile information completed successfully!');
}
public function dashboard()
{
    // Get authenticated user
    $user = Auth::user();
    
    if (!$user) {
        return redirect()->route('login');
    }
    
    // Get the tourGuide instance
    $tourGuide = $user->tourGuide;
    
    if (!$tourGuide) {
        return redirect()->route('become-guide')->with('error', 'You need to register as a tour guide first.');
    }
    
    // Check tour guide status and redirect if necessary
    if ($tourGuide->status === 'pending_verification') {
        return redirect()->route('TourGuide.pending_approval');
    } elseif ($tourGuide->status === 'rejected') {
        return redirect()->route('TourGuide.rejected');
    } elseif ($tourGuide->status === 'verified' && !$tourGuide->profile_info_completed) {
        return redirect()->route('TourGuide.complete_profile');
    }
    
    // Get tours based on the user_id directly (not through tourGuide relation)
    $tours = Tour::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
    
    // Pass all needed variables to the view
    return view('TourGuide.dashboard', [
        'user' => $user,
        'tourGuide' => $tourGuide,
        'tours' => $tours
    ]);
}
public function updateProfile(Request $request) {
    $user = Auth::user();
    $tourGuide = $user->tourGuide;


    
    
    // Validate form data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'required|string|max:500',
        'skills' => 'required|string|max:255',
        'languages' => 'required|array|min:1',
        'ROO' => 'required|array|min:1',
        'years_experience' => 'required|integer|min:0',
        'prefrences' => 'required|array|min:1',
        'image' => 'nullable|image|max:2048',  
    ]);

    //dd($validated);
    
    // Update user name
    DB::table('users')->where('id', $user->id)->update(['name' => $validated['name']]);    
    $user = \App\Models\User::find($user->id);
    $user = $user->fresh();


    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('profile_images', 'public');
        $tourGuide->image_path = Storage::url($imagePath);
    }
    
    // Update the tour guide profile
    $tourGuide->bio = $validated['bio'];
    $tourGuide->skills = $validated['skills'];
    $tourGuide->languages = json_encode($validated['languages']);
    $tourGuide->ROO = json_encode($validated['ROO']);
    $tourGuide->years_experience = $validated['years_experience'];
    $tourGuide->prefrences = json_encode($validated['prefrences']);
    $tourGuide->save();
    
    // dd($tourGuide->fresh());

    return redirect()->route('TourGuide.dashboard')
        ->with('success', 'Profile updated successfully!');

        
}}

