<?php

namespace Recooty\Models;

use Carbon\Carbon;
use Recooty\Models\JobPost;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityLog extends Model{

    use HasFactory;
    
    protected $fillable = [
        'team_id',
        'causer_type',
        'subject_id',
        'subject_type',
    ];
    protected $table = 'activity_log';

    protected $hidden = ["subject",'causer','job','log_name','causer_id','user_id','team_id','application_id','job_post_id','properties','batch_uuid','subject_id','causer_type'];
    protected $appends = ['data',"translation",'human_readable_created_at','created_at_format'];

    public function causer()
    {
        return $this->morphTo();
    }

    public function subject()
    {
        return $this->morphTo()->withTrashed();
    }

    public function job()
    {
        return $this->belongsTo(JobPost::class,'job_post_id','id');
    }

    public function getTranslationAttribute() {
        return trans($this->description);
    }

    public function getDataAttribute() {
        $data = [];
        switch ($this->subject_type) {
            case 'App\Models\JobPostPermission':
                $data = [
                    'causer' => $this->causer,
                    'reviewer' => $this->subject->user,
                    'job' => $this->job,
                ];
                break;
            case 'App\Models\Location':
                $data = [
                    'causer' => $this->causer,
                    'location' => $this->subject,
                ];
                break;
            case 'App\Models\Department':
                    $data = [
                        'causer' => $this->causer,
                        'department' => $this->subject,
                    ];
                break;
            case 'App\Models\TeamInvitation':
                $data = [
                    'causer' => $this->causer,
                    'invitation' => $this->subject,
                ];
                break;
            case 'App\Models\Team':
                $data = [
                    'causer' => $this->causer,
                    'team' => $this->subject,
                ];
                break;
            
            default:
                Log::error("undefined case for subject in activity log for :".$this->subject_type);
                break;
        }
        return $data;
    }

    public function getHumanReadableCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getCreatedAtFormatAttribute()
    {
        return Carbon::parse($this->created_at)->format("d M Y | H:i A");
    }

    

    
}
