<?php

declare(strict_types=1);

namespace App\Http\Actions\Category;

use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Contracts\CategoryRepositoryInterface;

readonly class UpdateCategoryAction
{
    public function __construct(private CategoryRepositoryInterface $repository)
    {
    }

    public function execute(UpdateCategoryRequest $request, $id): void
    {
        $category = $this->repository->findById($id);

        $category->update($request->validated());
    }
}
