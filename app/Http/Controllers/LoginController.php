<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');
    }
    public function authenticate(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->with('LoginError', 'Gagal Login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
