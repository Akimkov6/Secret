<?php

namespace Areal;

use \FastRoute\RouteCollector as RouteCollector;

interface RouterInterface
{
    public static function route(RouteCollector $r);
}
