<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockActivity extends Model
{
    protected $fillable = ['medicine_id', 'type', 'quantity', 'user_id', 'note'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
