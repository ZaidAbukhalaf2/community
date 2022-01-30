<?php
require_once "models/user.php";
include "include/init.php";
include "include/header.php";
include "include/nav.php";
include "models/post.php";
include "models/comment.php";
include "models/commuinty.php";
include "models/like.php";


?>
<?php 

if(!$session->is_signed_in()){ redirect("login.php");}

?>
<?php
$userid=$_SESSION['user_id'];
$user=User::find_by_id($userid);
$usercommunity=$user->commuinty_id;
if ( isset($_POST['submit']) && isset($_POST['body'])) {

$post1=new Post();


  $post1->body=$_POST['body'];
  $post1->add_date= date("Y-m-d H:i:s");
  // $post1->media=$_POST['image_uploads'];
  // $post1->media=$_POST['video_uploads'];
  $post1->privacy=$_POST['private'];
  $post1->user_id=$_SESSION['user_id'];
  $post1->commuinty_id=$usercommunity;
  $post1->start_upload($_FILES['uplode']);
  $post1->create();


}
?>

<?php

if ( isset($_POST['submit2']) && isset($_POST['body2'])) 
  {
        $comm=new Comment();  

    $comm->body=$_POST['body2'];
    $comm->add_date= date("Y-m-d H:i:s");
    $comm->user_id=$_SESSION['user_id'];
    $comm->post_id=$_POST['post_id'];
    $comm->create();
  }
  
?>

<?php
 
if($_SERVER['REQUEST_METHOD'] =="POST"){

  $like=new Like();
  
  $like->post_id;
  $like->like_action;
  $user_id=$_SESSION['user_id'];
  if (isset($_POST['action'])) {
      
    $post_id = $_POST['post_id'];
    $action = $_POST['action'];
    // echo $action;
    switch ($action) {
        case 'like':
            $sql="INSERT INTO post_like (user_id, post_id, like_action) 
                VALUES ($user_id, $post_id, 'like') 
                ON DUPLICATE KEY UPDATE like_action='like'";
            break;
        
        case 'unlike':
            $sql="DELETE FROM post_like WHERE user_id=$user_id AND post_id=$post_id";
            break;
        
    }
    // execute query to effect changes in the database ...
    mysqli_query($conn, $sql);
    // var_dump($conn);die;
    echo Like::getRating( $post_id);
    exit(0);
    }
  // $action = $_POST['action'];
  // echo $action;
}
?>
<?php



$mess='';
if(((int)date('H'))<12){
  $mess="Good Morning";
}else{
  $mess="Good Evening";

}
?>

