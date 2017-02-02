<?php
/*
* File    : update.php
* Purpose : Contains all Php code to update the database
* Created : 25-jan-2017
* Author  : Satyapriya Baral
*/

	session_start();
	if (!isset($_SESSION["name"])) {
    header("location:index.php");
  }
	
	//Connecting to Filemaker Database
    require_once ('filemakerapi/Filemaker.php');
	$fm = new FileMaker('userData', '172.16.9.62', 'admin', 'Baral@9439');
	
	$id = $_GET['id'];
	$request = $fm->newFindCommand('userData');
	$request->addFindCriterion('id', $id);
    $result = $request->execute();
	if (FileMaker::isError($result)) {
		$message = 'No Records Found'; 
	} else {
		$records = $result->getRecords();
		foreach($records as $record){
			$userid = $record->getField('id');
			$nameEdit = $record->getField('name');
			$passwordEdit = $record->getField('password');
			$addressRecords= $record->getRelatedSet('addressData');
			if (FileMaker::isError($addressRecords)) {
			} else {
				foreach($addressRecords as $addressRecord){
					$addressEdit = $addressRecord->getField('addressData::address');
					$cityEdit = $addressRecord->getField('addressData::city');
					$stateEdit = $addressRecord->getField('addressData::state');
					$addressRecordId = $addressRecord->getrecordid();
				}
			}
		}
	}
	
	//When submit is clicked the data in form are updated in database
	if (isset($_POST['submit']))
	{
			$name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
			$password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
			$address = mysql_real_escape_string(htmlspecialchars($_POST['address']));
			$city = mysql_real_escape_string(htmlspecialchars($_POST['city']));
			$state = mysql_real_escape_string(htmlspecialchars($_POST['state']));
			if ($name === '' || $password === '')
			{
				$error = 'ERROR: Please fill in all required fields!';
			}
			else if(strlen($name) < 5){
				$nameError = 'Should be atleast 5 charecters';
			}
			else
			{
				//Retriving data by id and editing 
				$editRecord = $fm->newEditCommand('userData', $id);
				$editRecord->setField('name', $name);
				$editRecord->setField('password', $password);
				$result = $editRecord->execute();
				$request = $fm->newFindCommand('addressData');			
				$request->addFindCriterion('recordId', $addressRecordId);
				$result = $request->execute();
			
				//If any record found login to the home page or show error
				if (FileMaker::isError($result)) {
					$record = $fm->createRecord('addressData');
					$record->setField('userId', $userid);
					$record->setField('address', $address);
					$record->setField('city', $city);
					$record->setField('state', $state);
					$result = $record->commit();	
				}
				 else {
					$editRecord = $fm->newEditCommand('addressData', $addressRecordId);
					$editRecord->setField('address', $address);
					$editRecord->setField('city', $city);
					$editRecord->setField('state', $state);
					$result = $editRecord->execute();
				 }
				if($nameEdit === $_SESSION["name"])
				{
					$_SESSION["name"] = $name;
				}
				if($_SESSION["flag"] == 1) {
					$_SESSION["flag"] = 0;
					header("Location: personal.php");
				}
				else {
					header("Location: allusers.php");
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
			<div class="col-md-6 col-md-offset-3">
				<form action="" method="post">
					<span class="spancolor" id="error">
					<?php if(isset($error)) echo $error; ?></span>
					<div class="form-group">
						<label class="control-label col-sm-4" for="Name" >Name :</label>
						<input type="text" name="name" value="<?php if(isset($nameEdit))
						{ echo $nameEdit; } ?>">
						<span class="spancolor" id="name-error">
									<?php if(isset($nameError)) echo $nameError; ?></span><br>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="Password" >Password :</label>
						<input type="text" name="password" value="<?php if(isset($passwordEdit))
						{ echo $passwordEdit; } ?>"/><br>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="Address" >Address :</label>
						<input type="text" name="address" value="<?php if(isset($addressEdit))
						{ echo $addressEdit; } ?>"/><br>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="City" >City :</label>
						<input type="text" name="city" value="<?php if(isset($cityEdit))
						{ echo $cityEdit; } ?>"/><br>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="State" >State :</label>
						<input type="text" name="state" value="<?php if(isset($stateEdit))
						{ echo $stateEdit; } ?>"/><br>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" ></label>
						<input type="submit" name="submit" value="Submit">
					</div>
					</form>
				</div>
			</div>
<?php
include_once 'footer.php';
?>