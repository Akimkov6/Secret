<?php

namespace App\Query;

use App\Query\GetSecretsForList;
use App\Query\GetCurrentUserId;

class GetAllMySecrets implements \Areal\Query\QueryInterface
{
    public function get(array $params = [])
    {
        $query = new GetSecretsForList();
        $secrets = $query->get([
            'filter' => [
                'athtor' => (new GetCurrentUserId())->get()
            ]
        ]); 
        return $secrets;
    }
}
