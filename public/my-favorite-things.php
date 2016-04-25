<?php 
    $favoriteThings = ['books', 'pajamas', 'Game of Thrones', 'napping', 'drank'];  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Favorite Things</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <!-- My CSS Stylesheet -->
    <link rel="stylesheet" href="/css/my-favorite-things.css">
</head>
<body>
    <div class=" container col s12 m4 l2"></div>
    <div class="col s12 m4 l8">
        <table class="striped col s12 m4 l8">
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
    </div>
    <div class="col s12 m4 l2"></div>
 
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>   
</body>
</html>