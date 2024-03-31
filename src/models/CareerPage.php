<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CareerPage extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'banner', 'team_id', 'description', 'email', 'phone', 'facebook', 'twitter', 'instagram', 'linkedin', 'terms_and_condition', 'privacy_policy', 'gdpr_url', 'show_recooty_logo', 'show_share_button', 'theme', 'primary_color'];

    protected $appends = ['banner_url'];

    public function getBannerUrlAttribute()
    {
        if ($this->banner) {
            return url(Storage::url($this->banner));
        }
    }
}
