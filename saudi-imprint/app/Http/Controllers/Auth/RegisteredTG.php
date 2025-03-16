<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\TourGuide;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
class RegisteredTG extends Controller
{
    public function showTGregisterform(): View  
      {
        return view('auth.signupTG');
    }

    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'license_number' => ['required', 'string' , 'max:50'],
        ]);
    

        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'TG', // Set role to tour guide
    ]);


    //يحفظ الرخصةب storage/public/licenses 
    //$licensePath = $request->file('license')->store(path: 'licenses', options: 'public');

    //create a tg record
    TourGuide::create([
        'user_id' => $user->id,
        'license_number' => $request->license_number,
        'status' => 'pending_verification'
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect()->route('TourGuide.dashboard');
}

}