<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_id',
        'section_id',
        'session_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

     public static function getStudentsByClassAndSection($classId, $sectionId)
    {
        return self::where('class_id', $classId)
            ->where('section_id', $sectionId)
            ->with('students') // Load students relationship
            ->get();
    }

     public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

     public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'session_id');
    }
}
