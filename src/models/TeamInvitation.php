<?php

namespace Recooty\Core\Models;

use Laravel\Jetstream\Jetstream;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Jetstream\TeamInvitation as JetstreamTeamInvitation;

class TeamInvitation extends JetstreamTeamInvitation
{
    use SoftDeletes;
    
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
