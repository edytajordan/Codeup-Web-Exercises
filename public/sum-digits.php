<?php  
    if ($argc == 2 && ctype_digit($argv[1])) {
        $inputNumber = $argv[1];
    }

    $numbers = str_split($inputNumber);

    var_dump($numbers);

    foreach ($numbers as $number) {
       (int)$number;
       var_dump($number);
    }
?>