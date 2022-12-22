<?php
include './database/config.php';

$faculty_id = $_GET['faculty_id'];

$query = "DELETE FROM faculty WHERE faculty_id='$faculty_id'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Faculty has been DELETED.');
      window.location.href='faculty.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Faculty');
      window.location.href='faculty.php';
      </script>";
    }
?>
