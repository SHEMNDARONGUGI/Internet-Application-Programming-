<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="registration.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="login">
        <form action="auth.php" method="POST">
            <h1>Login</h1>

            <label for="username">username</label><br>
            <input type="text" id="username" name="username" placeholder="Input Username..." required><br>

            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" placeholder="Password..." required><br><br>

            <button class="btn" type="submit" name="submit">Login</button>
            <br>
            <p>Not registered? <a href="registration.php"><strong style="color: #101541;">Sign up now</strong></a></p>
        </form>
    </div>

    <?php
    if (isset($_SESSION['login_status'])) {
        if ($_SESSION['login_status'] == "success") {
            echo "<script>
                Swal.fire({
                    title: 'Login Successful!',
                    text: 'Welcome back, " . $_SESSION['username'] . "!',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'portal.php';
                });
            </script>";
        } elseif ($_SESSION['login_status'] == "failed") {
            echo "<script>
                Swal.fire({
                    title: 'Login Failed!',
                    text: 'Invalid username or password. Please try again.',
                    icon: 'error',
                    timer: 2500,
                    showConfirmButton: false
                });
            </script>";
        }
        unset($_SESSION['login_status']); 
    }
    ?>
</body>
</html>

