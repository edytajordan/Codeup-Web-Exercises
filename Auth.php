<?php  
require_once '../Log.php';

class Auth
{
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
    
    public static function attempt($username, $password)
    {
        $log = new Log;

        if ($username == 'guest' && password_verify($password, self::$password)) {
        // This starts a session and assigns the session key to the username 
        $_SESSION['logged_in_user'] = $username;

        $log->info('User {$username} logged in'.PHP_EOL);

        return true;
        
        } elseif ($username !== '') {
            return false; 
            $log->error('User {$username} failed to login'.PHP_EOL);
        }
    }

    public static function check()
    {
        if (isset($_SESSION['logged_in_user'])) {
            return true;
            
        } else {
            return false; 
        }
    }

    public static function user()
    {
        if (isset($_SESSION['logged_in_user'])) {
            // This redirects the user to the login.php page if they aren't already logged in
            return $_SESSION['logged_in_user'];
        }
    }

    public static function logout()
    {
        // clear $_SESSION array
        session_unset();

        // delete session data on the server
        session_destroy();

        // ensure client is sent a new session cookie
        session_regenerate_id(true);

        // start a new session - session_destroy() ended our previous session so

        // if we want to store any new data in $_SESSION we must start a new one
        session_start();

        
    }    
}
?>