<?php
include('../connect.php');
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');

?>
<link rel="stylesheet" type="text/css" href="../Home.css">
<div class="container2">
<h1 >REGISTER</h1> 

<!--Form to take user input for registration-->
<form  method="POST" action="save_user.php" name="userform" enctype="multipart/form-data">
<input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">

<div class="file-input-container">
<label >Name</label>
<input type="text" name="fname"  placeholder="First Name" id="event" onkeydown="return alphaOnly(event);" required="">
</div>

<div class="file-input-container">
<label >Surname</label>
<input type="text"  name="lname" id="lname"  id="event" onkeydown="return alphaOnly(event);" placeholder="Last Name" required="">
</div>

<div class="file-input-container">
<label>Email</label>
<input type="email"  name="email" placeholder="Email" >
</div>

<div class="file-input-container">
<label >Contact no.</label>
<input type="text"  name="contact"  placeholder="Contact Number" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
</div>


<div class="file-input-container">
<label>Address</label>
<input type="text"  name="address" placeholder="Address" >
</div>

<div class="file-input-container">
<label>Password</label>
<input type="password"  name="password" placeholder="Password" >
</div>

<button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
</form>
</div>
</div>
</div>
</div>

</div>

<?php ?>



