<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];
$faculty_id = $_SESSION['faculty_id'];
$class_id = $_GET['class_id'];
$att_date = $_GET['att_date'];



if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $attendence = $_POST['attendence'];


        $query2 = "INSERT INTO student_att(class_id, course_name, course_code, section, student_name,student_id,att_status,att_date)
        VALUES ('$class_id', (SELECT course_name FROM student_course WHERE class_id='$class_id'),(SELECT course_code FROM student_course WHERE class_id='$class_id'),
        (SELECT section FROM student_course WHERE class_id='$class_id'),(SELECT student_name FROM student_course WHERE class_id='$class_id'),
        (SELECT student_id FROM student_course WHERE class_id='$class_id'),'$attendence','$date')";
        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            echo "<script> alert('Attendence Successfully Taken.');
            window.location.href='faculty_att.php';
            </script>";
            
        } else {
            echo "<script>alert('Cannot save StudentAttendence')</script>";
            
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
    <title>Student Attendence</title>
</head>

<body>

    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" style="background:#1690A7; margin-top:20px">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="faculty_dash.php" class="list-group-item list-group-item-action py-2 " aria-current="true"
                        style="background:#1690A7;Color:white;">
                        <i class="fas fa-home fa-fw me-3"></i><span>Home</span></a>

                    <a href="faculty_course.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;"><i class="fas fa-chart-pie fa-fw me-3"></i><span>My
                            Courses</span></a>

                    <a href="faculty_schedule.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;">
                        <i class="fas fa-school fa-fw me-3"></i><span>Class Schedule</span></a>

                    <a href="faculty_att.php" class="list-group-item list-group-item-action py-2 bg-primary active"
                        style="background:#1690A7; Color:white;">
                        <i class="fas fa-clock fa-fw me-3"></i><span>Take Attendence</span></a>
                    <a href="faculty_result.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;"><i
                            class="fas fa-chart-line fa-fw me-3"></i><span>Publish Result</span></a>

                    <a href="faculty_notice_list.php" class="list-group-item list-group-item-action py-2 "
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
                <a class="navbar-brand" href="faculty_dash.php">
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
                        <li><a class="dropdown-item" href="faculty_profile.php">My profile</a></li>
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
                        <div class="col-md-12">
                            <div class="card mx-auto"
                                style="text-align:center;padding:50px 20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                <div class="card-title">
                                    <h2 style="padding-left:10px; font-weight:1000">Student Attendence</h2>
                                </div>

                                <div class="card-body" id="card-body">
                                    <form action="" method="POST">

                                        <table class="table">
                                            <thead>
                                                <th>SL</th>
                                                <th>Student Id</th>
                                                <th>Student Name</th>
                                                <th>Attendence</th>

                                            </thead>

                                            <tbody>
                                                <?php 
                                            $sql = "SELECT * FROM student_att WHERE class_id='$class_id' AND att_date='$att_date'";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                                $i=1;
                                                while($row=mysqli_fetch_assoc($result)){
                                                    $class_id=$row['class_id'];
                                                    $student_id=$row['student_id'];
                                                    $student_name=$row['student_name'];

                                                    if($row['att_status']=='1'){
                                                        echo '<tr>
                                                        <td>'.$i.'</td>
                                                        <td>'.$student_id.'</td>
                                                        <td>'.$student_name.'</td>
                                                        <td>
                                                        <input type=checkbox name="<?php echo $student_id?>" checked onclick="return false;"/>  Present
                                                        </td>
                                                        </tr>';
                                                    }
                                                    else{
                                                        echo '<tr>
                                                        <td>'.$i.'</td>
                                                        <td>'.$student_id.'</td>
                                                        <td>'.$student_name.'</td>
                                                        <td>
                                                        <input type=checkbox name="<?php echo $student_id?>" onclick="return false;"/>  Present
                                                        </td>
                                                        </tr>';

                                                    }


                                                    $i++;
                                                }
                                            }
                                        ?>
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-end" style="padding-top:10px;">
                                            <a href="faculty_att.php" class="btn btn-primary">Go Back</a>
                                        </div>
                                    </form>

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