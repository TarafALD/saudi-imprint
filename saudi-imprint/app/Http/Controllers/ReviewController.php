<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Tour;
use App\Models\TourGuide;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Tour $tour)
    {
        $tourGuide = TourGuide::where('user_id', $tour->user_id)->first();

         //check if the tourist has booked the tour 
         $userId = Auth::id();
         $tourId = $tour->id;

        $hasBooked = Booking::where('user_id', $userId)
        ->where('tour_id', $tourId)
        ->where('status', 'confirmed')
        ->exists();
    
        
        if (!$hasBooked) {
            return redirect()->route('home')->with('error', 'You can only review tours you have completed.');
        }
        
        //check if user has already reviewed this tour
        $existingReview = Review::where('user_id', Auth::id())
            ->where('tour_id', $tour->id)
            ->first();
            
        if ($existingReview) {
            return redirect()->route('dashboard')->with('error', 'You have already reviewed this tour.');
        }
        
        return view('reviews.create', [
            'tour' => $tour,
            'tourGuide' => $tourGuide,
        ]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'tour_guide_id' => 'required|exists:_tour_guides,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);
        
        // Create the review
        $review = new Review();
        $review->user_id = Auth::id();
        $review->tour_id = $validatedData['tour_id'];
        $review->tour_guide_id = $validatedData['tour_guide_id'];
        $review->rating = $validatedData['rating'];
        $review->comment = $validatedData['comment'];
        $review->save();
        
        return redirect()->route('dashboard')->with('success', 'Thank you for your review!');
    }

}