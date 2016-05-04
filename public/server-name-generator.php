<?php 
    require_once '../Server.php';

    function pageController () 
    {

        $server = new Server();

        $newServer = $server->serverName();

        return $newServer;
    }

    extract(pageController());
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Server Generator</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <!-- Customized CSS -->
        <link rel="stylesheet" href="css/server-name-generator.css">
    </head>
    <body>
        <div class="col s12 m4 l2"></div>
        <div class="container col s12 m4 l8">
            <h1><?= "$adjectives"." "."$nouns".PHP_EOL ?></h1>
        </div>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    </body>
</html>