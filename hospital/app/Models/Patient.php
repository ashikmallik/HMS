<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'patient_id', 'name', 'phone', 'email', 'address',
        'gender', 'age', 'blood_group'
    ];
}
