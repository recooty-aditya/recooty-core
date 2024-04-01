<?php

namespace Recooty\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScoreCardResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'interview_id',
        'interview_interviewer_email_id',
        'question',
        'answer',
        'type',
        'score_card_field_id'
    ];
}
