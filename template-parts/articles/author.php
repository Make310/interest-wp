<?php
$author_id = get_the_author_meta('ID');
$author_name = get_the_author();
$author_description = get_the_author_meta('description');
?>

<div class="article__author">
    <?php echo get_avatar($author_id, 96); ?>

    <div class="article__author-meta">
        <p class="article__author-name">
            By <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>"><?php echo esc_html($author_name); ?></a>
        </p>

        <?php if (!empty($author_description)) : ?>
            <p class="article__author-description">
                <?php echo esc_html($author_description); ?>
                <button type="button" class="article__print-btn article__print-btn--inline" onclick="printArticleOnly();" aria-label="Print article">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true">
                        <path d="M6 9V3h12v6"/>
                        <rect x="6" y="14" width="12" height="7"/>
                        <path d="M6 18H3v-6h18v6h-3"/>
                    </svg>
                </button>
            </p>
        <?php else : ?>
            <div class="article__author-print-row">
                <button type="button" class="article__print-btn" onclick="printArticleOnly();" aria-label="Print article">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true">
                        <path d="M6 9V3h12v6"/>
                        <rect x="6" y="14" width="12" height="7"/>
                        <path d="M6 18H3v-6h18v6h-3"/>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>