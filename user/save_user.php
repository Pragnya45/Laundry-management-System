<?php
//getting current date
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');

//including database connection
include('../connect.php');

//using hashing to encrypt the password
$passw = hash('sha256', $_POST['password']);
$passw = hash('sha256', $passw);
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);

//creating unique user id from given user info
$email = $_POST['email'];
$password = $_POST['password'];

function generateUserID($email, $password) {
  $userID = hash('sha256', $email . $password); // Concatenate and hash the email and password to get the userid
  return $userID;
}
$uid = generateUserID($email, $password);

extract($_POST);

//sql query to insert the registration value provided by the user
$sql = "INSERT INTO `customer`(`uid`,`fname`, `lname`, `contact`, `address`, `email`, `password`) VALUES ('$uid','$fname','$lname','$contact','$address','$email','$pass')";

if ($conn->query($sql) === TRUE) {
    session_start();
    $_SESSION['success'] = 'Registration Successful';
    header('Location: ../user/user_login.php');
    exit;
} else {
    session_start();
    $_SESSION['error'] = 'Couldn\'t Register';
    header('Location: user_register.php');
    exit;
}
?>
