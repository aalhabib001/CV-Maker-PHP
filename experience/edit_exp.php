<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("../connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$companyName = $_POST['company_name'];
	$position = $_POST['position'];
	$description = $_POST['description'];
	$address = $_POST['address'];
	$employmentType = $_POST['employment_type'];
	$startDate = $_POST['start_date'];	
	$endDate = $_POST['end_date'];	
	$userId = $_SESSION['id'];
	


		//updating the table
		$result = mysqli_query($mysqli, "UPDATE experience SET company_name='$companyName', position='$position', 
        description='$description', address='$address', employment_type='$employmentType', start_date='$startDate'
        , end_date='$endDate' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: cv.php");

}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM experience WHERE id=$id");

$res = mysqli_fetch_array($result);

// while($res = mysqli_fetch_array($result))
// {
// 	$companyName = $res['name'];
// 	$address = $res['qty'];
// 	$pos = $res['price'];
// 	$qty = $res['qty'];
// 	$price = $res['price'];
// 	$qty = $res['qty'];
// 	$price = $res['price'];
// }
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="../index.php">Home</a> | <a href="../cv.php">View CV</a> | <a href="../logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editExp.php">
    <table width="25%" border="0">
			<tr> 
				<td>Company Name</td>
				<td><input type="text" name="company_name" value="<?php echo $res['company_name'];?>"></td>
			</tr>
			<tr> 
				<td>Position</td>
				<td><input type="text" name="position" value="<?php echo $res['position'];?>"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><textarea type="text" name="description"><?php echo $res['description'];?></textarea></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><textarea type="text" name="address"  ><?php echo $res['address'];?></textarea></td>
			</tr>
			<tr> 
				<td>Employment Type</td>
				<td>
					<select id="employment_type" name="employment_type" value="<?php echo $res['employment_type'];?>">
						<option value="full time">Full Time</option>
						<option value="part time">Part Time</option>
						<option value="contructual">Contructual</option>
						<option value="internship">Internship</option>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Start Date</td>
				<td><input type="date" name="start_date" value="<?php echo $res['start_date'];?>"></td>
			</tr>
			<tr> 
				<td>End Date</td>
				<td><input type="date" name="end_date" value="<?php echo $res['end_date'];?>"></td>
			</tr>
			<tr> 
				<td>I Currently Work Here</td>
				<td><input type="checkbox" name="i_currently_work_here"></td>
			</tr>
			<tr> 
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Edit"></td>
			</tr>
		</table>
	</form>
</body>
</html>