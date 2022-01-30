<?php
    require_once "include/init.php";
    require_once "include/header.php";
    require_once "models/user.php";
    // require_once "include/nav.php";

?>



<?php

$user = User::find_by_id($_GET['id']);


if(isset($_POST['update'])){

        if($user){

        
        
                $user->start_upload($_FILES['image']);
        
        $user->update();
        header("Location:profile.php");
        }
    }
?>

    
 


