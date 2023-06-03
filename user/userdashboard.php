<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="../sidebar.css">
  <link rel="stylesheet" type="text/css" href="../Home.css">

<!-- CSS to show the pages on right side when the link is is clicked on sidebar -->
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
    }
    
    .container {
      margin-left: 250px;
      padding: 20px;
      width: calc(100% - 250px); /* Adjust the width as needed */
    }
    
    .sidebar {
      width: 250px;
      background-color: #f1f1f1;
    }
  </style>

  <!--Script file to show the pages on right side when the link is is clicked on sidebar -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".sidebar-item").click(function(e) {
        e.preventDefault();
        var url = $(this).attr("data-url"); // Use data-url attribute to store the page URL
        $.ajax({
          url: url,
          type: "GET",
          dataType: "html",
          success: function(data) {
            $(".content").html(data);
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
      });
    });
  </script>
</head>
<body>
  <header>  
    <div>
      <!-- Navigation Link -->
      <nav>
        <div class="logo">
          <img src='../uploadImage/Logo/mylogo.jpg' alt="Logo" height="40px"/>
        </div>
        <ul class="navbar">
          <li>
            <a href="../contact.php" class="nav-link">Contact</a>
          </li>
          <li>
            <a href="../about.php" class="nav-link">About</a>
          </li>
          <li>
            <a href="../Profile/profile.php" class="nav-link">Profile</a>
          </li>
          <li>
            <a href="../logout.php" class="nav-link">Logout</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
<!-- Sidebar Links -->
  <div class="sidebar">
    <ul>
      <li class="sidebar-item" data-url="../order/laundry_request.php">
        Laundry Request
      </li>
      <li class="sidebar-item" data-url="../order/request_status.php">
        Request Status
    </ul>
  </div>
  
  <div class="content">
    <!-- Content will be loaded here -->
  </div>
</body>
</html>
