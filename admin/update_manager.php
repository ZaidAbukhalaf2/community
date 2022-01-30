<?php
include "include/init.php";
include "include/headeradmin.php";
include "../models/Manager.php";

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

$managers = Manager::find_by_id($_GET['id']);


if(isset($_POST['update'])){

        if($managers){

                $managers->first_name=$_POST['first_name'];
                $managers->last_name=$_POST['last_name'];
                $managers->phone_number=$_POST['phone_number'];
                $managers->email=$_POST['email'];
                $managers->password=$_POST['password'];        
				$managers->start_upload($_FILES['img']);                      
                $managers->commuinty_id=$_POST['commuinty_name'];
                

        
        $managers->update();
        
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
					
						<h2 class="page-title">update Manager</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Manager Information</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();" enctype="multipart/form-data">
										

                                            <div class="form-group">
												<label class="col-sm-4 control-label">First Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="first_name" id="sub_id" value="<?php echo $managers->first_name ;?>" required>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-sm-4 control-label">Last Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="last_name" value="<?php echo $managers->last_name ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="password" value="<?php echo $managers->password ;?>" id="ch" required>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-4 control-label">phone_number</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="phone_number" value="<?php echo $managers->phone_number ;?>" id="ch" required>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-4 control-label">email</label>
												<div class="col-sm-8">
													<input type="email" class="form-control" name="email" value="<?php echo $managers->email ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">img</label>
												<div class="col-sm-8">
													<input type="file" class="form-control" name="img"  id="ch" required>
												</div>
											</div> 
											<div class="form-group">
												<label class="col-sm-4 control-label">Community</label>
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
								
													<button class="btn btn-orange" name="update" type="submit">Submit</button>
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

