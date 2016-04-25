<?php 
    $nouns = ['cat', 'dog', 'fish', 'reptile', 'bird', 'amphibian', 'sock', 'shoe', 'pants', 'shirt'];

    $adjectives = ['big', 'small', 'red', 'blue', 'happy', 'sad', 'short', 'tall', 'fat', 'skinny'];
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Server Generator</title>
    </head>
    <body>
        <?php  
            $randomNoun = mt_rand(0, count($nouns) - 1);
            $randomAdjective = mt_rand(0, count($adjectives) - 1);
        ?>
        <p><?php echo $adjectives[$randomAdjective].' '.$nouns[$randomNoun] ?></p>


    </body>
</html>