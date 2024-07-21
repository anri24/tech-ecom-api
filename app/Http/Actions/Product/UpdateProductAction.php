<?php

declare(strict_types=1);

namespace App\Http\Actions\Product;

use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;

readonly class UpdateProductAction
{
    public function __construct(private ProductRepositoryInterface $repository)
    {
    }

    public function execute(UpdateProductRequest $request, $id): void
    {
        $product = $this->repository->findById($id);

        $product->update($request->validated());
    }
}
