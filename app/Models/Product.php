<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
}
