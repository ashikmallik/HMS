<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'appointment_id', 'doctor_fee', 'medicine_cost', 'lab_test_cost',
        'other_charges', 'discount', 'total_amount', 'paid_amount', 'due_amount', 'status'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
