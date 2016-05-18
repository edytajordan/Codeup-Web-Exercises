<?php
    require_once '../Model.php';

    $model = new Model('man', 'Joe');

    //We have created a new property and set its value. We can do this because of our __set() function  
    $model->numberofFingers = 10;

    echo "-------------------".PHP_EOL;

    echo "Key: ".PHP_EOL;

    echo $model->man.PHP_EOL;
?>