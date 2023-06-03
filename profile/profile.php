<?php
session_start();

include('../connect.php');
$userID = $_SESSION['userID'];
$findresult = "SELECT * FROM `customer` WHERE uid = '".$userID."'";
$result = mysqli_query($conn, $findresult);

if($res = mysqli_fetch_array($result))
{
    $fname = $res['fname'];
    $lname = $res['lname'];
    $email = $res['email'];
    $address = $res['address'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="../Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .profile-icon {
            font-size: 48px;
            color: #555;
            margin-left: 200px;

        }
    </style>
</head>
<body>
<header>  
    <div>
      <nav>
        <div class="logo">
          <img src='../uploadImage/Logo/mylogo.jpg' alt="Logo" height="40px"/>
        </div>
        <ul class="navbar">
        <li>
            <a href="../user/userdashboard.php" class="nav-link">Dashboard</a>
          </li>
          <li>
            <a href="../contact.php" class="nav-link">Contact</a>
          </li>
          <li>
            <a href="../about.php" class="nav-link">About</a>
          </li>
          <li>
            <a href="../Profile/profile.php" class="nav-link">Profile</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
    <div class="container2">
        <div class="row">
            <div class="col-sm-12 text-center">
                <i class="fas fa-user-circle profile-icon"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                    if(isset($_POST['update_profile']) && $_POST['update_profile'] == "1"){ // Check if update_profile is set and has the value "1"
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $address = $_POST['address'];

                        // Perform necessary validation and database update here
                        $sql = "UPDATE `customer` SET fname='".$fname."', lname='".$lname."', address='".$address."' WHERE uid='".$userID."'";
                        if(mysqli_query($conn, $sql)){
                            // Redirect to profile updated page on success
                            header("location:profile.php?profile_updated=1");
                            exit; // Exit to prevent further execution of the page
                        } else {
                            echo "Error updating profile: " . mysqli_error($conn);
                            exit; // Exit to prevent further execution of the page
                        }
                    }
                    ?>

                    <div class="file-input-container">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>" class="form-control">
                    </div>
                    <div class="file-input-container">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname" value="<?php echo $lname; ?>" class="form-control">
                    </div>
                    <div class="file-input-container">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="form-control" readonly>
                    </div>
                    <div class="file-input-container">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="<?php echo $address; ?>" class="form-control">
                    </div>
                    <input type="hidden" name="update_profile" value="1">
                    <button type="submit" class="btn btn-success">Save Profile</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>
</html>

