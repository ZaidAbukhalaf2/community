<?php

include ("obj_project.php");

class Manager extends obj_project {

    public static $table_name = "manager";
    protected static $db_table_fields = array("email", "password", "first_name", "last_name","phone_number" ,"img","commuinty_id");
    public $id;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $phone_number;
    public $img;
    public $commuinty_id;
      
    public $tmp ="../admin/img";
    public $file_name="../admin/img";


    public function start_upload(){

        $this->img = basename($_FILES['img']['name']);
        $this->file_name = $_FILES["img"]["name"];
        $this->tmp=$_FILES["img"]["tmp_name"];

        
        if(move_uploaded_file($this->tmp,"../admin/img/". $this->file_name)){
            
    }else{
        echo "error";
        }
    }

    public function image_path_placeholder(){


        return empty($this->img)? $this->tmp : $this->file_name .DS. $this->img;
    }
    public static function verify_manager($email,$password){

        global $database;

        $email= $database->escape_string($email);
        $password = $database->escape_string($password);


        $sql = "SELECT * FROM ". self::$table_name. " WHERE ";
        $sql.= "email = '{$email}'";
        $sql.= "AND password = '{$password}'";
        $sql.="LIMIT 1";

        $the_result_array = self::find_by_query($sql);


        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }


}







