<?php

namespace Recooty\Core\Enums\ScreeningQuestionTemplate;

use Recooty\Core\Traits\EnumToArray;

enum FieldType: string {

    use EnumToArray;
    
    case TEXT = 'Text Field';
    case TEXT_AREA = 'Paragraph';
    case DROP_DOWN = 'Drop Down';
    case CHECK_BOX = 'Check Box';
    case RADIO = 'Radio Button';
    case FILE = 'File Upload';
    case NUMBER = 'Number Field';
    case DATE = 'Date';
    case TOGGLE ='Yes/No Option';
}
