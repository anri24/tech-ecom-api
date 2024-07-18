<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    public function __construct(
        protected readonly ProductRepositoryInterface $repository
    ){}

    public function index()
    {
        return $this->repository->getAll();
    }

    public function show($id)
    {
        return $this->repository->findById($id);
    }

    public function store(StoreProductRequest $request)
    {
        return $this->repository->create($request->validated());
    }

    public function update(UpdateProductRequest $request, $id)
    {
        return $this->repository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
