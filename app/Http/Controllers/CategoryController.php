<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Actions\Category\{CreateCategoryAction, DeleteCategoryAction, UpdateCategoryAction};
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoriesResource;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Response;

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

    public function store(CreateCategoryAction $createCategoryAction, StoreCategoryRequest $request): Response
    {
        $createCategoryAction->execute($request);

        return response()->noContent(201);
    }


    public function update(UpdateCategoryAction $updateCategoryAction, UpdateCategoryRequest $request, $id)
    {
        $updateCategoryAction->execute($request, $id);

        return response()->noContent(204);
    }

    public function destroy(DeleteCategoryAction $deleteCategoryAction, $id)
    {
        $deleteCategoryAction->execute($id);

        return response()->noContent(202);
    }
}
