<?php

namespace Recooty\Core\Enums\JobWidget;

use Recooty\Core\Traits\EnumToArray;

enum WidgetType: string 
{
    use EnumToArray;
    case BLOCK = 'Block';
    case LIST = 'List';
}
