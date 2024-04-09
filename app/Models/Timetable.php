<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

   protected $fillable = [
        'class_id',
        'section_id',
        'subject_id',
        'starting_hour',
        'ending_hour',
        'starting_minute',
        'ending_minute',
        'day',
        'teacher_id',
        'room_id',
    ];

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

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function room()
    {
        return $this->belongsTo(ClassRoom::class, 'room_id');
    }

}
