<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'discount',
        'in_stock',
        'description',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public  function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
