<!-- HTTP Authentication -->

<?php

    $username = 'admin';
    $password = 'letmein';

    if (isset($_SERVER['PHP_AUTH_USER']) &&
        isset($_SERVER['PHP_AUTH_PW']))
    {
        if(($_SERVER['PHP_AUTH_USER'] === $username) &&
           ($_SERVER['PHP_AUTH_PW'] === $password)) {
            echo "$username, you're now logged in";
           } else die("Invalid username/password combination");
        
        //    echo "Welcome User: ". htmlspecialchars($_SERVER['PHP_AUTH_USER']) .
        //      "Password: ". htmlspecialchars($_SERVER['PHP_AUTH_PW']); 
    }
    else {
        header('WWW-Authenticate: Basic realm="Restricted Area"');
        header('HTTP/1.1 401 Unauthorized');
        die("Please enter your username and password");
    }

?>


