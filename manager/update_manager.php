<?php

include "include/init.php";
include "include/headeradmin.php";
include "../models/manager.php";

?>

<?php 

if(!$session->is_signed_in()){ redirect("login.php");}

?>

<?php

$manager= new Manager();
$manager = Manager::find_by_id($_GET['id']);


if(isset($_POST['update'])){

        if($manager){

                $manager->name_manager=$_POST['email'];
                $manager->password=$_POST['password'];
                $manager->first_name=$_POST['first_name'];
                $manager->last_name=$_POST['last_name'];
                $manager->phone_number=$_POST['phone_number'];
                $manager->commuinty_id=$_POST['commuinty_id'];
                
                $manager->start_upload($_FILES['img']);

        $manager->update();

            
                        }      

                }

?>

	
	<div class="ts-main-content">
	<?php include('include/leftbar.php');?>
	<div class="content-wrapper">
	<div class="container-fluid">

	<div class="row">
	<div class="col-md-12">
					
	<h2 class="page-title">update manager</h2>

	<div class="row">
		<div class="col-md-10">
			<div class="panel panel-default">
			<div class="panel-heading">Form fields</div>
			<div class="panel-body">
	<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();"  enctype="multipart/form-data">
									

                 <div class="form-group">	
                         <label class="col-sm-4 control-label">email</label>
			<div class="col-sm-8">
			<input type="email" class="form-control" name="email" id="sub_id" value="<?php echo $manager->email ;?>" required>
				</div>
				</div>
                  <div class="form-group">
		       <label class="col-sm-4 control-label">password</label>
			<div class="col-sm-8">
			<input type="password" class="form-control" name="password" value="<?php echo $manager->password ;?>" id="ch" required>
							</div>
				</div>
                                <div class="form-group">
		       <label class="col-sm-4 control-label">first_name</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" name="first_name" value="<?php echo $manager->first_name ;?>" id="ch" required>
							</div>
				</div>
				<div class="form-group">
				
											</div>
                                                <div class="form-group">
		<label class="col-sm-4 control-label">last_name</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="last_name" value="<?php echo $manager->last_name ;?>" id="ch" required>
					</div>
			</div>
			<div class="form-group">
		<label class="col-sm-4 control-label">phone_number</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="phone_number" value="<?php echo $manager->phone_number ;?>" id="ch" required>
					</div>
			</div>
            <div class="form-group">
		<label class="col-sm-4 control-label">commuinty_id</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="commuinty_id" value="<?php echo $manager->commuinty_id ;?>" id="ch" required>
					</div>
			</div>
			<div class="form-group">
												<label class="col-sm-4 control-label">img</label>
												<div class="col-sm-8">
													<input type="file" class="form-control" name="img"  id="ch" required>
												</div>
											</div>   													                      									
		
		<div class="hr-dashed"></div>
											
										
								
											
		<div class="form-group">
		<div class="col-sm-8 col-sm-offset-4">
							
		<button class="btn btn-primary" name="update" type="submit">Submit</button>
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

