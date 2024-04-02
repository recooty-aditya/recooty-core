<?php

namespace Recooty\Core\Enums\JobPost;

use Recooty\Core\Traits\EnumToArray;

enum Experience_Required: string {

    use EnumToArray;

    case INTERNSHIP = 'Internship';
    case ENTRY_LEVEL = 'Entry Level';
    case ASSOCIATE = 'Associate';
    case MID_SENIOR = 'Mid-Senior Level';
    case VICE_PRESIDENT = 'Director/ Vice-President';
    case PRESIDENT = 'Executive/ President';
}