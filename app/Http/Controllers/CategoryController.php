<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    public function __construct(
        protected readonly CategoryRepositoryInterface $repository
    ){}

    public function index()
    {
        return $this->repository->getall();
    }


    public function show(Category $category)
    {
        return $this->repository->findById($category);
    }

    public function store(StoreCategoryRequest $request)
    {
        return $this->repository->create($request->validated());
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        return $this->repository->update($request->validated(), $category);
    }

    public function destroy(Category $category)
    {
        return $this->repository->delete($category);
    }
}
