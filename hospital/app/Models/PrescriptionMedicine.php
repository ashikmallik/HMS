<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicine extends Model
{
    protected $fillable = ['prescription_id', 'medicine_id', 'dosage', 'duration', 'instruction'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
