<?php

namespace Recooty\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobWidget extends Model
{
    use HasFactory;
    protected $fillable = ['team_id', 'widget_type', 'font_size', 'background_color', 'background_highlighter', 'text_color', 'text_link_color', 'primary_button', 'secondary_button', 'show_recooty_logo', 'allow_without_opening'];
}
