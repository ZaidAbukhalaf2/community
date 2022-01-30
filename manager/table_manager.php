<?php

include "include/init.php";
include "include/headeradmin.php";
include "../models/manager.php";
?>

<?php 

if(!$session->is_signed_in()){ redirect("login.php");}

?>
<?php


$manager = Manager::find_all();

?>

	<div class="ts-main-content">
		<?php include('include/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Manager</h2>

						
						<div class="panel panel-default">
							<div class="panel-heading">Listed Manager</div>
							<div class="panel-body">
							
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										
                                        
                                    <th>id</th>
                                    <th>email</th>
                                    <th>password</th>
                                    <th>first_name</th>
                                    <th>last_name</th>
                                    <th>phone_number</th>
                                    <th>img</th>
                                    <th>commuinty_id</th>

											
										
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										
                                        
                                    <th>id</th>
                                    <th>email</th>
                                    <th>password</th>
                                    <th>first_name</th>
                                    <th>last_name</th>
                                    <th>phone_number</th>
                                    <th>img</th>
                                    <th>commuinty_id</th>
										
										
											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

									<?php foreach($manager as $manager): ?>
                                            <tr>
                                                <!-- <th scope="row"></th> -->
												<td><?php echo $manager->id; ?></td>
												<td><?php echo $manager->email; ?></td>                                               
                                                <td><?php echo $manager->password; ?></td>                                                                                         
                                                <td><?php echo $manager->first_name; ?></td>
                                                <td><?php echo $manager->last_name; ?></td>
                                                <td><?php echo $manager->phone_number; ?></td>
                                                <td><img  src="<?php echo $manager->image_path_placeholder();?>" style="height: 50px;"></td>   
                                                <td><?php echo $manager->commuinty_id; ?></td>
                                             
											
<td><button type="button" class="btn btn-success">
                                                <a href="update_manager.php?id=<?php echo $manager->id?>" style="text-decoration: none;color: white;">Update</a>

                                                </button>
                                                <button type="button" class="btn btn-danger">
                                                <a href="delete_manager.php?id=<?php echo $manager->id?>" style="text-decoration: none;color: white;">Delete</a>
                                                </button></td>
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