<?php

    // Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'ninja_pizza');

    // Check connection
    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // write query for all pizzas
    $sql = 'SELECT title, ingredients, id FROM pizzas';

    // make query and get result
    $result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>
    
    <?php include('templates/footer.php'); ?>
    

</html>