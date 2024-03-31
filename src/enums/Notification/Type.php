<?php

namespace Recooty\Enums\Notification;

use Recooty\Traits\EnumToArray;

enum Type: string 
{
    use EnumToArray;

    case DAILY_SUMMARY = 'Receive daily summary of new applications.';
    case NEW_CANDIDATE_APPLY = ' When a new candidate applies.';
    case ASSIGNED_AS_INTERVIEWER = 'When I am assigned as an interviewer.';
    case INTERVIEW_REMINDER = 'Interview reminder on the day of interview.';
}
