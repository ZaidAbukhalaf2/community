<?php 

include_once ("obj_project.php");
include_once "user.php";

class Comment extends obj_project{

    public static $table_name = "comment";
    protected static $db_table_fields = array("body", "add_date", "post_id",  "user_id");
    public $id;
    public $body;
    public $add_date;
    public $post_id;
    public $user_id;
    
   


    

public function name(){
    $user=User::find_by_id($this->user_id);
    return $user->username;

}
public function userimg2(){
    $user=User::find_by_id($this->user_id);
    return $user->image_path_placeholder();
}
public function username(){
    $user=User::find_by_id($this->user_id);
    return $user->first_name." ".$user->last_name;

}
}




?>