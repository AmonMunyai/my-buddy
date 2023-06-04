<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?php echo $keywords; ?>">
        <meta name="description" content="<?php echo $description; ?>">
        <title><?php echo $title; ?></title>

        <link rel="stylesheet" href="http://localhost/mybuddy/public/css/mybuddy.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>
    <!-- navigation bar -->
    <header>
        <div class="navbar_component">
            <div class="navbar_container">
                <a href="http://localhost/mybuddy/dashboard.php" class="navbar_logo-link text-color-white">
                    <h1 class="navbar_logo">my<span class="text-color-uj">Buddy</span></h1>
                </a>
                <nav class="navbar_menu navbar-top">
                    <ul class="navbar_menu-links">
                        <li><a href="#" class="navbar_link">Blog</a></li>
                        <li><a href="#" class="navbar_link">Docs</a></li>
                        <li><a href="developers.php" class="navbar_link">Developers</a></li>
                    </ul>
                    <div class="navbar_menu-buttons">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                        ?>
                        <a href="<?php echo ROOT_URL; ?>/users/logout.php" id="logout-btn" class="button is-small">Log out</a>
                        <?php
                        } else {
                        ?>
                        <a href="#" id="login-btn" class="button is-small" onclick="toggleModal('login')">Log in</a>
                        <a href="#" id="join-btn" class="button is-small" onclick="toggleModal('join')">Join</a>
                        <?php
                        }
                        ?>
                    </div>
                </nav>
                <div class="menu-icon">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </header>