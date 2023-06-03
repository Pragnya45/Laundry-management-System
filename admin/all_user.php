<?php
session_start();

// Connecting with the database
include('../connect.php');
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');


$sql = "SELECT * FROM `customer` WHERE 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Start building the table structure
  echo '<div class="container2">';
  echo '<table class="table">';
  echo '<tr>';
  echo '<th>First Name</th>';
  echo '<th>Last Name</th>';
  echo '<th>Contact</th>';
  echo '<th>Address</th>';
  echo '<th>Email</th>';
  // Add more table headers based on your requirements

  echo '</tr>';


  // Iterate through each row of the result
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['fname'] . '</td>';
    echo '<td>' . $row['lname'] . '</td>';
    echo '<td>' . $row['contact'] . '</td>';
    echo '<td>' . $row['address'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    
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
