<?php

namespace Recooty\Core\Models;


use Spatie\Sluggable\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class JobPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'team_id',
        'title',
        'type',
        'description',
        'code',
        'slug',
        'experience_required',
        'location_type',
        'status',
        'job_board_status',
        'employment_type',
        'department_id',
        'pipeline_id',
        'min_pay',
        'max_pay',
        'pay_interval',
        'pay_currency',
        'short_url',
        'flag',
        'flag_reason',
        'last_updated_by_user_id',
        'screening_question_template_id',
        'location_id',
        'jd_parse'
    ];

    protected $casts = ['jd_parse' => 'json'];


    public function created_by(): HasOne
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function updated_by(): ?HasOne
    {
        return $this->hasOne(User::class, "id", "last_updated_by_user_id");
    }

    public function department(): HasOne
    {
        return $this->hasOne(Department::class, "id", "department_id");
    }

    public function team(): HasOne
    {
        return $this->hasOne(Team::class, "id", "team_id");
    }

    public function location(): HasOne
    {
        return $this->hasOne(Location::class, "id", "location_id");
    }

    public function pipeline(): HasOne
    {
        return $this->hasOne(Pipeline::class, "id", "pipeline_id");
    }

    public function screening_question_template(): HasOne
    {
        return $this->hasOne(ScreeningQuestionTemplate::class, "id", "screening_question_template_id");
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'job_post_id', 'id');
    }

    public function reviewers(): HasMany
    {
        return $this->hasMany(JobPostPermission::class, 'job_post_id', 'id');
    }
}
