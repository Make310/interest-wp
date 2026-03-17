<?php
/**
 * Single Post Template
 */
get_header();
?>

<?php while (have_posts()) : the_post(); ?>
<main class="main main--full-height">

    <div class="article-print-area" id="article-print-area">
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
    </div>

</main>
<?php endwhile; ?>

<script>
function printArticleOnly() {
    const printArea = document.getElementById('article-print-area');
    if (!printArea) return;

    const printContents = printArea.innerHTML;

    const stylesheetLinks = Array.from(document.querySelectorAll('link[rel="stylesheet"], style'))
        .map(node => node.outerHTML)
        .join('\n');

    const printWindow = window.open('', '_blank', 'width=1000,height=800');
    if (!printWindow) return;

    printWindow.document.open();
    printWindow.document.write(`
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>${document.title}</title>

            ${stylesheetLinks}

            <style>
                html, body {
                    margin: 0 !important;
                    padding: 0 !important;
                    background: #fff !important;
                }

                body {
                    padding: 32px !important;
                }

                .article-print-area,
                .article {
                    width: 100% !important;
                    max-width: 100% !important;
                    margin: 0 !important;
                }

                .article__print-wrap,
                .article__print-btn,
                .article__nav,
                .site-header,
                .site-footer,
                .footer,
                header[role="banner"],
                footer[role="contentinfo"] {
                    display: none !important;
                }

                img {
                    max-width: 100% !important;
                    height: auto !important;
                }

                @page {
                    margin: 0.5in;
                }
            </style>
        </head>
        <body>
            <div class="article-print-area">
                ${printContents}
            </div>
        </body>
        </html>
    `);
    printWindow.document.close();

    const finalizePrint = function() {
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    };

    if (printWindow.document.readyState === 'complete') {
        setTimeout(finalizePrint, 300);
    } else {
        printWindow.onload = function() {
            setTimeout(finalizePrint, 300);
        };
    }
}
</script>

<?php get_footer(); ?>
