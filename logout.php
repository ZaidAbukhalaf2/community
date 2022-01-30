<?php
include "include/init.php";
include "include/header.php";
include "models/user.php";

?>

<?php

$session->logout();

redirect("login.php");



?>