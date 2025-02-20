<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourGuideController extends Controller
{
    //

    public function dashboard(){
        return view('TourGuide.dashboard');
    }
}
