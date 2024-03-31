<?php

namespace Recooty\Enums\JobWidget;

use Recooty\Traits\EnumToArray;

enum WidgetType: string 
{
    use EnumToArray;
    case BLOCK = 'Block';
    case LIST = 'List';
}
