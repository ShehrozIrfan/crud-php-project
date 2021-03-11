<?php include "db_connection.php" ?>
<?php 
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
}


?>