<?php
// Example 13-6. Retrieving session variables and then destroying the session

    session_start();

    function destroy_session_and_data() {
        $_SESSION = array();
        setcookie(session_name(), '', time() - 2592000, '/');
        session_destroy();
    }

    if(isset($_SESSION['forename'])) {
        $forename = htmlspecialchars($_SESSION['forename']);
        $surname  = htmlspecialchars($_SESSION['surname']);

        destroy_session_and_data();

        echo htmlspecialchars("Welcome back $forename");
        echo "<br>";
        echo htmlspecialchars("Your full name is $forename $surname.");

    } else {
        echo "Please <a href='auth2.php'>click here</a> to log in.";
    }

?> 