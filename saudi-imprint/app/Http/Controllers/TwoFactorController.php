<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Mail\SendOTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TwoFactorController extends Controller
{
    public function sendOTP()
    {
    

        $user = Auth::user();
    
        //generate 6-digit OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        //store in db
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(5);
        $user->save();

        \Log::info('Attempting to send OTP to ' . $user->email);
        Mail::to($user->email)->send(new SendOTP($user, $otp));
        \Log::info('OTP email sent to ' . $user->email);

        
        //send OTP to user's email
        Mail::to($user->email)->send(new SendOTP($user, $otp));
        
        return redirect()->route('otp.verify');
    }

    public function showVerifyForm()
    {
        return view('auth.otp-verify');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);
        
        $user = Auth::user();
        
        //check if OTP is valid and not expired
        if ($user->otp === $request->otp && $user->otp_expires_at > now()) {
            // Clear OTP
            $user->otp = null;
            $user->otp_expires_at = null;
            $user->save();
            
            // Mark session as verified
            session(['otp_verified' => true]);
            
          
            $url="";
            if ($request -> user() -> role == 'TG'){
                $url = route('TourGuide.dashboard', absolute: false);
            }elseif ($request -> user() -> role == 'tourist') {
                $url = route('home', absolute: false);
            }
            return redirect()->intended($url);
        }
        
        return back()->withErrors(['otp' => 'Invalid or expired verification code']);
    }
}