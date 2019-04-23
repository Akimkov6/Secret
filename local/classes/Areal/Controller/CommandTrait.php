<?php

namespace Areal\Controller;

use \Areal\Response;

trait CommandTrait
{
    protected function command($command, $params)
    {
        // $result = $command->execute($params);
        $commandCls = get_class($command);
        try {
            $result = $command->execute($params);
        } catch (\Exception $e) {
            return Response::error($e->getMessage());
        }
        return Response::success($result);
    }
}
