<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorappointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_id',    'md_doctor_id',    'doctor_appointment_status'
    ];
}
