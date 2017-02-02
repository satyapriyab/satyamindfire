<?php
/*
* File    : addUser.php
* Purpose : Contains all html data and php validation data for the creation of registration page
* Created : 18-jan-2017
* Author  : Satyapriya Baral
*/
	session_start();
	if (!isset($_SESSION["name"])) {
    header("location:index.php");
  }
	$error = false;

	/* Checking all fields are filled or not */
	if(count($_POST)>0) {
		foreach($_POST as $key=>$value) {
			if(empty($_POST[$key])) {
				$message = ucwords($key) . " field is required";
				$error = true;
				break;
			}
		}
	}

	/* Username Validation */
	if (isset($_POST['username'])) {
		if(strlen($_POST['username']) < 5) {
			$nameError = 'Should be atleast 5 charecters';
			$error = true;
		}
	}
	/* Password Matching Validation */
	if (isset($_POST['password']) || isset($_POST['confirmPassword'])) {
		if($_POST['password'] != $_POST['confirmPassword']){ 
			$passError = 'Passwords should be same';
			$error = true;
		}
	}
	/* Email Validation */
	if(!isset($message)) {
		if (isset($_POST['email'])) {
			if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$emailError = 'Invalid Email';
				$error = true;
			}
		}
	}
	
	//connecting to Filemaker
	require_once ('filemakerapi/Filemaker.php');
	$fm = new FileMaker('userData', '172.16.9.62', 'admin', 'Baral@9439');
	
	//After click of submit button
	if (isset($_POST['submit'])) {
		$user = 'User';
		//$user = mysql_real_escape_string($_POST['selectUser']);
		$name = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$pass = mysql_real_escape_string($_POST['password']);
		$request = $fm->newFindAllCommand('userData');
		$result = $request->execute();
		if (FileMaker::isError($result)) {
			$message = 'Register Please';//if no record inputted 
		} else {
			$records = $result->getRecords();
			foreach($records as $record){
				//check for duplicate entry of email
				if($email == $record->getField('email'))
				{
					$emailError = 'Email already exists';
					$error = true;
				}
			}
		}
	}
	
	//If any data entry doesnot occur
	if(!$error) {
		if (isset($_POST['submit']))
		{
			$name = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$record = $fm->createRecord('userData');
			$record->setField('user', $user);
			$record->setField('name', $name);
			$record->setField('email', $email);
			$record->setField('password', $password);
			$record->setField('parentId', $_SESSION["childId"]);
			$result = $record->commit();
			if(!empty($result)) {
				$message = "You have registered as a user successfully!";	
				unset($_POST);
			} else {
				$message = "Problem in registration. Try Again!";	
			}
		}
	}

$PageTitle = "Register";
include_once 'header.php';
?>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
			</div>
				<ul class="nav navbar-nav">
					<li><img src="logo.jpg" alt="" height="50" width="50" class="img-rounded"></li>
					<li><a href="home.php">Home</a></li>
					<li><a href="allusers.php">Users</a></li>
					<li><a href="personal.php">Personal Info</a></li>
					<li class="active"><a href="addUser.php">Add User</a></li>
					<li><a href="addAdmin.php">Add Admin</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="signout.php"><span></span> Signout</a></li>
				</ul>
			</div>
		</nav>
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="" class="active" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" action="addUser.php" method="post">
									<div><span class="spancolor" id="name-error">
									<?php if(isset($message)) echo $message; ?></span></div>
									<div class="form-group">
										<input type="text" name="username" id="name"
											   class="form-control" placeholder="Username"
													 value="<?php if(isset($_POST['username']))
													 echo $_POST['username']; ?>">
												 <span class="spancolor" id="name-error">
													<?php
													if(isset($nameError)) {
														echo $nameError;
													}
													?>
													</span>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email"
											   class="form-control" placeholder="Email Address"
													 value="<?php if(isset($_POST['email']))
													 echo $_POST['email']; ?>">
												 	<span class="spancolor" id="email-error">
													<?php
													if(isset($emailError)) {
														echo $emailError;
													}
													?>
													</span>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password"
											   class="form-control" placeholder="Password">
										<span class="spancolor" id="password-error">
													<?php
													if(isset($passError)) {
														echo $passError;
													}
													?>
													</span>
									</div>
									<div class="form-group">
										<input type="password" name="confirmPassword" id="confirm-password"
											   class="form-control" placeholder="Confirm Password">
										<span class="spancolor" id="password-error">
													<?php
													if(isset($passError)){
														echo $passError;
													}
													?>
													</span>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="submit" id="submit"
													   class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
 <?php
  include_once 'footer.php';
  ?>