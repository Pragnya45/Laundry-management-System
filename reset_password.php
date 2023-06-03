<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Reset Password In PHP MySQL</title>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="Home.css">
</head>
<body>
<div class="container2">

<h1>Reset Password</h1>

<?php
if($_GET['key'] && $_GET['token'])
{
include "connect.php";
$email = $_GET['key'];
$token = $_GET['token'];
$query = mysqli_query($conn,
"SELECT * FROM `customer` WHERE `reset_token`='".$token."' and `email`='".$email."';"
);

if (mysqli_num_rows($query) > 0) {
$row= mysqli_fetch_array($query);
?>
<form action="update_forget_password.php" method="post">
<input type="hidden" name="email" value="<?php echo $email;?>">
<input type="hidden" name="reset_token" value="<?php echo $token;?>">
<div class="file-input-container">
<label for="exampleInputEmail1">Password</label>
<input type="password" name='password' class="form-control">
</div>                
<div class="file-input-container">
<label for="exampleInputEmail1">Confirm Password</label>
<input type="password" name='cpassword' class="form-control">
</div>
<input type="submit" name="new-password" class="btn btn-primary">
</form>
<?php } } 

?>
</div>
</div>
</div>
</body>
</html>