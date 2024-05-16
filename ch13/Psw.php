<?php

    echo password_hash("mypassword", PASSWORD_DEFAULT);

    if(password_verify("mypassword", $hash)) {
        echo "Valid";
    }

?>