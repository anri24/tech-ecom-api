<?php

declare(strict_types=1);

namespace App\Http\Actions\Product;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

class CreateProductAction
{
    public function execute(StoreProductRequest $request): void
    {
        Product::query()->create($request->validated());
    }
}
