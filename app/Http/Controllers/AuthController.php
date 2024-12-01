<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $fields = $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:4', 'confirmed'],
        ]);

        $user = User::create($fields);
        if (!$user instanceof User) {
            return back()->withErrors([
                'registration_failed' => 'Registration failed. Try again later.',
            ]);
        }

        return redirect('/login');
    }

    public function login(Request $request): RedirectResponse
    {
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'password' => ['required', 'min:4'],
        ]);

        if (Auth::attempt($fields, $request->remember)) {
            return redirect()->intended();
        }

        return back()->withErrors([
            'login_failed' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        // Invalidate user's session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
