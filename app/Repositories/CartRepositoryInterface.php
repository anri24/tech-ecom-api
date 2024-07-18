<?php

namespace App\Repositories;

interface CartRepositoryInterface
{
    public function index();

    public function store($data);

    public function delete($id);
}
