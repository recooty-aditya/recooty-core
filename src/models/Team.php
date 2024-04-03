<?php

namespace Recooty\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Jetstream\Team as JetstreamTeam;

class Team extends JetstreamTeam
{
    use HasFactory,SoftDeletes;

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

    public function getUsersByRole($role)
    {
        $users = $this->users->filter(function ($user) use ($role) {
            return $user['membership']['role'] === $role;
        });

        if ($role == 'admin') {
            return $users->merge([$this->owner]);
        }

        return $users->values();
    }
}
