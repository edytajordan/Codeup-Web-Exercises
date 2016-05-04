<?php 

require_once '../Input.php';

// This starts my session
session_start();

function gameStart()
{
    // This is checking to see if a session has been set on the min
    if (isset($_SESSION['min'])) {
        $min = $_SESSION['min'];
        echo "The min is: {$min}".PHP_EOL;
    }else {
        $min = Input::has('min') ? Input::get('min'): '1';
        $_SESSION['min'] = $min;
        echo "The min is: {$min}".PHP_EOL;
    }

    // This is checking to see if a session has been set on the max
    if (isset($_SESSION['max'])) {
        $max = $_SESSION['max'];
        echo "The max is: {$max}".PHP_EOL;
    } else {
        $max = Input::has('max') ? Input::get('max'): '100';
        $_SESSION['max'] = $max;
        echo "The max is: {$max}".PHP_EOL;
    }
    
    // This allows the user to set the min and max range for the random number
    if (ctype_digit($min) && ctype_digit($max)) {
        echo 'setting random num!';  

        // This is checking to see if a session has been set on the random number
        if (isset($_SESSION['random_num'])) {
           $randomNum =$_SESSION['random_num'];
            echo "The random number is: {$randomNum}".PHP_EOL;
        } else {
            $randomNum = mt_rand((int)$min, (int)$max);
            $_SESSION['random_num'] = $randomNum;
            echo "The random number is: {$randomNum}".PHP_EOL;
        }
        
    } 
}

// this defines my function that initializes and facilitates the game 
function gamePlay($min, $max, $randomNum) {
    
    // This message displays when the game starts
    $message = "Guess a number between {$min} and {$max}".PHP_EOL;

    // This variable stores the user's guess
    $userGuess = Input::get('user-guess');

    if ($userGuess == $randomNum) {

        //This message displays if the user guesses correctly 
        $message = "GOOD GUESS! Do you want to play again?".PHP_EOL;

    } elseif ($userGuess > $randomNum) {

        // This message displays if the user guesses too high
        $message = "Too high. Try again...".PHP_EOL;

    } else {

        //This message displays if the user guesses too low
        $message = "Too low. Try again...".PHP_EOL;
        
    }

    return $message;
}

function pageController()
{
    // This is my session ID
    $sessionID = session_id();

    // I am assigning an empty string to my page. This will change based on certain conditions 
    $message = '';

    if (isset($_POST['start'])) {

     gameStart();

    }

    if (isset($_POST['guess'])) {
         // This starts the game 
        $message = gamePlay($_SESSION['min'], $_SESSION['max'], $_SESSION['random_num']);

    }

    if (isset($_POST['restart'])) {
        // clear $_SESSION array
        session_unset();

        // delete session data on the server
        session_destroy();

        // ensure client is sent a new session cookie
        session_regenerate_id(true);

        // start a new session - session_destroy() ended our previous session so

        // if we want to store any new data in $_SESSION we must start a new one
        session_start();

        $message = 'Please choose a new min and max'.PHP_EOL;

    }

    return ['message' => $message];
}

$message ='';

if (!empty($_POST)) {
    extract(pageController());
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>High-Low Game</title>
    </head>
    <body>
        <h1>High-Low Game</h1>
        <h2><?= $message; ?></h2>

        <form id="min-max" method="POST">
            <input type="text" name="min" id="min" placeholder="Input Minimum"></input>
            <label for="min">Min</label>
            <input type="text" name="max" id="max" placeholder="Input Maximum"></input>
            <label for="max">Max</label>
            <button type="submit" name="start">Submit</button>
        </form>

        <form id="user-guess" method="POST">
            <input type="text" name="user-guess" id="user-guess" placeholder="Insert Your Guess"></input>
            <label for="user-guess">Insert Your Guess</label> 
            <button type="submit" name="guess">Submit</button>  
        </form>

        <form id="play-again" method="POST">
            <button type="submit" name="restart">Restart</button>   
        </form>
        
    </body>
</html>