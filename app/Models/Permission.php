<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'marks',
        'class_id',
        'section_id',
        'subject_id',
        'assignment',
        'tutorial',
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function classes()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

     public function section()
    {
        return $this->belongsTo(Section::class);
    }

     public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
