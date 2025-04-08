<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        return redirect()->route('/');
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
public function dashboard(){

    $user = Auth::user();
    $tourGuide = $user->tourGuide;

    if ($tourGuide) {
        if ($tourGuide->status === 'pending_verification') {
            return redirect()->route('TourGuide.pending_approval');
        } elseif ($tourGuide->status === 'rejected') {
            return redirect()->route('TourGuide.rejected');
        } elseif ($tourGuide->status === 'verified' && !$tourGuide->profile_info_completed) {
            return redirect()->route('TourGuide.complete_profile');
        }
    }
    return view('TourGuide.dashboard');
    
}}