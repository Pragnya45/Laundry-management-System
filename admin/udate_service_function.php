<?php
session_start();

date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');

// Connecting to the database
include('../connect.php');
extract($_POST);

  $sname = $_POST['sname'];
  $price = $_POST['price'];

  $sql = "UPDATE `service` SET  price ='".$price."' WHERE sname='".$sname."'";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = 'Record Successfully Added';
    header('Location:admin_dashboard.php');
    exit;
  } else {
    $_SESSION['error'] = 'Something Went Wrong';
    echo "Failed to add ";
    exit;
  }

?>