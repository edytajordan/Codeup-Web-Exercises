<?php  
    if ($argc == 2 && ctype_digit($argv[1])) {
        $inputNumber = $argv[1];
    }

    $numbers = str_split($inputNumber);

    $sum = array_sum($numbers);

    echo "The sum of the digits in $inputNumber is $sum\n";
?>