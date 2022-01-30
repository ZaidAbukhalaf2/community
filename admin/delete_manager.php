<?php
include "include/init.php";

include "../models/manager.php";

?>

<?php

if(empty($_GET['id'])){

    echo "done";

    
}

$managers = Manager::find_by_id(($_GET['id']));

if($managers){

    $managers->delete();

    echo"done";
    header("Location:manage_manager.php");
    }else{

            echo "error";
        }

?>