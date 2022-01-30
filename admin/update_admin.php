<?php
include "include/init.php";
include "../admin/include/headeradmin.php";
include "../models/admin.php";

 ?>
 <?php if(!$session->is_signed_in()){ redirect("login.php");}?>
 <?php

$admin=Admin::find_by_id($_GET['id']);


if(isset($_POST['update'])){

        if($admin){

                $admin->username=$_POST['username'];
                $admin->email=$_POST['email'];
                $admin->password=$_POST['password'];
                // $admin->image=$_POST['image'];
                

        
        $admin->update();
        
        

                        }
        

                }



?>

	
	<div class="ts-main-content">
<?php include('include/leftbar.php');?>
	<div class="content-wrapper">
	<div class="container-fluid">

		<div class="row">
		<div class="col-md-12">
					
		<h2 class="page-title">Update admin</h2>

		<div class="row">
			<div class="col-md-10">
			<div class="panel panel-default">
			<div class="panel-heading">Form fields</div>
			<div class="panel-body">
		<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
										
            <div class="form-group">
		<label class="col-sm-4 control-label">username</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="email" value="<?php echo $admin->username ;?>" id="ch" required>
				</div>
			</div>
            <div class="form-group">
		<label class="col-sm-4 control-label">email</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="email" value="<?php echo $admin->email ;?>" id="ch" required>
				</div>
			</div>
            <div class="form-group">
		<label class="col-sm-4 control-label">password</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="password" value="<?php echo $admin->password ;?>" id="ch" required>
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

