<?php

namespace Recooty\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Jetstream\Team as JetstreamTeam;
use Spark\Billable;
use Spatie\Sluggable\HasSlug;


class Team extends JetstreamTeam
{
    use Billable,HasFactory,HasSlug,SoftDeletes;

    protected $casts = ['personal_team' => 'boolean'];

    protected $fillable = ['name', 'personal_team', 'website', 'domain', 'api_key'];

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class);
    }

    public function pipelines()
    {
        return $this->hasMany(Pipeline::class);
    }

    public function screeningQuestionTemplates()
    {
        return $this->hasMany(ScreeningQuestionTemplate::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function career_page(): HasOne
    {
        return $this->hasOne(CareerPage::class);
    }

    public function job_widget(): HasOne
    {
        return $this->hasOne(JobWidget::class);
    }
}
