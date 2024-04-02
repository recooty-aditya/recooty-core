<?php

namespace Recooty\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pipeline extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'team_id',
        'name',
        'is_template',
        'is_preset',
        'last_updated_by_user_id',
    ];

    public function jobPosts(): HasMany
    {
        return $this->hasMany(JobPost::class, 'pipeline_id', 'id');
    }

    public function rounds(): HasMany
    {
        return $this->hasMany(Round::class, 'pipeline_id', 'id');
    }
}
