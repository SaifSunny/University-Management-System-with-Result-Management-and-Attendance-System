<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];
$student_id = $_SESSION['student_id'];
$prog_id = $_SESSION['prog_id'];

$class_id = $_GET['class_id'];

$query = "SELECT * FROM student_course WHERE `student_id` = '$student_id' AND `class_id` = '$class_id'";
$query_run = mysqli_query($conn, $query);
if (!$query_run->num_rows > 0) {
    $query = "SELECT * FROM student_course WHERE `student_id` = '$student_id' AND `schedule` = (SELECT schedule FROM student_course WHERE class_id='$class_id')";
    $query_run = mysqli_query($conn, $query);
    if (!$query_run->num_rows > 0) {
        $query = "UPDATE class set capacity = capacity - 1 WHERE `class_id` = '$class_id' AND capacity > 0";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            $query = "SELECT * FROM class WHERE `class_id` = '$class_id' AND capacity = '0';";
            $query_run = mysqli_query($conn, $query);
            if(!$query_run->num_rows > 0){
                $query2 = "INSERT INTO student_course(class_id,course_id,course_name,course_code,
                credit,section,room,schedule, dep_id, dep_code,prog_id,prog_name,sem_id,sem_code, student_id, student_name)
                VALUES ('$class_id',(SELECT course_id FROM class WHERE class_id='$class_id'),(SELECT course_name FROM class WHERE class_id='$class_id'),
                (SELECT course_code FROM class WHERE class_id='$class_id'),(SELECT credit FROM class WHERE class_id='$class_id'),
                (SELECT section FROM class WHERE class_id='$class_id'),(SELECT room FROM class WHERE class_id='$class_id'),
                (SELECT schedule FROM class WHERE class_id='$class_id'),(SELECT dep_id FROM class WHERE class_id='$class_id'),
                (SELECT dep_code FROM class WHERE class_id='$class_id'),(SELECT prog_id FROM class WHERE class_id='$class_id'),
                (SELECT prog_name FROM class WHERE class_id='$class_id'),(SELECT sem_id FROM class WHERE class_id='$class_id'),
                (SELECT sem_code FROM class WHERE class_id='$class_id'),'$student_id',(SELECT CONCAT(firstname, lastname) FROM student WHERE student_id='$student_id'))";
                $query_run2 = mysqli_query($conn, $query2);
                if ($query_run) {
                    echo "<script>alert('Registration Completed.');
                    window.location.href='student_take_course.php';</script>;";
                }
                else{
                    echo "<script>alert('Cannot Complete Registration.');
                    window.location.href='student_take_course.php';</script>";
                }
            }
            else{
                echo "<script>alert('Section Capacity Exceeded.');
                window.location.href='student_take_course.php';</script>";

            }
        }
    }
    else{
        echo "<script>alert('Schedule Conflict Found.');
        window.location.href='student_take_course.php';</script>";
    }
}
else{
    echo "<script>alert('Already Enrolled In the course.');
    window.location.href='student_take_course.php';</script>";
}


?>