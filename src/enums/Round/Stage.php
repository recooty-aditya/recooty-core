<?php

namespace Recooty\Core\Enums\Round;

use Recooty\Core\Traits\EnumToArray;

enum Stage: string {

    use EnumToArray;

    case NEW = 'New';
    case SHORTLISTED = 'Shortlisted';
    case INTERVIEW = 'Interview';
    case OFFERED = 'Offered';
    case HIRED = 'Hired';
    case REJECT = 'Rejected';
}