<?php

namespace Recooty\Enums\JobPost;

use Recooty\Traits\EnumToArray;

enum Status: string {

    use EnumToArray;

    case DRAFT = 'Draft';
    case OPEN = 'Open';
    case INTERNAL = 'Internal';
    case CLOSED = 'Closed';
}
