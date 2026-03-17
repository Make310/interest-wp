<?php
/**
 * Template Name: Research Page
 */
$GLOBALS['irr_body_context_classes'] = array('template-research', 'research-context');
get_header();

// Pagination
$paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));

// Query for blog posts
$blog_query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'paged' => $paged,
));

// Get all tags for filter
$all_tags = get_tags(array('hide_empty' => true));
?>

<main class="main main--full-height main--research-page">
    <!-- Page Header -->
    <section class="research-header">
<h1 class="research-header__title">
    <span class="underline">Adventures in the Lowest Interest Rate Guarantee</span>
</h1>

<p class="research-header__subtitle">
    People often ask, <strong>how do you GUARANTEE the lowest interest rate?</strong> 
    This blog shows "how" we do it. Each post documents a real case where we analyze a Loan Estimate and pursue a lower rate. 
    We do this to create transparency and demonstrates the research process behind the guarantee.
</p>

        <?php if ($all_tags) : ?>
        <div class="tags">
            <?php foreach ($all_tags as $tag) : ?>
                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="tag"><?php echo esc_html(strtoupper($tag->name)); ?></a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="search-box">
            <svg class="search-box__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                <input type="text" class="search-box__input" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
            </form>
        </div>
    </section>

    <!-- Blog Posts -->
    <section class="blog-posts">
        <?php if ($blog_query->have_posts()) : ?>
            <?php
            $post_count = 0;
            while ($blog_query->have_posts()) : $blog_query->the_post();
                $post_count++;
            ?>
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

                <?php
                // Insert chart section after 2nd post (first page).
                // If there is only one post, insert after the 1st so the chart is still visible.
                if (($post_count == 2 || ($post_count == 1 && (int) $blog_query->post_count === 1)) && $paged == 1) : ?>
                    </section>

                    <!-- Chart Card -->


                    <!-- More Blog Posts -->
                    <section class="blog-posts">
                <?php endif; ?>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="no-posts">No posts found. Create some posts in WordPress admin to see them here.</p>
        <?php endif; ?>
    </section>

    <!-- Pagination -->
    <?php
    $total_pages = $blog_query->max_num_pages;
    if ($total_pages > 0) :
        $current_page = max(1, $paged);
    ?>
    <nav class="pagination">
        <?php
        // Page numbers
        for ($i = 1; $i <= $total_pages; $i++) :
            $page_url = get_pagenum_link($i);

            if ($i == $current_page) :
                echo '<span class="pagination__item pagination__item--active">' . $i . '</span>';
            elseif ($i == 1 || $i == $total_pages || ($i >= $current_page - 2 && $i <= $current_page + 2)) :
                echo '<a href="' . esc_url($page_url) . '" class="pagination__item">' . $i . '</a>';
            elseif ($i == $current_page - 3 || $i == $current_page + 3) :
                echo '<span class="pagination__dots">...</span>';
            endif;
        endfor;
        ?>
    </nav>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

    <!-- Footer Section -->
</main>

<?php get_footer(); ?>
