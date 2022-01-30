<?php

include "include/init.php";
include "include/headeradmin.php";
include "../models/job.php";
?>
<?php if(!$session->is_signed_in()){ redirect("login.php");}?>
<?php


$job = job::find_all();

?>

	

	<div class="ts-main-content">
		<?php include('include/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Job</h2>

						
						<div class="panel panel-default">
							<div class="panel-heading">Job Information</div>
							<div class="panel-body">
							
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										
                                        
                                    <th>id</th>
                                    <th>name_job</th>
                                    <th>job_discribtion</th>
                                    
                                    <th>company_name</th>
                                    <th>time</th>
                                    <th>city</th>
                                    <th>date</th>

											
										
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										
                                        
                                    <th>id</th>
                                    <th>name_job</th>
                                    <th>job_discribtion</th>
                                    
                                    <th>company_name</th>
                                    <th>time</th>
                                    <th>city</th>
                                    <th>date</th>
										
										
											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

									<?php foreach($job as $job): ?>
                                            <tr>
                                                <!-- <th scope="row"></th> -->
												<td><?php echo $job->id; ?></td>
												<td><?php echo $job->name_job; ?></td>                                               
                                                <td><?php echo $job->job_discribtion; ?></td>
                                                                                             
                                                <td><?php echo $job->company_name; ?></td>
                                                <td><?php echo $job->time; ?></td>
                                                <td><?php echo $job->city; ?></td>
                                                <td><?php echo $job->date; ?></td>
                                             
											 
                                                <td>
                                                <a href="update_job.php?id=<?php echo $job->id?>" ><i class="fa fa-edit"></i></a>

                                             
                                                <a href="delete_job.php?id=<?php echo $job->id?>" ><i class="fa fa-close"></i></a>
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
