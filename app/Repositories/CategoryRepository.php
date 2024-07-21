<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(
        protected readonly Category $model
    ){}

    public function getall()
    {
        return $this->model::query()->where('category_id',null)->get();
    }

    public function findById($id)
    {
        return $this->model->query()->findOrFail($id);
    }
}
