<?php
include "include/init.php";
include "include/headeradmin.php";
include "../models/admin.php";

 ?>
 <?php if(!$session->is_signed_in()){ redirect("login.php");}?>
<?php


$admin = Admin::find_all();

?>

	

	<div class="ts-main-content">
		<?php include('include/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage admin</h2>

						
						<div class="panel panel-default">
							<div class="panel-heading">Listed admin</div>
							<div class="panel-body">
							
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										       <th>ID</th>	
                                               <th>username</th>							   
											   <th>admin_email</th>
                                               <th>admin_password</th>

											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										        <th>ID</th> 
                                                <th>username</th>							   
											   <th>admin_email</th>
                                               <th>admin_password</th>
										
										
											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

									<?php foreach($admin as $admins): ?>
                                            <tr>
                                                <!-- <th scope="row"></th> -->
												<td><?php echo $admins->id; ?></td>                                     
                                                <td><?php echo $admins->username; ?></td>
                                                <td><?php echo $admins->email; ?></td>
                                                <td><?php echo $admins->password; ?></td>
											
<td><button type="button" class="btn btn-success">
                                                <a href="update_admin.php?id=<?php echo $admins->id?>" style="text-decoration: none;color: white;">Update</a>

                                                </button>
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

