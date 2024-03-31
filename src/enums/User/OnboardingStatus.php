<?php

namespace Recooty\Enums\User;

use Recooty\Traits\EnumToArray;

enum OnboardingStatus: string {

    use EnumToArray;

    case AWAITING_PASSWORD_SETUP = 'Awaiting Password Setup';
    case AWAITING_COMPANY_INFO = 'Awaiting Company Info';
    case AWAITING_BUSINESS_DETAIL = 'Awaiting Business Detail';
    case COMPLETED = 'Completed';
}