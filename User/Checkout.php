<?php

include_once('code/Connection.php');
session_start();


$hiddenTotal = $_GET['hiddenTotal'];

if (isset($_POST['submit'])) {
    foreach ($_SESSION["cart_item"] as $item) {

        $email = $_POST['email'];
        $address = $_POST['address'];
        $medname = $item['MedName'];
        $query = "INSERT INTO Orders(Customer_Email,Medicine_Name,Address) values('$email','$medname' ,'$address')";

        $result = mysqli_query($con, $query);

        if ($result) {
            echo '<script type="text/javascript">window.alert("Your order has been placed. Thank you.");window.location ="contact.php";</script>';
        } else {
            echo '<script type="text/javascript">window.alert("Your order has not been placed. Please try again.");window.location ="contact.php";</script>' . mysqli_error($con);
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/CheckoutStyle.css" />

</head>

<body>




    <form action="" method="$_POST" class="form" style="width: 90%; float:left; padding: 15px; margin-left: 55px; float: left; background-color: #f2f2f2;">

        <h3>Billing Address</h3>
        <label for="fname"><i class="fa fa-user"></i> First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="John" required>

        <label for="lname"><i class="fa fa-user"></i> Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Doe" required>

        <label for="email"><i class="fa fa-envelope"></i> Email</label>
        <input type="text" id="email" name="email" placeholder="john@example.com" required>

        <label for="phone"><i class="fa fa-envelope"></i>Phone</label>
        <input type="text" id="phone" name="pn" placeholder="78/887761" required>

        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
        <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>






        <div class="container" style="width:45%; padding:15px; float:right;">
            <h4>Your Cart<i class="fa fa-shopping-cart" style="float: right;"></i></span>
                <table>
                    <tr>
                        <th style="text-align:left; width: 40%; color:red;"> Name</th>
                        <th style="width: 30%; color:red;">Quantity </th>
                        <th style="width: 30%; color:red;">Price</th>
                        <th style="width: 30%; color:red;">Total</th>
                    </tr>
                    <tr>
                        <th><span style="border-bottom: 9px solid black;"></span></th>
                    </tr>
            </h4>
            <?php

            foreach ($_SESSION["cart_item"] as $item) {

            ?>
                <p>
                    <input type="hidden" value="<?php echo $item['MedName'] ?>" name="names" />
                    <tr>
                        <th style=" font-size: large; text-align:left; width:40%;"><?php echo $item['MedName'] ?></a></th>
                        <th style="width: 30%;"><?php echo $item['quantity'] ?></th>
                        <th style="width: 30%;"><?php echo $item['MedPrice'] ?></th>
                        <th style=" width: 30%;"><?php echo "$" . $total_price = ($item["MedPrice"] * $item["quantity"]) ?></th>
                    </tr>
                </p>
            <?php
            }
            ?>
            </table>
            <hr>
            <p>Total <span class="price" style="color:black"><b><?php echo $hiddenTotal; ?></b></span></p>
        </div>
        <div class="as" style="width:50%;">
            <label for="">
                <strong>Only payment on delivery is available.</strong>
            </label>
            <div class="icon-container">
                <img src="images/cash-on-delivery.png" />
            </div>

            <label>
                <input type="checkbox" checked="checked" name="sameadr" required> Shipping address same as billing
            </label>
        </div>
        <input type="submit" value="Finish Order" class="btn">
    </form>

</body>

</html>