<?php
include './database/config.php';

$student_id = $_GET['student_id'];

$query = "DELETE FROM student WHERE student_id='$student_id'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Student has been DELETED.');
      window.location.href='student.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Student');
      window.location.href='student.php';
      </script>";
    }
?>
