<?php


function sanitizeFormPassword($input){
$input = strip_tags($input);
return $input ;
}


function sanitizeFormString($input){
    $input = strip_tags($input);
    $input = str_replace(" ","",$input);
    $input = ucfirst(strtolower($input));   
    return $input;
}


function sanitizeFormUsername($input){
$input  = strip_tags($input);
$input = str_replace(" ","",$input);
return $input;
}

if(isset($_POST['registerButton'])){
    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $password = sanitizeFormPassword($_POST['password']);
    $confPassword = sanitizeFormPassword($_POST['confPassword']);   
    
    $wasSuccessful = $account->register($username,$firstName,$lastName,$email,$password,$confPassword);

    if($wasSuccessful){
        $_SESSION["userLoggedIn"] = $username;
        header("Location:index.php");
    }

}



?>