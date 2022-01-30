<?php
        require_once "include/init.php";
        require_once "include/header.php";
        require_once "models/user.php";
        // require_once "include/nav.php";





?>

<?php

$conn = new Database();

$sql= "SELECT * FROM skills";

$re = mysqli_query($conn->conn, $sql);


?>


<?php




$user = User::find_by_id($_GET['id']);


if(isset($_POST['update'])){

        if($user){

        
                $user->about_me=$_POST['about_me'];
                $user->phone_number=$_POST['phone_number'];
                $user->birth_date= $_POST['birth_date'];
                $user->email=$_POST['email'];
                $user->linkedin=$_POST['linkedin'];
                $user->github=$_POST['github'];
                $user->type_user=$_POST['type_user'];
                // $user->status=$_POST['status'];
                $user->skills =$_POST['skills'];
                // $user->start_upload($_FILES['image']);
                // $user->startt_upload($_FILES['background_img']);
                // echo "ruba";
        
        $user->update();
        
        header("location:profile.php");

                        }
        

                }



?>





<?php include "include/footer.php"; ?>