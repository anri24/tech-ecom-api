<?php

declare(strict_types=1);

namespace App\Http\Actions\Category;

use App\Repositories\Contracts\CategoryRepositoryInterface;

class DeleteCategoryAction
{
    public function __construct(private CategoryRepositoryInterface $repository)
    {

    }

    public function execute($id): void
    {
        $category = $this->repository->findById($id);

        $category->delete();
    }
}
