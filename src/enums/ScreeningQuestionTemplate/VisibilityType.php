<?php

namespace Recooty\Enums\ScreeningQuestionTemplate;

use Recooty\Traits\EnumToArray;

enum VisibilityType: string {

    use EnumToArray;

    case RECRUITER = 'Recruiter';
    case CANDIDATE = 'Candidate';
    case BOTH = 'Both';
}
