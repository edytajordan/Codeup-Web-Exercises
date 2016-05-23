<?php  
    require_once 'adlister_credentials.php';

    require_once 'db_connect.php';

    $dbc->exec('DROP TABLE IF EXISTS users;');

    $create = 'CREATE TABLE users(
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    )';

    $dbc->exec($create);
?>