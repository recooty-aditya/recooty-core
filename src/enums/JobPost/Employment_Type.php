<?php

namespace Recooty\Enums\JobPost;

use Recooty\Traits\EnumToArray;

enum Employment_Type: string {

    use EnumToArray;
    case FULL_TIME = 'Full Time';
    case PART_TIME = 'Part Time';
    case CONTRACTOR = 'Contract';
    case INTERN = 'Internship';
    case OTHER = 'Other';
}