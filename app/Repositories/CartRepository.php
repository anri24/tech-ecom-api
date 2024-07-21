<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Repositories\Contracts\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface
{
    public function __construct(
        protected readonly Cart $model
    ){}

    public function index()
    {
        return $this->model::query()->orderBy('id','DESC')->get();
    }

    public function store($data)
    {
        return $this->model::create($data);
    }

    public function delete($id)
    {
        return $this->model::query()->findOrFail($id)->delete();
    }
}
