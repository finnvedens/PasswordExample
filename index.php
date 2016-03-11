<?php
//We are going to use session variables to check our log in state...
session_start();


/***Website variables****/
$title="Top Secret Stuff";

require_once("header.php");

/***Vary content depending on Get.....***/

//Check to see if the page get variable is set
if(isset($_GET['page'])&&$_GET['page']!=""){
    //if it is we store it in a local variable
    $page=$_GET['page'];
    //Check to see if that file actually exists in our view folder....then load it.
    if(file_exists("views/{$page}.php")) {
        require_once("views/{$page}.php");
    }
    else require_once("views/home.php");
}
else require_once("views/home.php");


require_once("footer.php");
