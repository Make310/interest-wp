<?php
/**
 * Archive Template - Tags, Categories, Authors
 */
get_header();
?>
<!-- TEMPLATE: archive.php -->
<?php

// Get archive info
$archive_title = '';
$archive_description = '';
$archive_type = '';

if (is_tag()) {
    $archive_title = single_tag_title('', false);
    $archive_description = tag_description();
    $archive_type = 'tag';
} elseif (is_category()) {
    $archive_title = single_cat_title('', false);
    $archive_description = category_description();
    $archive_type = 'category';
} elseif (is_author()) {
    $archive_title = get_the_author();
    $archive_description = get_the_author_meta('description');
    $archive_type = 'author';
}
?>

<main class="main main--full-height">
    <!-- Archive Header -->
    <section class="research-header">
        <?php if ($archive_type === 'tag') : ?>
            <p class="research-header__label">TAG</p>
        <?php elseif ($archive_type === 'category') : ?>
            <p class="research-header__label">CATEGORY</p>
        <?php elseif ($archive_type === 'author') : ?>
            <p class="research-header__label">AUTHOR</p>
        <?php endif; ?>

        <h1 class="research-header__title"><span class="underline"><?php echo esc_html($archive_title); ?></span></h1>

        <?php if ($archive_description) : ?>
            <p class="research-header__subtitle"><?php echo wp_kses_post($archive_description); ?></p>
        <?php endif; ?>

        <?php if ($archive_type === 'author') : ?>
            <div class="archive-author">
                <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- Blog Posts -->
    <section class="blog-posts">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post">
                    <?php
                    $categories = get_the_category();
                    if ($categories) : ?>
                        <span class="post__category"><?php echo esc_html(strtoupper($categories[0]->name)); ?></span>
                    <?php endif; ?>

                    <h2 class="post__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <?php if (has_excerpt()) : ?>
                        <p class="post__excerpt"><?php echo get_the_excerpt(); ?></p>
                    <?php else : ?>
                        <p class="post__excerpt"><?php echo wp_trim_words(get_the_content(), 30); ?></p>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="no-posts">No posts found.</p>
        <?php endif; ?>
    </section>

    <!-- Pagination -->
    <?php
    global $wp_query;
    $total_pages = $wp_query->max_num_pages;
    if ($total_pages > 1) :
        $current_page = max(1, get_query_var('paged'));
    ?>
    <nav class="pagination">
        <?php
        // Previous page link
        if ($current_page > 1) :
            echo '<a href="' . get_pagenum_link($current_page - 1) . '" class="pagination__item">&larr;</a>';
        endif;

        // Page numbers
        for ($i = 1; $i <= $total_pages; $i++) :
            if ($i == $current_page) :
                echo '<span class="pagination__item pagination__item--active">' . $i . '</span>';
            elseif ($i == 1 || $i == $total_pages || ($i >= $current_page - 2 && $i <= $current_page + 2)) :
                echo '<a href="' . get_pagenum_link($i) . '" class="pagination__item">' . $i . '</a>';
            elseif ($i == $current_page - 3 || $i == $current_page + 3) :
                echo '<span class="pagination__dots">...</span>';
            endif;
        endfor;

        // Next page link
        if ($current_page < $total_pages) :
            echo '<a href="' . get_pagenum_link($current_page + 1) . '" class="pagination__item">&rarr;</a>';
        endif;
        ?>
    </nav>
    <?php endif; ?>

    <!-- Footer Section -->
    <?php get_template_part('template-parts/footers/home', null, array('fullwidth' => true)); ?>
</main>

<?php get_footer(); ?>
