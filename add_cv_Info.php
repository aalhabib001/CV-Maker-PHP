<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['Submit']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];	
	$currentPosition = $_POST['current_position'];	
	$email = $_POST['email'];	
	$website = $_POST['website'];	
	$userId =  $_SESSION['id'];
	
	// checking empty fields
		$result = mysqli_query($mysqli, "INSERT INTO personal_info(name, address, phone, user_id, 
		current_position, email, website) 
		VALUES('$name','$address','$phone', '$userId', '$currentPosition', '$email', '$website')");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: cv.php");
}
?>
<html>
<head>
	<title>Add Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>

	<form action="addCvInfo.php" class="border p-5" method="post" name="form1">
	<a href="index.php">Home</a> | <a href="cv.php">View CV</a> | <a href="logout.php">Logout</a>

	<h4 class="mt-5 mb-5">Add Personal Information for CV</h4>
		<table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input class="form-control m-4" type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input class="form-control m-4" type="text" name="address"></td>
			</tr>
			<tr> 
				<td>Phone</td>
				<td><input class="form-control m-4" type="text" name="phone"></td>
			</tr>
			<tr> 
				<td>Current Position</td>
				<td><input class="form-control m-4" type="text" name="current_position"></td>
			</tr> 
				<td>email</td>
				<td><input class="form-control m-4" type="text" name="email"></td>
			</tr> 
				<td>website</td>
				<td><input class="form-control m-4" type="text" name="website"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input class="btn btn-primary m-4" type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

