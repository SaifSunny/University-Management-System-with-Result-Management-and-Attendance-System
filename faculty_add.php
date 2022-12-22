<?php
include_once("./database/config.php");

session_start();
$username = $_SESSION['username'];

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nid = $_POST['nid'];
    $education = $_POST['education'];
    $gender = $_POST['gender'];
    $birthday=$_POST['birthday'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $username=$_POST['username'];
    $password= md5($_POST['password']);
    $dep_id=$_POST['select_dep'];
    $sem_id=$_POST['select_sem'];


    $query = "SELECT * FROM faculty WHERE nid = '$nid'";
    $query_run = mysqli_query($conn, $query);

    if (!$query_run->num_rows > 0) {
        $query = "SELECT * FROM faculty WHERE email = '$email'";
        $query_run = mysqli_query($conn, $query);
        if (!$query_run->num_rows > 0) {
            $query2 = "INSERT INTO faculty(firstname, lastname, nid, education, gender, birthday, 
            email, contact, `address`, city, zip, username,`password`,dep_id, dep_code, join_sem_id, join_sem)
            VALUES ('$firstname','$lastname','$nid','$education','$gender','$birthday',
            '$email','$contact','$address','$city','$zip','$username',
            '$password','$dep_id',(SELECT dep_code FROM department WHERE dep_id='$dep_id'), $sem_id,
            (SELECT sem_code FROM semester WHERE sem_id='$sem_id'))";
            $query_run2 = mysqli_query($conn, $query2);

            if ($query_run2) {
                echo "<script> alert('Faculty Successfully ADDED.');
                window.location.href='faculty.php';
                </script>";
                
            } else {
                echo "<script>alert('Cannot save Faculty')</script>";
            }
        }
        else{
            echo "<script>alert('Email Already Exists')</script>";
        }

    } else {
        echo "<script>alert('Faculty Already Exists')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
    <link rel="stylesheet" type="text/css" href="./includes/nav.css">
    <link rel="stylesheet" type="text/css" href="./includes/table.css">
    <title>Add Faculty</title>
</head>

<body>

    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" style="background:#1690A7; margin-top:20px">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="admin_dash.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;" aria-current="true" style="Color:white;">
                        <i class="fas fa-home fa-fw me-3"></i><span>Home</span></a>
                    <a href="department.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;">
                        <i class="fas fa-school fa-fw me-3"></i><span>Department</span></a>
                    <a href="course.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;"><i
                            class="fas fa-chart-pie fa-fw me-3"></i><span>Courses</span></a>
                    <a href="program.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;"><i
                            class="fas fa-chart-line fa-fw me-3"></i><span>Programs</span></a>
                    <a href="semester.php" class="list-group-item list-group-item-action py-2"
                        style="background:#1690A7; Color:white;">
                        <i class="fas fa-clock fa-fw me-3"></i><span>Semester</span></a>
                    <a href="class.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;"><i
                            class="fas fa-chart-bar fa-fw me-3"></i><span>Classes</span></a>
                    <a href="faculty.php" class="list-group-item list-group-item-action py-2  bg-primary active "
                        style="background:#1690A7; Color:white;"><i
                            class="fas fa-users fa-fw me-3"></i><span>Faculty</span></a>
                    <a href="student.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;"><i
                            class="fas fa-user-graduate fa-fw me-3"></i><span>Student</span></a>
                    <a href="notice.php" class="list-group-item list-group-item-action py-2"
                        style="background:#1690A7; Color:white;"><i
                            class="fas fa-globe fa-fw me-3"></i><span>Notice</span></a>
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light fixed-top"
            style="background:#1690A7; padding:15px 80px">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="admin_dash.php">
                    <h2 style="color:white; font-weight:600;">UMS</h2>
                </a>

                <!-- Right links -->
                <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" style="color:white; font-weight:500" role="button"
                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle"
                            height="32" alt="" loading="lazy" />
                        <span style="padding-left:10px"><?php echo $username?></span>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="admin_profile.php">My profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>

            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>

    <main style="margin-top: 58px;">
        <div class="container pt-4" style="padding-left:50px; padding-right:50px;">
            <div style="padding: 50px 0;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mx-auto"
                                style="padding:50px 20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                <div class="card-title">
                                    <h2 style="padding-left:10px; font-weight:1000">Add Faculty</h2>
                                </div>

                                <div class="card-body" id="card-body">
                                    <div class="container">
                                        <form action="" method="POST">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Department</label>
                                                        <select class="form-control" id="select_dep" name="select_dep"
                                                            required>
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
                                                        <select class="form-control" id="select_sem" name="select_sem"
                                                            required>
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">First Name</label>
                                                        <input type="text" class="form-control" name="firstname"
                                                            id="firstname" placeholder="First Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Last Name</label>
                                                        <input type="text" class="form-control" name="lastname"
                                                            id="lastname" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Education</label>
                                                        <input type="text" class="form-control" name="education"
                                                            id="education" placeholder="Education" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">NID Number</label>
                                                        <input type="text" class="form-control" name="nid" id="nid"
                                                            placeholder="NID Number" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Gender</label>
                                                        <select class="form-control" name="gender" id="gender"
                                                            placeholder="Gender" required>
                                                            <option>-- Select Gender --</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Birthday</label>
                                                        <input type="date" class="form-control" name="birthday"
                                                            id="birthday" placeholder="Birthday" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Contact</label>
                                                        <input type="text" class="form-control" name="contact"
                                                            id="contact" placeholder="Contact" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Email</label>
                                                        <input type="text" class="form-control" name="email" id="email"
                                                            placeholder="Email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Address</label>
                                                        <input type="text" class="form-control" name="address"
                                                            id="address" placeholder="Address" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">City</label>
                                                        <input type="text" class="form-control" name="city" id="city"
                                                            placeholder="City" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Zip</label>
                                                        <input type="text" class="form-control" name="zip" id="zip"
                                                            placeholder="Zip" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Username</label>
                                                        <input type="text" class="form-control" name="username"
                                                            id="username" placeholder="Username" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Password</label>
                                                        <input type="text" class="form-control" name="password"
                                                            id="password" placeholder="Password" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end" style="padding-top:10px;">
                                                <button type="submit" name="submit" class="btn btn-success"
                                                    style="margin-right:10px;">Add Faculty</button>
                                                <a href="faculty.php" class="btn btn-primary">Go Back</a>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mx-auto"
                                style="text-align:center;padding:50px 20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                <div class="card-title">
                                    <h2 style="padding-left:10px; font-weight:1000">Recent Users</h2>
                                </div>

                                <div class="card-body" id="card-body">
                                    <table class="table">

                                        <tbody>
                                            <?php 
                                            $sql = "SELECT DISTINCT `name`, `role` from recent order by id desc limit 8;";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                                while($row=mysqli_fetch_assoc($result)){
                                                    
                                                    $name=$row['name'];
                                                    $role=$row['role'];

                                                    echo '<tr>
                                                    <td style="font-size:14px; font-weight:600; "> <img src="./images/user-profile.png" style="width:14%;" alt="profile"> <span style="padding-left:20px;">'.$name.'</span></td>
                                                    <td style="font-size:13px;font-weight:600;color:#bbb;"> Role: '.$role.'</td>
                                                    </tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <?php include_once("./templates/footer.php");?>
    </main>
</body>

</html>