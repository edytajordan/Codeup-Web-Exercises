<?php  
    require_once'User.php';

    $testUser = new User();

    $testUser->name = 'test';
    $testUser->email = 'test@email.com';
    $testUser->password = 'testpassword';
    
    $testUser->save();

    $foundUser = User::find(4);
    var_dump($foundUser);

    $allUsers = User::all();
    var_dump($allUsers);

    $testUser->name = 'Testy McTestface';
    $testUser->save();
    var_dump($testUser);

    $deleteUser = User::delete(2);
?>