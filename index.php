<?php
/*
* File    : index.php
* Purpose : Contains all html data and Php data for the login page
* Created : 18-jan-2017
* Author  : Satyapriya Baral
*/

    session_start();
	//connecting to Filemaker database
    require_once ('filemakerapi/Filemaker.php');
	$fm = new FileMaker('userData', '172.16.9.62', 'admin', 'Baral@9439');
   
	//If login button clicked
    if (isset($_POST['login-btn']))
    {
		$mail = mysql_real_escape_string($_POST['email']);
        $pass = mysql_real_escape_string($_POST['password']);
        $user = mysql_real_escape_string($_POST['selectUser']);
		$error = false;
		
		//check if the fields are entered
		if(strlen($mail) < 1)
		{
			$emailError = 'Enter Email';
			$error = true;
		}
		if(strlen($pass) < 1)
		{
			$passwordError = 'Enter Password';
			$error = true;
		}
		if(!$error)
		{
			$email = '=="'. $mail .'"';
			$request = $fm->newFindCommand('userData');
			$request->addFindCriterion('email', $email);
			$request->addFindCriterion('password', $pass);
			$request->addFindCriterion('user', $user);
			$result = $request->execute();
			
			//If any record found login to the home page or show error
			if (FileMaker::isError($result)) {
				$message = 'Your email or password is incorrect'; 
			} else {
				$records = $result->getRecords();
				foreach($records as $record){
					$_SESSION["name"] = $record->getField('name');
					$_SESSION["user"] = $record->getField('user');
					$_SESSION["email"] = $record->getField('email');
					$_SESSION["childId"] = $record->getField('childId');
				}
				header("location:home.php");
			}
		}
	}
	if (isset($_SESSION["name"]))
	{
		header("location:home.php");
	}
	$PageTitle = "Login";
	include_once 'header.php';
?>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
			</div>
				<ul class="nav navbar-nav">
					<li><img src="logo.jpg" alt="" height="80" width="80" class="img-rounded"></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li></li>
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
								<a href="index.php" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="register.php" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="index.php" method="post" role="form">
									<div class="form-group">
										<div class = "styled-select select">
											<label class="SelectControl" for="LoginAs" >Login As :</label>
											<select id="formSelectUser" name=selectUser>
												<option value="Admin">Admin</option>
												<option value="User">User</option>	
											</select>
										</div>
									</div>
									<div><span class="spancolor" id="name-error">
									<?php if(isset($message)) echo $message; ?></span></div>
									<div class="form-group">
										<input type="text" name="email"
											   id="e_mail" class="form-control"
											   placeholder="email"><span class="spancolor">
													<?php
													if(isset($emailError)) 
														echo $emailError;
													
													?></span>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password"
											   class="form-control" placeholder="Password">
												<span class="spancolor" id="pass-error">
													<?php
													if(isset($passwordError)) {
														echo $passwordError;
													}
													?>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-btn" id="login-submit"
													   class="form-control btn btn-login" value="Log In">
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
</div>		
 <?php
  include_once 'footer.php';
  ?>