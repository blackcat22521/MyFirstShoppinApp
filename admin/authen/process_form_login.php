<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="admin/authen/login.css">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(webimage/owner-getting-ready-reopening.jpg); background-size: cover; background-repeat: no-repeat;">
	<div class="container">
		<div class="panel panel-primary" style="width: 480px; margin: 0px auto; margin-top: 50px; background-color: white; padding: 10px; border-radius: 5px; box-shadow: 2px 2px #9ac9f5;">
			<div class="panel-heading">
				<h2 class="text-center">Login</h2>
				<h5 style="color: red;" class="text-center"><?=$msg?></h5>
			</div>
			<div class="panel-body">
				<form method="post">
					
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" id="email" name="email" value="<?=$email?>">
					</div>
					<div class="form-group">
					  <label for="pwd">Password:</label>
					  <input required="true" type="password" class="form-control" id="pwd" name="password" minlength="6">
					</div>
					
					<p>
						<a href="index.php?page=register">Create new account</a>
					</p>
					<button class="btn btn-success">Login</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
$servername = "localhost";
$username = "mamp";
$password = "Pewpew321.";
$dbname ="OnlineStore";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form input data
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$sql = "SELECT * FROM _User WHERE email='$email' AND pass='$pass'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 1) {
	session_start();
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
	header("Location: index.php?page=home");
    exit();
} 

mysqli_close($conn);

?> 