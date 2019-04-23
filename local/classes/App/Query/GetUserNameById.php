<?php

namespace App\Query;

class GetUserNameById implements \Areal\Query\QueryInterface
{
    public function get(array $params = [])
    {

        $result = [];
        $res = \CUser::GetByID($params['id']);
        while ($arRes = $res->GetNext()) {
            $result= $arRes['NAME'] . ' ' . $arRes['LAST_NAME'];
        }
        return $result;
    }
}