<?php

namespace Recooty\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class InterviewInterviewer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'interview_id',
        'schedular_id',
        'interviewer_email_id',
        'status',
        'team_id',
    ];

    public function schedular(): HasOne
    {
        return $this->hasOne(User::class,"id","schedular_id");
    }

    public function interviewer(): ?HasOne
    {
        return $this->hasOne(User::class,"email","interviewer_email_id");
    }

    public function interview(): HasOne
    {
        return $this->hasOne(Interview::class,"id","interview_id");
    }

    public function score_card_response()
    {
        return ScoreCardResponse::where('interview_id', $this->interview_id)->where('interview_interviewer_id',  $this->interviewer_id)->get();
    }
}

