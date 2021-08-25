<?php
include_once 'code/Connection.php';

session_start();
if (isset($_POST['hiddenTotal'])) {

   $hiddenTotal = $_POST['hiddenTotal'];
}

if (!empty($_GET["action"])) {
   switch ($_GET["action"]) {
      case "add":
         if (!empty($_POST["quantity"])) {
            $query = "SELECT * FROM Medicine WHERE  MedName='" . $_GET["MedName"] . "' and MedCategory='Medicine'";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
               $productByCode[] = $row;
            }
            if (!empty($resultset))
               return $$productByCode;

            $itemArray = array($productByCode[0]["MedName"]
            => array(
               'MedName' => $productByCode[0]["MedName"],
               'Med_Id' => $productByCode[0]["Med_Id"],
               'quantity' => $_POST["quantity"],
               'MedPrice' => $productByCode[0]["MedPrice"],
               'MedImage' => $productByCode[0]["MedImage"]
            ));

            if (!empty($_SESSION["cart_item"])) {
               if (in_array($productByCode[0]["MedName"], array_keys($_SESSION["cart_item"]))) {
                  foreach ($_SESSION["cart_item"] as $k => $v) {
                     if ($productByCode[0]["MedName"] == $k) {
                        if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                           $_SESSION["cart_item"][$k]["quantity"] = 0;
                        }
                        $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                     }
                  }
               } else {
                  $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
               }
            } else {
               $_SESSION["cart_item"] = $itemArray;
            }
         }
         break;
      case "remove":
         if (!empty($_SESSION["cart_item"])) {
            foreach ($_SESSION["cart_item"] as $k => $v) {
               if ($_GET["MedName"] == $k)
                  unset($_SESSION["cart_item"][$k]);
               if (empty($_SESSION["cart_item"]))
                  unset($_SESSION["cart_item"]);
            }
         }
         break;
      case "empty":
         unset($_SESSION["cart_item"]);
         break;
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Pharmacy</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

   <script src="./node_modules/jquery/dist/jquery.min.js"></script>
   <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
   <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <!-- owl stylesheets -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

   <link href="css/CartStyle.css" type="text/css" rel="stylesheet" />

   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout product_pagr">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header class="section">
      <!-- header inner -->
      <div class="header_main">
         <div class="header_main">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="index.php"><img src="images/mylogo1.png" alt="#"></a> </div>
                           <div class="logotext"><strong>Online Pharmacy</strong></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li> <a href="index.php">Home</a> </li>
                                 <li> <a href="about.php">About</a> </li>
                                 <li><a href="testmonial.php">Testmonial</a></li>
                                 <li>
                                    <div class="dropdown">
                                       <button class="dropbtn">Products</button>
                                       <div class="dropdown-content">
                                          <a href="clients.php">Pharmacy</a>
                                          <a href="medicine.php">Medicine</a>
                                          <a href="Tools.php">Tools</a>
                                       </div>
                                    </div>

                                 </li>
                                 <li><a href="contact.php">Contact Us</a></li>

                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end header inner -->
   </header>
   <!-- end header -->
   </header>
   <!-- end header -->

   <!-- plant -->
   <div id="plant" class="section  product">
      <div class="container">
         <div class="row">
            <div class="col-md-12 ">
               <div class="titlepage">
                  <h2><strong class="black"> Our</strong> Products</h2>
                  <span>Here to provide all pharmaceutical related products to help during this pandemic happening now.
                     Below you can view the differant products that are currently available on our website. More will be added.
                     You can add any of the products to checkout than proceed to checkout.</span>
               </div>
            </div>
         </div>
      </div>
   </div>


   <div class="clothes_main section ">
      <div class="container">
         <div class="row">
            <?php

            $sql = "Select * From Medicine  where MedCategory='Medicine' order by MedName;";
            $result =  mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                  $product_array[] = $row;
               }
            }
            if (!empty($product_array)) {
               foreach ($product_array as $key => $value) {
            ?>
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                     <div class="sport_product">
                        <form method="post" action="medicine.php?action=add&MedName=<?php echo $product_array[$key]["MedName"]; ?>">


                           <figure><img src="<?php echo $product_array[$key]['MedImage']; ?>" alt="img" /></figure>
                           <h3><strong class="price_text"> <?php echo $product_array[$key]['MedPrice']; ?></strong></h3>
                           <h4> <?php echo $product_array[$key]['MedName']; ?></h4>
                           <h5> <strong><?php echo $product_array[$key]['MedDescription']; ?></strong></h5>

                           <label for="quantity">
                              <Strong>Quantity</Strong>
                           </label>

                           <input name="quantity" type="number" id="quantity" value="0" min="1" max="1000" step="1" />


                           <input class="btnAddAction" type="submit" name="add_to_cart" value="Add to Cart" />


                        </form>
                     </div>
                  </div>

            <?php

               }
            }
            ?>

         </div>
      </div>
   </div>
   <span id="hamburger" class="white-text" style="font-size: 40px; cursor: pointer; position: absolute; right: 90px; top: 16px;" onclick="openNav()"><img class="last" src="images/shopping.png" alt=""></span>

   <div id="mySidenav" class="sidenav">

      <span id="navspan">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

         <div id="shopping-cart" style="padding: 20px;">
            <form class="shopcart" method="$_POST" action="Checkout.php">
               <div class="txt-heading">Shopping Cart</div>

               <a id="btnEmpty" href="medicine.php?action=empty">Empty Cart</a>
               <?php
               if (isset($_SESSION["cart_item"])) {
                  $total_quantity = 0;
                  $total_price = 0;
               ?>

                  <div class="table-responsive">
                     <table class="table table-bordered">
                        <tr>

                           <th style="text-align:center;" width="40%"> Name</th>
                           <th style="text-align:center;" width="10%">Quantity</th>
                           <th style="text-align:center;" width="20%">Price</th>
                           <th style="text-align:center;" width="15%">Total</th>
                           <th style="text-align:center;" width="15%">Action</th>
                        </tr>
                        <?php
                        foreach ($_SESSION["cart_item"] as $item) {
                           $item_price = $item["quantity"] * $item["MedPrice"];
                        ?>
                           <tr>
                              <td><img src="<?php echo $item["MedImage"]; ?>" class="cart-item-image" /><?php echo $item["MedName"]; ?></td>
                              <td style="text-align:center;"><?php echo $item["quantity"]; ?></td>
                              <td style="text-align:center;"><?php echo "" . $item["MedPrice"]; ?></td>
                              <td style="text-align:center;"><?php echo "" . number_format($item_price, 2); ?></td>
                              <td style="text-align:center;">
                                 <a href="medicine.php?action=remove&MedName=<?php echo $item["MedName"]; ?>" class="btnRemoveAction">
                                    <img src="images/icon-delete.png" alt="Remove Item" />
                                 </a>
                              </td>
                           </tr>
                        <?php
                           $total_quantity += $item["quantity"];
                           $total_price += ($item["MedPrice"] * $item["quantity"]);
                        }
                        ?>

                        <tr>
                           <td colspan="4" align="right">Total:</td>

                           <td align="right" colspan="1"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
                           <input type="hidden" value="<?php echo "$ " . number_format($total_price, 2); ?>" name="hiddenTotal" />

                        </tr>

                     </table>
                  </div>
               <?php
               } else {
               ?>
                  <div class="no-records">Your Cart is Empty</div>
               <?php
               }
               ?>
               <input type="submit" class="btnAddAction" id="myButton" style="Width :200px; float:right" value="Proceed to Checkout" />
            </form>
         </div>
   </div>

   </span>
   </div>

   <!-- end plant -->
   <!-- footer start-->
   <div id="plant" class="footer layout_padding">
      <div class="container">
         <p>© 2021 All Rights Reserved. Nathalie Saab</p>
         <a href="#" class="fa fa-facebook"></a>
         <a href="#" class="fa fa-twitter"></a>
         <a href="#" class="fa fa-google"></a>
         <a href="#" class="fa fa-youtube"></a>
         <a href="#" class="fa fa-instagram"></a>
         <a href="#" class="fa fa-pinterest"></a>
      </div>
   </div>

   <!-- Javascript files-->

   <script>
      function openNav() {
         document.getElementById("mySidenav").style.width = "600px";
         document.getElementById("hamburger").style.display = "none";
         document.getElementById("mySidenav").style.display = "block";

      }

      function closeNav() {
         document.getElementById("mySidenav").style.width = "0";
         document.getElementById("hamburger").style.display = "block";
      }



      document.getElementById("myButton").onclick = function() {
         location.href = "Checkout.php";
      };

      if (window.history.replaceState) {
         window.history.replaceState(null, null, window.location.href);
      }
   </script>

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- javascript -->
   <script src="js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   <script>
      $(document).ready(function() {
         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
         });

         $(".zoom").hover(function() {

            $(this).addClass(' transition');
         }, function() {
            $(this).removeClass('transition');
         });
      });
   </script>


</body>

</html>