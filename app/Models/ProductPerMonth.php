<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPerMonth extends Model
{
    protected $fillalbe = ['date-of-sales', 'totalSales'];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
