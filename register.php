<?php
session_start();
include_once('details.php');

$inputUsername=$_POST['username'];
$inputFirstName=$_POST['firstName'];
$inputLastName=$_POST['surname'];
$inputEmail=$_POST['email'];
$inputPassword=$_POST['password'];

$dsn=("mysql:host={$host};dbname={$dbname}");

$dbh=new PDO($dsn,$username,$password);


//First we need to make sure that this username/email combo doesn't already exist...

$result=$dbh->query("SELECT * FROM users WHERE email='$inputEmail' OR username='$inputUsername'");

if(!$result->rowCount()==0) {echo "A user already exists with those details. Try again.";}

else {

    $result=$dbh->exec("INSERT INTO users (username,email,firstName,lastName,password) VALUES ('$inputUsername','$inputEmail','$inputFirstName','$inputLastName','$inputPassword') ");

   // print_r ($dbh->errorInfo());

    $_SESSION['username']=$inputUsername;
    $_SESSION['firstName']=$inputFirstName;
    $_SESSION['lastName']=$inputLastName;
    $_SESSION['email']=$inputEmail;

     header("Location:index.php");
}

