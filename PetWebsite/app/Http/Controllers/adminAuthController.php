<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class adminAuthController
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string|exists:admin,username',
            'password' => 'required',

        ]);



        if (!Auth::guard('admin')->attempt($credentials)) {
            return response(
                [
                    'error' => 'Username or Password is incorrect'
                ],
                422
            );
        }



        $admin = Auth::guard('admin')->user();
        $token = $admin->createToken('main')->plainTextToken;

        return response([
            'admin' => $admin,
            'token' => $token
        ]);
    }

    public function logout()
    {
        /** @var Admin $admin */
        $admin = Auth::guard('admin')->user();

        $admin->currentAccessToken()->delete();
        return response([
            'success' => true
        ]);
    }
}
