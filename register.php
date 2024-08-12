<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if username already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Username already exists!";
    } else {
        // Insert new user into database
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            header("Location: login.php");
        } else {
            $error = "Error registering user!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Register - Personal Cloud Storage</title>
</head>
<body>
    <header>
        <div class="container">
            <h1>Register</h1>
        </div>
    </header>
    <nav>
        <div class="container">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
        </div>
    </nav>
    <div class="container">
        <form action="register.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>
        <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    </div>
</body>
</html>
