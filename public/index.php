<?php 
    function pageController ()
    {
        
        return [];
    }

    extract(pageController());
?>

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Template Page</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <!-- My CSS -->
        <link rel="stylesheet" href="/template-page.css">
    </head>
    <body>
        <?php include_once '../navbar.php'; ?>
        <?php include_once '../header.php';  ?>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <?php include_once '../footer.php'; ?>
        

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    </body>
</html>