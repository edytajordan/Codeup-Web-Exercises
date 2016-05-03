<?php 
require_once '../Auth.php';
require_once '../Input.php';

// This starts my session
session_start();

function pageController()
{
    $message = '';
    
    // This sets my session ID
    $sessionID =session_id();

        // These variables check to see if a username or password has been inputted into the form 
        // Otherwise, the input is set to an empty string on page load 
        $username = Input::has('username') ? Input::get('username'): '';
        $password = Input::has('password') ? Input::get('password'): '';
        
        // This is the initial message displayed on the page 
        $message = 'Please Log In';

        if (Auth::check()) {
            header('Location:/authorized.php');
            exit();
        }
       
       if (!empty($_POST)) {
           if (Auth::attempt($username, $password)) {
               header('Location:/authorized.php');
                exit();
           }
       } else {
           return $message = 'User {$username} failed to log in'.PHP_EOL;
       }   
}

pageController();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
    </head>
    <body>
        <p><?=  $message; ?></p>

        <form method="POST">
            <label>Username</label>
            <input type="input" name="username" placeholder="Insert Your Username"></input>
            <label>Password</label>
            <input type="input" name="password" placeholder="Insert Your Password"></input>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>