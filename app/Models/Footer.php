<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'company_name',
        'address',
        'hotline',
        'email',
        'website',
        'facebook',
        'zalo',
        'tiktok',
        'youtube',
        'instagram',
        'about',
        'info_title',
        'about_text',
        'about_link',
        'stories_text',
        'stories_link',
        'size_guide_text',
        'size_guide_link',
        'contact_text',
        'contact_link',
        'customer_service_title',
        'shipping_text',
        'shipping_link',
        'return_text',
        'return_link',
        'privacy_text',
        'privacy_link',
        'terms_text',
        'terms_link',
        'newsletter_title',
        'newsletter_placeholder',
        'newsletter_button',
        'copyright',
    ];
}
