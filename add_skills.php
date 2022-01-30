<?php
    require_once "include/init.php";
    require_once "include/header.php";
    require_once "models/user.php";
    // require_once "include/nav.php";
    require_once "models/skills.php";

?>



<?php

$skills=new Skills();


if(isset($_POST['add'])){

        if($skills){
            $skills->skills_name =$_POST['skills_name'];
            $skills->user_id=$_SESSION['user_id'];
             $skills->create();
        header("Location:profile.php");
        }
    }
?>


    
 


