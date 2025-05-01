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
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);//add a leading 0 if needed : 5> 000005
        
        //store in db (in the user's record)
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(5);// valid for 5mins
        $user->save();


        
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
            // Clear OTP so it can not be reused
            $user->otp = null;
            $user->otp_expires_at = null;
            $user->save();
            
            // Mark session as verified
            session(['otp_verified' => true]);
            
            //Role based redirection
            $url="";
            if ($request -> user() -> role == 'TG'){
                $url = route('TourGuide.dashboard', absolute: false);
            }elseif ($request -> user() -> role == 'tourist') {
                $url = route('home', absolute: false);
            }elseif ($request -> user() -> role == 'admin') {
                $url = route('Admin.dashboard', absolute: false);
            }
            return redirect()->intended($url);
        }
        
        return back()->withErrors(['otp' => 'Invalid or expired verification code']);
    }
}