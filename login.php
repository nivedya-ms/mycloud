<!-- <?php
// session_start();
// include 'config.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
//     $stmt->bind_param("s", $username);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         $user = $result->fetch_assoc();
//         if (password_verify($password, $user['password'])) {
//             $_SESSION['username'] = $username;
//             header("Location: dashboard.php");
//         } else {
//             $error = "Invalid password!";
//         }
//     } else {
//         $error = "No user found with that username!";
//     }
// }
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login - Personal Cloud Storage</title>
    <script>
        VanillaTilt.init(document.querySelectorAll(".card"), {
    max: 15,
    speed: 400,
    glare: true,
    "max-glare": .5
  });
    </script>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <div class="input-wrapper">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="container-button">
                    <button class="btn">
                        <a href="#" onclick="this.closest('form').submit()">Login</a>
                    </button>
                </div>
                <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
            </form>
        </div>
    </div>
</body>
</html>
