<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Actions\Product\CreateProductAction;
use App\Http\Actions\Product\DeleteProductAction;
use App\Http\Actions\Product\UpdateProductAction;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Exception;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(
        protected readonly ProductRepositoryInterface $repository
    )
    {
    }

    public function index()
    {
        return $this->repository->getAll();
    }

    public function show($id)
    {
        return $this->repository->findById($id);
    }

    /**
     * @throws Exception
     */
    public function store(CreateProductAction $createProductAction, StoreProductRequest $request)
    {
        $createProductAction->execute($request);

        return response()->noContent(201);
    }

    public function update(UpdateProductAction $updateProductAction, UpdateProductRequest $request, $id)
    {
        $updateProductAction->execute($request, $id);

        return response()->noContent();
    }

    public function destroy(DeleteProductAction $deleteProductAction, $id): Response
    {
        $deleteProductAction->execute($id);

        return response()->noContent(202);
    }
}
