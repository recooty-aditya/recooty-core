<?php

namespace Recooty\Core\Enums\Interview;

use Recooty\Core\Traits\EnumToArray;

enum Status: string {

    use EnumToArray;

    case SCHEDULED = 'Scheduled';
    case ACCEPTED = 'Accepted';
    case DECLINED = 'Declined';
    case COMPLETED = 'Completed';
}
