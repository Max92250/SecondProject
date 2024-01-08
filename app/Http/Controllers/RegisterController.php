<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:users|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string',
        ]);

        if ($this->isUsernameAlreadyInUse($validatedData['name'])) {
            return redirect()->route('user')->withErrors(['username_error' => 'The username is already in use.']);
        }

        $this->createUser($validatedData);

        return redirect()->route('loginform');
    }

    private function isUsernameAlreadyInUse($username)
    {
        return User::where('name', $username)->exists();
    }

    private function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        User::create($data);
    }
}
