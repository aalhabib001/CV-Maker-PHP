<html>
<head>
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body class="m-4">
<a href="index.php">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO user(name, email, password) VALUES('$name', '$email', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
	}
} else {
?>
	<p><font size="+2">Register</font></p>
	<form name="form1" method="post" action="">
		<table width="25%" border="0">
			<tr> 
				<td>Full Name</td>
				<td><input class="form-control m-4" type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input class="form-control m-4" type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Password</td>
				<td><input class="form-control m-4" type="password" name="password"></td>
			</tr>		
			<tr> 
				<td>Confirm Password</td>
				<td><input class="form-control m-4" type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input class="btn btn-primary m-4" type="submit" name="submit" value="Register"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
