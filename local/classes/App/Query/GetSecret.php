<?php

namespace App\Query;

use App\Model\Secrets;

class GetSecret implements \Areal\Query\QueryInterface
{
    public function get(array $params = [])
    {
        $secretsModel = new Secrets();
        $secrets = $secretsModel->getRow($params);
        return $secrets;
    }
}
