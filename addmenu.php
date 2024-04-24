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
        input[type="text"], input[type="number"], input[type="textarea"] {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 12px;
            margin: 1px 0;
            border: 0.5px solid grey;
            border-radius: 10px;
            background-color: #f8f8f8;
            margin-left: 20px;
        }
        .form-label {
            margin-left: 20px;
            color: black;
        }
        .register-button {
        background-color: #4CAF50; 
        color: white; 
        padding: 6px 20px; 
        margin: 10px 20px; 
        border: none; 
        border-radius: 10px; 
        cursor: pointer; 
        width: 150px; 
    }
    .register-button:hover {
        background-color: #45a049; 
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
        <button type="submit" name="addbutton" class="register-button">Add</button>
       

    </form>


</body>

</html>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $quantity = $_POST['quantity'];
        $menu_id = $_POST['menu_id'];

        // Connect to database
        $conn = mysqli_connect("localhost", "username", "password", "database");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert data into database
        $sql = "INSERT INTO orders (menu_id, quantity) VALUES ('$menu_id', '$quantity')";
        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    }
    ?>