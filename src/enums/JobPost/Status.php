<?php

namespace Recooty\Core\Enums\JobPost;

use Recooty\Core\Traits\EnumToArray;

enum Status: string {

    use EnumToArray;

    case DRAFT = 'Draft';
    case OPEN = 'Open';
    case INTERNAL = 'Internal';
    case CLOSED = 'Closed';
}
