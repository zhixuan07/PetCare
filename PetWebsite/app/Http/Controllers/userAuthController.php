<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;


class userAuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|string|unique:users,email',
            'password' => [
                'required',
                Password::min(8)->mixedCase()->numbers()
            ]
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => ['required'],
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);
        $user = Auth::user();
        printf($user);
        if (!Auth::attempt($credentials, $remember)) {
            return response(
                [
                    'error' => 'Email or Password is incorrect',
                    $user
                ], status: 422
            );
        }
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token
        ]);
    }


    public function updateUser(Request $request, $id)
    {
        try {
            $user = User::find($id);


            if (!$user) {
                return response()->json(['message' => 'User not found',
                    'ID'=>$id], 404);
            }

            $data = $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'contact' => 'required|string'
            ]);

            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->contact = $data['contact'];
            $user->save();

            return response()->json(['user' => $user, 'message' => 'User profile updated successfully']);
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            \Log::error('User update failed: ' . $e->getMessage());

            return response()->json(['message' => 'Error updating user profile'], 500);
        }
    }
}

