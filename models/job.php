<?php
include_once "obj_project.php";


class job extends obj_project {
public static $table_name="job";
protected static $db_table_fields =array("name_job","job_discribtion","img","company_name","time","city","date");
public $id;
public $name_job;
public $job_discribtion;
public $img;
public $company_name;
public $time;
public $city;
public $date;

public $tmp = "../manager/img/";
public $file_name="manager/img/" ;



    public function start_upload(){

        $this->img = basename($_FILES['img']['name']);
        $this->file_name = $_FILES["img"]["name"];
        $this->tmp=$_FILES["img"]["tmp_name"];

        
        if(move_uploaded_file($this->tmp,"../manager/img/". $this->file_name)){
            // echo $this->tmp;
            // echo "done";
    }else{
        echo "error";
        }
    }

    public function image_path_placeholder(){


        return empty($this->img)? $this->tmp : $this->file_name .DS. $this->img;
    }

    public function jopimg(){
        $jop=job::find_by_id($this->id);
        return $jop->image_path_placeholder();
    }
  


}
?>