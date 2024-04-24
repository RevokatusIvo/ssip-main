<?php

include __DIR__ . "/database.php";
session_start();

if (isset($_SESSION["is_login"]) && $_SESSION["is_login"]) {
    header("location: landing.php");
}

$message = "";

if (isset($_POST["loginBtn"])) {
   
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM admin where
        username = '$username' and
        password = '$password'";

        $result = $db -> query($sql);

        if ($result -> num_rows > 0) {
            $data = $result -> fetch_assoc();
        
            $_SESSION["is_login"] = true;
            $_SESSION["username"] = $data["username"];
        
            header("location: landing.php");
        } else {
            $message = "INVALID USERNAME OR PASSWORD";
            // Redirect back to the login page with the error message
            header("location: submit-login.php?message=" . urlencode($message));
        }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
<div class="login-container">
    <form action="submit-login.php" method="POST" class="login-form">
        <h2>Login</h2>
        <?php if (isset($_GET["message"])) { ?>
            <p class="error-message"><?php echo htmlspecialchars($_GET["message"]); ?></p>
        <?php } ?>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <input type="submit" class="login-button" name="loginBtn" value="Login"></input>
        <p>Belum punya akun? <a href="register.html">Daftar Sekarang</a></p>
    </form>
</div>
</body>
</html>