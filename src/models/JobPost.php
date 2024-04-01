<?php

namespace Recooty\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Enums\Application\Status;
use App\Enums\JobPost\Employment_Type;
use App\Enums\JobPost\Experience_Required;
use App\Enums\JobPost\Job_Board_Status;
use App\Enums\JobPost\Location_Type;
use App\Enums\JobPost\Pay_Interval;
use App\Enums\JobPost\Status as JobPostStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Casts\Attribute;

class JobPost extends Model
{
    use HasFactory, SoftDeletes, HasSlug, Notifiable , CrudTrait;


    protected $appends = ["job_board_status_display", "human_readable_created_at", "statistics", "experience_required_display", "location_type_display", "employment_type_display", "status_display", "pay_interval_display", "formatted_created_at"];

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

    public function last_5_applications()
    {
        return $this->applications()->latest()->take(5);
    }

    public function statistics()
    {
        return $this->hasMany(Application::class, 'job_post_id', 'id')
            ->selectRaw('count(*) as count, stage')
            ->groupBy('stage');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function users(): HasMany
    {
        return $this->hasMany(JobPostPermission::class, 'job_post_id', 'id');
    }

    public function reviewers()
    {
        return $this->users();
    }

    function getJobBoardStatusDisplayAttribute()
    {
        $enum_job_board_status = Job_Board_Status::key_array();
        return $enum_job_board_status[$this->job_board_status] ?? $this->job_board_status;
    }

    public function getHumanReadableCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    function getExperienceRequiredDisplayAttribute()
    {
        $enum_experience_required = Experience_Required::key_array();
        return $enum_experience_required[$this->experience_required] ?? $this->experience_required;
    }

    function getLocationTypeDisplayAttribute()
    {
        $enum_location_type = Location_Type::key_array();
        return $enum_location_type[$this->location_type] ?? $this->location_type;
    }

    function getEmploymentTypeDisplayAttribute()
    {
        $enum_employment_type = Employment_Type::key_array();
        return $enum_employment_type[$this->employment_type] ?? $this->employment_type;
    }

    function getStatusDisplayAttribute()
    {
        $enum_status = JobPostStatus::key_array();
        return $enum_status[$this->status] ?? $this->status;
    }

    function getPayIntervalDisplayAttribute()
    {
        $enum_pay_interval = Pay_Interval::key_array();
        return $enum_pay_interval[$this->pay_interval] ?? $this->pay_interval;
    }

    public function getStatisticsAttribute()
    {
        $statuses = Status::names();
        $stats = $this->statistics()->get()->pluck('count', 'status')->toArray();
        $result = [];
        foreach ($statuses as $status) {
            $result[$status] = isset($stats[$status]) ? $stats[$status] : 0;
        }
        return $result;
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('F j, Y');
    }

    public function applicationStatistics()
    {
        $new_count=$this->applications()->where('status', Status::NEW->name)->count();
        $shortlisted_count=$this->applications()->where('status', Status::SHORTLISTED->name)->count();
        $rejected_count=$this->applications()->where('status', Status::REJECT->name)->count();
        $total_count=$this->applications()->count();
        return [
            Status::NEW->name => $new_count,
            Status::SHORTLISTED->name => $shortlisted_count,
            Status::REJECT->name => $rejected_count,
            'Total' => $total_count,
        ];
    }
 
}
