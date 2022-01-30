<?php
include "include/init.php";
include "include/header.php";
include "models/user.php";
include "include/nav.php";
include "models/job.php";

?>

        <?php

        $result = job::find_by_id($_GET['id']);
        
        ?>
    <div class="container jobinfo-container ">

        <div class="card card-job-info" >
            <div class="row">
                <div class="col-lg-6 col-md-6 job-img-info col-sm-12">
                    <!----------------------------------company logo------------------------------------->
                    <img src="<?= $result->jopimg();?>" class="card-img-top job-img-info" alt="...">
                </div>
                <div class="col-lg-6 col-md-6 jobinfo-sub col-sm-12">
                    <!---------------------------------------Job title----------------------------------->
                    <h5 class="card-title job1"><?=$result->name_job; ?></h5>
                    <div class="row job2" >
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <!-------------------------icon with job info ------------------------------->
                            <p><small><i class="fas fa-building icon-job"></i><?=$result->city?></small></p>
                            <p><small><i class="fas fa-globe-asia icon-job"></i><?=$result->city?></small></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <p><small><i class="fas fa-briefcase  icon-job"></i><?=$result->time?></small></p>
                            <p><small><i class="fas fa-calendar-alt"></i>  <?=$result->date?></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!----------------------------- Job describe--------------------------------------->
                    <p class="card-text card-text-pa dis"><?=$result->job_discribtion?></p>
                </div>
            
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-orange apply-btn">Go somewhere</a>
            </div>
        </div>
    </div>


<?php include "include/footer.php"; ?>