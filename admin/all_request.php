<?php
session_start();

// Connecting with the database
include('../connect.php');
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');


$sql = "SELECT * FROM `order` WHERE 1";
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
  echo '<th>Action</th>';
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
    if ($row['delivery_status'] != 'Accepted') {
      $_POST['order_id']=$row['id'];
      echo '<td>
      <form action="update_order.php" method="POST">
      <input type="hidden" name="orderID" value="'. $row['id'] .'">
      <input type="hidden" name="accept_order" value="1">
      <button type="submit" class="btn btn-success" name="accept_order_btn">Accept</button>
      </form>
    </td>';
    } else {
      echo '<td>Already Accepted</td>';
    }
    // Add more table cells based on your requirements

    echo '</tr>';
    $_SESSION['orderID']=$row['id'];

  }

  // End the table structure
  echo '</table>';
  echo '</div>';
} else {
  echo 'No orders found.';
}

mysqli_close($conn);

?>
