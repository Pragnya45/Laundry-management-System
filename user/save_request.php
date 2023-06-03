<?php
session_start();
if (isset($_SESSION['userID'])) {
  $userID = $_SESSION['userID'];
} else {
  echo "Session value not found.";
}

date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');

// Connecting to the database
include('../connect.php');
extract($_POST);

// Get user details from the database based on the userID
$sql_user = "SELECT fname,lname,address FROM `customer` WHERE uid='".$userID."'";

$result_user = mysqli_query($conn, $sql_user);

if (mysqli_num_rows ($result_user)>0) {
  $row_user = mysqli_fetch_assoc($result_user);
  $fname = $row_user['fname'];
  $lname = $row_user['lname'];
  $address = $row_user['address'];

  $var = $sname;
  $snamearr = explode(',',$var );
  $sname_id = $snamearr[0];
  $sql = "SELECT sname FROM `service` WHERE id = $sname_id";
  $result = mysqli_query($conn, $sql);
  
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $sname2 = $row['sname'];

    
  } else {
    echo "Service not there";
    exit;
  }

  $price = $_POST['price'];
  $description = $_POST['description'];
  $dod = $_POST['dod'];
  $todays_date = $_POST['todays_date'];  
  $delivery_status ='Initiated';

  $sql = "INSERT INTO `order` (`uid`,`fname`, `lname`, `sname`,`address`, `description`, `price`, `delivery_date`,`delivery_status`, `todays_date`) VALUES ('$userID','$fname', '$lname','$sname2', '$address', '$description','$price', '$dod','$delivery_status', '$todays_date')";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = 'Record Successfully Added';
    header('Location:userdashboard.php');
    exit;
  } else {
    $_SESSION['error'] = 'Something Went Wrong';
    echo "Failed to add ";
    exit;
  }
} else {
  $_SESSION['error'] = 'User details not found';
  echo "User not found";
  exit;
}
?>
