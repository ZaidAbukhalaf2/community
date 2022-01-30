<?php 

include_once ("obj_project.php");
include_once "user.php";

class Post extends obj_project{

    public static $table_name = "post";
    protected static $db_table_fields = array("body", "add_date", "media", "privacy", "user_id", "commuinty_id","Comment_c");
    public $id;
    public $body="";
    public $add_date;
    public $media;
    public $privacy="private";
    public $user_id;
    public $commuinty_id;


    public $tmp = "../uplode/";
    public $file_name="uplode/" ;



    public function start_upload(){

        $this->media = basename($_FILES['uplode']['name']) ;
        $this->file_name = $_FILES["uplode"]["name"];
        $this->tmp=$_FILES["uplode"]["tmp_name"];

        // $this->uploadfiles = "../image/";
        if(move_uploaded_file($this->tmp,"uplode/". $this->file_name)){
            // echo $this->tmp;
            // echo "done";
    }else{
        // echo "error";
        }
    }

    public function image_path_placeholder(){


        return empty($this->media)? $this->tmp : $this->file_name .DS. $this->media;
    }
    public function type(){
       $a=explode('.',$this->media);
        return $a[1];

    }
    

    public function username(){
        $user=User::find_by_id($this->user_id);
        return $user->first_name." ".$user->last_name;

    }
    public function name(){
        $user=User::find_by_id($this->user_id);
        return $user->username;

    }
    public function userimg(){
        $user=User::find_by_id($this->user_id);
        return $user->image_path_placeholder();
    }
    
    public function comm(){
        $user=User::find_by_id($this->user_id);
        return $user->comm();

    }


 

}






?>