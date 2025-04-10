<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorseducationdetail extends Model
{
    use HasFactory;
    protected $table = 'doctorseducationdetails';
    protected $fillable = [
        'doctor_id',
        'field_of_study',
        'graduated_from',
        'college_documnet',
        'year_of_completion',
    ];
}
