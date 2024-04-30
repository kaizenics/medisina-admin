<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credential)) {
            return response()->json([
                'status' => true,
                'message' => 'Admin Logged in'
            ]);
        }
        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

}