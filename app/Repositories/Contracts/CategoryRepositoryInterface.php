<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getall();

    public function findById($id);
}
