<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_title',
        'social_links',
        'homepage_note_title',
        'principal',
        'homepage_note_description',
        'copyright_text',
        'header_logo',
        'principal_image',
        'footer_logo',
        'login_banner',
        'about_us_image',
        'terms_and_conditions',
        'privacy_policy',
        'about_us',
        'slider_images',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}
