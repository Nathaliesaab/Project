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
if (isset($_POST['insert'])) {

    $logedInUsername = $_SESSION['user']['auname'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $category = $_POST['cat'];
    $folder = "../medImages/";
    move_uploaded_file($_FILES["filep"]["tmp_name"], "$folder" . $_FILES["filep"]["name"]);
    $query = "INSERT INTO Medicine(MedName,MedPrice,MedDescription,MedImage,MedCategory) 
	   values('$name', '$price','$desc','medImages/" . $_FILES['filep']['name'] . "','$category')";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script type="text/javascript">window.alert("Product is inserted");window.location ="Control.php";</script>';
    } else {
        echo '<script type="text/javascript">window.alert("Product is not inserted");window.location ="Control.php";</script>' . mysqli_error($con);
    }
    $queryChanges = "INSERT INTO Changes(Medicine_Name,Adminstrator_Name) values('$name','$logedInUsername');";
    $resultTwo = mysqli_query($con, $queryChanges);
}


if (isset($_POST['update'])) {

    $logedInUsername = $_SESSION['user']['auname'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $folder = "medImages/";
    move_uploaded_file($_FILES["filep"]["tmp_name"], "$folder" . $_FILES["filep"]["name"]);
    $category = $_POST['cat'];
    $query = "update Medicine set MedPrice = '$price' ,MedDescription='$desc',MedImage= 'medImages/" . $_FILES['filep']['name'] . "',MedCategory= '$category' 
     where MedName = '$name' ";


    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script type="text/javascript">window.alert("Product is updated");window.location ="Control.php";</script>';
    } else {
        echo '<script type="text/javascript">window.alert("Product is not updated");window.location ="Control.php";</script>' . mysqli_error($con);
    }

    $queryChanges = "INSERT INTO Changes(Medicine_Name,Adminstrator_Name) values('$name','$logedInUsername');";
    $resultTwo = mysqli_query($con, $queryChanges);
}

if (isset($_POST['delete'])) {
    $logedInUsername = $_SESSION['user']['auname'];
    $sname = $_POST['medName'];

    $query = "delete from Medicine where MedName = '$sname' ;";


    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script type="text/javascript">window.alert("Product is deleted");window.location ="Control.php";</script>';
    } else {
        echo '<script type="text/javascript">window.alert("Product is not deleted");window.location ="Control.php";</script>' . mysqli_error($con);
    }
    $queryChanges = "INSERT INTO Changes(Medicine_Name,Adminstrator_Name) values('$name','$logedInUsername');";
    $resultTwo = mysqli_query($con, $queryChanges);
}
?>



<!DOCTYPE html>
<html>
<title>Control Page</title>

<head>

    <link rel="stylesheet" href="style.css" />
    <title>Admin login page</title>
</head>

<body>
    <h2>Welcome to the Adminstrator Page</h2>
    <br>
    <table class="pTable">
        <tr>
            <th width="10%">Product Name</th>
            <th width="5%">Image</th>
            <th width="10%">Price</th>
            <th width="20%">Description</th>
            <th width="5%">Category</th>
            <th width="30%">Action</th>
        </tr>
        <?php

        $sql = "Select * From Medicine order by MedName;";
        $result =  mysqli_query($con, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>

                <tr>
                    <th width="10%"><?php echo $row['MedName'] ?></th>
                    <th width="5%"> <img width="50px" height="50px" src="<?php echo $row['MedImage'] ?>" alt="MedImage"></th>
                    <th width="10%"><?php echo $row['MedPrice'] ?></th>
                    <th width="20%%"><?php echo $row['MedDescription'] ?></th>
                    <th width="10%"><?php echo $row['MedCategory'] ?></th>
                    <form action="" method="post">
                        <th>
                            <input type="hidden" id="tablename" name="medName" value="<?php echo $row['MedName'] ?>" />
                            <button type="submit" class="action" name="delete">Remove</button>
                        </th>
                    </form>





                </tr>
        <?php

            }
        }

        ?>
    </table>


    <form class="pForm" method="post" enctype="multipart/form-data">
        <br>
        <h3>To Add or Update A Product:</h3>
        <br>
        <div class="align">
            <div>
                <label for="name"> MedName :</label>
                <input type="text" id="name" name="name" required />
            </div>
            <div>
                <label for="pricee"> MedPrice :</label>
                <input type="text" id="price" name="price" required />
            </div>
            <div>
                <label for="desc"> MedDescription :</label>
                <input type="text" id="desc" name="description" required />
            </div>

            <div>
                <label for="image"> MedImage:</label>
                <input type="file" id="image" name="filep" />
            </div>

            <div>
                <label for="category"> MedCategory :</label>
                <input type="text" id="category" name="cat" />
            </div>


            <button type="submit" name="update">Update</button>
            <button type="submit" name="insert">Insert</button>
        </div>
</body>

</html>