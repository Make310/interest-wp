<?php
/**
 * Author Info Template Part
 */
?>
<div class="article__author">
    <?php echo get_avatar(get_the_author_meta('ID'), 50); ?>
    <div class="article__author-meta">
        <p class="article__author-name">
            By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php the_author(); ?>
            </a>
        </p>
        <p class="article__author-date">
            <?php echo get_the_date(); ?>
        </p>
    </div>
</div>
