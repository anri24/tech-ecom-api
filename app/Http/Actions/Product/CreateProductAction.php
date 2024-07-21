<?php

declare(strict_types=1);

namespace App\Http\Actions\Product;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

readonly class CreateProductAction
{
    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
    }

    /**
     * @throws Exception
     */
    public function execute(StoreProductRequest $request): void
    {
        DB::beginTransaction();

        try {
            $category = $this->categoryRepository->findById($request->get('category_id'));

            Product::query()->create([
                'category_id'  => $request->get($category->id),
                'name'  => $request->get('name'),
                'price'  => $request->get('price'),
                'discount'  => $request->get('discount'),
                'in_stock'  => $request->get('in_stock'),
                'description'  => $request->get('description'),
            ]);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw $exception;
        }
    }
}
