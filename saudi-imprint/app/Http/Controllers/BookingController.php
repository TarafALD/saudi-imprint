<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //my-bookings
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tour $tour)
    {
        //booking form 
        
        if (!Auth::check()) {
            // Store the intended URL in the session
            session(['url.intended' => route('tours.book', $tour)]);
            return redirect()->route('loginTG')->with('message', 'Please login to book a tour');
        }
        
        return view('bookings.create', compact('tour'));
    }

    

    /**
     * Store a new booking
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'booking_date' => 'required|date|after:today',
            'number_of_people' => 'required|integer|min:1',
        ]);


        $tour = Tour::findOrFail($request->tour_id);
        $totalPrice = $tour->price_per_person * $request->number_of_people;
        
        $booking = new Booking();

        $booking->tour_id = $request->tour_id;
        $booking->user_id = Auth::id();
        $booking->booking_date = $request->booking_date;
        $booking->number_of_people = $request->number_of_people;
        $booking->total_price = $totalPrice;

        $booking->save();
        
        //booking confirmation page
        return redirect()->route('bookings.show', $booking);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //confirmation page
        // Ensure user can only view their own bookings
        if ($booking->user_id !==  Auth::id()) {
            abort(403);
        }
    
    return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
