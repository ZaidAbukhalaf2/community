<?php

include "include/init.php";
include "include/headeradmin.php";
include "../models/commuinty.php";


?>
<?php 

if(!$session->is_signed_in()){ redirect("login.php");}

?>
<?php
$commuinty=new Commuinty();

if(isset($_POST['create'])){

        if($commuinty){
        
                $commuinty->name=$_POST['name'];
                
                $commuinty->create();
				header("Location:manage_commuinty.php");
        }
        
        
        }

?>

<?php if(!$session->is_signed_in()){ redirect("login.php");}?>
	
	<div class="ts-main-content">
<?php include('include/leftbar.php');?>
	<div class="content-wrapper">
	<div class="container-fluid">

		<div class="row">
		<div class="col-md-12">
					
		<h2 class="page-title">Create Community</h2>

		<div class="row">
			<div class="col-md-10">
			<div class="panel panel-default">
			<div class="panel-heading">Community Information</div>
			<div class="panel-body">
		<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
										
            <div class="form-group">
		<label class="col-sm-2 control-label">Commuinty</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="name" value="<?php echo $commuinty->name ;?>" id="ch" required>
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

