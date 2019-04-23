<?php

namespace App\Command;

class AddSecret implements \Areal\Command\CommandInterface
{
    public function execute(array $params = [])
    {
/*         print_r($params);
        die; */
        $lots = new \App\Model\Secrets();
        return $result = $lots->add($params);
    }
}