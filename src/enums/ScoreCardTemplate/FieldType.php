<?php

namespace Recooty\Core\Enums\ScoreCardTemplate;

use Recooty\Traits\EnumToArray;

enum FieldType: string {

    use EnumToArray;

    case TEXT = 'Text';
    case TEXT_AREA = 'Text Area';
    case DROP_DOWN = 'Drop Down';
    case CHECK_BOX = 'Check Box';
    case RADIO = 'Radio Button';
    case NUMBER = 'Number';
    case STAR = 'Star';
    case TOGGLE = 'Toggle';
}
