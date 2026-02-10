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
            Fast and Free, use Interest Rate Research<br>
            for the lowest interest rates
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

                <?php
                // Insert chart section after 2nd post (only on first page)
                if ($post_count == 2 && $paged == 1) : ?>
                    </section>

                    <!-- Chart Card -->
                    <section class="section">
                        <div class="card">
                            <div class="chart-section">
                                <h2 class="chart-section__title">Freddie Mac Prime Mortgage Market Survey and Interest Rate</h2>
                                <p class="chart-section__subtitle">(Percent per annum, not seasonally adjusted)</p>

                                <div class="chart-section__image">
                                    <img src="https://picsum.photos/600/350" alt="Interest Rate Chart">
                                </div>

                                <p class="chart-section__source">Source: Freddie Mac and U.S. Federal Reserve.</p>

                                <div class="chart-section__legend">
                                    <span class="legend-item legend-item--blue">30-year Fixed Rate Mortgage, Monthly Average</span>
                                    <span class="legend-item legend-item--orange">15-year Fixed Rate Mortgage, Monthly Average</span>
                                    <span class="legend-item legend-item--red">U.S. 10-year Treasury Constant Maturity Rate, Monthly Average</span>
                                </div>

                                <div class="chart-section__nav">
                                    <button class="chart-nav-btn" aria-label="Previous">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
                                    </button>
                                    <span class="chart-section__date">01/19/26</span>
                                    <button class="chart-nav-btn" aria-label="Next">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M8.59 16.59L10 18l6-6-6-6-1.41 1.41L13.17 12z"/></svg>
                                    </button>
                                </div>

                                <p class="chart-section__caption">
                                    The 30-year fixed-rate mortgage averaged 6.06% as of January 15, 2026, down from last week when it averaged 6.16%. A year ago at this time, the 30-year FRM averaged 7.04%.
                                </p>
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
    if ($total_pages > 1) :
        $current_page = max(1, $paged);
        $research_page_url = get_permalink();
    ?>
    <nav class="pagination">
        <?php
        // Previous page link
        if ($current_page > 1) :
            $prev_url = ($current_page == 2) ? $research_page_url : $research_page_url . 'page/' . ($current_page - 1) . '/';
            echo '<a href="' . esc_url($prev_url) . '" class="pagination__item">&larr;</a>';
        endif;

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

        // Next page link
        if ($current_page < $total_pages) :
            $next_url = $research_page_url . 'page/' . ($current_page + 1) . '/';
            echo '<a href="' . esc_url($next_url) . '" class="pagination__item">&rarr;</a>';
        endif;
        ?>
    </nav>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

    <!-- Footer Section -->
    <?php get_template_part('template-parts/footers/home', null, array('fullwidth' => true)); ?>
</main>

<?php get_footer(); ?>
