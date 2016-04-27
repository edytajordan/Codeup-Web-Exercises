<?php 
    
    function pageController () 
    {
       $favoriteThings = ['books', 'pajamas', 'Game of Thrones', 'napping', 'drank']; 
       
        $thingArray['favoriteThings'] = $favoriteThings;
        return $thingArray;
    }

    extract(pageController());

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
    <div class="col s12 m4 l2"></div>
    <div class="container col s12 m4 l8">
        <h1>Favorite Things Assignment</h1>
        <table class="highlight z-depth-5 col s12 m4 l8">
            <tr>
                <th class="flow-text">My Favorite Things</th>
            </tr>
                <?php foreach ($favoriteThings as $thing): ?>
                    <tr>
                        <td class="flow-text"> 
                         <?= $thing; ?>
                    
                        </td>
                    </tr>
                <?php endforeach;  ?>
        </table>   
    </div>
    <div class="col s12 m4 l2"></div>
 
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>   
</body>
</html>