<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorregistration extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'type',
        'registrationid',
        'year_of_registration'
    ];
}
