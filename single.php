<?php
/**
 * Single Post Template
 */
get_header();
?>

<?php while (have_posts()) : the_post(); ?>
<main class="main">
    <article class="article">
        <!-- Article Header -->
        <header class="article__header">
            <h1 class="article__title"><?php the_title(); ?></h1>

            <!-- Author Info -->
            <?php get_template_part('template-parts/articles/author'); ?>

            <!-- Tags -->
            <?php $post_tags = get_the_tags(); ?>
            <?php if ($post_tags) : ?>
                <div class="article__tags">
                    <?php foreach ($post_tags as $tag) : ?>
                        <a href="<?php echo get_tag_link($tag->term_id); ?>" class="article__tag">
                            <?php echo esc_html(strtoupper($tag->name)); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </header>

        <!-- Featured Image -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="article__featured">
                <?php the_post_thumbnail('large'); ?>
                <?php if (get_the_post_thumbnail_caption()) : ?>
                    <p class="article__caption"><?php the_post_thumbnail_caption(); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Article Content -->
        <div class="article__content">
            <?php the_content(); ?>
        </div>

        <!-- Post Navigation -->
        <nav class="article__nav">
            <div class="article__nav-prev">
                <?php previous_post_link('%link', '&larr; %title'); ?>
            </div>
            <div class="article__nav-next">
                <?php next_post_link('%link', '%title &rarr;'); ?>
            </div>
        </nav>
    </article>
</main>
<?php endwhile; ?>

<?php get_footer(); ?>
