<?php
    if (isset($_SESSION['user_firstname']) && isset($_SESSION['user_lastname'])) {
        $user_display_name = ucfirst($_SESSION['user_firstname']) . " " . ucfirst($_SESSION['user_lastname']);

        $sql = "SELECT user_avatar FROM user_account WHERE id = " . $_SESSION['user_id'];
        $result = mysqli_query($connection, $sql);
        $user = mysqli_fetch_assoc($result);

        $user_avatar = $user['user_avatar'];
        $user_display_page = 'onclick="toggleModal(' . "'profile'" . ')"';
    } else {
        $user_display_name = "Guest";
        $user_display_page = 'onclick="toggleModal(' . "'login'" . ')"';
    }
?>
<!-- left side navigation bar -->
                    <nav class="sidebar_left">
                        <div class="profile text-align-center">
                            <a <?php echo $user_display_page?> class="profile-link">
                                <div class="profile-pic">
                                    <img src="<?php echo $user_avatar; ?>" loading="lazy" alt>
                                </div>
                                <div class="spacing-block padding-small"></div>
                                <div class="profile-name">
                                    <h4> <?php echo $user_display_name; ?></h4>
                                </div>
                            </a>
                        </div>
                        <div class="line-divider"></div>
                        <div class="sidebar_left-links text-size-small">
                            <ul>
                                <?php
                                    if ($user_display_name == "guest") {
                                        $redirect = 'onclick="toggleModal(' . "'login'" . ')"';
                                    } else {
                                        $redirect = 'href="' . ROOT_URL . '/dashboard.php"';
                                    }
                                ?>
                                <li><a <?php echo $redirect; ?> class="sidebar-link"><i class="fa fa-home"></i>Home</a></li>
                                <li><a href="#" class="sidebar-link" onclick="toggleModal('search')"><i class="fa fa-search"></i>Search </a></li>
                                <!-- <li><a href="#" class="sidebar-link"><i class="fa fa-compass"></i>Explore</a></li> -->
                                <?php
                                    if ($user_display_name !== "guest") {
                                        $sql = "SELECT * FROM user_notification WHERE user_id=" . $_SESSION['user_id'];
                                        $notifications = mysqli_query($connection, $sql);
                
                                        if (mysqli_num_rows($notifications) > 0) {        
                                ?>
                                <li><a href="#" class="sidebar-link text-color-uj" onclick="toggleModal('notifications')"><i class="fa fa-bell"></i>Notifications</a></li>
                                <?php
                                        } else {
                                ?>
                                <li><a href="#" class="sidebar-link" onclick="toggleModal('notifications')"><i class="fa fa-bell""></i>Notifications</a></li>
                                <?php
                                        }
                                    }
                                ?>
                                <li><a href="#" class="sidebar-link"><i class="fa fa-users"></i>Communities</a></li>
                                <?php
                                    if ($user_display_name !== "guest") {
                                ?>                                
                                <li><a href="#" class="sidebar-link" onclick="toggleModal('create-post')"><i class="fa fa-question"></i>Ask a Buddy?</a></li>
                                <?php
                                    }
                                ?>
</ul>
                        </div>
                    </nav>
