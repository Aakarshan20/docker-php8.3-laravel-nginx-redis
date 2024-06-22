<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class AuthController extends Controller
{

    public function getCsrfToken(Request $request){
        return csrf_token();
    }

    public function register2(Request $request){
        return '999';
    }

    public function register3(Request $request){
        return '999';
    }

    public function register(Request $request)
    {
        return 'test';
        //123
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        return 'test2';
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);
        return 'test3';
        $token = $user->createToken('token')->plainTextToken;
        return 'tes4';
        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return  response([
            'message' => 'Logged out.'
        ],Response::HTTP_OK);
    }
}
