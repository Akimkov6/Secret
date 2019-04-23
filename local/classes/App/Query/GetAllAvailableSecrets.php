<?php

namespace App\Query;

use App\Query\GetUserNameById;
use App\Query\GetSecretsForList;

class GetAllAvailableSecrets implements \Areal\Query\QueryInterface
{
    public function get(array $params = [])
    {
        $query = new GetSecretsForList();
        $secrets = $query->get([
            'select' => ['name','id'],
            'filter' => [
                '!=athtor' => (new GetCurrentUserId())->get()
            ]
        ]); 
        return $secrets;
    }
}
