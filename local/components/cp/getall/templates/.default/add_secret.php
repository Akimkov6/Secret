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
    <br>
	<h1>Секреты</h1>
	<br><br>
    <div class="inthis">
        <div id="addSecret">
            <form action="#" method="post">
                <label> <h2>Название</h2> 
                <input type="text" name="name">
                </label>
                <br>
                <label><h2>Текст</h2> 
                <textarea rows="10" cols="45"></textarea>
                </label>
            </form>
        </div>

        <br>
        <button  type="button" id="buttonAdd" onclick="myFunctionAdd()">Добавить</button>

    </div>
</body>
</html>