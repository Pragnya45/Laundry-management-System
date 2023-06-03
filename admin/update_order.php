<?php
session_start();
if (isset($_POST['orderID'])) {
  $orderId = $_POST['orderID'];
} else {
  echo "Session value not found.";
  exit;
}
// Connecting with the database
include('../connect.php');
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');

    $sql = "UPDATE `order` SET delivery_status='Accepted' WHERE id=$orderId";
    if (mysqli_query($conn, $sql)) {
        // Update successful
        header("location:admin_dashboard.php");
        echo "Order status updated successfully";
    } else {
        // Update failed
        echo "Error updating order status: " . mysqli_error($conn);
    }

 mysqli_close($conn);
?>
