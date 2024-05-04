<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exercise extends Model
{
    use HasFactory;
    protected $table = 'json';
    protected $fillable = [
        'name',
        'primary_muscles',
        'secondary_muscles',
        'gifUrl',
        'rep',
        'Rest_time',
        'instructions',
    ];

    
}
