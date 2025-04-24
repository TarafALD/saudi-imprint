<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Moyasar\Moyasar;
use Moyasar\Providers\PaymentService;
use GuzzleHttp\Client;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->get();
        
        // Counting active and past bookings
        $activeBookingsCount = $bookings->where('payment_status', 'paid')->count();
        $pastBookingsCount = $bookings->where('status', 'completed')->count();
        
        return view('dashboard', compact('bookings', 'activeBookingsCount', 'pastBookingsCount'));
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

        // $availableTours = Tour::where('active', true)->get();

        return view('bookings.create', compact('tour'));
    }

    

    /**
     * Store a new booking
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'booking_date' => 'required|date',
            'number_of_people' => 'required|integer|min:1',
        ]);

        $tour = Tour::findOrFail($request->tour_id); 


        // $tour = Tour::where('id', $request->tour_id)
        // ->where('active', true);          // don’t allow bookings on inactive tours
        // // ->firstOrFail();                 // 404 if not found or inactive

    
        $bookingDate = $request->booking_date;
        $bookingDateTime = Carbon::parse($bookingDate . ' ' . $tour->start_time);
        $currentDateTime = Carbon::now();


  
        // Check if booking time has already passed
        if ($currentDateTime->gt($bookingDateTime)) {
            return back()
                ->withInput()
                ->withErrors(['booking_date' => 'Booking cannot be made after the tour has started.']);
        }
        
        // Check if the tour is already full for this date
        $existingBookingsCount = Booking::where('tour_id', $tour->id)
            ->where('booking_date', $bookingDate)
            ->sum('number_of_people');
            
        $remainingSpots = $tour->max_participants - $existingBookingsCount;
        
        if ($remainingSpots < $request->number_of_people  ) {
            return back()
                ->withInput()
                ->withErrors(['number_of_people' => "There's {$remainingSpots} spots remaining for this date."]);
        }
        
         $totalPrice = $tour->price_per_person * $request->number_of_people;
        
        $booking = new Booking();
        $booking->tour_id = $request->tour_id;
        $booking->user_id = Auth::id();
        $booking->booking_date = $bookingDate;
        $booking->number_of_people = $request->number_of_people;
        $booking->total_price = $request->total_price;
        $booking->payment_status = 'pending';
        $booking->save();

        // // Update the tour's active status after booking
        // $this->updateTourStatus($tour);
        
        // Redirect to payment page
        return redirect()->route('bookings.show', $booking);
    }

    // Updates the tour's "active" status based on the total number of booked seats, deactivating the tour if it's fully booked
        protected function updateTourStatus(Tour $tour)
    {
        //seats left across the entire date range
        $remaining = Booking::where('tour_id', $tour->id)
                    ->selectRaw('SUM(number_of_people) as booked')
                    ->value('booked');

        //if fully booked deactivate otherwise make sure it’s active
        $tour->active = $remaining < $tour->max_participants;
        $tour->save();
    }







    public function payment(Booking $booking)
    {
        // Ensure user can only pay for their own bookings
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('bookings.payment', compact('booking'));
    }







   

    public function processPayment(Request $request, Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }
    
        $paymentId = $request->id;
    
        if (!$paymentId) {
            return redirect()->route('bookings.payment', $booking)
                ->with('error', 'Payment ID not received.');
        }
    
        try {
            $client = new Client();
    
            $response = $client->request('GET', "https://api.moyasar.com/v1/payments/{$paymentId}", [
                'auth' => [config('moyasar.secret_key'), ''],
                'verify' => false, 
            ]);
    
            $payment = json_decode($response->getBody(), true);
    
            $booking->payment_id = $paymentId;
    
            if ($payment['status'] === 'paid') {
                $booking->payment_status = 'paid';
                $booking->status = 'confirmed';
                $booking->save();
    
                return redirect()->route('bookings.show', $booking)
                    ->with('success', 'Payment completed successfully!');
            } else {
                $booking->payment_status = $payment['status'];
                $booking->save();
    
                return redirect()->route('bookings.payment', $booking)
                    ->with('error', 'Payment was not successful. Status: ' . $payment['status']);
            }
        } catch (\Exception $e) {
            \Log::error('Moyasar payment verification failed', [
                'payment_id' => $paymentId,
                'booking_id' => $booking->id,
                'error' => $e->getMessage()
            ]);
    
            return redirect()->route('bookings.payment', $booking)
                ->with('error', 'Error verifying payment: ' . $e->getMessage());
        }
    }
    







    public function show(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('bookings.show', compact('booking'));
    }

    public function cancel(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        // Allow cancel only if the booking is not completed or already canceled
        if ($booking->status === 'completed' || $booking->status === 'cancelled') {
            return back()->with('error', 'This booking cannot be canceled.');
        }

        $booking->status = 'cancelled';
        $booking->payment_status = 'paid';  
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking has been canceled.');
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
