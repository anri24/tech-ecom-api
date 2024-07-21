<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'category_id',
        'name',
        'svg',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'category_id','id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id','id');
    }
}
