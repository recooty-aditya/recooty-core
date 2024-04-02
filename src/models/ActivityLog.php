<?php

namespace Recooty\Core\Models;

use Carbon\Carbon;
use Recooty\Core\Models\JobPost;
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
    
}
