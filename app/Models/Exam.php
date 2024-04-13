<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name',
        'starting_date',
        'ending_date',
        'session_id',
        // Add more fields as needed
    ];

    protected $dates = [
        'starting_date',
        'ending_date',
        // Add more date fields if needed
    ];
}
