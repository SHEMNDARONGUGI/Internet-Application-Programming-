

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

            <label for="username">Username: </label><br>
            <input type="text" id="username" name="username" placeholder="Input Username..."><br>

        
            <label for="password1">Password</label><br>
            <input type="password" name="password" id="password1" placeholder="Password..."><br><br>

            <button class="btn" type="submit" name="submit">Login</button>
            <br>
            <p>Don't have account? <a href="index.php"><strong style="color: #101541;">Sign up now</strong></a></p>

        </form>
    </div>
</body>
</html>