<?php  /*include header or config file to ensure session and db connection */
session_start();
$host = "localhost";
$user = "root";
$password = '';
$db_name = "graceerp";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
  die("Failed to connect with MySQL: " . mysqli_connect_error());
}
$conn = new mysqli($host, $user, $password, $db_name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar Menu</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
</head>

<body id="body" class="shrink">

  <style>
    /* start style to check if the sidebar is shirnk or not  */
    #shrink-checkbox {
  position: fixed;
  top: 10px;
  left: 10px;
  opacity: 0; /* Hide the checkbox */
}

#shrink-checkbox-label {
  position: fixed;
  top: 10px;
  left: 30px;
  font-size: 1.2rem;
  color: #fff;
  cursor: pointer;
}

body.shrink nav {
  width: 5.4rem;
}
/* nav .sidebar-links {
  overflow-y: scroll;
overflow-x: visible;
} */
/* nav .sidebar-links::-webkit-scrollbar{
  width: 0;
} */
/* end style to check if the sidebar is shirnk or not  */
  </style>

  <?php
  $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
  $query = "SELECT f_id, f_fname, f_lname,f_img,f_role FROM erp_faculty WHERE f_id = '$user_id'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
      // Access the values from the row
      $f_id = $row['f_id'];
      $f_fname = $row['f_fname'];
      $f_lname = $row['f_lname'];
      $f_img = $row['f_img'];
      $f_role = $row['f_role'];

      
    } else {
      // Handle the case where no matching user is found
      echo "User not found.";
    }
  } else {
    // Handle the case where the query fails
    echo "Query failed: " . mysqli_error($conn);
  }
  ?>
  <nav>

    <div class="sidebar-top">
    <input type="checkbox" id="shrink-checkbox">
  <label for="shrink-checkbox" id="shrink-checkbox-label"></label>
      <span class="shrink-btn">
        <i class='bx bx-chevron-left'></i>
      </span>
      <img src="./img/gcoe_logo.png" class="logo" alt="">
      <h3 class="hide">Grace COE</h3>
    </div>

    <div class="sidebar-links">
      <ul>
        <div class="active-tab"></div>
        <li class="tooltip-element" data-tooltip="0">
          <a href="#" class="active" data-active="0">
            <div class="icon">
              <i class='bx bx-home'></i>
              <i class='bx bxs-home'></i>
            </div>
            <span class="link hide">Home</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="#" data-active="1">
            <div class="icon">
              <i class='bx bx-message-square-detail'></i>
              <i class='bx bxs-message-square-detail'></i>
            </div>
            <span class="link hide">Dashboard</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a href="#" data-active="2">
            <div class="icon">
              <i class='bx bx-user-pin'></i>
              <i class='bx bxs-user-pin'></i>
            </div>
            <span class="link hide">Admin Module</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="3">
          <a href="#" data-active="3">
            <div class="icon">
              <i class='bx bx-bar-chart-square'></i>
              <i class='bx bxs-bar-chart-square'></i>
            </div>
            <span class="link hide">Attendace Posting</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="4">
          <a href="#" data-active="4">
            <div class="icon">
              <i class='bx bx-file'></i>
              <i class='bx bxs-file'></i>
            </div>
            <span class="link hide">Result Posting</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="5">
          <a href="#" data-active="5">
            <div class="icon">
              <i class='bx bx-folder'></i>
              <i class='bx bxs-folder'></i>
            </div>
            <span class="link hide">Reports</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="6">
          <a href="#" data-active="6">
            <div class="icon">
              <i class='bx bx-photo-album'></i>
              <i class='bx bxs-photo-album'></i>
            </div>
            <span class="link hide">Gallery</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="7">
          <a href="#" data-active="7">
            <div class="icon">
              <i class='bx bx-user'></i>
              <i class='bx bxs-user'></i>
            </div>
            <span class="link hide">Profile</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="8">
          <a href="#" data-active="8">
            <div class="icon">
              <i class='bx bx-calendar'></i>
              <i class='bx bxs-calendar'></i>
            </div>
            <span class="link hide">View Calender</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="9">
          <a href="#" data-active="9">
            <div class="icon">
              <i class='bx bx-key'></i>
              <i class='bx bxs-key'></i>
            </div>
            <span class="link hide">Change Password</span>
          </a>
        </li>
        <div class="tooltip">
          <span data-tooltip="0"class="show">Home</span>
          <span data-tooltip="1">Dashboard</span>
          <span data-tooltip="2">Admin Module</span>
          <span data-tooltip="3">Attendance Posting</span>
          <span data-tooltip="4">Result Posting</span>
          <span data-tooltip="5">Reports</span>
          <span data-tooltip="6">Gallery</span>
          <span data-tooltip="7">Profile</span>
          <span data-tooltip="8">View Calender</span>
          <span data-tooltip="9">Change Password</span>
        </div>
      </ul>
      <style>
      /*  css for profile photo and toggle button start */
      * {
        font-family: "poppins", sans-serif;
        margin: 0;
        padding: 0;
      }

      body {
        background-color: #e4e2f5;
        /* height: 100vh; */
      }

      .icons-size {
        color: #333;
        font-size: 14px;
      }

      .action {
        position: fixed;
        right: 30px;
        top: 20px
      }

      .action .profile {
        border-radius: 50%;
        cursor: pointer;
        height: 60px;
        overflow: hidden;
        position: relative;
        width: 60px;
      }

      .action .profile img {
        width: 100%;
        top: 0;
        position: absolute;
        object-fit: cover;
        left: 0;
        height: 100%;
      }

      .action .menu {
        background-color: #FFF;
        box-sizing: 0 5px 25px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        padding: 10px 20px;
        position: absolute;
        right: -10px;
        width: 200px;
        transition: 0.5s;
        top: 120px;
        visibility: hidden;
        opacity: 0;
      }

      .action .menu.active {
        opacity: 1;
        top: 80px;
        visibility: visible;
      }

      .action .menu::before {
        background-color: #fff;
        content: '';
        height: 20px;
        position: absolute;
        right: 30px;
        transform: rotate(45deg);
        top: -5px;
        width: 20px;
      }

      .action .menu h3 {
        color: #555;
        font-size: 16px;
        font-weight: 600;
        line-height: 1.3em;
        padding: 20px 0px;
        text-align: left;
        width: 100%;
      }

      .action .menu h3 div {
        color: #818181;
        font-size: 14px;
        font-weight: 400;
      }

      .action .menu ul li {
        align-items: center;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        display: flex;
        justify-content: left;
        list-style: none;
        padding: 10px 0px;
      }

      .action .menu ul li img {
        max-width: 20px;
        margin-right: 10px;
        opacity: 0.5;
        transition: 0.5s
      }

      .action .menu ul li a {
        display: inline-block;
        color: #555;
        font-size: 14px;
        font-weight: 600;
        padding-left: 15px;
        text-decoration: none;
        text-transform: uppercase;
        transition: 0.5s;
      }

      .action .menu ul li:hover img {
        opacity: 1;
      }

      .action .menu ul li:hover a {
        color: var(--pri);}
      /*  css for profile photo and toggle button end */
      
      </style>
  </nav>
