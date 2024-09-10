<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(protected readonly User $model)
    {

    }

    public function getAll()
    {
        return $this->model::query()->orderBy('id','DESC')->get();
    }


    public function findById($id)
    {
        return $this->model::query()->findOrFail($id);
    }

}
