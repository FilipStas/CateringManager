<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function  showRegister(){
        return view('auth.register');
    }
    public function  showLogin(){
        return view('auth.login');
    }

    public function  register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|string|email|max:55|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user =  User::create($validated);

        Auth::login($user);
        return redirect()->route('home');
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
