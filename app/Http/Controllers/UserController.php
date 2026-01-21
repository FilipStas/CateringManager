<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|string|email|max:55|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user =  User::create($validated);

        return redirect()->route('users.index');
    }

    public function showCreate(User $user){

        return view('users.register');
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->only(['name', 'email', 'password', 'password_confirmation']);

        if (!empty($data['name'])) {
            $user->name = $data['name'];
        }

        if (!empty($data['email'])) {
            $user->email = $data['email'];
        }

        if (!empty($data['password'])) {
            if ($data['password'] !== $data['password_confirmation']) {
                return back()->withErrors(['password' => 'Heslá sa nezhodujú']);
            }
            $user->password = bcrypt($data['password']);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Používateľ bol aktualizovaný.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
