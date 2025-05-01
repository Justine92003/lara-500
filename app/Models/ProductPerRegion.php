<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPerRegion extends Model
{
    protected $fillable = ['totalSales'];
    
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function regions(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
