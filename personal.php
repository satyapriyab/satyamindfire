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
<nav class="navbar navbar-inverse">
  <ul class="nav navbar-nav">
    <li><a href="#">Home</a></li>
		<?php
		$n=$_SESSION["user"]; if("$n"== "Admin"){
    echo "<li><a href="."allusers.php.".">Users</a></li>";}
		?>
    <li><a href="personal.php">Personal Info</a></li>
		<li><a href="login.php">Signout</a></li>
  </ul>
</nav>
	<table  class="table-striped table-bordered table-hover table-condensed">
      <tr>
          <th>User</th>
          <th>Name</th>
          <th>Email</th>
      </tr>

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
        $sql = "SELECT user, name, email FROM logindata WHERE name='$n'";
        $result = $conn->query($sql);
        
	if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["user"]. "</td>";
          echo "<td>" . $row["name"]. "</td>";
          echo "<td>" . $row["email"] . "</td>";
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