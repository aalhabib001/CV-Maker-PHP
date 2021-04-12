<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("../connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM experience WHERE user_id=".$_SESSION['id']." ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Experience List</title>
</head>
<body class="container">

<a href="../index.php">Home</a> | <a href="../cv.php">View CV</a> | <a href="../logout.php">Logout</a>

<table width='90%' border=1 class="m-4">
		<tr>
			<th class="p-3">Company Name</td>
			<th>Address</td>
			<th>Position</td>
			<th>Description</td>
			<th>Start Date</td>
			<th>End Date</td>
			<th>Employee Type</td>
			<th>Action</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td class='p-3'>".$res['company_name']."</td>";
			echo "<td>".$res['address']."</td>";
			echo "<td>".$res['position']."</td>";
			echo "<td>".$res['description']."</td>";	
			echo "<td>".$res['start_date']."</td>";
			echo "<td>".$res['end_date']."</td>";
			echo "<td>".$res['employment_type']."</td>";	
			echo "<td><button class='btn btn-warning mt-3 mb-2'><a class='text-dark' href=\"./edit_exp.php?id=$res[id]\">Edit</a></button> | 
			<button class='btn btn-danger mt-3 mb-2'><a class='text-white' href=\"./deleteE_exp.php?id=$res[id]\" 
			onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></button></td>";		
		}
		?>
	</table>
    
</body>
</html>