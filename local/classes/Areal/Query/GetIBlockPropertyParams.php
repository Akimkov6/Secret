<?php

namespace Areal\Query;

class GetIBlockPropertyParams implements QueryInterface
{
    public function get(array $params = [])
    {
        $result = [];

        $res = \CIBlockProperty::GetByID(
            $params['id'],
            $params['iBlockId'] ?? false,
            $params['iBlockCode'] ?? false
        );
        while ($arRes = $res->GetNext()) {
            $result['id'] = $arRes['ID'];
            $result['name'] = $arRes['NAME'];
        }
        return $result;
    }
}
