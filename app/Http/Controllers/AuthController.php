<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

    public function loginUser(Request $request)
    {
        //password => lily_admin
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], [
            'required' => ':attribute is required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('email', $request->email)->where('role', 'admin')->first();

        if (! $user) {
            return redirect()
                ->back()
                ->withErrors(['Incorrect email or password'])
                ->withInput();
        }

        if (! Hash::check($request->password, $user->password)) {
            return redirect()
                ->back()
                ->withErrors(['Incorrect email or password'])
                ->withInput();
        }

        Auth::login($user);

        return redirect()->to('/dashboard');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->to('/');
    }
}
