<?php

namespace Areal\Query;

class GetIBlockIdWithCode implements QueryInterface
{
    public function get(array $params = [])
    {
        if (!$params['code']) {
            throw new \Exception('No exist IBlock code in params');
        }
        $filter = [
            '=CODE' => $params['code'],
            'CHECK_PERMISSIONS' => 'N'
        ];
        $item = \CIBlock::GetList(array('SORT' => 'ASC'), $filter)->Fetch();
        return $item['ID'];
    }
}
