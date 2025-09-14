<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(LoginRequest $request) {
        $validated = $request->validated();
        if($validated && Auth::attempt($validated)) {
            return redirect()->route('app.index');
        }

        return redirect()->route('login.index');
    }
}
