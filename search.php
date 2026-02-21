<?php
/**
 * Search Results Template
 */
get_header();

$search_query = get_search_query();
?>

<main class="main main--full-height">
    <!-- Page Header -->
    <section class="research-header">
        <h1 class="research-header__title"><span class="underline">The Research</span></h1>
        <p class="research-header__subtitle">
            <span class="research-header__subtitle-line research-header__subtitle-line--desktop">Fast and Free, use Interest Rate Research</span><br class="research-header__subtitle-break research-header__subtitle-break--desktop">
            <span class="research-header__subtitle-line research-header__subtitle-line--desktop">for the lowest inPut our gaurnanteterest</span>

            <span class="research-header__subtitle-line research-header__subtitle-line--mobile">Fast and Free consultation, use</span>
            <span class="research-header__subtitle-line research-header__subtitle-line--mobile">Interest Rate Research for the lowest</span>
            <span class="research-header__subtitle-line research-header__subtitle-line--mobile">interest rate available today from the</span>
            <span class="research-header__subtitle-line research-header__subtitle-line--mobile">top lenders.</span>
        </p>

        <div class="search-box">
            <svg class="search-box__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                <input type="text" class="search-box__input" name="s" placeholder="Search" value="<?php echo esc_attr($search_query); ?>">
            </form>
        </div>
    </section>

    <!-- Search Results -->
    <section class="blog-posts">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post">
                    <?php
                    $post_label = '';
                    $post_tags  = get_the_tags();
                    if (!empty($post_tags) && !is_wp_error($post_tags)) {
                        $post_label = $post_tags[0]->name;
                    } else {
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            $post_label = $categories[0]->name;
                        }
                    }
                    if ($post_label) : ?>
                        <span class="post__category"><?php echo esc_html(strtoupper($post_label)); ?></span>
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
            <p class="no-posts">No results found for "<?php echo esc_html($search_query); ?>". Try a different search term.</p>
        <?php endif; ?>
    </section>

    <!-- Pagination -->
    <?php
    global $wp_query;
    $total_pages = (int) $wp_query->max_num_pages;
    if ($total_pages > 0) :
        $current_page = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
    ?>
    <nav class="pagination">
        <?php
        if ($current_page > 1) :
            echo '<a href="' . get_pagenum_link($current_page - 1) . '" class="pagination__item">&larr;</a>';
        endif;

        for ($i = 1; $i <= $total_pages; $i++) :
            if ($i == $current_page) :
                echo '<span class="pagination__item pagination__item--active">' . $i . '</span>';
            elseif ($i == 1 || $i == $total_pages || ($i >= $current_page - 2 && $i <= $current_page + 2)) :
                echo '<a href="' . get_pagenum_link($i) . '" class="pagination__item">' . $i . '</a>';
            elseif ($i == $current_page - 3 || $i == $current_page + 3) :
                echo '<span class="pagination__dots">...</span>';
            endif;
        endfor;

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
