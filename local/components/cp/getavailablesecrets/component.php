<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$class = $arParams["service"];
$secret=new $class;
$arResult = $secret->get($arParams['params']);
$this->IncludeComponentTemplate();
?>