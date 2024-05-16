<?php

    require_once 'login.php';

    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    // } catch(PDOException $e) {
        // throw new PDOException($e->getMessage(), (int)$e->getCode());
    } catch(\PDOException $e) {
        throw new \PDOexception($e->getMessage(), (int)e->getCode());
    }


    $query = "CREATE TABLE users (
        forename VARCHAR(32) NOT NULL,
        surname  VARCHAR(32) NOT NULL,
        username VARCHAR(32) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )";

    $result = $pdo->query($query);

    function add_user($pdo, $fn, $sn, $un, $pw) {
        $stmt = $pdo->prepare('INSERT INTO users VALUES(?,?,?,?)');

        $stmt->bindParam(1, $fn, PDO::PARAM_STR, 32);
        $stmt->bindParam(2, $fn, PDO::PARAM_STR, 32);
        $stmt->bindParam(3, $fn, PDO::PARAM_STR, 32);
        $stmt->bindParam(4, $fn, PDO::PARAM_STR, 255);

        $stmt->execute([$fn, $sn, $un, $pw]);
    }


    $forename   = 'Bill';
    $surname    = 'Smith';
    $username   = 'bsmith';
    $password   = 'mysecret';
    $hash       = password_hash($password, PASSWORD_DEFAULT);

    add_user($pdo, $forename, $surname, $username, $hash);


    $forename   = 'Pauline';
    $surname    = 'Jones';
    $username   = 'pjones';
    $password   = 'acrobat';
    $hash       = password_hash($password, PASSWORD_DEFAULT);
    
    add_user($pdo, $forename, $surname, $username, $hash);

?>


