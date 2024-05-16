<?php

// Setting a cookie
setcookie('location', 'USA', time() + 60 * 60 * 24 * 7, '/');


//Accessing a cookie
if (isset($_COOKIE['location'])) {
    $location = $_COOKIE['location'];
}


//Destroying a cookie
setcookie('location', 'USA', time() - 2592000, '/');



?>