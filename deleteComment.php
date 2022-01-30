<?php
include "models/comment.php";
include "include/init.php";


If (isset($_GET['id'])){
 
$id=$_GET['id'];

$result=Comment::find_by_id($id);

$result->delete();

header("Location: index.php");

}
?>