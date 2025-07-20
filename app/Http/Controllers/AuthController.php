<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:100',
            'role' => 'required|string|in:admin,moderador,usuario',
            'email' => 'required|string|email|min:10|max:50|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $user = User::create([
            'username' => $request->username,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return response()->json($user);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|min:10|max:50',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $credentials = $request->only(['email', 'password']);
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
            $user = JWTAuth::user();
            $expiresIn = JWTAuth::factory()->getTTL() * 60;
            $expiresAt = now()->addSeconds($expiresIn);
            return response()->json([
                'token' => $token,
                'expires_in' => $expiresIn,
                'expires_at' => $expiresAt->toDateTimeString(),
                'user'  => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                ]
            ], 200);
            return response()->json(['token' => $token], 200);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token', $e], 500);
        }
    }
    public function getUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return response()->json($user, 200);
    }
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
