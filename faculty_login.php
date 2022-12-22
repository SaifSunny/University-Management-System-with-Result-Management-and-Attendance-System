<?php

include './database/config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
	header("Location: faculty_dash.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM faculty WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['role'] = $row['role'];


			$sql = "INSERT INTO recent(`name`, `role`) VALUES ('$username', 'Faculty')";
			$result = mysqli_query($conn, $sql);
			if($result){
				header("Location: faculty_dash.php");
			}

	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Faculty login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./includes/login_styles.css">
</head>

<body>

	<form action="" method="POST" class="login-email">
		<h3>Faculty Login</h3>
		<div class="form-group">
			<label>Username</label>
			<input type="text" placeholder="Enter Username" name="username" required><br>
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" placeholder="Enter Password" name="password" required><br>
		</div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 bg-light text-right">
                    <a href="" class="ca ">Forgot Password? ?</a>
                </div>
                
                <div class="col-md-3 bg-light text-right">
                    <button class="btn btn-success " name="submit" >Login</button>
                </div>
            </div>
        </div>

	</form>
</body>

</html>