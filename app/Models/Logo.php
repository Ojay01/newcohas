<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'regular_logo',
        'light_logo',
        'small_logo',
        'favicon',
    ];
}
