<!-- authenticate 2 -->
<!-- Example 13-5. Setting a session after successful authentication -->


<?php

    require_once 'login.php';

    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    } catch(\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }


    if(isset($_SERVER['PHP_AUTH_USER']) &&
        isset($_SERVER['PHP_AUTH_PW']))
    {
        $un_temp = sanitize($pdo, $_SERVER['PHP_AUTH_USER']);
        $pw_temp = sanitize($pdo, $_SERVER['PHP_AUTH_PW']);
        $query   = "SELECT * FROM users WHERE username=$un_temp";
        $result  = $pdo->query($query);

        if(!result->rowCount()) {
            die("User not found");
        }

        $row = $result->fetch();
        $fn  = $row['forename'];
        $sn  = $row['surname'];
        $un  = $row['username'];
        $pw  = $row['password'];

        

    }




?>




