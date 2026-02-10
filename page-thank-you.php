<?php
/**
 * Template Name: Thank You Page
 */
get_header();
?>

<main class="main">
    <section class="section">
        <div class="card">
            <div class="thank-you">
                <div class="thank-you__icon">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#588986" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9 12l2 2 4-4"></path>
                    </svg>
                </div>

                <h1 class="thank-you__title">Thank You!</h1>
                <p class="thank-you__subtitle">Your application has been submitted successfully.</p>

                <div class="thank-you__content">
                    <p>We have received your information and will review it shortly.</p>
                    <p>A print-ready Mortgage Pre-Approval letter will be emailed to you within one business day.</p>
                </div>

                <div class="thank-you__actions">
                    <a href="<?php echo home_url('/'); ?>" class="btn btn--primary">Return Home</a>
                    <a href="<?php echo home_url('/research'); ?>" class="btn btn--outline">Read Research</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
