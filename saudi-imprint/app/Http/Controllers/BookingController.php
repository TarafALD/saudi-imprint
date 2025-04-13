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

        $booking->tour_id = $request->tour_id; //assigning the tour id from the request input to the booking
        $booking->user_id = Auth::id();
        $booking->booking_date = $request->booking_date;
        $booking->number_of_people = $request->number_of_people;
        $booking->total_price = $request->total_price;
        $booking->payment_status = 'pending';

        $booking->save();
        
       // Redirect to payment page
       return redirect()->route('bookings.show', $booking);
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
