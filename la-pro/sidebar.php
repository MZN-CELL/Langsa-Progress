<div class="logo">
    <i class="fas fa-layer-group"></i>
    <span>La-Pro</span>
</div>
<ul>
    <li><a href="dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>"><i class="fas fa-home"></i> Dashboard</a></li>
    <li><a href="media.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'media.php' ? 'active' : ''; ?>"><i class="fas fa-photo-video"></i> Media</a></li>
    <li><a href="berita.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'berita.php' ? 'active' : ''; ?>"><i class="fas fa-newspaper"></i> Berita</a></li>
    <li><a href="notifikasi.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'notifikasi.php' ? 'active' : ''; ?>"><i class="fas fa-bell"></i> Notifikasi <span class="notification-badge">1</span></a></li>
    <li><a href="users.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : ''; ?>"><i class="fas fa-users"></i> Users</a></li>
    <li><a href="settings.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''; ?>"><i class="fas fa-cog"></i> Settings</a></li>
</ul>
<div class="footer">
    <div class="dark-mode">
        <i class="fas fa-moon"></i>
        <span>Dark Mode</span>
        <label class="switch">
            <input type="checkbox" id="dark-mode-toggle">
            <span class="slider"></span>
        </label>
    </div>
    <a href="logout.php" class="logout-button"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>
