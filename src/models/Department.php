<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'team_id',
        'name',
        'last_updated_by_user_id',
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
