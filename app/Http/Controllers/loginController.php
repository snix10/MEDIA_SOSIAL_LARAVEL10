<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(request $request)
    {
        $credentials = $request->validate([
            'email'    =>   'required|email',
            'password' =>   'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home')->with('loginberhasil','selamat datang di web ini');
        }

        return back()->with('loginerror','login gagal');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('login');
    }
}
