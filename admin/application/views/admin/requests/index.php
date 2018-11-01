<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 09.10.18
 * Time: 10:33
 */

//print_r($requests);
?>
<form method="post"  action="<?=baseurl('requests/index/')?>">
    <table>
        <tr>
            <td>
                <div>
                    <label> Строк </label>
                    <input type="text" name="linescount" value="<?=$linecount?>">
                </div>
            </td>
            <td>
                <button class="btn btn-primary">Показать</button>
            </td>
        </tr>
    </table>


</form>
<table class="table table-bordered table-striped">
    <?
    echo "<tr>";
    foreach ($headFeilds as $key =>$value){
        $feildName = $key;
        if($value != "1"){
            $feildName = $value;
        }
        echo "<th>" .$feildName  ."</th>";
    }
    echo "</tr>";
    foreach ($requests as $key=>$data){
        echo "<tr>";
        foreach ($headFeilds as $key =>$value){
            switch ($key){
                case "dopFileURL":
                    echo "<td><a href=\"".$data[$key]."\" target='_blank'>ДопСоглашение</a></td>";
                    break;
                case "ipFileURL":
                    echo "<td><a href=\"".$data[$key]."\" target='_blank'>ИП-Р21001</a></td>";
                    break;
                case "nalogFileURL":
                    echo "<td><a href=\"".$data[$key]."\" target='_blank'>Уплата госпошлины</a></td>";
                    break;
                case "uprFileURL":
                    echo "<td><a href=\"".$data[$key]."\" target='_blank'>Форма для перехода на упрощенную систему налогообложения</a></td>";
                    break;
                default:
                    echo "<td>" .$data[$key] ."</td>";
            }

        }
        echo "</tr>";
    }
    ?>

</table>
