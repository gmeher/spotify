 
 
 
 <?php

// function sanitizeFormPassword($input){
//     $input = strip_tags($input);
//     return $input ;
//     }

// function sanitizeFormUsername($input){
//         $input  = strip_tags($input);
//         $input = str_replace(" ","",$input);
//         return $input;
//     }
        

if(isset($_POST['loginButton'])){
    //$username = sanitizeFormUsername($_POST['loginUsername']);
    $username = $_POST['loginUsername'];
    $username = sanitizeFormUsername($username);
    $password = $_POST['loginPassword'];
    $password = sanitizeFormPassword($password);

    $result = $account->login($username,$password);
    if($result){
        $_SESSION["userLoggedIn"] = $username;
        header("Location:index.php");
        echo "hello  successful";
    }
}

?>