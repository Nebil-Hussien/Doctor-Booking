<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activitylog extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'url',
        'method',
        'ip',
        'user_id',
        'type',
        'created_by'
    ];
}
