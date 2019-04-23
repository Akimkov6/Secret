
<div id="accept" class="accept">
    Уверены, что хотите удалить запись? <br><br>
    <button  type="button"  onclick='
                               ajax({
                                   url:"get_ajax.php",
                                   statbox:"status",
                                   method:"POST",
                                   data:
                                   {
                                  first_area:document.getElementById("area_1").value,

                                  },
                                   success:function(data){document.getElementById("status").innerHTML=data;}
                                     })'



">Удалить</button>
    <button  type="button"  onclick="removeCancel()">Отмена</button>
</div>


<div class="inthis">
    <div id="mySecret" class="block">
        <h1>Описание секрета</h1>

        <div class="name1">
            <?=$arResult["secret"]['name']?>
        </div>
        <div class="autor">
            <?=$arResult["user"]?>
        </div>

        <div class="detail1">
            <?=$arResult["secret"]['text']?>
        </div>
        <a class="buttonBack" href="<?=$arResult['url']?>" >Назад</a>
        <button  type="button" >Редактировать</button>
        <button  type="button" onclick="acceptRemove()" >Удалить</button>

    </div>



