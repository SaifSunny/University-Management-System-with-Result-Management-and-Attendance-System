<?php
include_once("./database/config.php");

session_start();
$username = $_SESSION['username'];
$class_id = $_GET['class_id'];

$sql = "SELECT * FROM class WHERE class_id='$class_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);


$capacity=$row['capacity'];
$schedule=$row['schedule'];
$room=$row['room'];;

$faculty_id=$row['faculty_id'];
$faculty_name=$row['faculty_name'];

if (isset($_POST['submit_fac'])) {
    $faculty_id = $_POST['select_faculty'];

    $query = "SELECT * FROM class WHERE faculty_id = '$faculty_id' AND schedule='$schedule'";
    $query_run = mysqli_query($conn, $query);
    if(!$query_run->num_rows > 0) {
        $query2 = "UPDATE class SET faculty_id='$faculty_id',
        faculty_name=(SELECT CONCAT(firstname, ' ', lastname) FROM faculty WHERE faculty_id='$faculty_id') 
        WHERE class_id='$class_id'";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            echo "<script> alert('Class Faculty Successfully Updated.');
            </script>";
                        
        } else {
            echo "<script>alert('Cannot Update Faculty')</script>";
        }
    }
    else{
        echo "<script>alert('Faculty Schedule Conflicts.')</script>";
    }
}

if (isset($_POST['submit_cap'])) {
    $capacity = $_POST['capacity'];

        $query2 = "UPDATE class SET capacity='$capacity' WHERE class_id='$class_id'";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            echo "<script> alert('Class Capacity Updated.');
            </script>";
                        
        } else {
            echo "<script>alert('Cannot Update Capacity')</script>";
        }
}

if (isset($_POST['submit_sch'])) {
    $schedule = $_POST['select_sched'];

    $query = "SELECT * FROM class WHERE faculty_id = '$faculty_id' AND schedule='$schedule'";
    $query_run = mysqli_query($conn, $query);
    if(!$query_run->num_rows > 0) {
        $query2 = "UPDATE class SET schedule='$schedule' WHERE class_id='$class_id'";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            echo "<script> alert('Class Faculty Successfully Updated.');
            </script>";
                        
        } else {
            echo "<script>alert('Cannot Update Faculty')</script>";
        }
    }
    else{
        echo "<script>alert('Faculty Schedule Conflicts.')</script>";
    }
}
if (isset($_POST['submit_cls'])) {
    $room = $_POST['room'];

    $query = "SELECT * FROM class WHERE room = '$room' AND schedule='$schedule'";
    $query_run = mysqli_query($conn, $query);
    if(!$query_run->num_rows > 0) {
        $query2 = "UPDATE class SET room='$room' WHERE class_id='$class_id'";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            echo "<script> alert('Classroom Successfully Updated.');
            </script>";
                        
        } else {
            echo "<script>alert('Cannot Update Classroom')</script>";
        }
    }
    else{
        echo "<script>alert('Classroom Not Available at Schedule.')</script>";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="./includes/nav.css">
    <link rel="stylesheet" type="text/css" href="./includes/table.css">
    <title>Update Class</title>
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
                    <a href="semester.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;">
                        <i class="fas fa-clock fa-fw me-3"></i><span>Semester</span></a>
                    <a href="class.php" class="list-group-item list-group-item-action py-2 bg-primary active"
                        style="background:#1690A7; Color:white;"><i
                            class="fas fa-chart-bar fa-fw me-3"></i><span>Classes</span></a>
                    <a href="faculty.php" class="list-group-item list-group-item-action py-2 "
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
                                    <h2 style="padding-left:10px; font-weight:1000">Update Class</h2>
                                </div>

                                <div class="card-body" id="card-body">
                                    <div class="container">
                                        <form action="" method="POST">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Course Faculty</label>
                                                        <select class="form-control" id="select_faculty"
                                                            name="select_faculty" required>
                                                            <option value="<?php echo $faculty_id?>">
                                                                <?php echo $faculty_name?></option>
                                                            <?php
                                                            $br_option = "SELECT * FROM faculty";
                                                            $br_option_run = mysqli_query($conn, $br_option);

                                                            if (mysqli_num_rows($br_option_run) > 0) {
                                                                foreach ($br_option_run as $row2) {
                                                            ?>
                                                            <option value="<?php echo $row2['faculty_id']; ?>">
                                                                <?php echo $row2['firstname']; ?>
                                                                <?php echo $row2['lastname']; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Capacity</label>
                                                        <input type="text" class="form-control" name="capacity"
                                                            id="capacity" placeholder="Section Capacity"
                                                            value="<?php echo $capacity?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Schedule</label>
                                                        <select class="form-control" name="select_sched"
                                                            id="select_sched" required>
                                                            <option value="<?php echo $schedule ?>">
                                                                <?php echo $schedule ?></option>
                                                            <option value="SUN-TUE 8:30 AM - 9:50 AM">SUN-TUE 8:30 AM -
                                                                9:50 AM</option>
                                                            <option value="SUN-TUE 10:00 AM - 11:20 AM">SUN-TUE 10:00 AM
                                                                - 11:20 AM</option>
                                                            <option value="SUN-TUE 11:30 AM - 12:50 PM">SUN-TUE 11:30 AM
                                                                - 12:50 PM</option>
                                                            <option value="SUN-TUE 1:10 PM - 2:30 PM">SUN-TUE 1:10 PM -
                                                                2:30 PM</option>
                                                            <option value="SUN-TUE 2:40 PM - 4:00 PM">SUN-TUE 2:40 PM -
                                                                4:00 PM</option>
                                                            <option value="SUN-TUE 4:10 PM - 5:30 PM">SUN-TUE 4:10 PM -
                                                                5:30 PM</option>
                                                            <option value="MON-WED 8:30 AM - 9:50 AM">MON-WED 8:30 AM -
                                                                9:50 AM</option>
                                                            <option value="MON-WED 10:00 AM - 11:20 AM">MON-WED 10:00 AM
                                                                - 11:20 AM</option>
                                                            <option value="MON-WED 11:30 AM - 12:50 PM">MON-WED 11:30 AM
                                                                - 12:50 PM</option>
                                                            <option value="MON-WED 1:10 PM - 2:30 PM">MON-WED 1:10 PM -
                                                                2:30 PM</option>
                                                            <option value="MON-WED 2:40 PM - 4:00 PM">MON-WED 2:40 PM -
                                                                4:00 PM</option>
                                                            <option value="MON-WED 4:10 PM - 5:30 PM">MON-WED 4:10 PM -
                                                                5:30 PM</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="padding:10px">
                                                        <label style="padding-bottom:10px;">Room No.</label>
                                                        <input type="text" class="form-control" name="room" id="room"
                                                            placeholder="Room No." value="<?php echo $room?>" required>
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="d-flex justify-content-center" style="padding-top:30px;">
                                                <button type="submit_fac" name="submit_fac" class="btn btn-success"
                                                    style="margin-right:10px;">Change
                                                    Faculty</button>
                                                <button type="submit_cap" name="submit_cap" class="btn btn-success"
                                                    style="margin-right:10px;">Update
                                                    Capacity</button>
                                                <button type="submit_sch" name="submit_sch" class="btn btn-success"
                                                    style="margin-right:10px;">Change
                                                    Schedule</button>

                                                <button type="submit_cls" name="submit_cls" class="btn btn-success"
                                                    style="margin-right:10px;">Change
                                                    Classroom</button>
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