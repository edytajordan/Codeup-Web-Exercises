<?php 
require_once '../Auth.php';
require_once '../Input.php';

session_start();

function pageController()
{
    function clearSession()
    {
        Auth::logout();

        header('Location:/login.php');
        exit();   
    }  

    clearSession();      
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