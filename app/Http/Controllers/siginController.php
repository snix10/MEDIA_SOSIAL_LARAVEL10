<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class siginController extends Controller
{
    public function index()
    {
        return view('auth.sigin');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'    => 'required|min:3|max:255',
            'email'   => 'required|email|unique:users',
            'password'=> 'required|min:5|max:255'
         ]);

           $validatedData['password'] = bcrypt($validatedData['password']);


         User::create($validatedData);

         return redirect('login')->with('berhasil','Registrasi berhasil - silahkan login!');
    }
}
