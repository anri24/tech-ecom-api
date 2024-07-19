<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesResource;
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
        return CategoriesResource::collection($this->repository->getall());
    }


    public function show($id)
    {
        return CategoriesResource::make($this->repository->findById($id));
    }

    public function store(StoreCategoryRequest $request)
    {
        return $this->repository->create($request->validated());
    }


    public function update(UpdateCategoryRequest $request, $id)
    {
        return $this->repository->update($request->validated(), $id);
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
