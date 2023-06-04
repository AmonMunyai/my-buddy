                            <?php foreach($posts as $post) {?>
                            <li class="post">
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
                                                <span class="post-content-stats-item-number"><?php echo $post['post_number_of_answers']; ?></span>
                                                <span class="post-content-stats-item-unit">answers</span>    
                                            </a>
                                        </div>
                                        <div class="user-card">
                                            <div class="user-card-profile-pic">
                                                <img src="<?php echo $post['post_created_by_avatar']; ?>" loading="lazy" alt>
                                            </div>
                                            <div class="user-card-info">
                                                <div class="user-card-link">
                                                    <h3 class="text-weight-bold"><a href="#" class="text-color-uj"><?php echo strtolower($post['post_created_by']) ?></a></h3>
                                                </div>
                                            </div>
                                            <time class="user-card-time">
                                                asked
                                                <span class="relative-time text-muted"><?php echo time_elapsed_string($post['post_created_date']) ?></span>
                                            </time>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php }?>