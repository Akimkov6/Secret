<?php

namespace App\Query;

use App\Query\GetSecret;
use App\Query\GetUserNameById;

class GetSecretDetail implements \Areal\Query\QueryInterface
{
    public function get(array $params = [])
    {
        $secretService = new GetSecret();
        $result['secret'] = $secretService->get($params);
        $userService = new GetUserNameById();
        $result['user'] = $userService->get(['id' => \CUser::GetID()]);
        return $result;
    }
}
