<?php

namespace Recooty\Models;

use App\Enums\Application\Status;
use App\Enums\Round\Stage;
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

    protected static function booted()
    {
        static::created(function ($pipeline) {
            $default_rounds = [
                Stage::NEW->name => ['Applied', 'Sourced', 'Archived'],
                Stage::OFFERED->name => ['Offer Sent', 'Offer Accepted', 'Offer Declined'],
                Stage::REJECT->name => ['Manually Rejected', 'Auto Rejected'],
            ];
            foreach ($default_rounds as $stage => $rounds) {
                foreach ($rounds as $index => $round) {
                    Round::create([
                        'name' => $round,
                        'team_id' => $pipeline->team_id,
                        'user_id' => $pipeline->user_id,
                        'pipeline_id' => $pipeline->id,
                        'stage' => $stage,
                        'sequence' => $index,
                    ]);
                }
            }
        });
    }
}
