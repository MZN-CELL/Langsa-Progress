<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - LA-Pro</title>
    <link rel="stylesheet" href="../style.css"> <!-- Link to shared CSS file -->
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="?section=media" class="<?php echo isset($_GET['section']) && $_GET['section'] == 'media' ? 'active' : ''; ?>"><i class="fas fa-photo-video"></i> Media Control</a></li>
                <li><a href="?section=map" class="<?php echo isset($_GET['section']) && $_GET['section'] == 'map' ? 'active' : ''; ?>"><i class="fas fa-map"></i> Map Control</a></li>
                <li><a href="?section=user" class="<?php echo isset($_GET['section']) && $_GET['section'] == 'user' ? 'active' : ''; ?>"><i class="fas fa-users"></i> User Control</a></li>
                <li><a href="?section=news" class="<?php echo isset($_GET['section']) && $_GET['section'] == 'news' ? 'active' : ''; ?>"><i class="fas fa-newspaper"></i> News Control</a></li>
            </ul>
        </div>

        <!-- Main Content Section -->
        <div class="main-content">
            <?php
            // Include the appropriate section based on the selected control
            $section = isset($_GET['section']) ? $_GET['section'] : 'media';
            switch ($section) {
                case 'media':
                    include 'sections/media_control.php';
                    break;
                case 'map':
                    include 'sections/map_control.php';
                    break;
                case 'user':
                    include 'sections/user_control.php';
                    break;
                case 'news':
                    include 'sections/news_control.php';
                    break;
                default:
                    include 'sections/media_control.php';
            }
            ?>
        </div>
    </div>
</body>
</html>
