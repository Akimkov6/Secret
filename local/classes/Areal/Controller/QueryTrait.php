<?php

namespace Areal\Controller;

use \Areal\Response;
use \Areal\Query\QueryInterface;

trait QueryTrait
{
    protected function query(QueryInterface $query, array $params = [])
    {
        try {
            $result = $query->get($params);
        } catch (\Exception $e) {
            // часть ошибок должна обрабатываться на уровне /api/v1/dispatch.php
            if (in_array($e->getCode(), [403, 404])) {
                throw $e;
            }
            return Response::error($e->getMessage());
        }

        return Response::success($result);
    }
}
