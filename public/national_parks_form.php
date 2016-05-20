<?php  


    // These are the files I need to connect to the MySQL database and to access PHP functions that I use frequently
    require_once '../park_db_credentials.php';
    require_once '../db_connect.php';
    require_once '../Input.php';

    $errors = [];

    if (! empty($_POST)) {

        $userInput = $dbc->prepare("INSERT INTO national_parks(name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)");

        try {
            $userInput->bindValue(':name', Input::getString('name'));


        }catch (InvalidArgumentException $e1){
            array_push($errors, $e1->getMessage());
        }catch (Exception $e1){
            array_push($errors, $e1->getMessage());
        }

        try {
            $userInput->bindValue(':location', Input::getString('location'));   
        } catch (InvalidArgumentException $e2){
            array_push($errors, $e2->getMessage());        
        }catch(Exception $e2){
            array_push($errors, $e1->getMessage());
        }
        
        try {
            $userInput->bindValue(':date_established', Input::getDate('date_established'));  
                
        } catch (Exception $e3) {
            array_push($errors, $e3->getMessage());            
        }catch(Exception $e3){
            array_push($errors, $e1->getMessage());
        }   
        
        try {
            $userInput->bindValue(':area_in_acres', Input::getNumber('area_in_acres'));        
        } catch (InvalidArgumentException $e4) {
            array_push($errors, $e4->getMessage());         
        }catch(Exception $e4){
            array_push($errors, $e1->getMessage());
        }   
        
        try {
            $userInput->bindValue(':description', Input::getString('description'));       
        } catch (InvalidArgumentException $e5) {
            array_push($errors, $e5->getMessage());       
        }catch(Exception $e5){
            array_push($errors, $e1->getMessage());
        }   

        if (empty($errors)) {
            $userInput->execute(); 
        }
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
            <?php if (! empty($errors)){ ?> 
                <p><?php var_dump($errors); ?></p>
            <?php } ?>

            <form class=" container col s12 m4 l8" method="POST" action="national_parks_form.php">
                <div class="input-field">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Park Name" value="<?= !empty($errors) ? Input::get('name') : '' ?>">   
                </div>

                <div class="input-field">
                    <label for="location">Location</label>
                    <input type="text" name="location" placeholder="Park Location"value="<?= !empty($errors) ? Input::get('location') : '' ?>">
                 </div>
                
                <div class="input-field">
                    <label for="date_established">Date Established</label>
                    <input type="text" name="date_established" placeholder="YYYY-MM-DD" value="<?= !empty($errors) ? Input::get('date_established') : '' ?>">    
                </div>
                
                <div class="input-field">
                    <label for="area_in_acres" >Area in Acres</label>
                    <input type="text" name="area_in_acres" placeholder="Park Area" value="<?= !empty($errors) ? Input::get('area_in_acres') : '' ?>">    
                </div>
                
                <div class="input-field col s12">
                    <label for="description">Description</label>
                    <textarea class="materialize-textarea" name="description" placeholder="Park Description" value="<?= !empty($errors) ? Input::get('description') : '' ?>"></textarea>
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