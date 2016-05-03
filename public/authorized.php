<?php 
require_once '../Auth.php';
require_once '../Input.php';

session_start();

function pageController()
{
    if (!Auth::check()) {
        header('Location:/login.php');
        exit();
    }
    
    Auth::user();    
}   
    
$logged_in_user = pageController();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Authorized</title>
    </head>
    <body>
        <h1>Authorized <?= Auth::user(); ?></h1>
        <a href="/logout.php">Logout</a>
    </body>
</html>