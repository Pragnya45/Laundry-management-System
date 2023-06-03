<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="../sidebar.css">
  <link rel="stylesheet" type="text/css" href="../Home.css">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
$(document).ready(function() {
  // Load all_request.php by default
  $.ajax({
    url: "all_request.php",
    type: "GET",
    dataType: "html",
    success: function(data) {
      $(".content").html(data);
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
  
  $(".sidebar-item").click(function(e) {
    e.preventDefault();
    var url = $(this).attr("data-url");
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
      <nav>
        <div class="logo">
          <img src='../uploadImage/Logo/mylogo.jpg' alt="Logo" height="40px"/>
        </div>
        <ul class="navbar">
          <li>
            <a href="../logout.php" class="nav-link">Logout</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="sidebar">
    <ul>
      <li class="sidebar-item" data-url="all_request.php">
        User Requests
      </li>
      <li class="sidebar-item" data-url="all_user.php">
        Users List
      </li>
      <li class="sidebar-item" data-url="add_service.php">
        Add Service
      </li>
      <li class="sidebar-item" data-url="update_service.php">
        Update Service
      </li>
      <li class="sidebar-item" data-url="delete_service.php">
        Delete Service
      </li>
    </ul>
  </div>
  
  <div class="content">
    <!-- Content will be loaded here -->
  </div>
</body>
</html>
