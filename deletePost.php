<?php
include "models/post.php";
include "include/init.php";

$post=new Post();

If (isset($_GET['id'])){
 
// $id=$_GET['id'];

$result=Post::find_by_id($_GET['id']);

$result->delete();

header("Location: index.php");

}
?>