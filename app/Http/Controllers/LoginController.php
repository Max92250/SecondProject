<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $userModel;

    public function __construct(User $userModel)
    {
      
        $this->userModel = $userModel;
    }

    public function showLoginForm()
    {
        return view('auth.login')->withErrors(session('errors'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = $this->userModel->where('name', $credentials['name'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);

            session()->put('username', $user->name);
            return redirect()->route('task.index')->with('login_status', 'success');
        } else {
            return redirect()->route('login')->withErrors(['errors' => 'Invalid username or password']);
        }
    }
}
