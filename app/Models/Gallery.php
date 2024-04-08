<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

     protected $fillable = [
        'title', 'description', 'date_added', 'show_on_website', 'cover_image',
    ];

     public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
    
}
