<?php

namespace Recooty\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmailTemplate extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = ["name","subject","body","user_id","team_id","is_default","category_id","last_updated_by"];
}
