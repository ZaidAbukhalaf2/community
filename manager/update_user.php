<?php
include "include/init.php";
include "include/headeradmin.php";
include "../models/user.php";

?>
<?php 

if(!$session->is_signed_in()){ redirect("login.php");}

?>
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

$users = User::find_by_id($_GET['id']);


if(isset($_POST['update'])){

        if($users){

                $users->username=$_POST['username'];
                $users->first_name=$_POST['first_name'];
                $users->last_name=$_POST['last_name'];
                $users->password=$_POST['password'];    
                $users->about_me=$_POST['about_me'];                         
                $users->phone_number=$_POST['phone_number'];
                $users->birth_date=$_POST['birth_date'];
                $users->email=$_POST['email'];
                $users->linkedin=$_POST['linkedin'];
                $users->github=$_POST['github'];
				$users->start_upload($_FILES['image']);
                $users->commuinty_id=$_POST['commuinty_name'];
        


        
        $users->update();
        header("Location:manageuser.php");
        

                        }
        

                }



?>

	
	<div class="ts-main-content">
	<?php include('include/leftbar.php');?>
	<div class="content-wrapper">
	<div class="container-fluid">

	<div class="row">
	<div class="col-md-12">
					
	<h2 class="page-title">Update User Information</h2>

	<div class="row">
		<div class="col-md-10">
			<div class="panel panel-default">
			<div class="panel-heading">User Information</div>
			<div class="panel-body">
	<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();" enctype="multipart/form-data">
									

                 <div class="form-group">	
                         <label class="col-sm-2 control-label label-text" style="text-align: left;">User Name</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" name="username" id="sub_id" value="<?php echo $users->username ;?>" required>
				</div>
				</div>
                  <div class="form-group">
		       <label class="col-sm-2 control-label label-text "style="text-align: left;">First Name</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" name="first_name" value="<?php echo $users->first_name ;?>" id="ch" required>
							</div>
				</div>
                                <div class="form-group">
		       <label class="col-sm-2 control-label label-text"style="text-align: left;">Last Name</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" name="last_name" value="<?php echo $users->last_name ;?>" id="ch" required>
							</div>
				</div>
		<div class="form-group">
		<label class="col-sm-2 control-label label-text" style="text-align: left;">Password</label>
		<div class="col-sm-8">
		<input type="password" class="form-control" name="password" value="<?php echo $users->password ;?>" id="ch" required>
					</div>
						</div>
                                                
                        <div class="form-group">
		<label class="col-sm-2 control-label label-text" style="text-align: left;">About Me</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="about_me" value="<?php echo $users->about_me ;?>" id="ch" required>
					</div>
			</div>
											
		<div class="form-group">
		<label class="col-sm-2 control-label label-text" style="text-align: left;">Phone Number</label>
		<div class="col-sm-8">
		<input type="number" class="form-control" name="phone_number" value="<?php echo $users->phone_number ;?>" id="ch" required>
					</div>
			</div>
                        <div class="form-group">
		<label class="col-sm-2 control-label label-text" style="text-align: left;">Birth Date</label>
		<div class="col-sm-8">
		<input type="date" class="form-control" name="birth_date" value="<?php echo $users->birth_date ;?>" id="ch" required>
				</div>
		</div>									
		<div class="form-group">
		<label class="col-sm-2 control-label label-text" style="text-align: left;">Email</label>
		<div class="col-sm-8">
		<input type="email" class="form-control" name="email" value="<?php echo $users->email ;?>" id="ch" required>
				</div>
		</div>
		<div class="form-group">
		<label class="col-sm-2 control-label label-text" style="text-align: left;">Linkedin</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="linkedin" value="<?php echo $users->linkedin ;?>" id="ch" required>
				</div>
		</div>	
                <div class="form-group">
		<label class="col-sm-2 control-label label-text" style="text-align: left;">Github</label>
		<div class="col-sm-8">
		<input type="text" class="form-control " name="github" value="<?php echo $users->github ;?>" id="ch" required>
				</div>
		</div>	
		<div class="form-group">
		<label class="col-sm-2 control-label label-text" style="text-align: left;">Image</label>
				<div class="col-sm-8">
				<input type="file" class="form-control" name="image"  id="ch" required>
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
