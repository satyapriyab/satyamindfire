<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";
	session_start();

	$conn = new mysqli($servername, $username, $password, $dbname); 
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	$id = $_GET['id'];
	if (isset($_POST['submit']))
	{
			$name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
			$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
			$password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
			if ($name == '' || $email == '' || $password == '')
			{
				$error = 'ERROR: Please fill in all required fields!';
			}
			else
			{
				mysqli_query($conn,"UPDATE logindata SET name='$name', email='$email',password='$password' WHERE id='".$id."'");
				mysqli_close($conn);
				$n=$_SESSION["user"];
				$_SESSION["name"] = $name;
				if("$n" == "Admin") {
					header("Location: allusers.php");
				}
				else {
					header("Location: personal.php");
				}
			}
		}
	$PageTitle = "Update";
	include_once 'header.php';
?>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
			</div>
			<ul class="nav navbar-nav">
				<li><a href="home.php">Home</a></li>
				<?php
					$n=$_SESSION["user"]; if("$n"== "Admin"){
					echo "<li><a href="."allusers.php".">Users</a></li>";}
				?>
				<li><a href="personal.php">Personal Info</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="signout.php"><span></span> Signout</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="" method="post">
					<input type="hidden" name="id" value=""/>
					<div class="form-group">
						<strong>Name: </strong> <input type="text" name="name" value=""/><br/>
					</div>
					<div class="form-group">
						<strong>Email: </strong> <input type="text" name="email" value=""/><br/>
					</div>
					<div class="form-group">
						<strong>Password: </strong> <input type="text" name="password" value=""/><br/>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Submit">
					</div>
				</div>
			</div>
		</div>
	</form>
<?php
include_once 'footer.php';
?>