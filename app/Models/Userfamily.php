<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userfamily extends Model
{
    use HasFactory;
    protected $fillable = [
        'age',
        'name',
        'dob',
        'gender',
        'user_id',
        'relation' ,
         'blood_type',

    ];
}
