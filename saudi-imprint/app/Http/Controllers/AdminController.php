<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourGuide;
use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;
class AdminController extends Controller
{

    
    function dashboard(){
        $pendingTGs = TourGuide::where('status', 'pending_verification') 
        ->with('user')->latest()->get();
        
        return view('Admin.dashboard', compact('pendingTGs')); //compact() is a php function that creates an array from variables and their values
    }

    public function approveTG(TourGuide $tourGuide): RedirectResponse
    {
        $tourGuide->update(['status' => 'verified']);
        return redirect()->route('Admin.dashboard')->with('success', 'Tour guide approved successfully');
    }

    public function rejectTG(TourGuide $tourGuide): RedirectResponse
    {
        $tourGuide->update(['status' => 'rejected']);
        return redirect()->route('Admin.dashboard')->with('success', 'Tour guide rejected successfully');
    }



}
