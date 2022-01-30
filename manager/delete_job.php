<?php
include "include/init.php";

include "../models/job.php";

?>

<?php

if(empty($_GET['id'])){

    echo "done";

    
}

$job = job::find_by_id(($_GET['id']));

if($job){

    $job->delete();

    echo"done";
    header("Location:table_job.php");

    }else{

            echo "error";
        }

?>