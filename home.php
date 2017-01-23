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

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="homeAdmin.php">Home</a></li>
      <?php
			$n=$_SESSION["user"]; if("$n"== "Admin"){
			echo "<li><a href="."allusers.php.".">Users</a></li>";}
			?>
      <li><a href="personal.php">Personal Info</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signout.php"><span></span> Signout</a></li>
    </ul>
  </div>
</nav>

	<div class="container">
		<center>
		<h1 style="color:blue">WELCOME TO HOME PAGE</h1>
		</center>
	</div>
<?php
include_once 'footer.php';
?>