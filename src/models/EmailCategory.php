<?php

namespace Recooty\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'fields', 'sent_to', 'stage'];

    protected $casts = ['fields' => 'array'];

    public function templates(): HasMany
    {
        return $this->hasMany(EmailTemplate::class, 'category_id', 'id')->where('team_id', auth()->user()->current_team_id)->orWhereNull('team_id');
    }
}
