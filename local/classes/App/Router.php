<?php

namespace App;

use FastRoute\RouteCollector as RouteCollector;

use App\Controller\Secrets;
//use Areal\Controller\SaveFile;

class Router implements \Areal\RouterInterface
{
    public static function route(RouteCollector $r)
    {
        $r->get('/getList/', function () {
            $controller = new Secrets();
            return $controller->index();
        });

        $r->post('/addSecret/', function () {
            $controller = new Secrets();
            return $controller->add($_POST);
        });

        $r->post('/delSecret/', function () {
            $controller = new Secrets();
            return $controller->del($_POST);
        });
        
    }
}
