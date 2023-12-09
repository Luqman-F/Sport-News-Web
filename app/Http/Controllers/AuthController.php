<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }

    function attempt()
    {
        $credentials = request()->only('email', 'password');
        if (auth()->attempt($credentials)) {
            if (auth()->user()->role_id == 2) {
                return redirect('/journalist');
            } else if (auth()->user()->role_id == 3) {
                return redirect('/admin');
            }

            return redirect('/');
        }

        return back();
    }

    function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    function store()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'confirmed|min:8',
        ]);
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
        ]);

        auth()->login($user);
        return redirect('/');
    }
}
