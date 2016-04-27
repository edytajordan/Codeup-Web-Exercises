<?php 
function pageController ()
{
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $message = 'Please Log In';

    if ($username == 'guest' && $password == 'password') {
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