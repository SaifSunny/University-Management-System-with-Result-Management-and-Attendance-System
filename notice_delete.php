<?php
include './database/config.php';

$notice_id = $_GET['notice_id'];

$query = "DELETE FROM notice WHERE notice_id='$notice_id'";
$query_run = mysqli_query($conn, $query);
    if ($query_run) {
      echo "<script> 
      alert('Notice has been DELETED.');
      window.location.href='notice.php';
      </script>";
      
    } else {
      echo "<script>alert('Cannot Delete Notice')</script>";
    }
?>
