<?php
include "include/init.php";
include "include/headeradmin.php";
include "../models/commuinty.php";

 ?>
 <?php if(!$session->is_signed_in()){ redirect("login.php");}?>
<?php


$commuinty = Commuinty::find_all();

?>

	

	<div class="ts-main-content">
		<?php include('include/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage commuinty</h2>

						
						<div class="panel panel-default">
							<div class="panel-heading">Community Information</div>
							<div class="panel-body">
							
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										       <th>ID</th>								   
											   <th>commuinty_name</th>

											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										        <th>ID</th> 						   
											    <th>commuinty_name</th>
										
										
											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

									<?php foreach($commuinty as $commuintys): ?>
                                            <tr>
                                                <!-- <th scope="row"></th> -->
												<td><?php echo $commuintys->id; ?></td>                                     
                                                <td><?php echo $commuintys->name; ?></td>
											
                                                <td>
                                                <a href="update_commuinty.php?id=<?php echo $commuintys->id?>"><i class="fa fa-edit"></i></a>

                                            
                                                <a href="delete_commuity.php?id=<?php echo $commuintys->id?>" ><i class="fa fa-close"></i></a>
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

