<!-- <?php
require 'config.php';
if(isset($_POST["submit"])) {
    $username_email = $_POST["username_email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn,"SELECT * FROM login WHERE username = '$username_email' OR email = '$username_email' ");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0) {
        if($password == $row["password"] ){
            $_SESSION["login"] = true;
            header("Location: homepage.php");
        }
        else{
            echo
            "<script>alert('Wrong Password')</script>";
        }
}
} 
else {
    echo
    "<script>alert('User not Registered')</script>";
}
?> -->

<?php
session_start(); // ✅ Start the session
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $username_email = $_POST["username_email"] ?? '';
    $password = $_POST["password"] ?? '';

    // ✅ Check if fields are not empty
    if (!empty($username_email) && !empty($password)) {
        // ✅ Use a prepared statement to prevent SQL injection
        $query = "SELECT * FROM login WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username_email, $username_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // ✅ Use password_verify() to check hashed password
            if (password_verify($password, $row["password"])) {
                $_SESSION["login"] = true;
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                
                header("Location: homepage.php");
                exit(); // ✅ Ensure script stops after redirect
            } else {
                echo "<script>alert('Wrong Password');</script>";
            }
        } else {
            echo "<script>alert('User not registered');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script defer src="js/index.js"></script>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <div class="login">
        <form action="" method="POST" autocomplete="off">
            <h1>Login</h1>

            <!-- Asking for user information -->

            <label for="username_email">Username or Email:</label><br>
            <input type="text" id="username_email" name="username_email" placeholder="Input Username or email..." required="required"><br>

        
            <label for="password1">Password</label><br>
            <input type="password" name="password" id="password1" placeholder="Password..."><br><br>

            <button class="btn" type="submit" name="submit">Login</button>
            <br>
            <p>Don't have account? <a href="index.php"><strong style="color: #101541;">Sign up now</strong></a></p>
    <!-- where I am to start -->
        </form>
    </div>
</body>
</html>