<?php
include "include/init.php";
include "../models/user.php";

?>

<?php

if(empty($_GET['id'])){

    echo "done";

    
}

$users = User::find_by_id(($_GET['id']));

if($users){

    $users->delete();

    echo"done";
    header("Location:manageuser.php");

    }else{

            echo "error";
        }

?>