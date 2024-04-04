<?php

namespace Recooty\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Recooty\Core\Enums\ScreeningQuestionTemplate\VisibilityType;

class ScreeningQuestionTemplate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'team_id',
        'name',
        'is_preset',
        'last_updated_by_user_id',
    ];

    public function created_by(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function updated_by(): ?HasOne
    {
        return $this->hasOne(User::class, 'id', 'last_updated_by_user_id');
    }

    public function fields(): HasMany
    {
        return $this->hasMany(ScreeningQuestionTemplateFields::class, 'template_id', 'id');
    }

    public function recruiter_field()
    {
        $fields = ScreeningQuestionTemplateFields::where('template_id', $this->id)->where('visibility', '!=', VisibilityType::CANDIDATE->name)->get();
        return $fields;
    }

    public function candidate_fields()
    {
        $fields = ScreeningQuestionTemplateFields::where('template_id', $this->id)->where('visibility', '!=', VisibilityType::RECRUITER->name)->get();
        return $fields;
    }

    public function default_fields()
    {
        $default_fields = config('constant.screening_question_template_default_fields');
        return $default_fields;
    }

}
