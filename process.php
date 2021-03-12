<?php include "db_connection.php" ?>
<?php
    
    
//starting the session
session_start();

//inserting data into the database.
if(isset($_POST['save'])) {
    
    
    $product = $_POST['product'];
    $price = $_POST['price'];
    
    $query = "INSERT INTO data(product, price) ";
    $query .= "VALUES('$product','$price')";
    
    $result = mysqli_query($connection, $query);
    
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    }
    
    $_SESSION['message'] = "Record has been saved!";

    $_SESSION['msg_type'] = "success";
    
    //redirecting to index.php
    header("location: index.php");
}


?>
