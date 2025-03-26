<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use Illuminate\Http\Request;
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
            // 'name' => 'required|string|max:255',
            // 'location' => 'required|string|max:255',
            // 'max_participints' => 'required|integer|min:1',
            // 'active' => 'required|boolean',
            // 'type_of_tour'=>'required|json',
            // 'included' => 'required|string|max:255',
            // 'Date' => 'required|dateTime',
            // 'description' => 'required|string',
            // 'price' => 'required|numeric|min:0',
            // 'duration' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
            
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        
        return view('Guided Tours.show', compact('tour'));
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
