<?php

include "include/init.php";
include "include/header.php";
include "models/user.php";
include "include/nav.php";
include "models/post.php";
include "models/comment.php";
include "models/commuinty.php"


?>




<?php
if ( isset($_POST['submit4']) && isset($_POST['body4'])) {

    $comm2=Comment::find_by_id($_GET['id2']);
    $comm2->body=$_POST['body4'];
    $comm2->add_date= date("Y-m-d H:i:s");
    $comm2->update();
    header("Location: CommuintyIndex.php");


}
?>

<?php
$commid=$_GET['id2'];
$comment=Comment::find_by_id($commid);
$commPost=Post::find_by_id($comment->post_id);
$userid=1;

?>



<div class="wrapper">
<div class="container home-container ">
  <div class="row">
    <div class="col-3 person-col-2 ">
     <div></div>
    </div>
    <div class="col-6 ">
      <div class="post-col-2">
        <div class="show " id="<?=$commPost->id?>">
          <!-------------Information of the user who added the comment & the comment-------------------->
          <div> 
            <?php
            
              if($comment->post_id === $commPost->id){
            ?>
            <div class="card mb-3 comment-card " style="max-width: 600px;">
              <div class="row g-0">                            
                  <?php
                    if ($comment->user_id == $userid){
                  echo "<div class='col-2 edit-delete-div row edit-delete-div-comment text-end'>
                        <div class='edit-delete  '>
                        <a href='deleteComment.php?id= $comment->id '><i class='fas fa-trash-alt'></i></a>
                        </div>
                        </div>";}}
                 ?>
                 
                  <!--------------------------------------------------------------------->
                  <?php
                  if(isset($_GET['id2']) && $_GET['id2']==$comment->id){
                   echo "<form method='POST'enctype='multipart/form-data' >
                   <div class='body-comment> 
                   <input name='id2' type='hidden' value='$comment->id'>
                   <div class='card-text' ' ><textarea class='form-control' id='floatingTextarea' name='body4' rows='2' cols='30'>$comment->body</textarea></div>
                   <p class='card-text'><small class='text-muted comment-type'>$comment->add_date</small></p>
                   ";
                   echo " 
                   <div class='text-end '>
                     <button type='submit' name='submit4' class='btn btn-orange edit-button'>Edit</button>
                     </div>
                     </form>
                       ";
                  }else{
                    
                  ?>
                 <div class="body-comment">
                  <div><?=$comment->body?></div>
                  <p class="card-text"><small class="text-muted comment-type"><?=$comment->add_date?></small></p>
                 </div>
                 <?php 
                 }
                 ?>
              </div>
            </div>         
          </div>
        </div>      
      </div>
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
