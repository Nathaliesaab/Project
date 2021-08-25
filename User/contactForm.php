
<?php
include_once 'code/Connection.php';



if (isset($_POST['Submit'])) {
    $first_name    = $_POST['fn'];
    $last_name       = $_POST['ln'];
    $phone_number    = $_POST['pn'];
    $email          = $_POST['email'];
    $comments        = $_POST['comments'];

    if ($email != "") {
        $result = mysqli_query($con, "SELECT * FROM Customer where CEmail='" . $email . "'");
        $num_rows = mysqli_num_rows($result);
        if ($num_rows >= 1) {
            echo '<script type="text/javascript">window.alert("Email exist. It should be unique. Please enter another one");window.location ="contact.php";</script>';
        } else {
            $query = "INSERT INTO Customer(CEmail,firstName,lastName,PhoneNumber,Comments) 
	   values('$email', '$first_name','$last_name','$phone_number','$comments')";


            $result = mysqli_query($con, $query);

            if ($result) {
                echo '<script type="text/javascript">window.alert("Your information is sent");window.location ="contact.php";</script>';
            } else {
                echo '<script type="text/javascript">window.alert("Your information is not sent");window.location ="contact.php";</script>' . mysqli_error($con);
            }
        }
    }
}
