<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Actions\User\CreateUserAction;
use App\Http\Actions\User\UpdateUserAction;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected readonly UserRepositoryInterface $repository)
    {

    }

    public function index()
    {
        return UserResource::collection($this->repository->getAll());
    }

    public function show($id)
    {
        return UserResource::make($this->repository->findById($id));
    }

    public function store(CreateUserAction $createUserAction, StoreUserRequest $request)
    {
        $createUserAction->execute($request);

        return response()->noContent(201);
    }

    public function update(UpdateUserAction $updateUserAction, UpdateUserRequest $request, $id)
    {
        $updateUserAction->execute($request,$id);

        return response()->noContent();
    }
}
