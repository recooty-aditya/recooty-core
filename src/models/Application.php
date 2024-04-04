<?php

namespace Recooty\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_number',
        'resume',
        'team_id',
        'job_post_id',
        'round_id',
        'stage',
        'type',
        'viewer',
        'tags',
        'job_board_id',
        'resume_parse',
        'semantic_match',
        'ai_score',
    ];

    protected $casts = [
        'viewer' => 'array',
        'resume_parse' => 'json',
        'semantic_match' => 'json',
    ];

    public function job_post(): HasOne
    {
        return $this->hasOne(JobPost::class, 'id', 'job_post_id');
    }

    public function job_board(): HasOne
    {
        return $this->hasOne(JobBoard::class, 'id', 'job_board_id');
    }

    public function team(): HasOne
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(ApplicationComment::class, 'application_id', 'id')->with('user');
    }

    public function round(): HasOne
    {
        return $this->hasOne(Round::class, 'id', 'round_id');
    }
    
}
