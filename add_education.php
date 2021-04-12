<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("./connection.php");

if(isset($_POST['Submit']))
{	
	
	$instituteName = $_POST['institute_name'];
	$degree = $_POST['degree'];
	$address = $_POST['address'];
	$startDate = $_POST['start_date'];	
	$endDate = $_POST['end_date'];	
	$userId = $_SESSION['id'];

	echo "companyName";
	echo "position";
	
	
		//updating the table
	$result = mysqli_query($mysqli, "INSERT INTO education(institute_name, start_date, end_date, degree,
				user_id, address) VALUES('$instituteName','$startDate','$endDate', '$degree', '$userId', '$address')");
		
		//redirectig to the display page. In our case, it is view.php
	header("Location: cv.php");

}
?>

<html>
<head>
	<title>Add Education</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body class="m-4">
	<a href="../index.php">Home</a> | <a href="../logout.php">Logout</a>
	<br/><br/>
	<h4>Add Education Information</h4>
	<form action="add_education.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Institute Name</td>
				<td><input class="form-control m-4" type="text" name="institute_name"></td>
			</tr>
			<tr> 
				<td>Degree Name</td>
				<td><input class="form-control m-4" type="text" name="degree"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><textarea class="form-control m-4" type="text" name="address"></textarea></td>
			</tr>
			<tr> 
				<td>Start Date</td>
				<td><input class="form-control m-4" type="date" name="start_date"></td>
			</tr>
			<tr> 
				<td>End Date</td>
				<td><input class="form-control m-4" type="date" name="end_date"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input class="btn btn-primary m-4" type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

