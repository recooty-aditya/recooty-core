<?php

namespace Recooty\Enums\ScreeningQuestionTemplate;

use Recooty\Traits\EnumToArray;

enum DataType: string {

    use EnumToArray;

    case TEXT = 'Text';
    case FILE = 'File';
}
