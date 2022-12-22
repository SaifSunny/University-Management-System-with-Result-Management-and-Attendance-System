<?php
include_once("./database/config.php");

session_start();
$student_id = $_SESSION['student_id'];

$sql = "SELECT * FROM `student` WHERE student_id='$student_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$firstname = $row['firstname'];
$lastname = $row['lastname'];

$gender = $row['gender'];
$birthday=$row['birthday'];
$email=$row['email'];
$contact=$row['contact'];
$address=$row['address'];
$city=$row['city'];
$zip=$row['zip'];
$dep_id=$row['dep_id'];
$dep_code=$row['dep_code'];
$prog_id=$row['prog_id'];
$prog_name=$row['prog_name'];
$reg_sem_id	=$row['reg_sem_id'];
$reg_sem=$row['reg_sem'];




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
    <title>View Profile</title>
</head>

<body>

    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" style="background:#1690A7; margin-top:20px">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="student_dash.php" class="list-group-item list-group-item-action py-2"
                        aria-current="true" style="background:#1690A7;Color:white;">
                        <i class="fas fa-home fa-fw me-3"></i><span>Home</span></a>
                    <a href="student_course.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;"><i class="fas fa-user-graduate fa-fw me-3"></i><span>My Courses</span></a>

                    <a href="student_take_course.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;"><i class="fas fa-chart-pie fa-fw me-3"></i><span>Take Course</span></a>

                    <a href="student_schedule.php" class="list-group-item list-group-item-action py-2"
                        style="background:#1690A7; Color:white;">
                        <i class="fas fa-clock fa-fw me-3"></i><span>Class Schedule</span></a>

                    <a href="student_result.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;"><i
                            class="fas fa-chart-line fa-fw me-3"></i><span>Publish Result</span></a>
                   
                    <a href="student_notice_list.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;">
                        <i class="fas fa-globe fa-fw me-3"></i><span>Notice</span></a>
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
                <a class="navbar-brand" href="student_dash.php">
                    <h2 style="color:white; font-weight:600;">UMS</h2>
                </a>

                <!-- Right links -->
                <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" style="color:white; font-weight:500" role="button"
                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle"
                            height="32" alt="" loading="lazy" />
                        <span style="padding-left:10px"><?php echo $_SESSION['username']?></span>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="student_profile.php">My profile</a></li>
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
                                <div class="card mx-auto" style="padding:50px 20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                    <div class="card-title">
                                        <h2 style="padding-left:10px; font-weight:1000">View Profile</h2>
                                    </div>

                                    <div class="card-body" id="card-body">
                                    <div class="container">
                                        <form action="" method="POST">
                                        <div class="row">
                                                <div class="col-md-12" style="padding-bottom:20px;">
                                                    <div class="form-group" style="padding:10px;text-align:center;">
                                                        <img src="./images/user-profile.png" width="35%"alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-4">
                                                    <div class="form-group" style="padding:10px;">
                                                        <label style="padding-bottom:10px;font-weight:700;">Student ID</label><br>
                                                        <?php echo $student_id?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" style="padding:10px;">
                                                        <label style="padding-bottom:10px;font-weight:700;">First Name</label><br>
                                                        <?php echo $firstname?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" style="padding:10px;">
                                                        <label style="padding-bottom:10px;font-weight:700;">Last Name</label><br>
                                                        <?php echo $lastname?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px;">
                                                        <label style="padding-bottom:10px;font-weight:700;">Gender</label><br>
                                                        <?php echo $gender?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px;">
                                                        <label style="padding-bottom:10px;font-weight:700;">Birthday</label><br>
                                                        <?php echo $birthday?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px;">
                                                        <label style="padding-bottom:10px;font-weight:700;">Contact</label><br>
                                                        <?php echo $contact?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px;">
                                                        <label style="padding-bottom:10px;font-weight:700;">Email</label><br>
                                                        <?php echo $email?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="padding:10px;">
                                                        <label style="padding-bottom:10px;font-weight:700;">Address</label><br>
                                                        <?php echo $address?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px;\">
                                                        <label style="padding-bottom:10px;font-weight:700;">City</label><br>
                                                        <?php echo $city?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;font-weight:700;">Zip</label><br>
                                                        <?php echo $zip?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px; font-weight:700;">Program</label><br>
                                                        <?php echo $prog_name?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px;">
                                                        <label style="padding-bottom:10px;font-weight:700;">Department</label><br>
                                                        <?php echo $dep_code?>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px; font-weight:700;">Registered Semester</label><br>
                                                        <?php echo $reg_sem?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end" style="padding-top:10px;">
                                            <a href="student_profile_update.php" class="btn btn-success" style="margin-right:10px;">Edit Profile</a>
                                                <a href="student_dash.php" class="btn btn-primary">Go Back</a>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="card"
                                style="width:100%;height:100%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                <div class="row" style="padding:40px 30px">

                                    <div class="card-title">
                                        <h2 style="text-align:center; font-size:26px;">Notice</h2>
                                    </div>

                                    <table class="table">
                                        <tbody>
                                            <?php 
                                    $sql = "SELECT * from notice order by notice_id desc limit 6;";
                                    $result = mysqli_query($conn, $sql);
                                    if($result){
                                        while($row=mysqli_fetch_assoc($result)){
                                            $notice_id=$row['notice_id'];
                                            $notice_date=$row['notice_date'];
                                            $subject=$row['subject'];
                                            $notice_from=$row['subject'];

                                            echo '<tr>
                                            <td style="font-size:14px; font-weight:600; "><a href="student_notice_view.php?notice_id='.$notice_id.'" style="text-decoration:none; "> <span style="padding-left:20px;">'.$subject.'</span><a></td>
                                            <td style="font-size:13px;font-weight:600;color:#bbb;text-align:right;"> Date :<br>'.$notice_date.'</td>
                                            </tr>';
                                        }
                                    }
                                    ?>
                                        </tbody>
                                    </table>
                                    <div style="text-align:center;">
                                        <a href="student_notice_list.php" style="text-decoration:none;"> <span
                                                style="padding-left:20px;font-weight:500;">See All</span><a>
                                    </div>
                                </div>

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