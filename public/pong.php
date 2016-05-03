<?php 
require_once '../Input.php';

function pageController () 
{
    $miss = false;
    
    if (!inputHas('count') {    
        $count = 0;
    } else {
        $count = inputGet('count');

        if ($count == 0) {
            $miss = true;
        }
    }

    return ['count' => $count,  'miss' => $miss];
}

extract(pageController());
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pong</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <link rel="stylesheet" href="/css/ping-pong.css">
    </head>
    <body>
        <div class="col s12 m4 l2"></div>

        <div class="col s12 m4 l8">
            <span class="flow-text">
                <a class="content col s12 m4 l8" href="/ping.php?count=<?=$count+1?>">HIT</a>
                <a  class="content col s12 m4 l8" href="/ping.php?count=0">MISS</a>
                
                <h1 class="content col s12 m4 l8">Counter <?=$count ?></h1>

                <p class="content col s12 m4 l8" id="hit"></p>

                <p class="content col s12 m4 l8"id="miss"></p>

                <?php if ($count != 0): ?>
                    <img src="/img/serena.gif">
                <?php endif; ?>

                <?php if ($miss): ?>
                    <img src="/img/dikembe.gif">
                <?php endif; ?>
            </span>
        </div>
        
        <div class="col s12 m4 l2"></div>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    </body>
</html>