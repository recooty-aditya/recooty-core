<?php

namespace Recooty\Core\Enums\JobPost;

use Recooty\Core\Traits\EnumToArray;

enum Location_Type: string {

    use EnumToArray;

    case ON_SITE = 'On-site';
    case HYBRID = 'Hybrid';
    case REMOTE = 'Remote';
}
