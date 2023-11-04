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

        $credentials =$request ->validate([
            'email' => 'required|email|string|exists:users,email',
            'password'=>['required'],
            'remember' =>'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);
        $user = Auth::user();
        printf($user);
        if(!Auth::attempt($credentials,$remember)){
            return response(
                [
                    'error' => 'Email or Password is incorrect',
                    $user
                ],status: 422
            );
        }
        $user = Auth::user();
        $token = $user -> createToken('main')-> plainTextToken;
        return response([
            'user'=>$user,
            'token'=>$token
        ]);
    }
}