<?php

namespace Recooty\Core\Enums\ScreeningQuestionTemplate;

use Recooty\Core\Traits\EnumToArray;

enum VisibilityType: string {

    use EnumToArray;

    case RECRUITER = 'Recruiter';
    case CANDIDATE = 'Candidate';
    case BOTH = 'Both';
}
