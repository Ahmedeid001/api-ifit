<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class art extends Model
{
    use HasFactory;

    protected $table = 'art';
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
}
