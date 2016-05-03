<?php 
require_once '../functions.php';
require_once 'Auth.php';
require_once 'Input.php';

function pageController ()
{
    // These variables check to see if a username or password has been inputted into the form 
    // Otherwise, the input is set to an empty string on page load 
    $username = Input::get('username');
    $password = Input::get('password');
    
    // This is the initial message displayed on the page 
    $message = 'Please Log In';

    // This starts my session
    session_start();

    Auth::attempt($username, $password);
    
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
    </head>
    <body>
        <p><?= $message;  ?></p>

        <form method="POST">
            <label>Username</label>
            <input type="input" name="username" placeholder="Insert Your Username"></input>
            <label>Password</label>
            <input type="input" name="password" placeholder="Insert Your Password"></input>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>