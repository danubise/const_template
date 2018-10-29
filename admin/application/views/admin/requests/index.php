<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 09.10.18
 * Time: 10:33
 */

//print_r($requests);
?>
<table>
    <?
    foreach ($requests as $key=>$data){
        echo "<tr><td>".$data['1.1.1']."</td><td>".$data['1.1.2']."</td><td>".$data['1.1.3']."</td></tr>";
    }
    ?>

</table>
