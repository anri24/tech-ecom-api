<?php

namespace App\Repositories;

use App\Models\Wishlist;
use App\Repositories\Contracts\WishlistRepositoryInterface;

class WishlistRepository implements WishlistRepositoryInterface
{
    public function __construct(
        protected readonly Wishlist $model
    ){}

    public function index()
    {
        return $this->model::query()->orderBy('id','DESC')->get();
    }

    public function findById($id)
    {
        return $this->model::query()->findOrFail($id);
    }

}
