<?php

class Account{
    private $errorArray;
    private $con;
    public function __construct($con){
        $this->errorArray = array();
        $this->con = $con;
    }

    public function register($un,$fn,$ln,$em,$pw,$cpw){
        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmail($em);
        $this->validatePassword($pw,$cpw);

        if(empty($this->errorArray)){
            //-------insert to db--------
            
            return $this->insertUserDetails($un,$fn,$ln,$em,$pw);
            
        }
        else{
            return false;
        }
    }


    public function login($un, $pw){
        $pw = md5($pw);
        $loginQuery = mysqli_query($this->con,"SELECT * FROM users WHERE username = '$un' AND password = '$pw'");
        if(mysqli_num_rows($loginQuery) == 1){
            return true;
        }
        else {
            array_push($this->errorArray,Errorconstant::$invalidLoginDetails);
            return false;
        }
    }

    public function getError($error){
        if(!in_array($error,$this->errorArray)){
            $error = "";
        }
        return "<span class='errorMesssage'>$error</span>";
    }


    private function insertUserDetails($un,$fn,$ln,$em,$pw){
       $encryptedPW = md5($pw);
       $date = date("Y-m-d");
       $profilepic = "assets/Images/profile-pic/p1.png";

       $result = mysqli_query($this->con,"INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$encryptedPW','$date','$profilepic')");
       return result;

    }

    private function validateUsername($un){
        if(strlen($un) > 25 || strlen($un) < 5){
            array_push($this->errorArray,Errorconstant::$errorUsername);
            return;
        }


        $checkUsernameQuery = mysqli_query($this->con,"SELECT username FROM users WHERE username = '$un' ");
        if(mysqli_num_rows($checkUsernameQuery) != 0){
            array_push($this->errorArray,Errorconstant::$usernameExist);
            return;
        }
 
        //  TODO::: check if username exist-----------------------------------
    }
    private function validateFirstName($fn){
        if(strlen($fn)>25 || strlen($fn)<2){
            array_push($this->errorArray,Errorconstant::$errorFirstName);
            return;
        }
    }
    private function validateLastName($ln){
        if(strlen($ln)>25 || strlen($ln)<2){
            array_push($this->errorArray,Errorconstant::$errorLastName);
            return;
        }
    }
    private function validateEmail($em){
        if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
            array_push($this->errorArray,Errorconstant::$errorEmail);
            return;
        }
        //-------------TODO::check if email is already used------------------------
        $checkEmailQuery = mysqli_query($this->con,"SELECT username FROM users WHERE email = '$em' ");
        if(mysqli_num_rows($checkEmailQuery) != 0){
            array_push($this->errorArray,Errorconstant::$emailExist);
            return;
        }
    
    }
    private function validatePassword($pw,$cpw){
        if($pw != $cpw){
            array_push($this->errorArray,Errorconstant::$passwordDoNotMatch);
            return;
        }
        // if(preg_match('/[^A-Za-z0-9]/',$pw){
        //     array_push($this->errorArray,"password doesn't match");
        //     return;
        // }
        if(strlen($pw)>15 || strlen($pw)<6){
            array_push($this->errorArray,Errorconstant::$errorPasswordLength);
            return;
        }
    }


}

?>