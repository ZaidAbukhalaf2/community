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

$sql="SELECT  comment.body,comment.add_date,comment.user_id,post.user_id FROM  comment INNER JOIN post Where post.user_id=$user_id and comment.post_id=post.id ";
// $sql2="SELECT comment.user_id ,users.id FROM comment INNER JOIN users WHERE comment.user_id=  "
$inner = mysqli_query($conn->conn,$sql);

 if($inner == false){
	die( mysqli_error($conn->conn) );
 }



?>



<div class="wrapper">
    <div class="container job-container">
        <div>
		<?php while($com=mysqli_fetch_assoc($inner)){
            
            
            ?>
            <div class="card mb-3 " style="max-width: 840px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <!--------------------------------company logo---------------------------------->
                        <img src="<?php echo $amin->image_path_placeholder();?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body  ">
                            <!-----------------------------------Job title------------------------------>
                         
                            <h5 class="card-title left-con"></h5>
                           
                            <p class="card-text">
                                <div class="row">
                                    <!-------------------------icon with job info ---------------------->
                                    <div class="col">
                                    <p><small><i class="far fa-comment-alt"></i> Comments</small></p>
									<p><small><i class="fas fa-comment-alt"></i> <?php echo $com['body']; ?></small></p>

                                    </div>
                                    <div class="col">
                                    <p><small><i class="far fa-calendar-check"></i> Date</small></p>
									<p><small><i class="fas fa-calendar-check"></i> <?php echo $com['add_date']; ?></small></p>

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