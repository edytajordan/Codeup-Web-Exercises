<?php  
require_once 'park_db_credentials.php';

require_once 'db_connect.php';

$dbc->exec('DROP TABLE IF EXISTS national_parks;');

$create = 'CREATE TABLE national_parks(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    date_established DATE NOT NULL,  
    area_in_acres DOUBLE NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (id)
)';

$dbc->exec($create);
?>