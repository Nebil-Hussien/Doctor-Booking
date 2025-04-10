<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mddoctor extends Authenticatable
{
    use HasFactory;

    protected $table = 'mddoctors';
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
        'specilization',
        'profile',
    ];
}
