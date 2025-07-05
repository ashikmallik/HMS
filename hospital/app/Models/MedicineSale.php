<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicineSale extends Model
{
     protected $fillable = [
        'medicine_id', 'quantity', 'price', 'sale_date'
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
