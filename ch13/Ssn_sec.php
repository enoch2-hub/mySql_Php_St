

<?php

//-----------Setting a Timeout

    ini_set('session.gc_maxlifetime', 60 * 60 * 24);

    echo ini_set('session_gc_maxlifetime');


// ----------------------------


//===========================Session Security=====================




//-----------Preventing session hijacking



    $_SESSION['p'] = $_SESSION['REMOTE_ADDR'];


//-An extra check - the different_user()
    if($_SESSION['p'] != $_SESSION['REMOTE_ADDR']) {
        different_user();
    }
//-What code you place in your different_user function is up to you. I recommend
// that you either delete the current session and ask the user to log in again due to a
// technical error or, if you have their email address, email them a link to confirm their
// identity, which will enable them to retain all the data in the session.



// Use the follow‐ing to store the user agent:
    $_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];

//Use this to compare the current user-agent string with the saved one.
    if($_SESSION['ua']) = $_SERVER['HTTP_USER_AGENT'] {
        different_user();
    }


// or better still, combine the 2 checks like this 
// and save the combination as a hash hexadecimal string.
    $_SESSION['check'] = hash(ripemd128, $_SERVER['Remote_ADDR'] . 
        $_SERVER['HTTP_USER_AGENT']);

//and use this to compare the current and stored strings
    if($_SESSION['check'] = hash(ripemd128, $_SERVER['Remote_ADDR'] .
        $_SERVER['HTTP_USER_AGENT'])) {
            different_user();
        }


        

?>