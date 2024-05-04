<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articale extends Model
{
    use HasFactory;

    protected $table = 'article';
    protected $fillable = [
        'name',
        'description',
        'image',
        'note',
        
    ];
}
