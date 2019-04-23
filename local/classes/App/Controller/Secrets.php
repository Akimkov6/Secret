<?php
namespace App\Controller;

use App\Query\GetSecrets;
use App\Command\AddSecret;
use App\Command\DelSecret;

class Secrets extends \Areal\Controller\Base
{
    public function index($params = [])
    {
        return (new GetSecrets)->get();
    }

    public function add($params = [])
    {
        return (new AddSecret)->execute($params);
    }

    public function del($params = [])
    {
        return (new DelSecret)->execute($params);
    }

}
