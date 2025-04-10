<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'pacient_id',
        'user_id',
        'id',
        'no_patient',
        'service_id',
        'date',
        'day',
        'start_time',
        'price',
        'status',
        'appointment_status',
        'md_id',
        'status_change_id',
        'status_change_by',
        'payment_type',
        'payment_status',
    ];
}
