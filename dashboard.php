<?php
    $title= "Home | myBuddy";
    $keywords = "";
    $description = "";
    require_once "./core/init.php";
    require_once "./shared/header.php";
    require_once "./shared/redirect.php";

    $sql = "SELECT * FROM post ORDER BY post_created_date DESC";
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
                            <?php foreach($posts as $post) {?>
                            <li class="post">
                                <?php
                                    $post_id = $post['id'];

                                    $sql = "SELECT * FROM post_answer_vote WHERE post_id=$post_id";
                                    $post_number_of_answers = mysqli_num_rows(mysqli_query($connection, $sql));
                                ?>
                                <div class="post-content">
                                    <div class="post-content-header">
                                        <div class="post-content-title">
                                            <a href="<?php echo ROOT_URL; ?>/post/question.php?id=<?php echo $post['id']; ?>" class="text-color-uj heading-style-h5"><?php echo $post['post_title'] ?></a>
                                        </div>
                                    </div>
                                    <div class="spacing-block padding-small"></div>
                                    <div class="post-content-body">
                                        <p><?php echo $post['post_content']?></p>
                                    </div>
                                    <div class="spacing-block padding-small"></div>
                                    <div class="post-content-footer">
                                        <div class="post-content-stats">
                                            <a href="<?php echo ROOT_URL; ?>/post/question.php?id=<?php echo $post['id']; ?>" class="text-color-uj">
                                                <span class="post-content-stats-item-number"><?php echo $post['post_number_of_answers'] ?></span>
                                                <span class="post-content-stats-item-unit">answers</span>    
                                            </a>
                                        </div>
                                        <div class="user-card">
                                            <div class="user-card-profile-pic">
                                                <?php $post_avatar = $post['post_created_by_avatar'] ?? ROOT_URL . "/public/assets/images/blank-profile-picture.png"; ?>
                                                <img src="<?php echo $post_avatar; ?>" loading="lazy" alt>
                                            </div>
                                            <div class="user-card-info">
                                                <div class="user-card-link">
                                                    <h3 class="text-weight-bold"><a href="#" class="text-color-uj"><?php echo $post['post_created_by'] ?></a></h3>
                                                </div>
                                            </div>
                                            <time class="user-card-time">
                                                asked on
                                                <span class="relative-time text-muted"><?php echo $post['post_created_date'] ?></span>
                                            </time>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php }?>
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