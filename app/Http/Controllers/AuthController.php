<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function  showLogin(){
        return view('auth.login');
    }
    public function  login(Request $request){
        $validated = $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate(); //ochrana proti session fixation
            return redirect()->route('home');
        }
        throw  ValidationException::withMessages([
            'credentials' => 'Nesprávny email alebo heslo.'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate(); //vdzy po logout
        $request->session()->regenerateToken(); //vdzy po logout, pre ochranu proti CSRF
        return redirect()->route('show.login');
    }
}
