<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Actions\Wishlist\{CreateWishlistAction, DeleteWishlistAction};
use App\Http\Requests\StoreWishlistRequest;
use App\Repositories\Contracts\WishlistRepositoryInterface;

class WishlistController extends Controller
{
    public function __construct(
        protected readonly WishlistRepositoryInterface $repository
    ){}

    public function index()
    {
        return $this->repository->index();
    }

    public function store(CreateWishlistAction $createWishlistAction,StoreWishlistRequest $request)
    {
        $createWishlistAction->execute($request);

        return response()->noContent(201);
    }

    public function destroy(DeleteWishlistAction $deleteWishlistAction, $id)
    {
        $deleteWishlistAction->execute($id);

        return response()->noContent(202);
    }
}
