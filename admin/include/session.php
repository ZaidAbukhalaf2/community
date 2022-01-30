<?php

class Session {

    private $signed_in = false;
    public  $admin_id;
    public  $sess_name;
    public  $message;

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

    public function login($admin){


        if ($admin){

            $this->admin_id = $_SESSION['admin_id'] = $admin->id;
            $this->signed_in = true;
        }
    }

    public function logout(){

        unset($_SESSION['admin_id']);
        unset($this->admin_id);
        $this->signed_in=false;

    }
    //check login
    private function check_the_login(){

        if(isset($_SESSION['admin_id'])){


            
            
        $this->signed_in = true; 
    
    }else{

        unset($this->admin_id);
        $this->signed_in = false;
    }

    }

}

$session = new Session();


?>