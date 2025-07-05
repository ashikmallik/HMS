<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'department', 'designation', 'fee', 'schedule'
    ];

    protected $casts = [
        'schedule' => 'array',
    ];
}
