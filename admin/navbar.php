<style>
    * {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1rem;
    }

    body {
        background-color: #f4f6f9;
    }

    nav#sidebar {
        background: #1A535C;
        color: #f4f4f4;
        height: 100vh;
        padding-top: 20px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .sidebar-list {
        list-style: none;
        padding: 0;
    }

    .sidebar-list a {
        display: flex;
        align-items: center;
        color: #f4f4f4;
        padding: 10px 18px;
        margin: 5px 0;
        border-radius: 8px;
        transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
        text-decoration: none;
        font-size: 0.9rem;
    }

    .sidebar-list a:hover {
        background: #0D3B48;
        color: #FFFFFF;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .sidebar-list a.active {
        background: #0D3B48;
        color: #FFFFFF;
        font-weight: bold;
    }

    .icon-field {
        display: inline-block;
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .sidebar-header {
        font-size: 1.2rem;
        font-weight: bold;
        color: #f4f4f4;
        text-align: center;
        margin-bottom: 20px;
    }

    .collapse a {
        padding-left: 30px;
        font-size: 0.8rem;
    }

    .admin-avatar {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #007bff;
    }

    .user-info {
        display: flex;
        align-items: center;
        justify-content: center;
    }

</style>

<nav id="sidebar">
<!-- <div class="sidebar-header">Admin Panel</div> -->

<!-- User Info Section -->
<div class="user-info">
		<!-- Display User's Avatar and Name -->
	<!-- Default Admin Avatar -->
	<img src="assets/img/default_admin.webp" alt="Admin Avatar" class="admin-avatar">
</div>
<h4 class="user-header text-center mt-2"><?php echo $_SESSION['login_name']; ?></h4>
    <div class="sidebar-list">
        <a href="index.php?page=home" class="nav-item nav-home">
            <span class="icon-field"><i class="bx bx-grid"></i></span> Dashboard
        </a>
        <a href="index.php?page=gallery" class="nav-item nav-gallery">
            <span class="icon-field"><i class="bx bx-image"></i></span> Gallery
        </a>
        <a href="index.php?page=forums" class="nav-item nav-forums">
            <span class="icon-field"><i class="bx bx-conversation"></i></span> Forum
        </a>
        <a href="index.php?page=announcement" class="nav-item nav-announcement">
            <span class="icon-field"><i class="bx bx-note"></i></span> Announcements
        </a>
        <a href="index.php?page=messages" class="nav-item nav-messages">
            <span class="icon-field"><i class="bx bx-chat"></i></span> Messages
        </a>
        <?php if ($_SESSION['login_type'] == 1): ?>
            <a href="index.php?page=jobs" class="nav-item nav-jobs">
                <span class="icon-field"><i class="bx bx-briefcase"></i></span> Jobs
            </a>
            <a href="index.php?page=events" class="nav-item nav-events">
                <span class="icon-field"><i class="bx bx-calendar"></i></span> Events
            </a>
            <a href="index.php?page=alumni" class="nav-item nav-alumni">
                <span class="icon-field"><i class="bx bx-user"></i></span> Alumni List
            </a>
            <a href="index.php?page=users" class="nav-item nav-users">
                <span class="icon-field"><i class="bx bx-user"></i></span> Users
            </a>
        <?php endif; ?>
    </div>
</nav>

<script>
    $('.nav_collapse').click(function() {
        $($(this).attr('href')).collapse();
    });
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
</script>
