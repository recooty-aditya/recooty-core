<?php

namespace Recooty\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConnectedCalendar extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','refresh_token','name','email','provider','calendar_id','timezone','title','is_primary'];
}
