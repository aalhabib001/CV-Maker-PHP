<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body class="m-4">
	<div id="header">
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br/>
		<br/>
		<button class="btn btn-primary"><a class="text-white" href='cv.php'>View CV</a></button>
		
		<button class="btn btn-warning"><a class="text-dark" href='./experience/add_experience.php'>Add Experience Information</a></button>
		<button class="btn btn-success"><a class="text-white" href='add_cv_info.php'>Add CV Information</a></button>
		<button class="btn btn-dark"><a class="text-white" href='./experience/exp_list.php'>Edit/Delete Experience</a></button>
		<br/><br/>
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}
	?>
</body>
</html>
