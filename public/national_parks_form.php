<?php  


    // These are the files I need to connect to the MySQL database and to access PHP functions that I use frequently
    require_once '../park_db_credentials.php';
    require_once '../db_connect.php';
    require_once '../Input.php';

    if (! empty($_POST)) {
    
        $userInput = $dbc->prepare("INSERT INTO national_parks(name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)");

        $userInput->bindValue(':name', $_POST['name']);
        $userInput->bindValue(':location', $_POST['location']);
        $userInput->bindValue(':date_established', $_POST['date_established']);
        $userInput->bindValue(':area_in_acres', $_POST['area_in_acres']);
        $userInput->bindValue(':description', $_POST['description']);

        $userInput->execute();
    }
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

        <div class="col s12 m4 l2"></div>
        <div class=" container col s12 m4 l8">
            <form class=" container col s12 m4 l8" method="POST" action="national_parks_form.php">
                <div class="input-field">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Park Name">   
                </div>

                <div class="input-field">
                    <label for="location">Location</label>
                    <input type="text" name="location" placeholder="Park Location">
                 </div>
                
                <div class="input-field">
                    <label for="date_established">Date Established</label>
                    <input type="text" name="date_established" placeholder="YYYY-MM-DD">    
                </div>
                
                <div class="input-field">
                    <label for="area_in_acres" >Area in Acres</label>
                    <input type="text" name="area_in_acres" placeholder="Park Area">    
                </div>
                
                <div class="input-field col s12">
                    <label for="description">Description</label>
                    <textarea class="materialize-textarea" name="description" placeholder="Park Description"></textarea>
                </div>
                
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right"></i>
                </button>
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Back to National Parks
                    <a href="/national_parks.php"></a>
                </button>
            </form> 


            
        </div>
        <div class="col s12 m4 l2"></div>
        
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <!-- Compiled and minified Materialize JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    </body>
</html>