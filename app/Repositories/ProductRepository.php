<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{

    public function __construct(
        protected readonly Product $model
    ){}

    public function getAll()
    {
        return $this->model::query()->orderBy('id','DESC')->get();
    }

    public function findById($id)
    {
        return $this->model::query()->findOrFail($id);
    }

    public function limitedProducts()
    {
        return $this->model::query()->orderBy('id','DESC')->limit(10)->get();
    }
}
