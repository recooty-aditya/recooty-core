<?php

namespace Recooty\Core\Enums\JobPost;

use Recooty\Core\Traits\EnumToArray;

enum Pay_Interval: string {

    use EnumToArray;

    case HOUR = 'Hourly';
    case DAY = 'Daily';
    case WEEK = 'Weekly';
    case MONTH = 'Monthly';
    case YEAR = 'Yearly';
}
