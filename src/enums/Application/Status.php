<?php

namespace Recooty\Enums\Application;

use Recooty\Traits\EnumToArray;

enum Status: string {
    
    use EnumToArray;

    case NEW = 'New';
    case SHORTLISTED = 'Shortlisted';
    case INTERVIEW = 'Interview';
    case OFFERED = 'Offered';
    case HIRED = 'Hired';
    case REJECT = 'Reject';
    case TALENT_POOL = 'Talent Pool';
}