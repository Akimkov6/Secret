<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$class = $arParams["service"];
$secret=new $class;
$arResult = $secret->get($arParams['params']);
$_SERVER['REQUEST_URI']=parse_url($_SERVER['REQUEST_URI']);
$arResult['url'] = $_SERVER['REQUEST_URI']['path'];



$this->IncludeComponentTemplate();





