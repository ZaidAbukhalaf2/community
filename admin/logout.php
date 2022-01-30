<?php
include "include/init.php";
include "include/header.php";
include "../models/commuinty.php";

?>

<?php

$session->logout();

redirect("login.php");



?>