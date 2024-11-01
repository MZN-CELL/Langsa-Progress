<?php
// Include the database connection file
session_start();
include 'db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = connectDatabase();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        header("Location: index.php"); // Redirect to main page
        exit;
    } else {
        $error = "Invalid username or password";
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LA-Pro</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file for styling -->
</head>

<body>
    <div class="login-container">
        <!-- <div class="hello-character">
            <img src="assets/karakter.png">
        </div> -->
        <div class="login-box">
            <div class="logo">
                <img src="assets/LOGO.svg" alt="Logo" style="width: 200px;">
            </div>
            <!-- <h1>LA- Pro</h1> -->
            <?php if (isset($error)) : ?>
                <p style='color:red; text-align:center;'><?= $error ?></p>
            <?php endif; ?>
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Username or Email..." required>
                <input type="password" name="password" placeholder="Password..." required>

                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember"> Ingat Saya</label>
                    <a href="#">Lupa Sandi?</a>
                </div>

                <button type="submit" name="login">Login</button>
            </form>
            <div class="social-login">
                <button class="google-login">Daftar Dengan Google</button>
                <button class="facebook-login">Daftar Dengan Facebook</button>
            </div>
        </div>
    </div>
</body>

</html>
```