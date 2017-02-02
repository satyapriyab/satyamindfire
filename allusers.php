<?php
/*
* File    : allusers.php
* Purpose : Contains all html data and Php data for Admin showing all users
* Created : 20-jan-2017
* Author  : Satyapriya Baral
*/

  session_start();
	if (!isset($_SESSION["name"])) {
    header("location:index.php");
  }
  $PageTitle = "allUsers";
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
      <li class="active"><a href="allusers.php">Users</a></li>
      <li id="myBtn"><a href="personal.php#myBtn">Personal Info</a></li>
			<li><a href="addUser.php">Add User</a></li>
			<li><a href="addAdmin.php">Add Admin</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signout.php"><span></span> Signout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
		<div><span class="spancolor" id="name-error">
			<?php if(isset($message)) echo $message; ?></span></div>
		<div class="table-responsive">
    <table  class="table table-striped table-bordered">
      <tr>
				<th>Added</th>
        <th>User</th>
        <th>Name</th>
        <th>Email</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th><span class="glyphicon glyphicon-remove"></span></th>
				<th><span class="glyphicon glyphicon-edit"></span></th>
      </tr>
			
<?php
	
	//Connecting to Filemaker database
	require_once ('filemakerapi/Filemaker.php');
	$fm = new FileMaker('userData', '172.16.9.62', 'admin', 'Baral@9439');
     
	$request = $fm->newFindAllCommand('userData');
	$result = $request->execute();
	
	if (FileMaker::isError($result)) {
				$message = 'No Records Found'; 
			} else {
				$records = $result->getRecords();
				foreach($records as $record){
					if(($_SESSION["email"] != $record->getField('email')) &&
						 (($_SESSION["childId"] === $record->getField('parentId')) ||
							($record->getField('parentId') == 0))) {
						echo "<tr>";
						if($record->getField('parentId') == 0)
						{
							echo "<td>"."From Outside"."</td>";
						}
						else
						{
							echo "<td>By Admin  " .$_SESSION["name"]."</td>";
						}
						echo "<td>" . $record->getField('user'). "</td>";
						echo "<td>" . $record->getField('name'). "</td>";
						echo "<td>" . $record->getField('email') . "</td>";
						$addressRecords= $record->getRelatedSet('addressData');
						if (FileMaker::isError($addressRecords)) {
							echo "<td>"."</td>";
							echo "<td>"."</td>";
							echo "<td>"."</td>";
						} else {
							foreach($addressRecords as $addressRecord){
								echo "<td>" . $addressRecord->getField('addressData::address'). "</td>";
								echo "<td>" . $addressRecord->getField('addressData::city'). "</td>";
								echo "<td>" . $addressRecord->getField('addressData::state'). "</td>";
							}
						}
						echo "<td><a href=\"http://localhost/fm/update.php?id=".$record->getrecordid()."\">Update</a></td>";
						echo "<td><a href=\"http://localhost/fm/delete.php?id=".$record->getrecordid()."\">Delete</a></td>";
					
					}
					echo "</tr>";
				}
			}
?>
    </table>
	</div>
</div>
<?php
  include_once 'footer.php';
?>