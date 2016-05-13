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
    $limit = '4'; 
    $offset = $limit * $page;
    $parkTotal = $dbc->query("SELECT count(*) FROM national_parks")->fetchColumn();
    $maxPage = ($parkTotal/$limit)-1;
    $query = "SELECT * FROM national_parks LIMIT {$limit} OFFSET {$offset}";

    // The following code pulls all of the data from the database and puts it into an array that I can use 
    $stmt = $dbc->query($query);

    $parks = [];

    while ($park = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $parks[] = $park;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>National Parks</title>
    </head>
    <body>
        <h1>National Parks</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th> 
                <th>Date Established</th>
                <th>Area in Acres</th>  
            </tr>
            <!-- This code puts the park data into the correct column based on the key int he associative array i created earlier -->
            <?php foreach ($parks as $park): ?>
                <tr>
                    <td>
                        <?= $park['id'];  ?>
                    </td>
                    <td>
                        <?= $park['name']; ?>
                    </td>
                    <td>
                        <?= $park['date_established']; ?>
                    </td>
                    <td>
                        <?= $park['area_in_acres']; ?>
                    </td>  
                </tr>  
            <?php endforeach; ?>
        </table>

        <!-- This code controls when/if I see the Previous Page and Next Page Links -->
        <?php if ($page > 0): ?>
            <a href="/national_parks.php?page=<?= $page-1?>">Previous Page</a>
        <?php endif; ?>
           

        <?php if ($page < $maxPage): ?>
             <a href="/national_parks.php?page=<?=$page+1?>">Next Page</a>
        <?php endif; ?>
    </body>
</html>