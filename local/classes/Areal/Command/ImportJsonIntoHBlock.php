<?php

namespace Areal\Command;

use Areal\Controller\CommandTrait;

class ImportJsonIntoHBlock implements CommandInterface
{
    use CommandTrait;

    public function execute(array $params = [])
    {
        if (!$this->checkParams($params)) {
            return 'error params';
        }
        $arElements = $this->getElementsForImport($params['filePath']);
        foreach ($arElements as $arElement) {
            if ($params['keysNotSave']) {
                $arElement = $this->updateElemFromSave($arElement, $params['keysNotSave'], $params['prefix']);
            }
            $this->command(
                $params['command'],
                $arElement
            );
        }
        return 1;
    }

    private function checkParams(array $params)
    {
        return $params['command'] && $params['filePath'];
    }

    private function getElementsForImport($filePath)
    {
        $fileContent = file_get_contents($filePath);
//        pr($fileContent);
        return json_decode($fileContent, true);
    }

    private function updateElemFromSave($arElement, $keysNotSave, $prefix)
    {
        $id = $arElement['_id'];
        $num = $arElement['NUM'];

        foreach ($arElement as $key => $field) {
            if (!in_array($key, $keysNotSave)) {
                $newKey = $key;
                if ($prefix) {
                    $newKey = preg_replace('/^' . $prefix . '(?:_)?/', '', $key);
                }
                $newKey = 'UF_' . $newKey;
                $arElement[$newKey] = !is_array($field)
                    ? $field
                    : $this->createElementBindingArray($field);
            }
            unset($arElement[$key]);
        }
        $arElement['UF_XML_ID'] = $num ?? $id;
        return $arElement;
    }

    private function createElementBindingArray(array $field)
    {
        if (!$field['NUM'] || $field['NUM'] == 1) {
            $result = 0;
        } else {
            $result = $field['NUM'];
        }
        return $result;
    }
}
