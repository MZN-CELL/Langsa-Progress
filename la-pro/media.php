<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media - La-Pro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Link to your main CSS file -->
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <?php include 'sidebar.php'; ?> <!-- Include sidebar for navigation -->
        </div>

        <!-- Main Content Section -->
        <div class="main-content">
            <?php
            // Include the database connection file and establish connection
            include 'db_connect.php';
            $conn = connectDatabase();
            ?>

            <!-- Photo Upload Form -->
            <form action="media.php" method="post" enctype="multipart/form-data" class="upload-form">
                <input type="file" name="photo" accept="image/*" required>
                <button type="submit" name="upload">Upload Photo</button>
            </form>

            <?php
                // Handle the photo upload
                if (isset($_POST['upload']) && isset($_FILES['photo'])) {
                    $uploadDir = 'uploads/';
                    $fileName = basename($_FILES['photo']['name']);
                    $uploadFile = $uploadDir . $fileName;

                    // Check if upload directory exists, create if not
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    // Move uploaded file to the upload directory
                    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
                        // Insert the file path into the database
                        $stmt = $conn->prepare("INSERT INTO media (file_path) VALUES (?)");
                        $stmt->bind_param("s", $uploadFile);
                        $stmt->execute();
                        $stmt->close();

                        echo "<p>Photo uploaded successfully!</p>";
                    } else {
                        echo "<p>Failed to upload photo.</p>";
                    }
                }

                // Retrieve photos from the database
                $result = $conn->query("SELECT file_path FROM media ORDER BY upload_time DESC");
                $photos = [];
                while ($row = $result->fetch_assoc()) {
                    $photos[] = $row['file_path'];
                }
            ?>

            <?php if (count($photos) > 0): ?>
                <!-- Display photos in a gallery if available -->
                <div class="gallery">
                    <?php foreach ($photos as $photo): ?>
                        <div class="photo-box">
                            <img src="<?php echo $photo; ?>" alt="Uploaded Photo">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <!-- Display no media found message if no photos -->
                <div class="no-media-container">
                    <img src="path/to/your/no-media-image.png" alt="No Media Found" class="no-media-icon"> <!-- Replace with actual image path -->
                    <h2 class="no-media-text">Tidak Ditemukan Media</h2>
                </div>
            <?php endif; ?>

            <!-- Close the Database Connection -->
            <?php $conn->close(); ?>
        </div>
    </div>
</body>
</html>
