<?php

namespace Recooty\Models;

use Carbon\Carbon;
use Laravel\Jetstream\Jetstream;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Jetstream\TeamInvitation as JetstreamTeamInvitation;

class TeamInvitation extends JetstreamTeamInvitation
{
    use LogsActivity,SoftDeletes;
    
    protected $fillable = [
        'email',
        'role',
    ];
    
    protected static $recordEvents = ['created','updated'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Jetstream::teamModel());
    }    
}
