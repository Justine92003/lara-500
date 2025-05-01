<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salesperson extends Model
{
    protected $fillable = ['salesperson'];

    public function sales_records()
    {
        return $this->hasMany(SalesRecord::class);
    }
}
