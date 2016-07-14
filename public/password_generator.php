<?php  
// if ($argc == 5 && ctype_digit($argv[1]) && ctype_digit($argv[2]) && ctype_digit($argv[3]) && ctype_alpha($argv[4])) {
    
//     $specChars = $argv[2];
//     $digits = $argv[3];
//     $case = $argv[4];
// }

$passwordCharacters = array(
        "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "!", "@", "#", "$", "%", "^", "&", "*", "?"   
);

print_r($passwordCharacters);

// $passwordLength = 15;

$password = array_rand($passwordCharacters, 15);

print_r($password);
?>