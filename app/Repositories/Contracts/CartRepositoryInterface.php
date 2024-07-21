<?php

namespace App\Repositories\Contracts;

interface CartRepositoryInterface
{
    public function index();

    public function store($data);

    public function delete($id);
}
