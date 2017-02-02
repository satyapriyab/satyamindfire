<?php
/*
* File    : home.php
* Purpose : Contains all html data and Php data for Admin Home Page
* Created : 19-jan-2017
* Author  : Satyapriya Baral
*/

session_start();
	if (!isset($_SESSION["name"])) {
    header("location:index.php");
  }
$PageTitle = "Home";
include_once 'header.php';
?>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
			<li><img src="logo.jpg" alt="" height="50" width="50" class="img-rounded"></li>
      <li class="active"><a href="home.php">Home</a></li>
      <?php
			$n=$_SESSION["user"]; if("$n"== "Admin"){
			echo "<li><a href="."allusers.php.".">Users</a></li>";}
			?>
      <li><a href="personal.php">Personal Info</a></li>
			<?php
			$n=$_SESSION["user"]; if("$n"== "Admin"){
			echo "<li><a href="."addUser.php".">Add User</a></li>";
			echo "<li><a href="."addAdmin.php".">Add Admin</a></li>"; }
			?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signout.php"><span></span> Signout</a></li>
    </ul>
  </div>
</nav>

	<div class="container">
		<center>
			<h1 class="spancolor">Hi <?php echo $_SESSION["name"] ?></h1>
		<h1 class="headercolor">WELCOME TO HOME PAGE</h1>
		</center>
	</div>
<?php
include_once 'footer.php';
?>