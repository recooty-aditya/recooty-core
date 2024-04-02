<?php

namespace Recooty\Core\Enums\ScreeningQuestionTemplate;

use Recooty\Core\Traits\EnumToArray;

enum DataType: string {

    use EnumToArray;

    case TEXT = 'Text';
    case FILE = 'File';
}
