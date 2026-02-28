<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@500;600;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<?php
$body_classes = array('has-bankirr-header');
if (is_page('research') || is_page_template('page-research.php') || is_search() || is_archive() || is_home() || is_singular('post')) {
    $body_classes[] = 'is-research-context';
}
?>
<body <?php body_class($body_classes); ?>>
<?php wp_body_open(); ?>

<header class="bankirr-header">
    <div class="bankirr-desktop">
        <div class="bankirr-top-row"></div>

        <div class="bankirr-board" aria-label="Rates ticker">
            <div class="bankirr-board__date" id="bankirrDate"></div>
            <div class="bankirr-board__viewport">
                <div class="bankirr-board__track" id="bankirrTrack"></div>
            </div>
        </div>

        <nav class="navbar navbar--bankirr">
            <div class="navbar__container navbar__container--bankirr">
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="navbar__brand navbar__brand--bankirr">
                    BANK INTEREST RATE RESEARCH
                </a>

                <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar__logo navbar__logo--bankirr" aria-label="BANKIRR Home">
                    <span class="navbar__wordmark" aria-hidden="true">
                        <span class="navbar__dot">•</span>
                        <span class="navbar__word">BANKIRR</span>
                        <span class="navbar__dot">•</span>
                    </span>
                </a>

                <nav class="navbar__nav navbar__nav--bankirr" aria-label="Primary">
                    <ul class="navbar__nav-list navbar__nav-list--bankirr">
                        <li><a href="<?php echo esc_url(home_url('/research')); ?>" class="navbar__nav-link">Research</a></li>
                        <li><a href="<?php echo esc_url(home_url('/get-started')); ?>" class="navbar__nav-link">Mortgage</a></li>
                        <li><a href="<?php echo esc_url(home_url('/research/?s=refinance')); ?>" class="navbar__nav-link">Refinance</a></li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>

    <div class="bankirr-mobile-wrap">
        <div class="bankirr-mobile">
            <div class="ticker">
                <div class="ticker__date" id="bankirrMobileDate">FEB 26</div>
                <div class="ticker__viewport">
                    <div class="ticker__track" id="tickerTrack"></div>
                </div>
            </div>

            <div class="mast">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mast__top" aria-label="BANKIRR Home">
                    <span class="mast__dot">•</span>
                    <span>BANKIRR</span>
                    <span class="mast__dot">•</span>
                </a>
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="mast__sub">BANK INTEREST RATE RESEARCH</a>
            </div>

            <nav class="rect-nav" aria-label="Mobile primary">
                <a href="<?php echo esc_url(home_url('/about')); ?>">About</a>
                <a href="<?php echo esc_url(home_url('/research')); ?>">Research</a>
                <a href="<?php echo esc_url(home_url('/get-started')); ?>">Mortgage</a>
                <a href="<?php echo esc_url(home_url('/research/?s=refinance')); ?>">Refinance</a>
            </nav>
        </div>
    </div>
</header>
