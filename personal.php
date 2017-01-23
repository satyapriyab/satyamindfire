<!--
* File    : personal.php
* Purpose : Contains all html data and Php data for showing personal info
* Created : 20-jan-2017
* Author  : Satyapriya Baral
-->

<?php
  $PageTitle = "Home";
  include_once 'header.php';
	session_start();
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
      <li class="active"><a href="personal.php">Personal Info</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signout.php"><span></span> Signout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<table  class="table-striped table-bordered table-hover table-condensed">
      <tr>
          <th>User</th>
          <th>Name</th>
          <th>Email</th>
      </tr>
		</div>
</div>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
	} 
        $n = $_SESSION["name"];
        $sql = "SELECT id, user, name, email FROM logindata WHERE name='$n'";
        $result = $conn->query($sql);
        
	if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["user"]. "</td>";
          echo "<td>" . $row["name"]. "</td>";
          echo "<td>" . $row["email"] . "</td>";
					echo "<td><a href=\"update.php?id=".$row['id']."\">Update</a></td>";
          echo "</tr>";        
		}
	} else {
	echo "0 results";
	}
	$conn->close();
	?>  

 <?php
  include_once 'footer.php';
  ?>