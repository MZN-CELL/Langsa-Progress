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
        <div class="login-box">
            <h1>LA- Pro</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ac tortor volutpat, vulputate massa non, feugiat tellus.</p>
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

    <?php
    // Include the database connection file
    include 'db_connect.php';
    $conn = connectDatabase();

    if (isset($_POST['login'])) {
        $usernameOrEmail = $_POST['username'];
        $password = md5($_POST['password']); // Hashing for security

        // Prepare and execute the SQL query
        $stmt = $conn->prepare("SELECT * FROM users WHERE (username = ? OR email = ?) AND password = ?");
        $stmt->bind_param("sss", $usernameOrEmail, $usernameOrEmail, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Fetch user data and check role
            $user = $result->fetch_assoc();
            if ($user['role'] === 'admin') {
                header("Location: admin/admin.php"); // Redirect to admin page
            } else {
                header("Location: media.php"); // Redirect to user page
            }
            exit();
        } else {
            echo "<p style='color:red; text-align:center;'>Invalid login credentials.</p>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>
</html>
