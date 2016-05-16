<?php  
    // These are the credentials to access the database 
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'parks_db');
    define('DB_USER', 'parks_user');
    define('DB_PASS', 'ParksDBPassword123');
    
    // These are the files I need to connect to the MySQL database and to access PHP functions that I use frequently
    require_once '../db_connect.php';
    require_once '../Input.php';

    // These are the variables I use throughout my script 
    $page = Input::get('page');
    $limit = 4; 
    $offset = $limit * $page;
    $parkTotal = $dbc->query("SELECT count(*) FROM national_parks")->fetchColumn();
    $maxPage = ($parkTotal/$limit)-1;

    // This code creates my database query
    $query = $dbc->prepare("SELECT * FROM national_parks limit :limit offset :offset");
    $query->bindValue(':limit', $limit, PDO::PARAM_INT);
    $query->bindValue(':offset', $offset, PDO::PARAM_INT);
    $query->execute();

    // The following code pulls all of the data from the database and puts it into an array that I can use 

    $parks = [];

    while($park = $query->fetch(PDO::FETCH_ASSOC)){
        $parks[] = $park;
    };
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>National Parks</title>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="/css/national-park.css">
        <!-- Compiled and minified Materialize CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    </head>
    <body>
        <h1><img src="/img/nps_logo.png"> National Parks</h1>

        <div class="col s12 m4 l2"></div>
        <div class=" container col s12 m4 l8">
            <table class="bordered col s12 m4 l8">
                <tr>
                    <th class="flow-text">ID</th>
                    <th class="flow-text">Name</th> 
                    <th class="flow-text">Date Established</th>
                    <th class="flow-text">Area in Acres</th>
                    <th class="flow-text">Description</th>  
                </tr>
                <!-- This code puts the park data into the correct column based on the key in the associative array I created earlier -->
                <?php foreach ($parks as $park): ?>
                    <tr>
                        <td class="flow-text">
                            <?= $park['id'];  ?>
                        </td>
                        <td class="flow-text">
                            <?= $park['name']; ?>
                        </td>
                        <td class="flow-text">
                            <?= $park['date_established']; ?>
                        </td>
                        <td class="flow-text">
                            <?= $park['area_in_acres']; ?>
                        </td> 
                        <td class="flow-text">
                            <?= $park['description']; ?>  
                        </td> 
                    </tr>  
                <?php endforeach; ?>
            </table>  

            <!-- This code controls when/if I see the Previous Page and Next Page Links -->
            <?php if ($page > 0): ?>
                <a href="/national_parks.php?page=<?= $page-1?>">Previous Page | </a>
            <?php endif; ?>
               
            <?php if ($page < $maxPage): ?>
                 <a href="/national_parks.php?page=<?=$page+1?>">Next Page</a>
            <?php endif; ?>     
        </div> 
        <div class="col s12 m4 l2"></div>
        
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <!-- Compiled and minified Materialize JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    </body>
</html>