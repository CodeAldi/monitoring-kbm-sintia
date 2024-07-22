<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthenticationController extends Controller
{
    function index() {
        return view('authentication.login')->with('title','login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'nomor_induk' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'nomor_induk' => 'The provided credentials do not match our records.',
        ])->onlyInput('nomor_induk');
    }
    public function logout(Request $request): RedirectResponse
    {
        if (Auth()->user()->hasRole('guru piket')) {
            Auth()->user()->role = UserRole::GuruMapel;
            Auth()->user()->save();
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        } else {
            # code...
            Auth::logout();
    
            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            return redirect('/');
        }
        
    }
}
