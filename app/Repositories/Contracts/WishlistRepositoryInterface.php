<?php

namespace App\Repositories;

interface WishlistRepositoryInterface
{
    public function index();

    public function store($data);

    public function delete($id);
}
