<?php 

$connection = mysqli_connect('localhost', 'root', 'root', 'crud', '3307');
        
    if(!$connection) {
        die("Connection Failed." . mysqli_error($connection));
    }

?>