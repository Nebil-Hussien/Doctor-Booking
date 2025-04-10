<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorseducationdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id' ,
        'type' ,
        'degree',
        'college',
        'year_of_completion',
    ];
}
