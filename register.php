<?php
include("include/config.php");
include("include/classes/errorConstant.php");
include("include/classes/Account.php");

$account = new Account($con);

include("include/handlers/register-handler.php");
include("include/handlers/login-handler.php");

function getInputValues($name){
    if(isset($_POST[$name])){
        echo $_POST[$name] ;
    }
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WelCome to spotify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    
    <link rel="stylesheet" href="include/Assets/css/registers.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
</head>

<body>
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form action="register.php" method="post" id="loginForm">
                <h2>login to your account</h2> 

                <span id="errorMesssage"><?php echo $account->getError(Errorconstant::$invalidLoginDetails);?></span>
                
                <p>
                    <label for="loginUsername"> Username</label>
                    <input type="text" id="loginUsername" name="loginUsername"  value = "<?php getInputValues('loginUsername') ?> " required />
                    
                    
                    
                </p>
                <p>
                    <label for="loginPassword"> Password</label>
                    <input type="Password" id="loginPassword" name="loginPassword" required/>   
                    
                   
                </p>
                <input type="submit" id="loginButton" value="LogIn" name="loginButton" />
                </form>

            


<!--             
                <form action="register.php" method="post" id="registerForm">
                <h2>Create your free acccount</h2>
                <p> 
                    <?php echo $account->getError(Errorconstant::$errorUsername); ?>
                    <?php echo $account->getError(Errorconstant::$usernameExist); ?>
                    <label for="username"> Username</label>
                    <input type="text" id="username" name="username" value = "<?php getInputValues('username') ?>" required/>
                </p>
                <p>
                <?php echo $account->getError(Errorconstant::$errorFirstName); ?>
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" required value = "<?php getInputValues('firstName') ?>" />
                </p>
                <?php echo $account->getError(Errorconstant::$errorLastName); ?>
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" required value = "<?php getInputValues('lastName') ?>" />
                </p>
                <p>
                <?php echo $account->getError(Errorconstant::$errorEmail); ?>
                <?php echo $account->getError(Errorconstant::$emailExist); ?>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required value = "<?php getInputValues('email') ?>" />
                </p>
                <p>
                <?php echo $account->getError(Errorconstant::$errorPasswordLength); ?>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required value = "<?php getInputValues('password') ?>"/>
                </p>
                <p>
                <?php echo $account->getError(Errorconstant::$passwordDoNotMatch); ?>
                    <label for="confPassword">Confirm Password</label>
                    <input type="password" id="confPassword" name="confPassword" required value = "<?php getInputValues('confPassword') ?>" />
                </p>
                <input type="submit" id="registerButton" value="Signup" name="registerButton" />
                </form>


                ---------------------------------------------------------------------- -->


                                
               
<!-- Material form register -->
<form action="register.php" method="post" id="registerForm">

<p class="h4 text-center mb-4">Create your free acccount</p>

<!-- Material input text -->

<div class="md-form">
        <?php echo $account->getError(Errorconstant::$errorUsername); ?>
        <?php echo $account->getError(Errorconstant::$usernameExist); ?>
    <i class="fa fa-user prefix grey-text"></i>
    <input type="text" name="username" value = "<?php getInputValues('username') ?>" required class="form-control">
    <label for="materialFormRegisterNameEx">User name</label>
</div>


<div class="md-form">
<?php echo $account->getError(Errorconstant::$errorFirstName); ?>
    <i class="fa fa-user prefix grey-text"></i>
    <input type="text" id="materialFormRegisterNameEx" class="form-control" name="firstName" required value = "<?php getInputValues('firstName') ?>">
    <label for="materialFormRegisterNameEx"> first Name</label>
</div>


<div class="md-form">
<?php echo $account->getError(Errorconstant::$errorLastName); ?>
    <i class="fa fa-user prefix grey-text"></i>
    <input type="text" id="materialFormRegisterNameEx" class="form-control" name="lastName" required value = "<?php getInputValues('lastName') ?>">
    <label for="materialFormRegisterNameEx"> Last Name</label>
</div>

<!-- Material input email -->
<div class="md-form">
    <i class="fa fa-envelope prefix grey-text"></i>
    <?php echo $account->getError(Errorconstant::$errorEmail); ?>
    <?php echo $account->getError(Errorconstant::$emailExist); ?>
    <input type="email" id="materialFormRegisterEmailEx" class="form-control" name="email" required value = "<?php getInputValues('email') ?>" >
    <label for="materialFormRegisterEmailEx">Email</label>
</div>

<!-- Material input email -->


<!-- Material input password -->
<div class="md-form">
<?php echo $account->getError(Errorconstant::$errorPasswordLength); ?>

    <i class="fa fa-lock prefix grey-text"></i>
    <input type="password" id="materialFormRegisterPasswordEx" class="form-control" name="password" required value = "<?php getInputValues('password') ?>">
    <label for="materialFormRegisterPasswordEx">Your password</label>
</div>

<div class="md-form">
    <i class="fa fa-lock prefix grey-text"></i>
    <?php echo $account->getError(Errorconstant::$passwordDoNotMatch); ?>
    <input type="password" id="materialFormRegisterPasswordEx" class="form-control" name="confPassword" required value = "<?php getInputValues('confPassword') ?>" >
    <label for="materialFormRegisterPasswordEx">confirm password</label>
</div>

<div class="text-center mt-4">
    
    <input type="submit" id="registerButton"  class="btn btn-primary" value="Signup" name="registerButton" />
</div>
</form>
<!-- Material form register -->
                  
                                    
            </div>
        </div>
    </div>


    <?php
    
    if(isset($_POST['loginUsername'])){
        echo "<script>


        document.getElementById('

        </script>";
    }
    
    ?>



   
        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
                    
    <script src="include/Assets/js/register.js"></script>


</body>

</html>