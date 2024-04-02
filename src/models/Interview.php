<?php

namespace Recooty\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interview extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'team_id',
        'schedular_id',
        'job_post_id',
        'application_id',
        'status',
        'stage',
        'type',
        'score_card_template_id',
        'location',
        'candidate_notes',
        'interviewer_notes',
        'start_time',
        'duration',
    ];

    public function schedular(): HasOne
    {
        return $this->hasOne(User::class,"id","schedular_id");
    }

    public function job_post(): HasOne
    {
        return $this->hasOne(JobPost::class,"id","job_post_id");
    }

    public function applicant(): HasOne
    {
        return $this->hasOne(Application::class,"id","application_id");
    }

    public function score_card_template(): HasOne
    {
        return $this->hasOne(ScoreCardTemplate::class,"id","score_card_template_id");
    }

    public function interviewers(): HasMany
    {
        return $this->hasMany(InterviewInterviewer::class, 'interview_id', 'id');
    }
}
