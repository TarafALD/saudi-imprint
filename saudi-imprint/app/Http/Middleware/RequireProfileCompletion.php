<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequireProfileCompletion
{
    public function handle(Request $request, Closure $next)
    {

          // Skip this middleware for the login, register and status pages
            if ($request->routeIs('loginTG') || $request->routeIs('register') || $request->routeIs('registerTG') || 
            $request->routeIs('TourGuide.pending_approval') || 
            $request->routeIs('TourGuide.rejected') || 
            $request->routeIs('TourGuide.complete_profile')) {
            return $next($request);}

        if (Auth::check()) {
            $user = Auth::user();
            $tourGuide = $user->tourGuide;
            
          
            if ($tourGuide) {
                //redirect to waiting page
                if ($tourGuide->status === 'pending') {
                    return redirect()->route('TourGuide.pending_approval');
                }
                
                // rejected - redirect to rejection page
                if ($tourGuide->status === 'rejected') {
                    return redirect()->route('TourGuide.rejected');
                }
                
                // case 3 verified but profile not completed
                if ($tourGuide->status === 'verified' && !$tourGuide->profile_info_completed) {
                    return redirect()->route('TourGuide.complete_profile');
                }
                
                // case 4 verified and profile completed - allow access
                if ($tourGuide->status === 'verified' && $tourGuide->profile_info_completed) {
                    return $next($request);
                }
            }
        }
        
        return $next($request);
    }
}

