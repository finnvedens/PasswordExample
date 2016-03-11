<?php
//Start session
session_start();
include_once('details.php');

$inputEmail=$_POST['inputEmail'];
$inputPassword=$_POST['inputPassword'];

$dsn=("mysql:host={$host};dbname={$dbname}");

$dbh=new PDO($dsn,$username,$password);

$result=$dbh->query("SELECT * FROM users WHERE email='$inputEmail' AND password='$inputPassword'");

$userInfo=$result->fetch(PDO::FETCH_ASSOC);

if($userInfo) {

    $_SESSION['username'] = $userInfo['username'];
    $_SESSION['firstName'] = $userInfo['firstName'];
    $_SESSION['lastName'] = $userInfo['lastName'];
    $_SESSION['email'] = $userInfo['email'];

    header('Location:index.php');
}
else { echo "User details incorrect";}






