<?php 
function pageController ()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error = 'ERROR'.PHP_EOL;

    if ($username == 'guest' && $password == 'password') {
        header('Location:/authorized.php');
        exit();
    } else {
        return ['error' => $error];
    }
    
}

$error = '';

if ($_POST) {
    extract(pageController());
} 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
    </head>
    <body>
        <p><?= $error;  ?></p>
        
        <form method="POST">
            <label>Username</label>
            <input type="input" name="username" placeholder="Insert Your Username"></input>
            <label>Password</label>
            <input type="input" name="password" placeholder="Insert Your Password"></input>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>