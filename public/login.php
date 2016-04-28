<?php 
function pageController ()
{
    // These variables check to see if a username or password has been inputted into the form 
    // Otherwise, the input is set to an empty string on page load 
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    // This is the initial message displayed on the page 
    $message = 'Please Log In';

    // This starts my session
    session_start();

    if (isset($_SESSION['logged_in_user'])) {
        // This redirects the user to the authorized.php page if they are already logged in
        header('Location:/authorized.php');
        exit();
    }
    
    if ($username == 'guest' && $password == 'password') {
        // This starts a session and assigns the session key to the username 
        $_SESSION['logged_in_user'] = $username;

        // This redirects the user to the authorized.php page if they enter the correct login information 
        header('Location:/authorized.php');
        exit();
        
    } elseif ($username !== '') {
        $message = 'Login Failed!';
    }
    
    return ['message' => $message];
    
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