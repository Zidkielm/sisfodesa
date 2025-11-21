<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            dd(Auth::user());

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Terjadi kesalahan, periksa lagi email atau password anda.',
        ])->onlyInput('email');
    }
}
