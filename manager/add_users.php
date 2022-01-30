<?php
include "include/init.php";
include "include/headeradmin.php";
include "../models/user.php";
// include "include/nav.php";


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



$user = new User();

if(isset($_POST['create'])){

if($user){

        $user->username=$_POST['username'];
        $user->first_name=$_POST['first_name'];
        $user->last_name=$_POST['last_name'];
        $user->password=$_POST['password'];
        // $user->Skills=$_POST['Skills'];
        $user->about_me=$_POST['about_me'];
        $user->phone_number=$_POST['phone_number'];
        $user->birth_date= $_POST['birth_date'];
        $user->email=$_POST['email'];
        $user->linkedin=$_POST['linkedin'];
        $user->github=$_POST['github'];
        $user->type_user=$_POST['type_user'];
        $user->status=$_POST['status'];
		$user->commuinty_id=$_POST['commuinty_name'];
		$user->start_upload($_FILES['image']);
		
        $user->create();
		
}


}
?>


	
	<div class="ts-main-content">
	<?php include('include/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Create User</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">User Information</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();" enctype="multipart/form-data">
										
											
  	        	 
											<div class="form-group">
												<label class="col-sm-2 control-label">Username</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="username" value="<?php echo $user->username ;?>" id="brand" required>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-sm-2 control-label">First Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="first_name" id="sub_id" value="<?php echo $user->first_name ;?>" required>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-sm-2 control-label">Last Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="last_name" value="<?php echo $user->last_name ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="password" value="<?php echo $user->password ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">about_me</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="about_me" value="<?php echo $user->about_me ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">phone_number</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="phone_number" value="<?php echo $user->phone_number ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">birthDate</label>
												<div class="col-sm-8">
													<input type="date" class="form-control" name="birth_date" value="<?php echo $user->birth_date ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">email</label>
												<div class="col-sm-8">
													<input type="email" class="form-control" name="email" value="<?php echo $user->email ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">linkedin</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="linkedin" value="<?php echo $user->linkedin ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">github</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="github" value="<?php echo $user->github ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">type_user</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="type_user" value="<?php echo $user->type_user ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">status</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="status" value="<?php echo $user->status ;?>" id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">img</label>
												<div class="col-sm-8">
													<input type="file" class="form-control" name="image"  id="ch" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">community</label>
												<div class="col-sm-8">
												<select name="commuinty_name" class="form-control">
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