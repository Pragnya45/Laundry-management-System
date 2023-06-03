<?php
session_start();

if (isset($_SESSION['userID'])) {
  $userId = $_SESSION['userID'];
} else {
  echo "Session value not found.";
}
// Connecting with the database
include('../connect.php');
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');


$userID = $_SESSION['userID'];

$sql = "SELECT * FROM `order` WHERE uid = '".$userID."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Start building the table structure
  echo '<div class="container2">';
  echo '<table class="table">';
  echo '<tr>';
  echo '<th>Order ID</th>';
  echo '<th>Service Name</th>';
  echo '<th>Price</th>';
  echo '<th>Request Date</th>';
  echo '<th>Delivery Date</th>';
  echo '<th>Request Status</th>';
  // Add more table headers based on your requirements

  echo '</tr>';

  // Iterate through each row of the result
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['sname'] . '</td>';
    echo '<td>' . $row['price'] . '</td>';
    echo '<td>' . $row['todays_date'] . '</td>';
    echo '<td>' . $row['delivery_date'] . '</td>';
    echo '<td>' . $row['delivery_status'] . '</td>';
    // Add more table cells based on your requirements

    echo '</tr>';
  }

  // End the table structure
  echo '</table>';
  echo '</div>';
} else {
  echo 'No orders found.';
}

mysqli_close($conn);

?>


<link rel="stylesheet" type="text/css" href="../Home.css">