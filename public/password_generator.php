<?php 
 if ($argc == 4 && ctype_digit($argv[1]) && is_bool($argv[2]) &&  ctype_alpha($argv[3])) {
    $length = $argv[1];
    $add_dashes = $argv[2];
    $available_sets = $argv[3];
} 

function generateStrongPassword($length, $add_dashes, $available_sets)
{
    $sets = array();
    if(strpos($available_sets, 'l') !== false)
        $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    if(strpos($available_sets, 'u') !== false)
        $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    if(strpos($available_sets, 'd') !== false)
        $sets[] = '23456789';
    if(strpos($available_sets, 's') !== false)
        $sets[] = '!@#$%&*?';
    $all = '';
    $password = '';
    foreach($sets as $set)
    {
        $password .= $set[array_rand(str_split($set))];
        $all .= $set;
    }
    $all = str_split($all);
    for($i = 0; $i < $length - count($sets); $i++)
        $password .= $all[array_rand($all)];
    $password = str_shuffle($password);
    if(!$add_dashes)
        return $password;
    $dash_len = floor(sqrt($length));
    $dash_str = '';
    while(strlen($password) > $dash_len)
    {
        $dash_str .= substr($password, 0, $dash_len) . '-';
        $password = substr($password, $dash_len);
    }
    $dash_str .= $password;

    return $dash_str;
}

$password = generateStrongPassword($length, $add_dashes, $available_sets);

echo "Your new password is: " . $password.PHP_EOL;
?>