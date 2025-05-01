<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['region', 'unitSold'];

    public function salesRecords()
    {
        return $this->hasMany(SalesRecord::class, 'regions');
    }
}
