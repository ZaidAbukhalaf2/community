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

        
        
            $user->startt_upload($_FILES['background_img']);
        
        $user->update();

        header("location:profile.php");
            
        }
    }
?>



