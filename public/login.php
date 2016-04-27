<?php 
function pageController ()
{

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
        <form>
            <label>Username</label>
            <input type="input" name="username" placeholder="Insert Your Username"></input>
            <label>Password</label>
            <input type="input" name="password" placeholder="Insert Your Password"></input>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>