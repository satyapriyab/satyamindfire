<?php
session_start();
?>
<!DOCTYPE html>
<!--
* File    : login.php
* Purpose : Contains all html data for the login page
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
								<a href="login.php" class="active" id="login-form-link">Login</a>
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
								<form id="login-form" action="home.php" method="post" role="form"
									  style="display: block;">
									<div class="form-group">
										<div class = "styled-select select">
											<label class="SelectControl" for="LoginAs" >Login As :</label>
											<select id="formSelectUser" name=selectUser>
												<option value="Admin">Admin</option>
												<option value="User">User</option>	
											</select>
										</div>
									</div>
									<div class="form-group">
										<input type="text" name="username"
											   id="username" class="form-control"
											   placeholder="Username">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password"
											   class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-btn" id="login-submit"
													   class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="#" class="forgot-password">Forgot Password?</a>
												</div>
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
	</body>
</html>