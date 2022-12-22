<?php
include './database/config.php';

$course_id = $_GET['course_id'];

$query = "DELETE FROM course WHERE course_id='$course_id'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Course has been DELETED.');
      window.location.href='course.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Course')</script>";
    }
?>
