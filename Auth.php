<?php  
require_once 'Log.php';

class Auth
{
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
    
    public static function $attempt($username, $password)
    {
        if ($username == 'guest' && password_verify('$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm', $password)) {
        // This starts a session and assigns the session key to the username 
        $_SESSION['logged_in_user'] = $username;

        // This redirects the user to the authorized.php page if they enter the correct login information 
        header('Location:/authorized.php');
        exit();
        
        } elseif ($username !== '') {
            $message = 'User {$username} failed to log in'.PHP_EOL;
        }
    }

    public static function $check()
    {
        if (isset($_SESSION['logged_in_user'])) {
        // This redirects the user to the authorized.php page if they are already logged in
        header('Location:/authorized.php');
        exit();
    }

    public static function $user()
    {
        if (isset($_SESSION['logged_in_user'])) {
            return $username.PHP_EOL;
        }
    }

    public static function $logout()
    {
        // clear $_SESSION array
        session_unset();

        // delete session data on the server
        session_destroy();

        // ensure client is sent a new session cookie
        session_regenerate_id();

        // start a new session - session_destroy() ended our previous session so

        // if we want to store any new data in $_SESSION we must start a new one
        session_start();

        header('Location:/login.php');
        exit();
    }    
}
?>