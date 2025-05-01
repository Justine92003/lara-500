<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'date-of-sale',
        'products',
        'categories',
        'regions',
        'salespeople',
        'units-sold',
        'unit-price',
        'totalSales'
    ];

    protected $table = 'sales_records';

    public function product()
    {
        return $this->belongsTo(Product::class, 'products');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'regions');
    }

    public function salesperson()
    {
        return $this->belongsTo(Salesperson::class, 'salespeople');
    }
}
