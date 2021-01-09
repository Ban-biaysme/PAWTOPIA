<?php
// This file close the session whren the user click the LOGOUT button

    session_start();
    if(isset($_SESSION["username"])) {
        session_destroy();
        //When the session destroy it will take the user to the login page again
        header("Location:login.html");
    }
?>