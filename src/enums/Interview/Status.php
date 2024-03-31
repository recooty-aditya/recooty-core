<?php

namespace Recooty\Enums\Interview;

use Recooty\Traits\EnumToArray;

enum Status: string {

    use EnumToArray;

    case SCHEDULED = 'Scheduled';
    case ACCEPTED = 'Accepted';
    case DECLINED = 'Declined';
    case COMPLETED = 'Completed';
}
