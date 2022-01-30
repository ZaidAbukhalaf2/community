<?php

include "include/init.php";
include "include/headeradmin.php";
include "../models/job.php";

?>
<?php 

if(!$session->is_signed_in()){ redirect("login.php");}

?>


<?php

$job= new job();
$job = job::find_by_id($_GET['id']);


if(isset($_POST['update'])){

        if($job){

                $job->name_job=$_POST['name_job'];
                $job->job_discribtion=$_POST['job_discribtion'];
                $job->company_name=$_POST['company_name'];
                $job->time=$_POST['time'];
                $job->city=$_POST['city'];
                $job->date=$_POST['date'];
                
                $job->start_upload($_FILES['img']);

        $job->update();
		header("Location:table_job.php");
            
                        }      

                }

?>

	
	<div class="ts-main-content">
	<?php include('include/leftbar.php');?>
	<div class="content-wrapper">
	<div class="container-fluid">

	<div class="row">
	<div class="col-md-12">
					
	<h2 class="page-title">Update Job</h2>

	<div class="row">
		<div class="col-md-10">
			<div class="panel panel-default">
			<div class="panel-heading">Job Information</div>
			<div class="panel-body">
	<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();"  enctype="multipart/form-data">
									

                 <div class="form-group">	
                         <label class="col-sm-4 control-label">Job Name</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" name="name_job" id="sub_id" value="<?php echo $job->name_job ;?>" required>
				</div>
				</div>
                  <div class="form-group">
		       <label class="col-sm-4 control-label">Job Discribtion</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" name="job_discribtion" value="<?php echo $job->job_discribtion ;?>" id="ch" required>
							</div>
				</div>
                                <div class="form-group">
		       <label class="col-sm-4 control-label">Company Name</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" name="company_name" value="<?php echo $job->company_name ;?>" id="ch" required>
							</div>
				</div>
				<div class="form-group">
                                            <label class="col-sm-4 control-label">Time</label>
                                                <div class="col-sm-8">
                                            <select class="form-control" aria-label="Default select example" name="time" >
                                            <option selected value="full_time"> full_time</option>
                                                <option value="part_time">part_time</option>

                                            </select>
                                        </div>
                                            </div>
                                                <div class="form-group">
		<label class="col-sm-4 control-label">City</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="city" value="<?php echo $job->city ;?>" id="ch" required>
					</div>
			</div>
			<div class="form-group">
		<label class="col-sm-4 control-label">Date</label>
		<div class="col-sm-8">
		<input type="date" class="form-control" name="date" value="<?php echo $job->date ;?>" id="ch" required>
					</div>
			</div>
			<div class="form-group">
												<label class="col-sm-4 control-label">Image</label>
												<div class="col-sm-8">
													<input type="file" class="form-control" name="img"  id="ch" required>
												</div>
											</div>   													                      									
		
		<div class="hr-dashed"></div>
											
										
								
											
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

