<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;

class regiscontroller extends Controller
{
    public function index()
    {
        return view('layouts.register.register');
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ]);

        User::create($validatedData);

        return redirect('layouts.login.login')->with('success', 'Register Berhasil');
    }
}