<?php

namespace Recooty\Enums\JobPost;

use Recooty\Traits\EnumToArray;

enum Pay_Interval: string {

    use EnumToArray;

    case HOUR = 'Hourly';
    case DAY = 'Daily';
    case WEEK = 'Weekly';
    case MONTH = 'Monthly';
    case YEAR = 'Yearly';
}
