<?php   
    require_once "models/user.php";
    include "include/init.php";
    include "include/header.php";
    include "include/nav.php";
    include "models/post.php";
    include "models/comment.php";
    include "models/commuinty.php";
    include "models/skills.php";
    include "models/like.php";

    
?>
<?php if(!$session->is_signed_in()){redirect("login.php");}?>


<?php
if(isset($_GET['id'])){
  $userid=$_GET['id'];
  if($userid==$_SESSION['user_id']){
    header('Location:profile.php');
  }else{
    $user=User::find_by_id($userid);
    $usercommunity=$user->commuinty_id;
  }


}



    
    
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


$mess='';
if(((int)date('H'))<12){
  $mess="Good Morning";
}else{
  $mess="Good Evening";

}

?>
<?php
?>

<div class="wrapper">
    <div class="main-container">
        <div class="box-profile-information">

            
            <div class="image-back mb-2">
                
            <img src="<?php echo $user->images_path_placeholder();?> "> 
            

            </div>

            <div class="contant row px-lg-5">
                <div class="col-lg-2 col-md-3 col-sm-12">
                    <div class="profile-image">
                        <img src="<?=$user->image_path_placeholder()?>" >
                        
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-12 box-information-responce">
                    <strong class="name-user"><?php echo $user->username;?></strong>
                    <span class="status"><i class="fas fa-check-circle"></i></span>
                    

                    <div class="row mt-4 mb-3">
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="row general-information">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-2"><i class="far fa-calendar"></i> <strong><?php echo $user->birth_date;?></strong></div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-2"><i class="fas fa-user"></i> <strong><?php echo $user->type_user;?></strong></div>
                                <div class="col-12 mb-2"><i class="fab fa-linkedin-in"></i>  <?php echo $user->linkedin;?></div>
                                <div class="col-12 mb-2"><i class="fab fa-github"></i> <?php echo $user->github;?></div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 sochal-media">
                            <a href="#" class="px-3"><i class="fas fa-phone-alt"></i> <?php echo $user->phone_number;?>  </a>
                            <a href="#"><i class="far fa-envelope"></i> <?php echo $user->email;?></a>
                        </div>                                                     
                    </div>
                </div>
            </div>
        </div>
        
       
        <div class="container">
        <div class="row">
            <div class="col-md-4 colp ">
            
        <div class="box-about-my mt-2">
            <div class="row responcive-row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h4 class="text1">About Me:</h4>
                    <p class="card-text3 "><?php echo $user->about_me;?></p>
                </div>
                
            </div>
            </div> 
            <div class="box-about-my mt-2">
            <div class="row responcive-row">
                
                <div class="col-lg-6 col-md-6 col-sm-12">                 
                    <h4 class="text1">Skills</h4>
                <?php
              
                $result= Skills::find_all();
                foreach($result as $row9){
                if($row9->user_id == $userid){
                ?>
                    <ul>
                  <li><?=$row9->skills_name?></li>
                </ul>
                  <?php
                }};
                ?>
                </div>
            </div>
            </div> 
            
        </div>
        
        
            <div class="col-md-8">
                    <!------------------------------------add post---------------------------------------------------->
                  
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
                        }
                        else{
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
                        if($row->privacy ==='public' && $row->user_id == $userid ){
                       
                    ?>
                   <div class="card post ppost2">
            <div class="card-body">
            <div class="row g-0">
                <div class="col-2 imgw">
                <img src="<?php echo $row->userimg();?>" class="img-fluid user_img" alt="...">
                </div>
                <div class="col-8 left-contect ">
                <div class="card-body left-contect">
                <h6 class="card-title"><?=$row->username()?></h6>
                    <p class="card-text user-type comm-name"><?=$row->comm()?></p>
                    <p class="card-text date-post"><small class="text-muted"><?=$row->add_date?></small></p>

                </div>
                </div>
                
                <?php
            
                if ($row->user_id == $userid){
                echo "<div class='col-2 edit-delete-div'>
                        <div>
                        <a href='deletePost.php?id= $row->id' class='link-color'><i class='fas fa-trash-restore-alt'></i></a>
                        <a href='editPost.php?id=$row->id' class='link-color'><i class='fas fa-pen'></i></a>
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
            <p class="p-comment"><i class="far fa-comment-dots"></i><?=$C;?></p>
            </div>
            <!--------------------------------------post like & comment-------------------------------------->
            <div class="btn-group">
            <button  class="btn  like_button icon-style">
            <i <?php if (Like::userLiked($row->id)): 
            
            ?>
                    class="fa fa-thumbs-up like-btn" 
                <?php else: ?>
                    class="fa fa-thumbs-o-up like-btn"
                <?php endif ?>
                data-id="<?php echo $row->id ?>"></i>
            </button>
            
            <a type="button" class="btn like_button icon-style" onclick="showComment(<?=$row->id?>)">
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
                    <img src="<?php echo $row2->userimg2();?>" class="img-fluid rounded-start comment-user " alt="...">
                    </div>
                    <div class="col-8 title-col">
                    <div class="card-body">
                        <h6 class="card-title comment-title" ><?="@".$row2->name()?></h6>
                        <p class="card-text fw-lighter comment-type"><?=$row->comm()?></p>
                    </div>
                    </div>
                    
                    <?php
                        if ($row2->user_id == $userid){
                    echo "<div class='col-2 edit-delete-div  '>
                            <div class='edit-delete'>
                            <a href='deleteComment.php?id= $row2->id' class='link-color' ><i class='fas fa-trash-restore-alt'></i></a>
                            <a href='editComment.php?id2=$row2->id' class='link-color'><i class='fas fa-pen'></i></a>
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
        
        <?php 
                } }
        
        ?>
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
          <div class="col-md-4">
            <img src="<?php echo $amin->image_path_placeholder();?>" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h6 class="card-title"><?php echo $amin->username;?></h6>
              <p class="card-text user-type">
              <select class="form-select" aria-label="Default select example" name="private">
                <option selected value="private"> private</option>
                <option value="public">public</option>
              </select>
              </p>
            </div>
          </div>
        </div>
        <!-----------------------------------------add img--------------------------------------------->
        <textarea class="form-control" placeholder="What do you want to talk about?" id="floatingTextarea" name="body"></textarea>
        <div>
          <label for="image_uploads" class="custom-file-upload">
            <i class="fas fa-images"></i>          
          </label>
          <input type="file" id="image_uploads" name="uplode"  multiple>
          <!-- <label for="image_uploads" class="custom-file-upload">
            <i class="fas fa-video"></i>
          </label>
          <input type="file" id="image_uploads" name="uplode" multiple>       -->
        </div>
        <!---------------------------------------------------------------------------------------------->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-orange" >Post</button>
      </div>
    </div>
    </form>
  </div>
</div>
        <!-----------------------------------------add img--------------------------------------------->
        
<!--------------------------------------end Modal------------------------------------------------------->

  <!-- Button trigger modal -->


<!-- first Modal -->
<div class="modal fade" id="firstmodel" tabindex="-1" aria-labelledby="ModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel2">Edit Background Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="edit_background.php?id=<?php echo $amin->id?>" method="post" enctype="multipart/form-data" >
            <div class="modal-body" style="display: flex;">
            <label for="background_img">background_img</label>
            <input type="file" name="background_img" value="<?php echo $amin->images_path_placeholder();?>" style="display: block;">
            
            </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="update" class="btn btn-orange pull-right" value="update">
                </div>
     </form>

    </div>
  </div>
</div>
<!-- ///////////////////////////////////////end first model///////////////////// -->
<div class="modal fade" id="secondmodel" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Edit Profile Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <form action="edit_image.php?id=<?php echo $amin->id?>"  method="post" enctype="multipart/form-data" >
                <div class="modal-body" >
                    <label for="image">image</label>
                    <input type="file" name="image" value="<?php echo $amin->image_path_placeholder();?>" style="display: block;">
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="update" class="btn btn-orange pull-right" value="update">
                
                </div>

            </form>
    </div>
  </div>
</div>
<!-- //////////////////////////////////////////////end second model//////////////////////////// -->
<!-- ///////////////////////////skills modal -->
<div class="modal fade" id="lastModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Skills</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <form action="add_skills.php?id=<?php echo $amin->id?>"  method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                    <label for="image">Skills</label><?php $skills=new Skills(); ?>
                    
                    <input type="text" name="skills_name" value="<?php echo $skills->skills_name;?>" style="display: block;">
                    <input type="hidden" name="user_id" value="<?php echo $skills->user_id;?>" style="display: block;">
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="add" class="btn btn-orange pull-right" value="add">
                
                </div>

            </form>
    </div>
  </div>
</div>
<!-- /////////////////////// third model //////////////////////////// -->


<div class="modal fade" id="thirdmodel" tabindex="-1" aria-labelledby="thirdModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="thirdModalLabel">Edit User Profile </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <form action="edit_profile.php?id=<?php echo $amin->id?>" method="post" enctype="multipart/form-data" >
                <div class="modal-body " >
                
                        <div class="row d-flex  mt-2 ">
                                <div class="col-sm col-md-6 d-flex  mb-1">
                                <div class="ratings ml-2">  
                                <label for="phone_number">Phone_number</label>
                                <input type="text" name="phone_number" class="form-control small_div "value="<?php echo $amin->phone_number ;?>">

                                </div>
                                </div>
                                <div class="col-sm col-md-6 d-flex  mb-1 left_div">
                                <div class="ratings ml-2">  
                                <label for="birth_date">Birth_date</label>
                                <input type="date" name="birth_date" class="form-control  small_div" value="<?php echo $amin->birth_date ;?>">

                                </div>
                                </div>
                        
                        
                        </div>
                        <div class="row d-flex mt-2">
                                <div class="col-sm col-md-6 d-flex  mb-1">
                                <div class="ratings ml-2">  
                                <label for="linkedin">linkedin</label>
                                <input type="text" name="linkedin" class="form-control small_div " value="<?php echo $amin->linkedin ;?>">

                                </div>
                                </div>
                                <div class="col-sm  col-md-6 d-flex  mb-1 left_div">
                                <div class="ratings ml-2">  
                                <label for="github">Github</label>
                                <input type="text" name="github" class="form-control small_div "value="<?php echo $amin->github ;?>">

                                </div>
                                </div>
                        
                        </div>
                        
                        <div class=" d-flex  mt-2">
                                <div class="d-flex  mb-1">
                                <div class="ratings ml-2">  
                                <label for="about_me">About_me</label>
                                <input type="text" name="about_me" class="form-control big_div " value="<?php echo $amin->about_me ;?>">

                                </div>
                                </div>
                        
                        </div>
                
                
                        <div class=" d-flex  mt-2 ">
                                <div class="d-flex  mb-1">
                                <div class="ratings ml-2">  
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control big_div " value="<?php echo $amin->email ;?>">

                                </div>
                                </div>
                        
                        </div>
      
      
                        <div class=" d-flex  mt-2 ">
                                <div class="d-flex  mb-1">
                                <div class="ratings ml-2">  
                                <label for="type_user">Type_user</label>
                                <input type="text" name="type_user" class="form-control big_div" value="<?php echo $amin->type_user ;?>">

                                </div>
                                </div>
                        
                        </div>
      
                        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="update" class="btn btn-orange pull-right" value="update">
                </div>
    
        <!-- </form> -->
                </div>

               

            </form>
    </div>
  </div>
</div>
<!-- ///////////////////////////////////////end third model//////////////////////////// -->

<script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
  </script>
<?php include "include/footer.php"; ?>