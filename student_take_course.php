<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];
$student_id = $_SESSION['student_id'];
$prog_id = $_SESSION['prog_id'];


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
    <title>Courses Regestration</title>
</head>

<body>

<header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" style="background:#1690A7; margin-top:20px">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="student_dash.php" class="list-group-item list-group-item-action py-2 "
                        aria-current="true" style="background:#1690A7;Color:white;">
                        <i class="fas fa-home fa-fw me-3"></i><span>Home</span></a>
                    <a href="student_course.php" class="list-group-item list-group-item-action py-2 "
                        style="background:#1690A7; Color:white;"><i class="fas fa-user-graduate fa-fw me-3"></i><span>My Courses</span></a>

                    <a href="student_take_course.php" class="list-group-item list-group-item-action py-2 bg-primary active"
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
                        <div class="col-md-12">
                            <div class="card mx-auto"
                                style="text-align:center;padding:50px 20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                                <div class="card-title">
                                    <h2 style="padding-left:10px; font-weight:1000">Offered Courses</h2>
                                </div>

                                <div class="card-body" id="card-body">
                                    <table class="table">
                                        <thead>
                                            <th>SL</th>
                                            <th>Course Code</th>
                                            <th>Course Name</th>
                                            <th>Section</th>
                                            <th>Credit Hr.</th>
                                            <th>Room No.</th>
                                            <th>Schedule</th>
                                            <th>Capacity</th>
                                            <th>Action</th>
                                        </thead>

                                        <tbody>
                                            <?php 
                                            $sql = "SELECT * from class WHERE sem_id= (SELECT sem_id FROM semester ORDER BY sem_id DESC LIMIT 1) AND prog_id='$prog_id'";
                                            $result = mysqli_query($conn, $sql);
                                            if($result){
                                                $i=1;
                                                while($row=mysqli_fetch_assoc($result)){
                                                    $class_id=$row['class_id'];
                                                    $course_name=$row['course_name'];
                                                    $course_code=$row['course_code'];
                                                    $section=$row['section'];
                                                    $credit=$row['credit'];
                                                    $room=$row['room'];
                                                    $schedule=$row['schedule'];
                                                    $capacity=$row['capacity'];


                                                    echo '<tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$course_code.'</td>
                                                    <td>'.$course_name.'</td>
                                                    <td>'.$section.'</td>
                                                    <td>'.$credit.'</td>
                                                    <td>'.$room.'</td>
                                                    <td>'.$schedule.'</td>
                                                    <td>'.$capacity.'</td>
                                                    <td><a href="student_enroll.php?class_id='.$class_id.'" class="btn btn-success">Enroll</a></td>
                                                    </tr>';
                                                    $i++;
                                                }
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end" style="padding-top:10px;">
                                        <a href="student_dash.php" class="btn btn-primary">Go Back</a>
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