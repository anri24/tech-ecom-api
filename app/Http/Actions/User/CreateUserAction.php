<?php

declare(strict_types=1);

namespace App\Http\Actions\User;

use App\Http\Requests\Auth\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    public function execute(StoreUserRequest $request)
    {
        $validate = $request->validated();
        $validate['password'] = Hash::make($request->password);
        User::query()->create($validate);
    }
}
