<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorsexperiencedetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'type',
        'hospital_name' ,
        'designation' ,
        'to' ,
        'from' ,

    ];
}
