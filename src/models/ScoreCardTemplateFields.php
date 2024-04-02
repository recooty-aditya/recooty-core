<?php

namespace Recooty\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScoreCardTemplateFields extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = ['data' => 'array'];
    
    protected $fillable = [
        'template_id',
        'field_name',
        'is_required',
        'field_type',
        'position',
        'data',
    ];
}
