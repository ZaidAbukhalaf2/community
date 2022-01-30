<?php
require_once "models/user.php";
include "include/init.php";
include "include/header.php";
include "include/nav.php";
include "models/post.php";
include "models/comment.php";
include "models/commuinty.php";
include "models/like.php";
include "models/job.php";

?>
<?php 

if(!$session->is_signed_in()){ redirect("login.php");}

?>
<?php
$user_id=$_SESSION['user_id'];
$conn=new Database();

$sql="SELECT post_like.like_action,post.user_id FROM post_like INNER JOIN post Where post.user_id=$user_id and post_like.post_id=post.id ";

$inner = mysqli_query($conn->conn,$sql);

 if($inner == false){
	die( mysqli_error($conn->conn) );
 }

?>


<div class="wrapper">
    <div class="container job-container">
        <div>
		<?php while($com=mysqli_fetch_assoc($inner)){?>
            <div class="card mb-3 " style="max-width: 840px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <!--------------------------------company logo---------------------------------->
                        <img src="image/2.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body  ">
                            <!-----------------------------------Job title------------------------------>
                            <h5 class="card-title left-con">Notification</h5>
                            <p class="card-text">
                                <div class="row">
                                    <!-------------------------icon with job info ---------------------->
                                    <div class="col">
                                        <p><small><i class="far fa-thumbs-up"></i> Likes</small></p>
                                        <p><small><i class="fas fa-thumbs-up"></i> <?php echo $com['like_action']; ?></small></p>

                                    </div>
                        
                                </div>
                            </p>
                          
                        </div>
                    </div>
                </div>
            </div>
			<?php
													}
													?>
    </div>
    </div>
    
</div>
<?php include "include/footer.php"; ?>