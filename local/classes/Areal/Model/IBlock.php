<?php

namespace Areal\Model;

use Akop\Util;

class IBlock extends \Akop\Element\Element
{
    const PREG_ALL = '/PROPERTY_([A-Z_]*)_VALUE(?:_ID)?$/';
    const PREG_VALUE = '/PROPERTY_([A-Z_]*)_VALUE$/';
    const PREG_VALUE_ID = '/PROPERTY_([A-Z_]*)_VALUE_ID$/';

    public function getList(array $params = array())
    {
        return $this->updateResult(parent::getList($params));
    }

    private function updateResult(array $items)
    {

        foreach ($items as &$item) {
            foreach ($item as $nameField => $value) {
                if (preg_match(self::PREG_VALUE, $nameField)) {
                    $newNameField = $this->getCorrectNameField($nameField);
                    $item[$newNameField] = $value;
                    unset($item[$nameField]);
                } elseif (preg_match(self::PREG_VALUE_ID, $nameField)) {
                    unset($item[$nameField]);
                }
            }
        }

        return $items;
    }

    public function getCorrectNameField($nameField)
    {
        return Util::camelize(preg_replace(self::PREG_ALL, '$1', $nameField));
    }
}
