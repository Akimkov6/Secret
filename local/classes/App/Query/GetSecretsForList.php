<?php

namespace App\Query;

use App\Query\GetUserNameById;
use App\Query\GetSecrets;

class GetSecretsForList implements \Areal\Query\QueryInterface
{
    public function get(array $params = [])
    {
        $secretsModel = new GetSecrets();
        $params['select'] = ['name','id'];
        $secrets = $secretsModel->get($params);
/*         $secrets = $query->get([
            'select' => ['name','id'],
            'filter' => $params['filter'] */

        foreach ($secrets as &$secret) {
            $secret['userName'] = (new GetUserNameById)->get(['id' => $secret['athtor']]);
        }

        return $secrets;
    }
}
