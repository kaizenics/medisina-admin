<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json([
                'status' => true,
                'message' => 'Logged in'
            ]);
        }
        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

}