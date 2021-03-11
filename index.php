<?php include "db_connection.php" ?>
<?php 

//deleting the record
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM data ";
    $query .= "WHERE id = $id";
    
    $result = mysqli_query($connection, $query);
    
    if(!$result) {
        die("Query Failed." . mysqli_error($connection));
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Project - PHP</title>
    <!-- adding bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<!-- 

The require_once keyword is used to embed PHP code from another file. If the file is not found, a fatal error is thrown and the program stops. If the file was already included previously, this statement will not include it again.

-->



<div class="container">
    <div class="row justify-content-center">
       <div class="col-sm-12 col-md-8">
        <!-- reading data from database -->
        <?php 
        
        $query = "SELECT * FROM data";
        $result = mysqli_query($connection, $query);
        
        if(!$result) {
            die("Query Failed." . mysqli_error($connection));
        }
        
        ?>
        
        <table class="table table-sm table-hover table-striped">
            <thead>
                <tr class="table-dark">
                    <th>Product</th>
                    <th>Price($)</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php 
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['product']; ?></td>
                
                <td><?php echo $row['price']; ?></td>
                
                <td>
                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php 
            }
            ?>
            
        </table>
       </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            <form action="process.php" method="post">
                <div class="form-group m-3">
                    <label for="product">Product</label>
                    <input type="text" placeholder="Wrist Watch" name="product" class="form-control" id="product" required>
                </div>
                <div class="form-group m-3">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" placeholder="$5" id="price" name="price" min="0" required>
                </div>
                <div class="m-3">
                    <button type="submit" class="btn btn-primary" name="save">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>