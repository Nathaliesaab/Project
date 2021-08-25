<?php

$DBhost = "localhost";
$DBuser = "root";
$DBPass = "";
$DBName = "OnlinePharmacy-NathalieSaab";
$con = mysqli_connect($DBhost, $DBuser, $DBPass, $DBName);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['login_btn'])) {

    $username = $_POST['auname'];
    $password = $_POST['psw'];

    $query = "SELECT * FROM  Adminstrator WHERE UserName='$username' AND Password='$password' LIMIT 1";
    $results = mysqli_query($con, $query);

    if (mysqli_num_rows($results) == 1) {
        $logged_in_user = mysqli_fetch_assoc($results);
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";
        header('location: Control.php');
    } else {
        echo '<script type="text/javascript">window.alert("Wrong Password/Username");window.location ="AdminLogin.php";</script>';;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="style.css" />

    <title>Admin login page</title>
</head>


<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>

<body class="login">
    <form class="pForm2" method="post">


        <div class="container">
            <h1>Adminstrator Page</h1>
            <div class="container">
                <br>
                </label> <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="auname" required>
                <br>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <br>
                <button type="submit" class="log" name="login_btn">Login</button>

                <br>

            </div>


    </form>

</body>

</html>