<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreUserRequest $request)
    {

        $validate = $request->validated();
        $validate['password'] = Hash::make($request->string('password'));
        /** @var User $user */
        $user = User::create($validate);

        $token = $user->createToken("main")->plainTextToken;

//        event(new Registered($user));

//        Auth::login($user);

        return response()->json(['user' => $user, 'token'=> $token]);
    }
}
