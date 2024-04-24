<?php

include "database.php";

if (isset($_POST["addButton"])) {
    
    $name = $_POST["menu_name"];
    $price = $_POST["price"];

    // Check if the dish_id already exists in the database
    $check_query = mysqli_query($db, "SELECT * FROM menu WHERE dish_id='$dishid'");
    if (mysqli_num_rows($check_query) > 0) {
        // Redirect back to the add menu page with an error message
        header("location: add.php?error=existing_id");
        exit(); // Stop further execution
    }

    // Insert new menu into the database
    $result = mysqli_query($db, "INSERT INTO menu (dish_id, dish_name, price) VALUES ('$dishid','$name', '$price')");
    $result2 = mysqli_query($db, "INSERT INTO stock (stock_id, dish_id, quantity) VALUES ('$dishid','$dishid', 0)");
    
    // Redirect to dashboard after successful insertion
    header("location: dashboard.php");
    exit(); // Stop further execution
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .mb-3 {
            width: 50%;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <?php include 'layout/header.php'?>
    <form action="" method="post">
        
        <div class="mb-3">
        <label for="menuname" class="form-label">Menu Name</label>
        <input type="text" class="form-control" id="menuname" name="menuname" required>
        </div>
        <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
        <label for="desc" class="form-label">Description</label>
        <input type="textarea" class="form-control" id="desc" name="desc" required>
        </div>
        
        <div class="mb-3">
        <label for="d" class="form-label">Insert Image: </label>
        <input type="file" class="form-control" id="photo" name="photo" required>
        </div>

        <button type="submit" name="addButton" class="register-button">Add</button>
       

    </form>


</body>

</html>

  