<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GoogleAuth extends Controller
{
    public function loginOrRegister(Request $request)
    {
        $user = User::query()->where('email', $request->email)->first();
        if (!$user){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Str::password(12),
                'email_verified_at' => now(),
            ]);
        }

        $token = $user->createToken('main')->plainTextToken;
        return response()->json(['user' => $user, 'token' => $token]);
    }
}
