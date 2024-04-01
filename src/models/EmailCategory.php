<?php

namespace Recooty\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'fields', 'sent_to'];

    protected $casts = ['fields' => 'array'];

    public function templates(): HasMany
    {
        return $this->hasMany(EmailTemplate::class, 'category_id', 'id');
    }
}
