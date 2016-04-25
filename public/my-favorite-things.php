<?php 
    $favoriteThings = ['books', 'pajamas', 'Game of Thrones', 'napping', 'drank'];  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Favorite Things</title>
</head>
<body>
    
        <table>
            <tr>
                <th>My Favorite Things</th>
            </tr>
                <?php foreach ($favoriteThings as $thing) { ?>
                    <tr>
                        <td> 
                         <?php echo $thing; ?>
                    
                        </td>
                    </tr>
                <?php }  ?>
        </table>
    
</body>
</html>