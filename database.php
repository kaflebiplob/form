<?php
$hostName = "";
$dbUser = "root";
$dbPassword = "";
$dbName = "login_register";
$connection = mysqli_connect($hostName,$dbUser,$dbPassword,$dbName);

if(!$connection){
    die("somenthing went wrong");

}else{

}
?>