<div class="wrapper">
<div class="container home-container ">
  <div class="row ">
    <!---------------------------------------person card------------------------------------------------>
    <div class="col">
      <div>
      <div class=" person-card mb-3 card-person col-per-2" >
      <img class="admin-user-thumbnali image person-card-img"  src="<?php echo $amin->image_path_placeholder();?>" >
        <div class="card-body ">
        <a href="profile.php" class="aprofile"><h5 class="card-title"><?php echo $amin->username;?></h5></a>
          <p class="card-text"><?php echo $amin->comm();?></p>
         
          
        </div>
      </div>
    </div>
    </div>
    <!------------------------------------post card----------------------------------------------------->
    <div class="col-6 col-sm-12 post-col">
      <!------------------------------------add post---------------------------------------------------->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title comm-name"><?php echo $mess.' '.$amin->username;?></h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <div class=" text-end"> 
            <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Write a Post</button>  
          </div>
        </div>
      </div>
      <br> 
      <?php
             //Filter posts by search result (by user) 85->114
             $result=false;
             // Enter a value through which we filter the values in the table
             if (isset($_GET['search'])) {
               $valueToSearch = $_GET['valueToSearch'];
               $result6=User::find_all();
               $User_id=false;
               foreach($result6 as $row){
                 if($row->username == $valueToSearch){
                   $User_id=$row->id;
                 }
               }
               if(!is_numeric($User_id)){
                 echo "<h5> This user doesn't exist! </h5>";
               }else{
               $result=Post::find_all_DESC_by_user($User_id);}
             } 
             //Get all values if no value is entered for the filter
             else {
               if($result==false){
               $result=Post::find_all_DESC(); }
             }
             if($result==false){
               $result=Post::find_all_DESC(); }
             
             foreach($result as $row){
              if($row->privacy ==='private' && $row->commuinty_id == $usercommunity  ){
             // $dropId="".$row->id."id";
           ?>
      <div class="card post">
        <div class="card-body">
          <div class="row g-0">
            <div class="col-2 imgw">
            <img src="<?php echo $row->userimg();?>" class="img-fluid user_img" alt="...">
            </div>
            <div class="col-8 left-contect ">
              <div class="card-body left-contect">
              <a href="profile_user1.php?id=<?=$row->user_id?>" class="card-title card-herf aprofile"><?=$row->username()?></a>
                <p class="card-text user-type comm-name"><?=$row->comm()?></p>
                <p class="card-text date-post"><small class="text-muted"><?=$row->add_date?></small></p>

              </div>
            </div>
            <?php
          
          if ($row->user_id == $userid){
             echo "<div class='col-2 edit-delete-div '>
                  <div class='edit-delete '>
                  <a href='deletePostcommuinty.php?id= $row->id' class='link-color'><i class='fas fa-trash-restore-alt'></i></i</a>
                  <a href='editPostcommuinty.php?id=$row->id' class='link-color'><i class='fas fa-pen'></i></a>
                  </div>
                  
                  
                  
                  </div>";}
              ?>
          </div>
          <p class="card-text text4"><?=$row->body?></p>
        </div>
        <?php
        if($row->media!=null){
          if($row->type()=="mp4"){
        ?>
          <video controls>
          <source src="<?=$row->image_path_placeholder();?>" type="video/mp4">
          </video>
        <?php
        }
        else{
          ?>
        <img src="<?=$row->image_path_placeholder();?>" class="card-img-bottom" alt="...">

        <?php
        }}
        ?>
        <div class="like-cont">
          <p class="p-likes"><i class="far fa-thumbs-up"></i>
          <span class="likes"><?php echo Like:: getLikes($row->id); ?></span>

        </p> 
          <?php
              $C=0; 
              $resulta=Comment::find_all();
              foreach($resulta as $rowa){
              if($rowa->post_id == $row->id){
                $C++;
              }
            }
          ?>
          <p class="p-comment"><i class="far fa-comment-dots "></i><?=$C;?></p>
        </div>
        <!--------------------------------------post like & comment-------------------------------------->
        <div class="btn-group">
        <button  class="btn like_button icon-style" >
        <i <?php if (Like::userLiked($row->id)): 
          // if($_SESSION['user_id']=)
          ?>
                class="fa fa-thumbs-up like-btn "
            <?php else: ?>
                class="fa fa-thumbs-o-up like-btn "
            <?php endif ?>
            data-id="<?php echo $row->id ?>"></i>
        </button>
        
          <a type="button" class="btn like_button icon-style" onclick="showComment(<?=$row->id?>)"  >
           <i class="far fa-comment-dots"></i>
            comment 
          </a>
        </div>
        <!---------------------------------------------------------------------------------------------->
        <div class="hide" id="<?=$row->id?>">
        <form method="post" autocomplete="off">
          <div class="input-group mb-3">
            <input name="post_id" type="hidden" value="<?=$row->id?>">
            <input type="text" class="form-control" placeholder="add a comment" aria-label="Recipient's username" aria-describedby="button-addon2" name="body2" >
              <button class="btn btn-outline-secondary"  type="submit" id="button-addon2" name="submit2" > 
              <i class="far fa-comment-dots"></i>
              </button>
          </div>
          </form>
          <!-------------------------------------------------------------------------------------------->
          <!-------------Information of the user who added the comment & the comment-------------------->
          <div> 
          <?php
            $result=Comment::find_all_DESC();
            foreach($result as $row2){
              if($row2->post_id === $row->id){
            ?>
              <div class="card mb-3 comment-card " style="max-width: 600px;">
              <div class="row g-0">
                <div class="col-2">
                  <img src="<?php echo $amin->image_path_placeholder();?>" class="img-fluid rounded-start comment-user " alt="...">
                </div>
                <div class="col-8 title-col">
                  <div class="card-body">
                  <h6 class="card-title comment-title first-name" ><?="@".$row2->name()?></h6>
                    <p class="card-text fw-lighter comment-type comm-name"><?=$row->comm()?></p>
                  </div>
                </div>
                  
                <?php
                    if ($row2->user_id == $userid){
                  echo "<div class='col-2 edit-delete-div  '>
                        <div class='edit-delete '>
                        <a href='deleteCommentcommuinty.php?id= $row2->id ' class='link-color'><i class='fas fa-trash-restore-alt'></i></a>
                        <a href='editCommentCommunity.php?id2=$row2->id' class='link-color'><i class='fas fa-pen'></i></a>
                        </div>
                        
                        
                        
                        </div>";}
                 ?>
                 
                  <!--------------------------------------------------------------------->
                 <div class="body-comment">
                  <div><?=$row2->body?></div>
                  <p class="card-text"><small class="text-muted comment-type"><?=$row2->add_date?></small></p>
                 </div>
              
              </div>
            </div>
            <?php
              }}
            ?>
          </div>
          <!------------------------------here we add new comment -------------------------------------->
          <!-- <a href="#" class="link-dark comment-link">show more</a>  -->
        </div>
      </div>
      <br>
      <?php 
             } }
      
      ?>
    </div>
    <!------------------------------------online users-------------------------------------------------->
    <div class="col col-sm-0 online-col home-container">
      <div style="position: fixed;">
      <div class="row online-scroll"  >
   
      <?php
         $result8=User::find_all_DESC();
         foreach($result8 as $row8){
           if($row8->status === 'online'){
      
      ?>
      <div class="card mb-3" style="max-width: 275px;  ">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="<?php echo $row8->user_online();?>"   class="img-fluid  online-card-img"  alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h6 class="card-title"><?=$row8->first_name.' '.$row8->last_name?></h6>
              <p class="card-text user-type"><?php echo $row8->comm();?></p>
            </div>
          </div>
        </div>
      </div>
      <?php
           }}
      ?>
      </div>
      <div class="row">
        <div class="card bg-dark text-white card4"style="width: 275px;">
          <img src="image/job.png" class="card-img" alt="..." height="200px" width="200px">
          <center>
            <div class="card-img-overlay">
         <a href="JobPage.php" class="link-color"> <h5 class="card-title">Job</h5></a>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </center>
        </div>
      </div>
      </div>
  <!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
  </div>
</div>
</div>

<!----------------------------------------------- Modal ------------------------------------------------>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <form method="POST" enctype="multipart/form-data">
        <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create a post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body">
              <!---------------------------------------------------------------------------------------------->
              <div class="row g-0">
              <textarea class="form-control text1" placeholder="What do you want to talk about?" id="floatingTextarea" name="body"></textarea>
                  <div class="card-body">
                      <div class="col-lg-12 col-md-12 text-grid">
                     
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                          <div class="col-6">
                          <p class="card-text user-type">
                          <select class="form-select" aria-label="Default select example" name="private">
                            <option selected value="private"> private</option>
                            <option value="public">public</option>
                          </select>
                          </p>
                          </div>
                              <div class="col-4">
                              <label for="image_uploads" class="custom-file-upload">
                            <i class="fas fa-images"></i>          
                          </label>
                          <input type="file" id="image_uploads" name="uplode"  multiple>
                              </div>
                        </div>
                    </div>
                  
                  </div>
              </div>
              
              </div>
              <!-----------------------------------------add img--------------------------------------------->
          
              <!---------------------------------------------------------------------------------------------->
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-orange" >Post</button>
            </div>
        

        </div>
      </form>
  </div>
</div>
<!--------------------------------------end Modal------------------------------------------------------->
<script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
  </script>
  
<?php include "include/footer.php"; ?>