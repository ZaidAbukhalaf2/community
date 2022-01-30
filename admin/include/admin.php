<?php 

include "obj_project.php";

class Admin extends obj_project {
    public static $table_name = "admin";
    protected static $db_table_fields = array("username", "email", "password", "image");
    public $id;
    public $username;
    public $email;
    public $password;
    public $image;



    
    public static function verify_admin($email,$password){

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

