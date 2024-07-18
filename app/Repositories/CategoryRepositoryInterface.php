<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function getall();

    public function findById($id);

    public function create($data);

    public function update($data, $id);

    public function delete($id);
}
