<?php 
require_once '../functions.php';
require_once 'Auth.php';
require_once 'Input.php';

session_start();

function pageController ()
{
    if (! isset($_SESSION['logged_in_user'])) {
        // This redirects the user to the login.php page if they aren't already logged in
        header('Location:/login.php');
        exit();
    } 

    return['username' => $_SESSION['logged_in_user']];
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