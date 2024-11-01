<?php
// Include the database connection file
include 'db_connect.php';
$conn = connectDatabase();

// Data super user
$username = 'superuser'; // Ganti dengan username yang diinginkan
$email = 'superuser@example.com'; // Ganti dengan email yang diinginkan
$password = password_hash('your_password_here', PASSWORD_DEFAULT); // Ganti dengan password yang diinginkan
$role = 'superuser'; // Atur role sebagai 'superuser'

// Siapkan dan eksekusi query
$stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $email, $password);

if ($stmt->execute()) {
    echo "Super user berhasil dibuat.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>