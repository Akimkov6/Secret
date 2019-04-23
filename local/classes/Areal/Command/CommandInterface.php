<?php

namespace Areal\Command;

interface CommandInterface
{
    public function execute(array $params = []);
}
