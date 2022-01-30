<?php
include "include/init.php";
include "include/headeradmin.php";
include "../models/manager.php";

?>

<?php

$session->logout();

redirect("login.php");



?>