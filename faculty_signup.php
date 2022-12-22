<?php

include './database/config.php';

date_default_timezone_set("Asia/Dhaka");

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
	header("Location: faculty_dash.php");
}

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$p = $_POST['password'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nid = $_POST['nid'];
    $education = $_POST['education'];
    $gender = $_POST['gender'];
    $birthday=$_POST['birthday'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $dep_id=$_POST['select_dep'];
    $sem_id=$_POST['select_sem'];

	if ($password == $cpassword) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			if (strlen($p) > 5) {

				$sql = "SELECT * FROM users WHERE username='$username'";
				$result = mysqli_query($conn, $sql);

				if (!$result->num_rows > 0) {
					$query2 = "INSERT INTO faculty(firstname, lastname, nid, education, gender, birthday, 
                    email, contact, `address`, city, zip, username,`password`,dep_id, dep_code, join_sem_id, join_sem)
                    VALUES ('$firstname','$lastname','$nid','$education','$gender','$birthday',
                    '$email','$contact','$address','$city','$zip','$username',
                    '$password','$dep_id',(SELECT dep_code FROM department WHERE dep_id='$dep_id'), $sem_id,
                    (SELECT sem_code FROM semester WHERE sem_id='$sem_id'))";
                    $query_run2 = mysqli_query($conn, $query2);

                    if ($query_run2) {
                        echo "<script> alert('Registration Completed.');
                        window.location.href='faculty_login.php';
                        </script>";
                        
                    } else {
                        echo "<script>alert('Something Went Wrong')</script>";
                    }
				} else {
					echo "<script>alert('Woops! User Already Exists.')</script>";
				}
			} else {
				echo "<script>alert('Password has to be minimum of 6 charecters')</script>";
			}
		} else {
			echo "<script>alert('Woops! Incorrect Email')</script>";
		}
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Faculty Signup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="./includes/reg_styles.css">
</head>

<body>
    <form action="" method="POST" class="login-email">
        <div class="row " style="text-align:center;">
            <div class="col-md-12">
                <div class="form-group" style="padding:10px">
                    <h2>Faculty Signup</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name"
                        required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name"
                        required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">NID Number</label>
                    <input type="text" class="form-control" name="nid" id="nid" placeholder="NID Number" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">Education</label>
                    <input type="text" class="form-control" name="education" id="education" placeholder="Education"
                        required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:20px;">Gender</label>
                    <select class="form-control" name="gender" id="gender" placeholder="Gender" required>
                        <option>-- Select Gender --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label style="padding-bottom:20px;">Birthday</label>
                    <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Birthday"
                        required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">Contact</label>
                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">City</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">Zip</label>
                    <input type="text" class="form-control" name="zip" id="zip" placeholder="Zip" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                        required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                        required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" id="cpassword"
                        placeholder="Confirm Password" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">Department</label>
                    <select class="form-control" id="select_dep" name="select_dep" required>
                        <option>-- Select Department --</option>
                        <?php
                            $br_option = "SELECT * FROM department";
                            $br_option_run = mysqli_query($conn, $br_option);

                            if (mysqli_num_rows($br_option_run) > 0) {
                                foreach ($br_option_run as $row2) {
                            ?>
                        <option value="<?php echo $row2['dep_id']; ?>">
                            <?php echo $row2['dep_code']; ?> </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" style="padding:10px">
                    <label style="padding-bottom:10px;">Joined Semester</label>
                    <select class="form-control" id="select_sem" name="select_sem" required>
                        <option>-- Select Semester --</option>
                        <?php
                            $br_option = "SELECT * FROM semester";
                            $br_option_run = mysqli_query($conn, $br_option);

                            if (mysqli_num_rows($br_option_run) > 0) {
                                foreach ($br_option_run as $row2) {
                        ?>
                        <option value="<?php echo $row2['sem_id']; ?>">
                            <?php echo $row2['sem_code']; ?> </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end" style="padding-top:50px;">
            <a href="index.php" class="ca" style="padding-right:680px">Already have an account?</a>
            <button name="submit" class="btn btn-success">Sign Up</button>
        </div>
    </form>
</body>

</html>