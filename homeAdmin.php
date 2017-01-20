<!--
* File    : homeAdmin.php
* Purpose : Contains all html data and Php data for Admin Home Page
* Created : 19-jan-2017
* Author  : Satyapriya Baral
-->

<?php
session_start();
$PageTitle = "Home";
include_once 'header.php';
?>

<nav class="navbar navbar-inverse">
  <ul class="nav navbar-nav">
    <li><a href="homeAdmin.php">Home</a></li>
    <li><a href="allusers.php">Users</a></li>
    <li><a href="personal.php">Personal Info</a></li>
    <li><a href="login.php">Signout</a></li>
  </ul>
</nav>

<?php
include_once 'footer.php';
?>