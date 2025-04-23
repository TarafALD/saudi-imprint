<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
        /**
         * Update the user's password.
         */
        public function update(Request $request): RedirectResponse
        {
            $validated = $request->validateWithBag('updatePassword', [
                'current_password' => ['required', 'string', 'min:8'],
                'password' => ['required', 'string', 'confirmed', 'min:8'],
            ]);
    
            // Check if the current password is correct
            if (!Hash::check($validated['current_password'], $request->user()->password)) {
                return back()->withErrors(['current_password' => 'The provided password does not match our records.']);
            }
    
            // Update the password
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);
    
            return back()->with('success', 'Password updated successfully!');
        }        
    
    
}
