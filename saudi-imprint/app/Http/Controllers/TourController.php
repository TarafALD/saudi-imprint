<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\Booking;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // needed for a standalone tour page
        //   $tours = Tour::where('active', true)->get();
        //   return view('Guided Tours.index', compact('tours'));
    }
    public function riyadh()
    {
        $tours = Tour::where('active', true)->where('location', 'Riyadh')->get();
        
        return view('destinations.riyadh', compact('tours'));
    }
    public function aljouf()
    {
        $tours = Tour::where('active', true)->where('location', 'Aljouf')->get();
        
        return view('destinations.aljouf', compact('tours'));
    }
    public function jeddah()
    {
        $tours = Tour::where('active', true)->where('location', 'Jeddah')->get();
        
        return view('destinations.jeddah', compact('tours'));
    }
     public function alula()
    {
        $tours = Tour::where('active', true)->where('location', 'Alula')->get();
        
        return view('destinations.alula', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  $tour = Tour::create($validatedData);
        //return redirect()->route('Guided Tours.show', $tour)


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'max_participants' => 'required|integer|min:1',
            //'active' => 'required|boolean',
            'type_of_tour' => 'required|array|min:1',
            'type_of_tour.*' => 'string',
            'included' => 'required|string|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
            'tour_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);
      

   
        // Create new tour
        $tour = new Tour();
        $tour->name = $validatedData['name'];
        $tour->location = $validatedData['location'];
        $tour->max_participants = $validatedData['max_participants'];
        $tour->type_of_tour = json_encode($validatedData['type_of_tour']);
        $tour->included = $validatedData['included'];
        $tour->start_date =$validatedData['start_date'];
        $tour->end_date =$validatedData['end_date'];
        $tour->start_time=$validatedData['start_time'];
        $tour->description = $validatedData['description'];
        $tour->price = $validatedData['price'];
        $tour->duration = $validatedData['duration'];
        $tour->user_id = $validatedData['user_id'];
        $tour->active = true;

        $validatedData['active'] = true;
        // Add the user_id (tour guide)
        $validatedData['user_id'] = Auth::id();

           // Handle image upload
           if ($request->hasFile('tour_image')) {
            $path = $request->file('tour_image')->store('tour_images', 'public');
            $tour->image_path = $path;
        }
        $tour->save();
        

        // Redirect to the tour guide dashboard with success message
        return redirect()->route('TourGuide.dashboard')->with('success', 'Tour created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        // $tours=Tour::where('active', true)->where('id', '!=', $tour->id)->get();
        // return view('tours.show', compact('tour'));

        //get reviews for this tour
        $reviews = $tour->reviews()->with('user')->latest()->get();
        $averageRating = $tour->reviews()->avg('rating');

        return view('Guided Tours.show', compact('tour', 'reviews', 'averageRating'));
    }
    // Check authentication for booking
    public function book(Tour $tour)
    {
        if (!Auth::check()) {
            // Store the intended URL in the session
            session(['url.intended' => route('tours.book', $tour)]);
            return redirect()->route('loginTG')->with('message', 'Please login to book a tour');
        }
        
        return view('bookings.create', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.**/
    public function edit(Tour $tour)
    {
        // Authorization check
        if ($tour->user_id != Auth::id()) {
            return redirect()->route('TourGuide.dashboard')->with('error', 'You are not authorized to edit this tour.');
        }
        
        //decode type of tou if it's a JSON string
        if (is_string($tour->type_of_tour)) {
            $tour->type_of_tour = json_decode($tour->type_of_tour, true);
        }

        $user = Auth::user();
        $tourGuide = $user->tourGuide;
        $tours = $tourGuide->tours;
        $editingTour = $tour; 
        
        return view('TourGuide.dashboard', compact('user', 'tourGuide', 'tours', 'editingTour'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
{
    \Log::info('Tour update attempt', [
        'tour_id' => $tour->id,
        'request_data' => $request->all()
    ]);
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'max_participants' => 'required|integer|min:1',
        'type_of_tour' => 'required|array|min:1',
        'type_of_tour.*' => 'string',
        'included' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'start_time' => 'required|date_format:H:i',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
        'tour_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

        $tour->name = $validatedData['name'];
        $tour->location = $validatedData['location'];
        $tour->start_date =$validatedData['start_date'];
        $tour->end_date =$validatedData['end_date'];
        $tour->start_time=$validatedData['start_time'];
        $tour->max_participants = $validatedData['max_participants'];
        $tour->type_of_tour = json_encode($validatedData['type_of_tour']);
        $tour->description = $validatedData['description'];
        $tour->price = $validatedData['price'];
        $tour->duration = $validatedData['duration'];
        $tour->included = $validatedData['included'];



        
        if ($request->hasFile('tour_image')) {
            // delete the old image if it exists
            if ($tour->image_path && Storage::disk('public')->exists($tour->image_path)) {
                Storage::disk('public')->delete($tour->image_path);
            }
            //store image
            $path = $request->file('tour_image')->store('tour_images', 'public');
            $tour->image_path = $path;
        }

        $tour->save();
        return redirect()->route('TourGuide.dashboard')->with('success', 'Tour updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        // Check if the authenticated user owns this tour
        if ($tour->user_id != Auth::id()) {
            return redirect()->route('TourGuide.dashboard')->with('error', 'You are not authorized to delete this tour.');
        }
        
        // Check if the tour has any active bookings
        if ($tour->bookings()->where('status', '!=', 'cancelled')->exists()) {
            return redirect()->route('TourGuide.dashboard')->with('error', 'Cannot delete tour with active bookings.');
        }
        
        // Delete the tour
        $tour->delete();
        
        return redirect()->route('TourGuide.dashboard')->with('success', 'Tour deleted successfully!');
}

    // Logic to mark tour as completed
    public function completeTour($tourId)
    {
        $userId = Auth::id();
    
        //find the booking and mark it as completed if it's paid and the date has passed
        $booking = Booking::where('user_id', Auth::id())
        ->where('tour_id', $tourId)
        ->where('payment_status', 'paid')
        ->whereDate('booking_date', '<=', now())
        ->first();

       
    
        $booking->status = 'completed';
        $booking->save();
    
        // Redirect to leave a review
        return redirect()->route('reviews.create', ['tour' => $tourId])
            ->with('success', 'Tour marked as completed. Please leave a review.');
    }
    
}