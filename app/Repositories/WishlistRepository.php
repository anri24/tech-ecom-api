<?php

namespace App\Repositories;

use App\Models\Wishlist;

class WishlistRepository implements WishlistRepositoryInterface
{
    public function __construct(
        protected readonly Wishlist $model
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
