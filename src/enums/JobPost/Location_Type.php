<?php

namespace Recooty\Enums\JobPost;

use Recooty\Traits\EnumToArray;

enum Location_Type: string {

    use EnumToArray;

    case ON_SITE = 'On-site';
    case HYBRID = 'Hybrid';
    case REMOTE = 'Remote';
}
