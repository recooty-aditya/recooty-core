<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPostPermission extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'team_id',
        'user_id',
        'job_post_id',
        'type',
        'comment',
        'view',
        'edit',
    ];

    public function job_post(): HasOne
    {
        return $this->hasOne(JobPost::class,"id","job_post_id");
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class,"id","user_id");
    }
}

