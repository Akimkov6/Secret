<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>
<?$APPLICATION->SetAdditionalCSS("/styles.css");?>
<? $APPLICATION->ShowHead(); ?> <!-- !!!!!!!!!!!!!!!!!!!!!!!! -->
      <div id="mySecret" class="block">
          <div class="blockIn">
              <h1>Мои секреты:</h1>
          </div>
              <table id="tableMySecret">
                  <tr>
                      <th class="colomn1">ID</div></th>
                      <th class="colomn2">Заголовок</div></th>
                      <th class="colomn3">Описание</div></th>
                      <th></th>
                  </tr>

            <?
                  $t = "";
                  for ($i = 0; $i < count($arResult); ++$i) {
                        $tr = "<tr>";
                        $tr = $tr . "<td>" . $arResult[$i]['id'] . "</td>";
                        $tr = $tr . '<td><a href="?status=detail&element=' . $arResult[$i]['id'] . '">' . $arResult[$i]['name'] . "<a></td>";
                        $tr = $tr . "<td>". $arResult[$i]['text'] . "</td>";

                        $tr = $tr . "</tr>";
                        $t = $t . $tr;
                    }
                    echo "$t";

                 ?>
              </table>


     </div>

     