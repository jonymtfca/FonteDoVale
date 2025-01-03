<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'datetime',
        'is_menu' => 'boolean',
    ];
}
