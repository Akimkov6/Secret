<?php

namespace Areal\Query;

use Areal\Query\QueryInterface;
use Areal\Util;
use Bitrix\Main\Type\DateTime;

class GetBxFileInfo implements QueryInterface
{
    public function get(array $params = [])
    {
        if (!$params['bxFileId']) {
            return [];
        }

        $bxFileArr = \CFile::GetFileArray($params['bxFileId']);
        $path_parts = Util::getPropsFileByPath($bxFileArr['ORIGINAL_NAME']);
        return [
            'bxFileId' => $params['bxFileId'],
            'name' => $path_parts['filename'],
            'date' => (new DateTime($bxFileArr['TIMESTAMP_X']))->format('d.m.Y'),
            'path' => $bxFileArr['SRC'],
            'fileName' => $bxFileArr['ORIGINAL_NAME'],
            'type' => $path_parts['extension']
        ];
    }
}
