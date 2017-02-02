<?php
/*
* File    : signout.php
* Purpose : Contains all php code for signout.
* Created : 25-jan-2017
* Author  : Satyapriya Baral
*/

    session_start();
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("location:index.php");
    exit;
?>