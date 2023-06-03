<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer\phpmailer/src/PHPMailer.php';
require './vendor/phpmailer\phpmailer/src/Exception.php';
require './vendor/phpmailer\phpmailer/src/SMTP.php';

include("connect.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];

    // Update the user's password in the database
    $conn = mysqli_connect("localhost", "root", "", "laundry_db");
    $sql = "SELECT * FROM customer WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $token = md5($email).rand(10,9999);
        // Send the password reset link to the user's email
        $update = mysqli_query($conn,"UPDATE customer SET  reset_token='" . $token . "'  WHERE email='" . $email . "'");
        $link = "<a href='http://localhost/wash/reset_password.php?key=".$email."&token=".$token."'>Click To Reset password</a>";

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server address
        $mail->SMTPAuth = true;
        $mail->Username = ''; // Replace with your SMTP email address
        $mail->Password = ''; // Replace with your SMTP email password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587; // Replace with your SMTP port

        $mail->setFrom('', 'PragnyasLaundry'); // Replace with your email address and name
        $mail->addAddress($email); // Recipient's email address

        $mail->Subject = 'Password Reset';
        $mail->Body = 'Click On This Link to Reset Password '.$link.'';;

        if ($mail->send()) {
            // Password reset link sent successfully
            $successMessage = "Password reset email sent. Please check your email for the password reset link.";
        } else {
            // Error sending password reset link
            $errorMessage = "Failed to send password reset email. Please try again.";
        }
    } else {
        // Error updating the password in the database
        $errorMessage = "Failed to reset password. Please try again.";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="Home.css">
</head>
<body>
<div>
    <nav>
        <div class="logo">
            <img src='../uploadImage/Logo/mylogo.jpg' alt="Logo" height="40px"/>
        </div>
    </nav>
</div>

<div class="container2">
    <h1>Forgot Password</h1>
    <p>Enter your email address to reset your password.</p>
    <?php if (!empty($successMessage)): ?>
        <p class="success"><?php echo $successMessage; ?></p>
    <?php endif; ?>
    <?php if (!empty($errorMessage)): ?>
        <p class="error"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="file-input-container">
            <label for="email">Enter your email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required />
        </div>
        <input type="submit" value="Reset Password">
    </form>
    <p>Remember your password? <a href="login.php">Login here</a>.</p>
</div>
</body>
</html>
