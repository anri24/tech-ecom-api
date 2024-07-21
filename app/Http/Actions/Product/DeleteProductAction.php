<?php

declare(strict_types=1);

namespace App\Http\Actions\Product;

use App\Repositories\Contracts\ProductRepositoryInterface;

class DeleteProductAction
{
    public function __construct(private ProductRepositoryInterface $repository)
    {
    }

    public function execute($id)
    {
        $product = $this->repository->findById($id);

        $product->delete();
    }
}
