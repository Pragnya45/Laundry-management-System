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
        //encrypt the given password
        $passw = hash('sha256', $_POST['password']);
        $passw = hash('sha256', $passw);
        function createSalt()
        {
            return '2123293dsj2hu2nikhiljdsd';
        }
        $salt = createSalt();
        $pass = hash('sha256', $salt . $passw);

        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "laundry_db");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        // Prepare SQL statement
        $sql = "SELECT * FROM customer WHERE email = '$email' AND password = '$pass'";
        $result = mysqli_query($conn, $sql);

        // Check if the query returns any rows
        if (mysqli_num_rows($result) > 0) {

            // Saving the user id of the logged user into session
            $row = $result->fetch_assoc();
            $userID = $row['uid'];
            $_SESSION['userID'] = $userID;

            // Successful login, redirect to the user dashboard
            header("Location: userdashboard.php");
            exit;
        } else {
            // Invalid credentials
            echo "<p class='error'>Invalid email or password.</p>";
            echo $email;
            echo $pass;
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
        <a href="../forgot_password.php">Forgot Password?</a>
    </form>
    <p>Don't have an account? <a href="user_register.php">Register here</a>.</p>
</div>
</body>
</html>
