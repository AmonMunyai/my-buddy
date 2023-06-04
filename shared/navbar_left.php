<?php
    if (isset($_SESSION['user_username'])) {
        $user_display_name = "@" . strtolower($_SESSION['user_username']);

        $sql = "SELECT user_avatar FROM user WHERE id = " . $_SESSION['user_id'];
        $result = mysqli_query($connection, $sql);
        $user = mysqli_fetch_assoc($result);

        $user_avatar = $user['user_avatar'];
        $user_display_page = 'onclick="toggleModal(' . "'profile'" . ')"';
    } else {
        $random_data_api = file_get_contents("https://random-data-api.com/api/v2/users?response_type=json");
        if ($random_data_api) {
            $user_avatar = json_decode($random_data_api)->avatar;
        } else {
            $user_avatar = ROOT_URL . "/public/assets/images/blank-profile-picture.png";
        }
        $user_display_name = "@guest" . bin2hex(random_bytes(2));
        $user_display_page = 'onclick="toggleModal(' . "'login'" . ')"';
    }
?>
                    <!-- left side navigation bar -->
                    <nav class="sidebar">
                        <header>
                            <div class="profile">
                                <a <?php echo $user_display_page; ?> class="profile-link">
                                    <div class="profile-pic">
                                        <img src="<?php echo $user_avatar; ?>" loading="lazy" alt>
                                    </div>
                                </a>
                                <div class="spacing-block padding-small"></div>
                                <span class="sidebar-item"><?php echo $user_display_name; ?></span>
                            </div>
                        </header>
                        <div class="line-divider"></div>
                        <div class="spacing-block padding-small"></div>
                        <ul class="sidebar-links">
                            <li>
                                <?php
                                    if ($user_display_name == "guest") {
                                        $redirect = 'onclick="toggleModal(' . "'login'" . ')"';
                                    } else {
                                        $redirect = 'href="' . ROOT_URL . '/dashboard.php"';
                                    }
                                ?>
                                <a <?php echo $redirect; ?> class="sidebar-link">
                                    <i class="fa fa-home"></i>
                                    <span class="sidebar-item text-size-small">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="sidebar-link" onclick="toggleModal('search')">
                                    <i class="fa fa-search"></i>
                                    <span class="sidebar-item text-size-small">Search</span>
                                </a>
                            </li>
                            <li>
                                <?php
                                    if ($user_display_name !== "guest" && isset($_SESSION["user_id"])) {
                                        $sql = "SELECT * FROM user_notification WHERE user_id=" . $_SESSION['user_id'];
                                        $notifications = mysqli_query($connection, $sql);
                
                                        if (mysqli_num_rows($notifications) > 0) {        
                                ?>
                                <a href="#" class="sidebar-link text-color-uj" onclick="toggleModal('notifications')">
                                    <i class="fa fa-bell"></i>
                                    <span class="sidebar-item text-size-small">Notifications</span>
                                </a>
                                <?php
                                        } else {
                                ?>
                                <a href="#" class="sidebar-link" onclick="toggleModal('notifications')">
                                    <i class="fa fa-bell"></i>
                                    <span class="sidebar-item text-size-small">Notifications</span>
                                </a>
                                <?php
                                        }
                                    }
                                ?>
                            </li>
                            <li>
                                <a href="#" class="sidebar-link">
                                    <i class="fa fa-users"></i>
                                    <span class="sidebar-item text-size-small">Communities</span>
                                </a>
                            </li>
                            <li>
                                <?php
                                    if ($user_display_name !== "guest") {
                                ?>  
                                <a href="#" class="sidebar-link" onclick="toggleModal('create-post')">
                                    <i class="fa fa-question"></i>
                                    <span class="sidebar-item text-size-small">Ask a Buddy?</span>
                                </a>
                                <?php
                                    }
                                ?>
                            </li>
                        </ul>
                    </nav>