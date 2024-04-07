<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department_id',
        'designation',
        'social_links',
        'about',
        'show_on_website'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
