<?php

namespace Areal\Controller;

use App\Command\SaveFileFromNewApplication;
use \Areal\Command\SaveFiles;
use \Areal\Controller\CommandTrait;
use \Areal\Controller\Base;

class SaveFile extends Base
{
    use CommandTrait;

    public function save()
    {
        return $this->command(new SaveFileFromNewApplication(), $_FILES);
    }
}
