<?php
/*
* File    : personal.php
* Purpose : Contains all html data and Php data for showing personal info
* Created : 20-jan-2017
* Author  : Satyapriya Baral
*/

  $PageTitle = "Home";
  include_once 'header.php';
	session_start();
	if (!isset($_SESSION["name"])) {
    header("location:index.php");
  }
?>



<?php

	//Connecting to Filemaker database
	require_once ('filemakerapi/Filemaker.php');
	$fm = new FileMaker('userData', '172.16.9.62', 'admin', 'Baral@9439');
  $n = $_SESSION["email"];
	$mail = '=="'. $n .'"';
  //$request = $fm->newFindCommand('userData');
	$request = $fm->newFindCommand('userData');
	$request->addFindCriterion('email', $mail);
	$result = $request->execute();
	
	//Display Personal info
	if (FileMaker::isError($result)) {
		$message = 'No Records Found'; 
	} else {
		$records = $result->getRecords();
		foreach($records as $record){
			$user = $record->getField('user');
			$name = $record->getField('name');
			$email = $record->getField('email');
			$id = $record->getrecordid();
			$password = $record->getField('password');
			$addressRecords= $record->getRelatedSet('addressData');
			if (FileMaker::isError($addressRecords)) {
				} else {
					foreach($addressRecords as $addressRecord){
						$address = $addressRecord->getField('addressData::address');
						$city = $addressRecord->getField('addressData::city');
						$state = $addressRecord->getField('addressData::state');
					}
			}
		}
	}

	//On click of edit button 
	if(isset($_POST['edit-btn']))
	{
		header("location:update.php?id=".$id."");
		$_SESSION["flag"] = 1;
	}
	?>
	<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
			<li><img src="logo.jpg" alt="" height="50" width="50" class="img-rounded"></li>
      <li><a href="home.php">Home</a></li>
			<?php
			$n=$_SESSION["user"]; if("$n"== "Admin"){
			echo "<li ><a href="."allusers.php".">Users</a></li>"; }
			?>
      <li class="active" id="myBtn"><a href="personal.php" class="ignore-click" >Personal Info</a></li>
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
	<div class="col-md-6 col-md-offset-3">
		<table  class="table-striped table-bordered table-hover table-condensed">
		</div>
</div>
	<!-- Trigger/Open The Modal -->
<button class="btn btn-primary btn-lg" id="myBtn">Show Details</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span id="close" class="close">&times;</span>
<div class="container">
	<form id="details-form" action="" method="post">
		<div class="form-group">
			<label class="control-label col-sm-2" for="User" >User :</label>
				<div class="col-sm-2">
					<span class="spanPersonalInfo" id="user">
						<?php if(isset($user)) echo $user; ?></span>
				</div>
			</div><br>
			<div class="form-group">
				<label class="control-label col-sm-2" for="name" >Name :</label>
				<div class="col-sm-10">
					<span class="spanPersonalInfo" id="name">
					<?php if(isset($name)) echo $name; ?></span>
			</div>
		</div><br>
	<div class="form-group">
		<label class="control-label col-sm-2" for="email" >Email :</label>
			<div class="col-sm-10">
				<span class="spanPersonalInfo" id="email">
					<?php if(isset($email)) echo $email; ?></span>
			</div>
		</div><br>
		<div class="form-group">
		<label class="control-label col-sm-2" for="Address" >Address :</label>
			<div class="col-sm-10">
				<span class="spanPersonalInfo" id="address">
					<?php if(isset($address)) echo $address; ?></span>
			</div>
		</div><br>
		<div class="form-group">
		<label class="control-label col-sm-2" for="City" >City :</label>
			<div class="col-sm-10">
				<span class="spanPersonalInfo" id="city">
					<?php if(isset($city)) echo $city; ?></span>
			</div>
		</div><br>
		<div class="form-group">
		<label class="control-label col-sm-2" for="State" >State :</label>
			<div class="col-sm-10">
				<span class="spanPersonalInfo" id="state">
					<?php if(isset($state)) echo $state; ?></span>
			</div>
		</div><br>
	<div id="submit_button">
		<label class="control-label col-sm-2" ></label>
			<input type="submit" name="edit-btn" id="edit-submit"
				class="btn btn-success" value="Edit">
			</div>
		</div>
  </div>
</div>
<?php
include_once 'footer.php';
?>
