<?php
include "include/init.php";

include "../models/commuinty.php";

?>

<?php

if(empty($_GET['id'])){

    echo "done";

    
}

$commuinty = Commuinty::find_by_id(($_GET['id']));

if($commuinty){

    $commuinty->delete();

    echo"done";
    header("Location:manage_commuinty.php");

    }else{

            echo "error";
        }

?>