<?php
// Start the session to check user authentication
session_start();
require 'dbConnector.php'; 

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch user details including profile picture
$user_id = $_SESSION['user_id'];
$query = "SELECT username FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Default values
$username = htmlspecialchars($user["username"] ?? "Guest");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
    <link rel="stylesheet" href="portal.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <h1 class="logo">Pixel</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Main Portal Content -->
    <main class="portal-container">
    <section class="glass-card">
        <h2>Welcome to Our Tech Services!</h2>
        <p>We provide cutting-edge technology solutions, specializing in web development, app design, and digital transformation. Explore our services to enhance your online presence and business efficiency.</p>
        <button class="btn">View Our Services</button>
    </section>

    <section class="glass-card">
        <h3>Your Project Dashboard</h3>
        <p>You are logged in as <span id="user-name"><?php echo $username; ?></span>. Track the progress of your web development projects, request updates, and collaborate with our team.</p>
        <button class="btn">Go to Dashboard</button>
    </section>

    <section class="glass-card">
        <h3>Latest Project Updates</h3>
        <ul>
            <li>✔ Website for XYZ Corp launched successfully</li>
            <li>✔ Updated UI/UX designs for your e-commerce platform</li>
            <li>✔ Integrated new API services into client applications</li>
        </ul>
        <button class="btn">View Details</button>
    </section>
</main>

</body>
</html>

