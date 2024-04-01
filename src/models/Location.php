<?php

namespace Recooty\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use CrudTrait,HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'user_id',
        'team_id',
        'name',
        'address',
        'city',
        'state',
        'country',
        'zip_code',
        'last_updated_by_user_id',
        'is_default',
    ];

    public function created_by(): HasOne
    {
        return $this->hasOne(User::class,"id","user_id");
    }

    public function updated_by(): ?HasOne
    {
        return $this->hasOne(User::class,"id","last_updated_by_user_id");
    }
}
