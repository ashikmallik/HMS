<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ['appointment_id', 'doctor_id', 'symptoms', 'diagnosis', 'advice'];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function medicines()
    {
        return $this->hasMany(PrescriptionMedicine::class);
    }
}
