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
?>

<link rel="stylesheet" type="text/css" href="../Home.css">

<div class="container2">
  <!-- To save the order -->
  <form method="POST" action="../user/save_request.php" name="userform" enctype="multipart/form-data">
    <!-- Form for making laundry request -->
    <h1>Laundry Request</h1>
    <input type="hidden" name="currnt_date" value="<?php echo $current_date; ?>">

    <!-- List out all the available services -->
    <div class="file-input-container">
      <label>Service Name</label>
      <select name="sname" id="sname" required="" onchange="s();">
        <option value="">--Select service--</option>
        <?php  
        $sql2 = "SELECT * FROM service WHERE id != 1";
        $result2 = $conn->query($sql2); 
        while($row2 = mysqli_fetch_array($result2)) {
          ?>
          <option value="<?php echo $row2['id'].','.$row2['price']; ?>"><?php echo $row2['sname'];?></option>
        <?php } ?>
      </select>
    </div>
    <!-- Taking any description provided by the user -->
    <div class="file-input-container">
      <label>Description</label>
      <input type="text" name="description" placeholder="Description">
    </div>

    <div class="file-input-container">
      <label>PRICE</label>
      <input type="number" name="price" id="price" readonly placeholder="Price">
    </div>

    <div class="file-input-container">
      <label>Delivery Date</label>
      <div class="col-sm-9">
        <input type="date" name="dod" placeholder="Delivery Date">
      </div>
    </div>

    <div class="file-input-container">
      <label>Todays Date</label>
      <input type="text" name="todays_date" value="<?php echo date('Y-m-d'); ?>">
    </div>

    <button type="submit" name="btn_save">Submit</button>
  </form>
</div>

<!-- Implementation of function used in listing out all the available services -->
<script>
function s() {
  var sname = $('#sname').val();
  var price = sname.split(',');
  $('#price').val(price[1]);
}
</script>



    
