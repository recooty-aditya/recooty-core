<?php

namespace Recooty\Models;

use App\Enums\Notification\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'team_id',
        'notification_type',
        'email',
        'slack',
        'sms',
        'whatsapp',
        'web',
        'system',
    ];
}
