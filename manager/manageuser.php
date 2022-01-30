<?php
include "include/init.php";
include "include/headeradmin.php";
include "../models/user.php";

 ?>
 <?php 

if(!$session->is_signed_in()){ redirect("login.php");}

?>
<?php


$users = User::find_all();

?>


	<div class="ts-main-content">
		<?php include('include/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage User</h2>

						
						<div class="panel panel-default">
							<div class="panel-heading">User Information</div>
							<div class="panel-body mmm" >
							
								<table id="zctb" class="display table table-striped table-bordered table-hover " cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
												<th>username</th>
                                                <th>first_name</th>
                                                <th>last_name</th>
												<th>password</th>
											   
											   <th>about_me</th>
											   <th>phone_number</th>
											   <th>birth_date</th>
											   <th>email</th>
											   <th>linkedin</th>
											   <th>github</th>
											   <th>type_user</th>
											   <th>status</th>
											   <th>img</th>
											   <th>commuinty_id</th>

											
										
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>username</th>
                                                <th>first_name</th>
                                                <th>last_name</th>
												<th>password</th>
											   
											   <th>about_me</th>
											   <th>phone_number</th>
											   <th>birth_date</th>
											   <th>email</th>
											   <th>linkedin</th>
											   <th>github</th>
											   <th>type_user</th>
											   <th>status</th>
											   <th>img</th>
											   <th>commuinty_id</th>
										
										
											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

									<?php foreach($users as $user): ?>
                                            <tr>
                                                <!-- <th scope="row"></th> -->
												<td><?php echo $user->id; ?></td>
												<td><?php echo $user->username; ?></td>                                              
                                                <td><?php echo $user->first_name; ?></td>
                                                <td><?php echo $user->last_name; ?></td>                                             
                                                <td><?php echo $user->password; ?></td>
                                                <td><?php echo $user->about_me; ?></td>
                                                <td><?php echo $user->phone_number; ?></td>
                                                <td><?php echo $user->birth_date; ?></td>
                                                <td><?php echo $user->email; ?></td>
                                                <td><?php echo $user->linkedin; ?></td>
                                                <td><?php echo $user->github; ?></td>
                                                <td><?php echo $user->type_user; ?></td>
                                                <td><?php echo $user->status; ?></td>
												<td><img  src="<?php echo $user->image_path_placeholder();?>" style="height: 50px;"></td>
                                                <td><?php echo $user->commuinty_id; ?></td>
											
<td>
                                                <a href="update_user.php?id=<?php echo $user->id?>" ><i class="fa fa-edit"></i></a>
                                                <a href="delete_user.php?id=<?php echo $user->id?>" ><i class="fa fa-close"></i> </a>

                                              
                                            </td>
										</tr>
										<?php endforeach ;?>
										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<?php include "include/footer.php"; ?>

