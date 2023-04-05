<?php
    if (isset($_SESSION['user_firstname']) && isset($_SESSION['user_lastname'])) {
        $user_display_name = $_SESSION['user_firstname'] . " " . $_SESSION['user_lastname'];
        $user_display_page = 'href="#"'; // redirect to user profile page
    } else {
        $user_display_name = "guest";
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
                                        echo '<li><a href="#" class="sidebar-link" onclick="toggleModal(' . "'notifications'" . ')"><i class="fa fa-bell"></i>Notifications</a></li>';
                                    }
                                ?>
<li><a href="#" class="sidebar-link"><i class="fa fa-users"></i>Communities</a></li>
                                <?php
                                    if ($user_display_name !== "guest") {
                                        echo '<li><a href="#" class="sidebar-link" onclick="toggleModal(' . "'create-post'" . ')"><i class="fa fa-question"></i>Ask a Buddy?</a></li>';
                                    }
                                ?>
</ul>
                        </div>
                    </nav>
