<?php  
    // These are the credentials to access the database 
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'parks_db');
    define('DB_USER', 'parks_user');
    define('DB_PASS', 'ParksDBPassword123');

    // These are the files I need to connect to the MySQL database and to access PHP functions that I use frequently
    require_once '../db_connect.php';
    require_once '../Input.php';

    $userInput= [];
    $allInput = array_merge($userInput, $_POST);

    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>National Parks Form</title>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="/css/national-park.css">
        <!-- Compiled and minified Materialize CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    </head>
    <body>
        <h1>Enter Your Favorite National Park</h1>

        <form method="POST" action="national_parks_form.php">
            <div class="input-field">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Park Name">   
            </div>
            
            <div class="input-field">
                <label for="date_established">Date Established</label>
                <input type="text" name="date_established" placeholder="YYYY-MM-DD">    
            </div>
            
            <div class="input-field">
                <label for="area_in_acres" >Area in Acres</label>
                <input type="text" name="area_in_acres" placeholder="Park Area">    
            </div>
            
            <div class="input-field">
                <label for="description">Description</label>
                <input type="text" name="description" placeholder=" Park Description">
            </div>
            
            <button type="submit">Submit Your Park Info</button>
        </form>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <!-- Compiled and minified Materialize JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    </body>
</html>