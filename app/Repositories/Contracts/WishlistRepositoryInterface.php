<?php

namespace App\Repositories\Contracts;

interface WishlistRepositoryInterface
{
    public function index();

    public function findById($id);

}
