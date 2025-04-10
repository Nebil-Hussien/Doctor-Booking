<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorsdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'md_unique_id',
        'name',
        'email',
        'phone',
        'address',
        'lat',
        'long',
        'gender',
        'password',
        'biography',
       'date_of_birth',
        'specilization'
    ];
}
