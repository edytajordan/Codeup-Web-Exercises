<?php 
require_once '../functions.php';
require_once 'Auth.php';
require_once 'Input.php';

session_start();

function pageController () 
{
    
    Auth::logout();
}

extract(pageController());
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>
    <h1>Logout</h1>
</body>
</html>