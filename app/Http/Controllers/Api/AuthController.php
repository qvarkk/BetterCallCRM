<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) : JsonResponse
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user) {
            return response()->json(['message' => 'Wrong email'], 401);
        }

        if (!Hash::check($fields['password'], $user->password)) {
            return response()->json(['message' => 'Wrong password'], 401);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'data' => [
                'user' => new UserResource($user),
                'token' => $token
            ]
        ];
        return response()->json($response);
    }

    public function getUser(Request $request) : JsonResource
    {
        return new UserResource(auth()->user());
    }

    public function logout(Request $request) : JsonResponse
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
