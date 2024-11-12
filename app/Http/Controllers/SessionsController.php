<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
            
        ]);

        if (Auth::attempt($attributes)) {
            session()->regenerate();

            // Add username to success message
            $name = Auth::user()->name;
            return redirect('dashboard')->with(['success' => "You are logged in as $name."]);
        } else {
            return back()->withErrors(['email' => 'Email or password invalid.']);
        }
    }
    
    public function destroy()
    {
        // Store the user's name before logging out
        $name = Auth::user()->name;
        
        Auth::logout();

        // Use the stored name in the logout message
        return redirect('/login')->with(['success' => "You have been logged out, $name."]);
    }
}
