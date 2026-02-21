<?php
/**
 * Template Name: Research Page
 */
get_header();

// Pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Query for blog posts
$blog_query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'paged' => $paged,
));

// Get all tags for filter
$all_tags = get_tags(array('hide_empty' => true));
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
                    <section class="section">
                        <div class="card">
                            <div class="chart-section">
                                <h2 class="chart-section__title">Freddie Mac Prime Mortgage Market Survey and Interest Rate</h2>
                                <p class="chart-section__subtitle">(Percent per annum, not seasonally adjusted)</p>

                                <div class="chart-section__card">
                                    <div class="chart-section__holder">
                                        <canvas id="ratesChart" aria-label="Mortgage rates line chart" role="img"></canvas>
                                    </div>
                                </div>

                                <p class="chart-section__source">Source: Freddie Mac and U.S. Federal Reserve.</p>
                            </div>
                        </div>
                    </section>

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
        $research_page_url = get_permalink();
    ?>
    <nav class="pagination">
        <?php
        // Page numbers
        for ($i = 1; $i <= $total_pages; $i++) :
            $page_url = ($i == 1) ? $research_page_url : $research_page_url . 'page/' . $i . '/';

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
    <?php get_template_part('template-parts/footers/home', null, array('fullwidth' => true)); ?>
</main>

<?php get_footer(); ?>
