<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="registration.css">
</head>
<body>
    <div class="login">
        <form id="form" action="registrationServer.php" method="POST">
            <h1>Register</h1>

            <!-- Asking for new user details -->
            <div>
                <label for="username">Username</label><br>
                <input type="text" placeholder="username..." id="username" name="username" required><br>
            </div>

            <div>
                <label for="email">Email</label><br>
                <input type="email" placeholder="Input email..." name="email" required><br>
            </div>

            <div>
                <label for="password">Password</label><br>
                <input type="password" id="password" placeholder="Password" name="password" required><br>
            </div>

            <div>
                <label for="password_confirm">Confirm Password</label><br>
                <input type="password" id="confirmpassword" placeholder="Confirm Password..." name="confirmpassword" required><br>
            </div>

            <!-- Submit button -->
            <button class="btn" type="submit" name="submit">Register</button>
            <br>

            <p>Already registered? <a href="login.php"><strong style="color: #101541;">Sign in now</strong></a></p>
        </form>
    </div>
</body>
</html>
