<?php

namespace Recooty\Traits;

trait EnumToArray
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        $names = self::names();
        $values = self::values();

        return array_map(function ($name, $status) {
            return ['name' => $name, 'status' => $status];
        }, $values, $names);
    }

    public static function key_array(): array
    {

        return array_combine(self::names(), self::values());
    }

    public static function toCSV($value = false): string
    {
        return implode(',', array_column(self::cases(), $value ? 'value' : 'name'));
    }

    public static function array_value(): array
    {
        $names = self::names();
        $values = self::values();

        $result = array_map(function ($name, $status) {
            return [$status => trans($name)];
        }, $values, $names);

        return array_merge(...$result);
    }
}
