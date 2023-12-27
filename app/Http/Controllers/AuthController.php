<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function register()
    {
        return Inertia::render('Auth/Register');
    }

    public function login()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        auth()->login($user);

        return to_route('welcome');
    }

    public function authenticate(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return to_route('welcome');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('welcome');
    }
}
