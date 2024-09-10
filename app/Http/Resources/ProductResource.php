<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => CategoriesResource::make($this->category),
            'name' => $this->name,
            'price' => $this->price,
            'discount' => $this->discount,
            'in_stock' => $this->in_stock,
            'description' => $this->description,
            'images' => $this->images,
        ];
    }
}
