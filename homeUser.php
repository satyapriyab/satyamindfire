<!--
* File    : homeUser.php
* Purpose : Contains all html data and Php data for User Home Page
* Created : 19-jan-2017
* Author  : Satyapriya Baral
-->

<?php
session_start();
$PageTitle = "Home";
include_once 'header.php';
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="homeUser.php">Home</a></li>
      <li><a href="personal.php">Personal Info</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span></span> Signout</a></li>
    </ul>
  </div>
</nav>

<?php
include_once 'footer.php';
?>