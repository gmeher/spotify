<?php

include("include/config.php");

if(isset($_SESSION["userLoggedIn"])){
    $username = $_SESSION["userLoggedIn"];
    echo $username;
}
else{
    header("Location:register.php");
}

?>





<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WelCome to spotify</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="include/Assets/css/style.css" />
        <script src="main.js"></script>
    </head>

    <body>
        <div id="mainContainer">


            <div id="topContainer">
              
              <?php include("include/navBarContainer.php") ?>

              <div id="mainViewContainer">
                  <div id="mainContent">