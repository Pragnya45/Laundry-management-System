<?php
if(isset($_POST['password']) && $_POST['reset_token'] && $_POST['email'])
{
include "connect.php";
$emailId = $_POST['email'];
$token = $_POST['reset_token'];

$passw = hash('sha256', $_POST['password']);
$passw = hash('sha256', $passw);
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);


$query = mysqli_query($conn,"SELECT * FROM `customer` WHERE `reset_token`='".$token."' and `email`='".$emailId."'");
$row = mysqli_num_rows($query);
if($row){
mysqli_query($conn,"UPDATE customer SET  password='" . $pass . "', reset_token='" . NULL . "' WHERE email='" . $emailId . "'");
echo '<p>Congratulations! Your password has been updated successfully.</p>';
}else{
echo "<p>Something goes wrong. Please try again</p>";
}
}
?>

