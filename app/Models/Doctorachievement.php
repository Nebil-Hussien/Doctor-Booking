<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorachievement extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'type',
        'award_name',
        'award_year'
    ];
}
