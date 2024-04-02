<?php

namespace Recooty\Core\Enums\JobPost;

use Recooty\Core\Traits\EnumToArray;

enum Job_Board_Status: string {

    use EnumToArray;

    case PENDING_APPROVAL = 'Pending Approval';
    case APPROVED = 'Approved';
    case REJECTED = 'Rejected';
    case NOT_APPLIED = 'Not Applied';
}