<?php

declare(strict_types=1);

namespace App\Http\Actions\Wishlist;

use App\Http\Requests\StoreWishlistRequest;
use App\Models\Wishlist;
use App\Repositories\WishlistRepository;

class CreateWishlistAction
{
    public function execute(StoreWishlistRequest $request)
    {
        Wishlist::query()->create($request->validated());
    }
}
