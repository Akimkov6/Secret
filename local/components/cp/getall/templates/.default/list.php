<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<!DOCTYPE HTML>
<html>
 <head>
	<meta charset="utf-8">
	<title>Secret</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<div class="auth">

</div>
<br>
<h1>Секреты</h1>
<br><br>
<div class="inthis">
<?
    // компонент списка моих секретов
    $APPLICATION->IncludeComponent(
        "cp:getmysecrets",
        ".default",
        Array(
            "service" => "\App\Query\GetAllMySecrets",
            "params" => []
        ),
        false
        );

    // компонент списка доступных мне секретов
    $APPLICATION->IncludeComponent(
        "cp:getavailablesecrets",
        ".default",
        Array(
            "service" => "\App\Query\GetAllAvailableSecrets",
            "params" => []
        ),
        false
        );
?>
    <br>         
    <button  type="button" id="buttonOk" onclick="myFunctionAdd()">Добавить секрет</button>
    </div>
	</body>
</html>