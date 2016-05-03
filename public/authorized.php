<?php 
require_once '../functions.php';
require_once 'Auth.php';
require_once 'Input.php';

session_start();

function pageController ()
{
    Auth::user();
}
extract(pageController());
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Authorized</title>
    </head>
    <body>
        <h1>Authorized <?=$username;?></h1>
        <a href="/logout.php">Logout</a>
    </body>
</html>