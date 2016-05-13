<?php  
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'parks_db');
    define('DB_USER', 'parks_user');
    define('DB_PASS', 'ParksDBPassword123');
    
    require_once '../db_connect.php';

        $stmt = $dbc->query('SELECT * FROM national_parks');

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
    </body>
</html>