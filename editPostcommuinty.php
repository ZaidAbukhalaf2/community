<?php
require_once "include/init.php";
require_once "include/header.php";
require_once "models/user.php";
require_once "include/nav.php";
require_once "models/post.php";
require_once "models/comment.php";
require_once "models/commuinty.php";
require_once "models/like.php";


?>


<?php
if ( isset($_POST['submit3']) && isset($_POST['body3'])) {

    $post2=Post::find_by_id($_POST['post_id3']);
    $post2->body=$_POST['body3'];
    
    $post2->start_upload($_FILES['uplode']);
    
    $post2->add_date = date("Y-m-d H:i:s");
    $post2->update();
    header("Location:CommuintyIndex.php");


}
?>

<?php

$userid=$_SESSION['user_id'];

?>

<div class="wrapper">
<div class="container home-container ">
  <div class="row">
  
    <!---------------------------------------person card------------------------------------------------>
    <div class="col-3 person-col-2 ">
      <div></div>
    </div>
    <!------------------------------------post card----------------------------------------------------->
    <div class="col-6 ">

         <div class="post-col-2"> 
          <?php

          if(isset($_GET['id'])){
            $row=Post::find_by_id($_GET['id']);

              echo " 
              <form method='POST' enctype='multipart/form-data'>
              <input name='post_id3' type='hidden' value='$row->id'>
              <div class='card-text'><textarea class='form-control' id='floatingTextarea' name='body3' rows='3' cols='40'>$row->body</textarea></div>
              <div class='card-text'><small class='text-muted'>$row->add_date</small></div>
              <div>";
                echo " 
              <label for='image_uploads' class='custom-file-upload' >
              <i class='fas fa-images'></i>          
              </label>
              <input type='file' id='image_uploads' name='uplode'  multiple>
              </div>";
            
              echo " 
              <div class='text-end'>
              <button type='submit' name='submit3' class='btn btn-orange'>Edit</button>
              </div>
              </form>
              ";
          }
        ?>
         </div>
    </div>      
    <!------------------------------------online users-------------------------------------------------->
    <div class="col-3 col-sm-0 online-col home-container">
      <div></div>
    </div>
</div>
</div>
</div>



      
    


<!-- does not resend comment on refresh -->
<script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
  </script>



<?php include "include/footer.php"; ?>
