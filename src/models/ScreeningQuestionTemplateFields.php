<?php

namespace App\Models;

use App\Enums\ScreeningQuestionTemplate\DataType;
use App\Enums\ScreeningQuestionTemplate\FieldType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScreeningQuestionTemplateFields extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'template_id',
        'field_name',
        'is_required',
        'field_type',
        'position',
        'data',
        'visibility',
        'data_type',
        'auto_reject',
    ];
    
    protected $casts = ['data' => 'array'];
}
