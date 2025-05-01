<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    protected $fillable = ['products', 'categories'];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sales_records(): HasMany
    {
        return $this->hasMany(SalesRecord::class);
    }
}
