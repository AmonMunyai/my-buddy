<?php
    require_once "./core/init.php";

    if (isset($_GET['search-submit'])) {
        $query = $_GET['q'];
        $title = $query . " - myBuddy Search";

        $search_query = mysqli_real_escape_string($connection, $query);
        $sql = "SELECT * FROM post WHERE post_title LIKE '%$search_query%' OR post_content LIKE '%$search_query%'";
    } else {
        $title= "Home | myBuddy";
        $sql = "SELECT * FROM post ORDER BY post_created_date DESC";    
    }
    
    $keywords = "";
    $description = "";
    require_once "./core/functions.php";
    require_once "./shared/header.php";
    require_once "./shared/redirect.php";

    $posts = mysqli_query($connection, $sql);
?>
    <!-- main content -->
    <main class="main-wrapper">
        <section class="section_home">
            <div class="padding-global">
                <div class="container">
                    <?php require_once "./shared/navbar_left.php"; ?>
                    <nav class="bottombar">
                        <header>
                            <div class="profile">
                                <a <?php echo $user_display_page; ?> class="profile-link">
                                    <div class="profile-pic">
                                        <img src="<?php echo $user_avatar; ?>" loading="lazy" alt>
                                    </div>
                                </a>
                                <div class="spacing-block padding-small"></div>
                                <span class="bottombar-item"><?php echo $user_display_name; ?></span>
                            </div>
                        </header>
                        <div class="line-divider"></div>
                        <div class="spacing-block padding-small"></div>
                        <ul class="bottombar-links">
                            <li>
                                <?php
                                    if ($user_display_name == "guest") {
                                        $redirect = 'onclick="toggleModal(' . "'login'" . ')"';
                                    } else {
                                        $redirect = 'href="' . ROOT_URL . '/dashboard.php"';
                                    }
                                ?>
                                <a <?php echo $redirect; ?> class="bottombar-link">
                                    <i class="fa fa-home"></i>
                                    <span class="bottombar-item text-size-small">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="bottombar-link" onclick="toggleModal('search')">
                                    <i class="fa fa-search"></i>
                                    <span class="bottombar-item text-size-small">Search</span>
                                </a>
                            </li>
                            <li>
                                <?php
                                    if ($user_display_name !== "guest" && isset($_SESSION["user_id"])) {
                                        $sql = "SELECT * FROM user_notification WHERE user_id=" . $_SESSION['user_id'];
                                        $notifications = mysqli_query($connection, $sql);
                
                                        if (mysqli_num_rows($notifications) > 0) {        
                                ?>
                                <a href="#" class="bottombar-link text-color-uj" onclick="toggleModal('notifications')">
                                    <i class="fa fa-bell"></i>
                                    <span class="bottombar-item text-size-small">Notifications</span>
                                </a>
                                <?php
                                        } else {
                                ?>
                                <a href="#" class="bottombar-link" onclick="toggleModal('notifications')">
                                    <i class="fa fa-bell"></i>
                                    <span class="bottombar-item text-size-small">Notifications</span>
                                </a>
                                <?php
                                        }
                                    }
                                ?>
                            </li>
                            <li>
                                <a href="#" class="bottombar-link">
                                    <i class="fa fa-users"></i>
                                    <span class="bottombar-item text-size-small">Communities</span>
                                </a>
                            </li>
                            <li>
                                <?php
                                    if ($user_display_name !== "guest") {
                                ?>  
                                <a href="#" class="bottombar-link" onclick="toggleModal('create-post')">
                                    <i class="fa fa-question"></i>
                                    <span class="bottombar-item text-size-small">Ask a Buddy?</span>
                                </a>
                                <?php
                                    }
                                ?>
                            </li>
                        </ul>
                    </nav>

                    <!-- main content, posts and feed -->
                    <div class="content">
                        <ul class="posts">
                            <?php
                                $result = mysqli_num_rows($posts);

                                if ($result > 0) {
                                    require_once "./shared/content.php";
                                } else {
                                    if (isset($_GET['q'])) {
                            ?>
                            <div class="spacing-block padding-large"></div>
                            <div class="line-separator-wrapper">
                                <h4 class="line-separator">We couldn't find a match for "<?php echo $_GET['q']; ?>". Please try another search.</h4>
                            </div>
                            <?php
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                
            </div>
        </section>
    </main>

    <?php require_once "./shared/modal.php"?>
    <script src="<?php echo ROOT_URL; ?>/public/js/main.js" defer></script>
</body>
</html>