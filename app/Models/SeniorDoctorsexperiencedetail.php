<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorsexperiencedetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'year_experience',
        'employer_name' ,
        'designation' ,
        'to' ,
        'from' ,
        'guarantee_phone',
        'guarantee_name',
        'accept_terms',
    ];
}
