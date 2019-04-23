<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Секретики");
?>


<?$APPLICATION->IncludeComponent(
	"cp:getall",
	".default",
	Array(
		"params" => []
	),
$component
);

?>




<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");?>