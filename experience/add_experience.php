<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("../connection.php");

if(isset($_POST['Submit']))
{	
	
	$companyName = $_POST['company_name'];
	$position = $_POST['position'];
	$description = $_POST['description'];
	$address = $_POST['address'];
	$employmentType = $_POST['employment_type'];
	$startDate = $_POST['start_date'];	
	$endDate = $_POST['end_date'];	
	$userId = $_SESSION['id'];

	echo "companyName";
	echo "position";
	
	
		//updating the table
	$result = mysqli_query($mysqli, "INSERT INTO experience(company_name, start_date, end_date, position, description, 
				user_id, address, employment_type) VALUES('$companyName','$startDate','$endDate', '$position',
				 '$description', '$userId', '$address', '$employmentType')");
		
		//redirectig to the display page. In our case, it is view.php
	header("Location: cv.php");

}
?>

<html>
<head>
	<title>Add Experience</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body class="m-4">
	<a href="../index.php">Home</a> | <a href="../logout.php">Logout</a>
	<br/><br/>
	<h4>Add Experience Information</h4>
	<form action="add_experience.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Company Name</td>
				<td><input class="form-control m-4" type="text" name="company_name"></td>
			</tr>
			<tr> 
				<td>Position</td>
				<td><input class="form-control m-4" type="text" name="position"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><textarea class="form-control m-4" type="text" name="description"></textarea></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><textarea class="form-control m-4" type="text" name="address"></textarea></td>
			</tr>
			<tr> 
				<td>Employeement Type</td>
				<td>
					<select class="form-control m-4" id="employment_type" name="employment_type">
						<option value="full time">Full Time</option>
						<option value="part time">Part Time</option>
						<option value="contructual">Contractual</option>
						<option value="internship">Internship</option>
					</select>
				</td>
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
				<td>I Currently Work Here</td>
				<td><input class="m-4" type="checkbox" name="i_currently_work_here"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input class="btn btn-primary m-4" type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

