<?php
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
}
if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    echo $username;
    echo  $password;

    $sql = "SELECT * FROM erp_login WHERE log_id='$username' AND log_pwd='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user_id'] = $username;

        header("Location:home.php");
        exit();
    } else {
        echo "<script>alert('Invalid Username Or Password.');</script>";
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GracER | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-TBZkWWuUHNahSjQZtmeoQYjMvmHe1WYuCTG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        ul {
            list-style: none;
        }

        h4 {
            color: #470a52;
        }

        li,
        label {
            color: #8d1662;
        }

        body {
            background: linear-gradient(#fdfdfd73, #fdfdfd), url(assets/img/clg_wide_drone.JPG) center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column m-2">
        <div class="d-flex align-items-center justify-content-center">
            <img class='img-fluid w-50 rounded-2' src="assets/img/clg_wide_drone.JPG" alt="clg-wide-drone">
        </div>
        <div class="d-flex flex-row justify-content-around">

            <div class="d-flex w-50 shadow m-2 p-2 rounded-2 bg-light">
                <div class='d-flex flex-column'>
                    <h4>WELCOME TO GRACE COLLEGE OF ENGINEERING ERP PORTAL</h4>
                    <div class="erp_info_text">
                        <ul>
                            <li>This is a cloud based portal, connecting Managements, Tutors, Students and Parents
                                of educational institutes.</li><br>
                            <li>This portal empowers "GRACE COLLEGE OF ENGINEERING" with improved communication,
                                increased productivity and knowledge enrichment.</li><br>
                            <li>This provides a safe and secure environment for gaining global exposure.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="d-flex w-25 shadow m-2 p-2 rounded-2 bg-light">
                <form method='post' class='w-100'>
                    <h4 class='mb-3'>GracER | Login </h4>
                    <hr>
                    <div class="d-flex flex-row mb-3">
                        <label class="form-label w-50">User Id :</label>
                        <input type="text" id="username" name="username" class="form-control form-control-sm"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="d-flex flex-row mb-3">
                        <label class="form-label w-50">Password :</label>
                        <input type="password" id="password" name="password" class="form-control form-control-sm">
                    </div>
                    <div class="d-flex flex-row justify-content-end mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>