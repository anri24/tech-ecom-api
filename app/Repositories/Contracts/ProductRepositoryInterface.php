<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getAll();

    public function findById($id);

    public function limitedProducts();
}
