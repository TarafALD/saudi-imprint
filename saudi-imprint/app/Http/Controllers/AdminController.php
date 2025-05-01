<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourGuide;
use App\Models\Landmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Notifications\LicenseApproved;

class AdminController extends Controller
{

    
    function dashboard(){

        
        if (Auth::user()->role !== 'admin') {
            abort(403); 
        }

        $pendingTGs = TourGuide::where('status', 'pending_verification') 
        ->with('user')->latest()->get();

        $landmarks = Landmark::all(); //change if the data dgrows
        
        return view('Admin.dashboard', compact('pendingTGs', 'landmarks')); //compact() is a php function that creates an array from variables and their values
    }

    public function approveTG(TourGuide $tourGuide): RedirectResponse
    {
        $tourGuide->update(['status' => 'verified']);
        
        // Send notification to the tour guide
        $user = $tourGuide->user;
        $user->notify(new LicenseApproved($tourGuide));
        
        return redirect()->route('Admin.dashboard')->with('success', 'Tour guide approved successfully');
    }
    
    public function rejectTG(TourGuide $tourGuide): RedirectResponse
    {
        $tourGuide->update(['status' => 'rejected']);
        return redirect()->route('Admin.dashboard')->with('success', 'Tour guide rejected successfully');
    }



}
