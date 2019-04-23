<?php

namespace Areal\Controller;

use App\Query\GetLotsIBlockId;
use App\Query\GetServiceDateFromUpdateLot;
use App\Query\GetValidateStatusFromUpdateLotsElementIBlock;

class BitrixEventHandler extends Base
{
    use QueryTrait;

    public function onBeforeIBlockElementUpdateHandler(&$arFields)
    {
        if ($arFields['IBLOCK_ID'] == (new GetLotsIBlockId())->get()) {
            $validateArr = (new GetValidateStatusFromUpdateLotsElementIBlock())->get(
                $arFields
            );
            if (!$validateArr['status']) {
                global $APPLICATION;
                $APPLICATION->throwException($validateArr['message']);
                return false;
            }
            $serviceDate = (new GetServiceDateFromUpdateLot())->get($arFields['PROPERTY_VALUES']);
            $arFields['PROPERTY_VALUES'][$serviceDate['id']] = [
                array_keys($arFields['PROPERTY_VALUES'][$serviceDate['id']])[0] => [
                    'VALUE' => $serviceDate['value']
                ]
            ];
        }
    }
}
