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



<?php 

$id = 0;
//updating the record
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    
    $query = "UPDATE data SET ";
    $query .= "product = '$product', ";
    $query .= "price = '$price' ";
    $query .= "WHERE id = $id";
    
    $result = mysqli_query($connection, $query);
    
    if(!$result) {
        die("Query Failed. " .  mysqli_error($connection));
    }
    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    
    header("location: index.php");
}

?>