<?php 
    require_once '../Server.php';

    function pageController () 
    {

        $server = new Server();

        $newServer = $server->serverName();

        return $newServer;
    }

    extract(pageController());

    echo "$adjectives"." "."$nouns".PHP_EOL;
?>

