<?php

declare(strict_types=1);

namespace App\Http\Actions\User;

use App\Http\Requests\Auth\UpdateUserRequest;
use App\Repositories\Contracts\UserRepositoryInterface;

class UpdateUserAction
{
    public function __construct(
        private readonly UserRepositoryInterface $repository
    ){}

    public function execute(UpdateUserRequest $request, $id)
    {
        $user = $this->repository->findById($id);

        $user->update($request->validated());
    }
}
