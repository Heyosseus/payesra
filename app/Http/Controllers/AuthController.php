<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showRegisterForm() : View
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request) : RedirectResponse
    {
        $attributes = $request->validated();

        $newUser = User::create($attributes);

        return redirect()->route('login.show');
    }

    public function showLoginForm() : View
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request) : RedirectResponse
    {
        $attributes = $request->validated();

        if (!auth()->attempt($attributes)) {
               return Redirect::back()->withErrors([
                 'error' => 'The provided credentials do not match our records.',
                ]);
        }

        return redirect()->route('dashboard');
    }

    public function logout() : RedirectResponse
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
