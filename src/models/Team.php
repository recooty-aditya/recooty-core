<?php

namespace App\Models;

use App\Actions\Preset\CareerPagePreset;
use App\Actions\Preset\JobWidgetPreset;
use App\Actions\Preset\PipelinePreset;
use App\Actions\Preset\ScreeningQuestionPreset;
use App\Enums\JobPost\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\Events\TeamCreated;
use Laravel\Jetstream\Events\TeamDeleted;
use Laravel\Jetstream\Events\TeamUpdated;
use Laravel\Jetstream\Team as JetstreamTeam;
use Spark\Billable;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\LogOptions;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Team extends JetstreamTeam
{
    use Billable,HasFactory,HasSlug,SoftDeletes;

    protected $appends = ['logo_url'];

    protected $casts = ['personal_team' => 'boolean'];

    protected $fillable = ['name', 'personal_team', 'website', 'domain', 'api_key'];

    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
        'updated' => TeamUpdated::class,
        'deleted' => TeamDeleted::class,
    ];

    protected static function booted(): void
    {
        static::created(function (Team $team) {
            app(PipelinePreset::class)->create($team);
            app(ScreeningQuestionPreset::class)->create($team);
            app(JobWidgetPreset::class)->create($team);
            app(CareerPagePreset::class)->create($team);
        });

        static::creating(function ($team) {
            $team->api_key = md5($team->slug);
        });
    }

    public function stripeEmail(): ?string
    {
        return $this->owner->email;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(function (string $eventName) {
                $text = "logs.invitation.$eventName";

                return $text;
            })->logAll()
            ->logExcept(['updated_at'])
            ->logOnlyDirty();
    }

    public function tapActivity(Activity $activity)
    {
        $activity->team_id = auth()->user()->current_team_id;
        $activity->visibility = 'ADMIN';
    }

    // Get the options for generating the slug.
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo ? url(Storage::url($this->logo)) : null;
    }

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

    public function raw_statistics()
    {
        return $this->jobPosts()
            ->selectRaw('count(*) as count, status')
            ->groupBy('status');
    }

    public function statistics()
    {
        $statuses = Status::names();
        $stats = $this->raw_statistics()->get()->pluck('count', 'status')->toArray();
        $result = [];
        foreach ($statuses as $status) {
            $result[$status] = isset($stats[$status]) ? $stats[$status] : 0;
        }

        return $result;
    }
}
