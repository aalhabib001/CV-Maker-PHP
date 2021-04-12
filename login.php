<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body class="m-4">
<a href="index.php">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM user WHERE email='$user' AND password='$pass'")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['email'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "<h4>Invalid username or password.</h4>";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Login</font></p>
	<form name="form1" method="post" action="">
		<table width="25%" border="0">
			<tr> 
				<td>Username</td>
				<td><input class="form-control m-4" type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input class="form-control m-4" type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input class="btn btn-primary m-4" type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
