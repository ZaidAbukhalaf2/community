<?php

include_once "obj_project.php";

class User extends obj_project {

    public static $table_name = "users";
    protected static $db_table_fields = array("username", "email", "password", "first_name", "last_name", "skills","about_me",  "linkedin", "github", "type_user", "status", "phone_number","birth_date","commuinty_id","img","background_img");
    public $id;
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $phone_number;
    public $skills;
    public $about_me;
    public $birth_date;
    public $linkedin;
    public $github;
    public $status = "Ofline";
    public $type_user = "student";   
    public $commuinty_id;
    public $img;
    public $background_img;

    public $tmpe = "background_img/";
    public $file_namee="background_img/";
    public $tmp = "../image/";
    public $file_name="image/";


    public function start_upload(){

        $this->img = basename($_FILES['image']['name']);
        $this->file_name = $_FILES["image"]["name"];
        $this->tmp=$_FILES["image"]["tmp_name"];
    
        if(move_uploaded_file($this->tmp,"image/". $this->file_name)){
        
            // echo "done";
    }else{
        // echo "error";
        }
    }

    public function image_path_placeholder(){


        return empty($this->img)? $this->tmp : $this->file_name .DS. $this->img;
    }
    public function startt_upload(){

        $this->background_img = basename($_FILES['background_img']['name']) ;
        $this->file_namee = $_FILES["background_img"]["name"];
        $this->tmpe=$_FILES["background_img"]["tmp_name"];
        
        
        if(move_uploaded_file($this->tmpe,"background_img/". $this->file_namee)){
            
    }else{
        echo "error";
        }
    }   
    
    public function images_path_placeholder(){


        return empty($this->background_img)? $this->tmpe : $this->file_namee .DS. $this->background_img;
    }
   
    public static function verify_user($email,$password){

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


    public function comm(){
        $Commuinty1=Commuinty::find_by_id($this->commuinty_id);
        return $Commuinty1->name;

    }

public function user_online(){
        $users=User::find_by_id($this->id);
        return $users->image_path_placeholder();
    }

}







