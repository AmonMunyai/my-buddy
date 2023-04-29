<?php
    require_once "./core/init.php";

    if (isset($_POST['search-submit'])) {
        $query = $_POST['query'];
        $title= $query . " - myBuddy Search";

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
            <div class="navbar_buttons">
                <a href="<?php echo ROOT_URL; ?>/users/logout.php" id="logout-btn" class="button">Log out</a>
            </div>
        </nav>
    </header>
    <!-- main content -->
    <main class="main-wrapper">
        <section class="section_home">
            <div class="padding-global">
                <div class="container">
                    <?php require_once "./shared/navbar_left.php"; ?>

                    <!-- main content, posts and feed -->
                    <div class="content">
                        <ul class="posts">
                            <?php
                                $result = mysqli_num_rows($posts);

                                if ($result > 0) {
                                    require_once "./shared/content.php";
                                } else {
                                    // no content
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