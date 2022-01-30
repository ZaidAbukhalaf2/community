<?php

class Session {

    private $signed_in = false;
    public  $manager_id;
    public  $sess_name;
    public  $message;
    public $skills_data;

    function __construct(){
        
        session_start();
        $this->check_the_login();
        $this->check_message();

    }

    public function message($msg = ""){
        
        if(!empty($msg)){

            $_SESSION['message'] = $msg;

        }else{

            return $this->message;
        }
    }

    private function check_message(){

        if(isset($_SESSION['message'])){
            
            $this->message = $_SESSION['message'];

            unset($_SESSION['message']);

        }else{
            $this->message = "";
        }
    }

    public function is_signed_in(){

        return $this->signed_in;
    }

    public function login($manager){


        if ($manager){

            $this->manager_id = $_SESSION['manager_id'] = $manager->id;
            $this->signed_in = true;
        }
    }

    public function logout(){

        unset($_SESSION['manager_id']);
        unset($this->manager_id);
        $this->signed_in=false;

    }
    //check login
    private function check_the_login(){

        if(isset($_SESSION['manager_id'])){


            
            
        $this->signed_in = true; 
    
    }else{

        unset($this->manager_id);
        $this->signed_in = false;
    }

    }

}

$session = new Session();


?>