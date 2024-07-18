<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Repositories\CartRepositoryInterface;

class CartController extends Controller
{
    public function __construct(
        protected readonly CartRepositoryInterface $repository
    ){}
    public function index()
    {
        return $this->repository->index();
    }

    public function store(StoreCartRequest $request)
    {
        return $this->repository->store($request->validated());
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
