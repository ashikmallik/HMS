<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'name', 'type', 'manufacturer', 'unit', 'stock', 'price', 'purchase_price', 'expiry_date'
    ];
}
