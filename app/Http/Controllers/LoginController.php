<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display the login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');
    }

    /**
     * Authenticate the user and log them in.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        // Validate the user input (email and password)
        $login = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // Attempt to authenticate the user with provided credentials
        if (Auth::attempt($login)) {
            // If authentication is successful, regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect the user to the intended URL (usually '/home') after successful login
            return redirect()->intended('/home');
        }

        // If authentication fails, redirect back to the login form with an error message
        return back()->with('LoginError', 'Gagal Login');
    }

    /**
     * Logout the currently authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Log out the currently authenticated user
        Auth::logout();
    
        // Invalidate the user's session
        $request->session()->invalidate();
        
        // Regenerate a new CSRF token for the session to prevent CSRF attacks
        $request->session()->regenerateToken();
        
        // Redirect the user to the home page after successful logout
        return redirect('/');
    }
}
