<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="../Home.css">
</head>
<body>
<div >
      <nav>
        <div class="logo">
          <img src='../uploadImage/Logo/mylogo.jpg' alt="Logo" height="40px"/>
        </div>
      </nav>
</div>

    <div class="container2">
        <h1>Login</h1>
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $email = $_POST["email"];   
            $pass =$_POST['password'];

            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "laundry_db");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Prepare SQL statement
            $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$pass'";
            $result = mysqli_query($conn, $sql);

            // Check if the query returns any rows
            if (mysqli_num_rows($result) > 0) {
                // Successful login, redirect to the admin dashboard
                header("Location: admin_dashboard.php");
                exit;
            } else {
                // Invalid credentials
                echo "<p class='error'>Invalid email or password for admin</p>";
            }
            // Close the database connection
            mysqli_close($conn);
        }
        ?> 
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <div class="file-input-container">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" placeholder="Email" required />
    </div>
    <div class="file-input-container">
        <label for="password">Enter your password:</label>
        <input type="password" id="password" name="password" placeholder="Password" required />
    </div>
    <input type="submit" value="Login">
</form>
    </div>
</body>
</html>