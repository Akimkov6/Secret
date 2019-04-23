<?php

namespace App\Query;

class GetCurrentUserId implements \Areal\Query\QueryInterface
{
    public function get(array $params = [])
    {
        global $USER;
        $result = $USER->GetID();
        return $result;
    }
}