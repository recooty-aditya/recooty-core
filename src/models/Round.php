<?php

namespace App\Models;

use App\Models\Pipeline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Round extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["team_id", "user_id", "name", "stage", "sequence", "pipeline_id", "created_by", "updated_by", "score_card_template_id"];

    public function pipeline()
    {
        return $this->belongsTo(Pipeline::class);
    }
}
