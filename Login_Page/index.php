<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];
    $duplicate = mysqli_query($conn, "SELECT * FROM login WHERE username ='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo"
        <script> alert ('Username or email has already taken')</script> ";
}
else{
    if ($password == $password_confirm){
    $query = "INSERT INTO login VALUES('$name','$username','$email','$password')";
    mysqli_query($conn,$query);
    echo
    "<script> alert ('Registration Successful')</script> ";
}
else{
    echo 
    "<script> alert ('Password does not match')</script> ";
}
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- linking the script
      the defer attribute tells the browser to wait until the entire HTML page is loaded before running the JavaScript file (js/index.js) -->
    <script defer src="js/index.js"></script>
    <!-- linking CSS -->
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <div class="login">
        
        <form id="form" action="" method="POST" autocomplete="off">
            <h1>Register</h1>

            <!-- Asking for new user details -->
            <div class="input-control">
                <label for="name">Name </label><br>
                <input type="text" id="name" placeholder="Input your name..."  name="name" required="required"><br>
            </div>

            <div class="input-control">
                <label for="username">Username</label><br>
                <input type="text" placeholder="username..." id="username" name="username" required="required" required="required"><br>
            </div>

            <div class="input-control">
                <label for="email">Email</label><br>
                <input type="text" placeholder="Input email..."  name="email" required="required"><br>
            </div>

        

            <div class="input-control">
                <label for="password1">Password</label><br>
                <input type="password" id="password" placeholder="Password" name="password" required="required"><br>
                
            </div>

            <div class="input-control">
                <label for="password_confirm">Confirm Password</label><br>
                <input type="password" id="password_confirm" placeholder="Confirm Password..." required="required" name="password_confirm"><br>
            </div>
            

           

            <!-- Set button type to submit post the inputs to database -->
            <button class="btn" type="submit" name="submit">Register</button>

            <br>

            <p>Already registered? <a href="login.php"><strong style="color: #101541;">Sign in now</strong></a></p>
        </form>
    </div>
</body>
</html>