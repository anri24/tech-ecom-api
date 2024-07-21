<?php

declare(strict_types=1);

namespace App\Http\Actions\Wishlist;

use App\Repositories\Contracts\WishlistRepositoryInterface;

class DeleteWishlistAction
{
    public function __construct(private WishlistRepositoryInterface $repository)
    {
    }

    public function execute($id)
    {
        $wishlist = $this->repository->findById($id);

        $wishlist->delete();
    }
}
