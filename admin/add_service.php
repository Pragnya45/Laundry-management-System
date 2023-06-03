<?php
session_start();
// Connecting with the database
include('../connect.php');
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
?>

<link rel="stylesheet" type="text/css" href="../Home.css">

<div class="container2">
  <!-- To save the order -->
  <form method="POST" action="save_service.php" name="userform" enctype="multipart/form-data">
    <!-- Form for making laundry request -->
    <h1>Add Service</h1>

    <!-- Taking name of the srvice from Admin -->
    <div class="file-input-container">
      <label>Service Name</label>
      <input type="text" name="sname" placeholder="Service">
    </div>

    <div class="file-input-container">
      <label>Price</label>
      <input type="number" name="price"  placeholder="Price">
    </div>

    <button type="submit" name="btn_save">Submit</button>
  </form>
</div>


