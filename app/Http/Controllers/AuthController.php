<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            if ($user->active) {
                return redirect()->route('dashboard.'.$user->role.'.index')->with('success', 'Login Successful');
            }
            auth()->logout();
            session()->regenerate();
            return redirect()->route('index')->withErrors(['error' => 'Account is not active, please contact administrator']);
        }
        return back()->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        auth()->logout();
        session()->regenerate();
        return redirect()->route('index');
    }
}
