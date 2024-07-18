<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Repositories\WishlistRepositoryInterface;

class WishlistController extends Controller
{
    public function __construct(
        protected readonly WishlistRepositoryInterface $repository
    ){}

    public function index()
    {
        return $this->repository->index();
    }

    public function store(StoreWishlistRequest $request)
    {
        return $this->repository->store($request->validated());
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
