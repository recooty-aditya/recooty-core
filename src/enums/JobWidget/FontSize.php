<?php

namespace Recooty\Core\Enums\JobWidget;

use Recooty\Core\Traits\EnumToArray;

enum FontSize: string 
{
    use EnumToArray;
    case SMALL = 'sm';
    case NORMAL = 'md';
    case LARGE = 'lg';  
    
    public static function arrayObjects(): array{
        $data=[
            ['status' => FontSize::SMALL->name,'name'=>'Small', 'value'=> FontSize::SMALL->value],
            ['status' => FontSize::NORMAL->name,'name'=>'Medium', 'value'=> FontSize::NORMAL->value],
            ['status' => FontSize::LARGE->name,'name'=>'Large', 'value'=> FontSize::LARGE->value],
        ];
        return $data;
    } 
}
