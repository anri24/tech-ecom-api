<?php

declare(strict_types=1);

namespace App\Http\Actions\Category;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class CreateCategoryAction
{
    public function execute(StoreCategoryRequest $request): void
    {
        Category::query()->create($request->validated());
    }
}
