<!DOCTYPE html>
<!--
* File    : register.php
* Purpose : Contains all html data for the creation of registration page
* Created : 18-jan-2017
* Author  : Satyapriya Baral
-->

<html>
	<head>
		<meta charset="utf-8"/>
		<title>
			Login Page
		</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/login.css">
	</head>	
	<body>
		<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="login.php" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="register.php" class="active" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" action="insert.php" method="post" role="form">
									<div class="form-group">
										<div class = "styled-select select">
											<label class="SelectControl" for="RegisterAs" >Register As :</label>
											<select id="formSelectUser" name=selectUser>
												<option value="Admin">Admin</option>
												<option value="User">User</option>	
											</select>
										</div>
									</div>
									<div class="form-group">
										<input type="text" name="username" id="name"
											   class="form-control" placeholder="Username" value="">
										<span style="color:red" class="ErrorForm"
											  id="nameErrorMessage"></span>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email"
											   class="form-control" placeholder="Email Address" value="">
										<span style="color:red" class="ErrorForm"
											  id="emailErrorMessage"></span>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password"
											   class="form-control" placeholder="Password">
										<span style="color:red" class="ErrorForm"
											  id="passwordErrorMessage"></span>
									</div>
									<div class="form-group">
										<input type="password" name="confirmPassword" id="confirm-password"
											   class="form-control" placeholder="Confirm Password">
										<span style="color:red" class="ErrorForm"
											  id="confirmPasswordErrorMessage"></span>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-btn" id="register-submit"
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
	<script src="assets/jquery-3.1.1.min.js"></script>
	<script type=text/javascript src="validatefields.js"></script>	
	</body>
</html>