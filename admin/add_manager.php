<?php
include "include/init.php";
include "include/headeradmin.php";
include "../models/manager.php";
// include "../models/commuinty.php";


?>

<?php if(!$session->is_signed_in()){ redirect("login.php");}?>

<?php

//select Data on the community
$conn=new Database();

$sql = "SELECT * FROM commuinty";

 $inner = mysqli_query($conn->conn,$sql);

 if($inner == false){
	die( mysqli_error($conn->conn) );
 }

?>

<?php



$manager = new Manager();

if(isset($_POST['create'])){

if($manager){

        $manager->first_name=$_POST['first_name'];
        $manager->last_name=$_POST['last_name'];
        $manager->password=$_POST['password'];
        $manager->phone_number=$_POST['phone_number'];
        $manager->email=$_POST['email'];
        $manager->commuinty_id=$_POST['commuinty_name'];
        $manager->start_upload($_FILES['img']);
        $manager->create();
		header("Location:manage_manager.php");
}


}
?>


	
	<div class="ts-main-content">
	<?php include('include/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Create Manager</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Manager Information</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();" enctype="multipart/form-data">
										

                                            <div class="form-group">
												<label class="col-sm-2 control-label">First Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="first_name" id="sub_id" value="<?php echo $manager->first_name ;?>" required>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-sm-2 control-label">Last Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="last_name" value="<?php echo $manager->last_name ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="password" value="<?php echo $manager->password ;?>" id="ch" required>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-2 control-label">phone_number</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="phone_number" value="<?php echo $manager->phone_number ;?>" id="ch" required>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Email</label>
												<div class="col-sm-8">
													<input type="email" class="form-control" name="email" value="<?php echo $manager->email ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Profile Picture</label>
												<div class="col-sm-8">
													<input type="file" class="form-control" name="img"  id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Community</label>
												<div class="col-sm-8">
												<select name="commuinty_name" class="form-control">
													<option value="">Select</option>
													<?php while($com=mysqli_fetch_assoc($inner)){?>
														
														<option value="<?php echo $com['id']; ?>">
															 
															    <?php echo $com['name']; ?>
														
														</option>
														<?php
													}
													?>
												</select>
												</div>
											</div>
											
											
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-orange" name="create" type="submit">Submit</button>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>	
			
			</div>
		</div>
	</div>

	<?php include "include/footer.php"; ?>