<main>
  <div class="contianer1" style="display:flex;">
      <img src="img/g.png" alt="grace" height="60px" width="200px">

      <img src="img/coe.png" alt="grace" height="60px" width="200px">
    </div>
    <div class="action">
      <div class="profile" onclick="menuToggle();">
        <?php echo "<img src='img/gcoe_logo.png' alt='jerald'>" ?><!--src='..\assets\img\profile\ **check finally-->
      </div>

      <div class="menu">
        <h3>
          Welcome
          <div>
            <?php echo "$f_fname $f_lname"; ?><br>
            <?php echo "$f_role" ?>
          </div>
        </h3>
        <ul>
          <li>
            <i class='bx bxs-log-out' style="color:black"></i>
            <a href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
   
    <p class="copyright">
      &copy; 2021 - <span>Grace College of Engineering</span>&nbsp;&nbsp;&nbsp;&nbsp; All Rights Reserved.
      Developed and maintained by Department of CSE (2020-2024)
    </p>
  </main>
  <script>
  //script for profile photo toggle dropdown start
    function menuToggle() {
      const toggleMenu = document.querySelector('.menu');
      toggleMenu.classList.toggle('active')
    }
  //script for profile photo toggle dropdown end
  
</script>
  <script src="app.js">
 


  </script>
</body>

</html>