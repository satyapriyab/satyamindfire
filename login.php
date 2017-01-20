<!--
* File    : login.php
* Purpose : Contains all html data and Php data for the login page
* Created : 18-jan-2017
* Author  : Satyapriya Baral
-->

<?php
    session_start();
    $dbname = mysqli_connect("localhost", "root", "", "mydb");
    
    if (isset($_POST['login-btn']))
    {
        $name = mysql_real_escape_string($_POST['username']);
        $pass = mysql_real_escape_string($_POST['password']);
        $user = mysql_real_escape_string($_POST['selectUser']);
        
        $sql = "SELECT * FROM logindata WHERE user='$user' AND name='$name' AND password='$pass'";
        $result = mysqli_query($dbname,$sql);
        $admin='Admin';
        if(mysqli_num_rows($result) == 1) {
			$_SESSION["name"] = "$name";
			$_SESSION["user"] = "$user";
			if($user == $admin)
			{
				header("location:homeAdmin.php");
			}
			else {
				header("location:homeUser.php");
			}
        }
        else {
            $message = 'Your email or password is incorrect';
        }
    }
	$PageTitle = "Login";
	include_once 'header.php';
?>
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
								<form id="login-form" action="login.php" method="post" role="form"
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
									<div class="message"><?php if(isset($message)) echo $message; ?></div>
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
 <?php
  include_once 'footer.php';
  ?>