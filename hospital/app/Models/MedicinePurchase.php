<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicinePurchase extends Model
{
    protected $fillable = [
        'medicine_id', 'quantity', 'price', 'purchase_date'
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
