<?php

namespace Recooty\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory, SoftDeletes;

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
