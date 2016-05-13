<?php  
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'parks_db');
    define('DB_USER', 'parks_user');
    define('DB_PASS', 'ParksDBPassword123');
    
    require_once '../db_connect.php';
    require_once '../Input.php';

    $page = Input::get('page');
    $limit = '4'; 
    $offset = $limit * $page;

    $query = "SELECT * FROM national_parks LIMIT {$limit} OFFSET {$offset}";

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

        <?php if ($page > 0): ?>
            <a href="/national_parks.php?page=<?= $page-1?>">Previous Page</a>
        <?php endif; ?>
            <a href="/national_parks.php?page=<?=$page+1?>">Next Page</a>
    </body>
</html>