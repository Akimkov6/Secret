<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?/*$APPLICATION->IncludeComponent(
    "cp:detailinfo",
    ".default",
    Array(
        "params" => ['id'=>$_GET['element']],

    ),
    $component

);*/

$APPLICATION->IncludeComponent(
    "cp:simple",
    "detail",
    Array(
        "params" => ['id'=>$_GET['element']],
        "service" => '\App\Query\GetSecretDetail'

    ),
    $component

);

?>

