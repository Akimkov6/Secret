<?php

namespace Areal;

/**
 * Класс ответов
 */
class Util
{
    public static function camelCaseToUpperSnakeCase($data)
    {
        $result = [];
        $arrData = str_split($data);
        foreach ($arrData as $char) {
            if (ctype_upper($char)) {
                $result[] = '_';
                $result[] = $char;
            } else {
                $result[] = strtoupper($char);
            }
        }
        return implode($result);
    }

    public static function getPropsFileByPath($path)
    {
        $dotNum = strstr($path, '.') ? strrpos($path, '.') : strlen($path);
        $slashNum = strstr($path, '/') ? strrpos($path, '/') : -1;
        return [
            'extension' => substr($path, $dotNum + 1, strlen($path)),
            'filename' => substr($path, $slashNum + 1, $dotNum - $slashNum - 1)
        ];
    }
}
