<?php

namespace Areal\Command;

use Areal\Query\GetBxFileInfo;
use Areal\Command\CommandInterface;
use Areal\Controller\QueryTrait;

class SaveFiles implements CommandInterface
{
    use QueryTrait;

    public function execute(array $params = [])
    {
        $file = $params['file'];
        $file['bxFileId'] = \CFile::SaveFile($file, 'all');

        $result = $this->query(new GetBxFileInfo(), ['bxFileId' => $file['bxFileId']]);

        return $result;
    }

}
