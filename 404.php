<?php
/**
 * 404 Page Template
 */
get_header();
?>

<main class="main">
    <section class="section">
        <div class="card">
            <div class="error-page">
                <h1 class="error-page__code">404</h1>
                <h2 class="error-page__title">Page Not Found</h2>
                <p class="error-page__subtitle">The page you're looking for doesn't exist or has been moved.</p>

                <div class="error-page__actions">
                    <a href="<?php echo home_url('/'); ?>" class="btn btn--primary">Return Home</a>
                    <a href="<?php echo home_url('/get-started'); ?>" class="btn btn--outline">Get Started</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
