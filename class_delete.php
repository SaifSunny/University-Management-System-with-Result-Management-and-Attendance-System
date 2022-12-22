<?php
include './database/config.php';

$class_id = $_GET['class_id'];

$query = "DELETE FROM class WHERE class_id='$class_id'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Class has been DELETED.');
      window.location.href='class.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Class')</script>";
    }
?>
