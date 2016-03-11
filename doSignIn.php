<?php

include_once('details.php');

$inputEmail=$_POST['inputEmail'];
$inputPassword=$_POST['inputPassword'];

$dsn=("mysql:host={$host};dbname={$dbname}");

$dbh=new PDO($dsn,$username,$password);

$result=$dbh->query("SELECT * FROM users WHERE email='$inputEmail' AND password='$inputPassword'");

print_r($dbh->errorInfo());

foreach($result as $row){

    echo $row['email'];
}




