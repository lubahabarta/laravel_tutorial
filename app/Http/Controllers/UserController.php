<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function avatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'file', 'max:2000', 'mimes:png,jpg,jpeg,webp'],
        ]);

        $user = $request->user();
        if (!$user instanceof User) {
            return redirect('/login')->with([
                'session_timed_out' => 'Your session has timed out. Please log in again.',
            ]);
        }

        if ($user->avatar) {
            Storage::disk('public_images')->delete($user->avatar);
        }

        if ($request->hasFile('avatar')) {
            $path = Storage::disk('public_images')->put('/users', $request->avatar);
            $result = $user->update(['avatar' => $path]);
        }

        // TODO: display errors
        if (!$result) {
            return back()->withError([
                'avatar_upload_error' => 'Avatar upload failed. Please try it later.',
            ]);
        }

        // TODO: display success message
        return redirect('/dashboard')->with([
            'avatar_upload_success' => 'Avatar uploaded successfully.',
        ]);
    }

    /**
     * Updates user's credit
     */
    public function deposit(DepositRequest $request)
    {
        $fields = $request->validate([
            'amount' => ['required', 'numeric', 'min:1', 'max:4294967295'],
        ]);

        $user = $request->user();
        if (!$user instanceof User) {
            return redirect('/login')->with([
                'session_timed_out' => 'Your session has timed out. Please log in again.',
            ]);
        }

        $credit = $user->credit + $fields['amount'];
        $result = $user->update(['credit' => $credit]);
        if (!$result) {
            return back()->withError([
                'deposit_error' => 'Deposit failed. Please try it later.',
            ]);
        }

        return redirect('/dashboard')->with([
            'deposit_success' => 'Credit has been added to your account.',
        ]);
    }
}
