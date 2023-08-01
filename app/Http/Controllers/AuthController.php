<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    // Login function
    public function login(): view
    {
        return view('auth/login', [
            'appName' => config('app.name'),
        ]);
    }

    public function loginUser(LoginRequest $request)
    {
        //password => fleetio_admin
        $user = User::where('email', $request->email)
            ->first();

        Auth::login($user);

        return redirect()->to('/dashboard');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->to('/');
    }
}
