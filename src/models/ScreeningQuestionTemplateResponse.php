<?php

namespace Recooty\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScreeningQuestionTemplateResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'application_id',
        'template_field_id',
        'question',
        'answer',
        'type',
    ];
}
