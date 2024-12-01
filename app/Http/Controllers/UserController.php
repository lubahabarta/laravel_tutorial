<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display the user's dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = Auth::user();
        if (!$user instanceof User) {
            return redirect('login')->with([
                'session_timed_out' => 'Your session has timed out. Please log in again.',
            ]);
        }

        $products = $user->products()->latest()->paginate(12);

        return view('users.dashboard', [
            'products' => $products,
        ]);
    }

    /**
     * Display the specified user.
     *
     * @param  string  $username
     * @return \Illuminate\View\View
     */
    public function show(String $username)
    {
        if (!$username || empty($username)) {
            return back()->with([
                'user_not_found' => 'User not found.',
            ]);
        }

        $user = User::where('username', $username)->first();
        if (!$user instanceof User) {
            return back()->with([
                'user_not_found' => 'User not found.',
            ]);
        }

        if ($user->is(Auth::user())) {
            return redirect('dashboard');
        }

        $userProducts = $user->products()->latest()->paginate(12);

        return view('users.show', [
            'user' => $user,
            'userProducts' => $userProducts,
        ]);
    }
}
