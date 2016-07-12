<?php  
    function getSum()
    {
        echo "Input a multi-digit number";
        $inputNumber = fgets(STDIN);
        $inputNumber = trim($inputNumber);

        $sum = 0;

        do{
            $sum += $inputNumber % 10;
                  
        }while ($inputNumber = (int)$inputNumber / 10);

        return $sum; 
    };

    getSum();
?>