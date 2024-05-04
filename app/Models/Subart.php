<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subart extends Model
{
    use HasFactory;

    protected $table = 'subart'; // Specify the table name

    protected $fillable = [
        'allart_id', 'title', 'content'
    ]; // Define fillable fields
}
