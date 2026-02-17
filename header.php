<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="navbar">
    <div class="navbar__container">
        <!-- Logo izquierdo - imagen -->
        <a href="<?php echo home_url('/'); ?>" class="navbar__brand">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/INTEREST RATE RESEARCH LOGO.png" alt="Interest Rate Research">
        </a>

        <!-- Logo centro - Masthead -->
        <a href="<?php echo home_url('/'); ?>" class="navbar__logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Masthead Fencing Logo.png" alt="Interest Rate Research">
        </a>

        <!-- Navegación derecha (desktop) -->
        <nav class="navbar__nav">
            <ul class="navbar__nav-list">
                <li><a href="<?php echo home_url('/about'); ?>" class="navbar__nav-link">About</a></li>
                <li><a href="<?php echo home_url('/research'); ?>" class="navbar__nav-link">Research</a></li>
                <li><a href="<?php echo home_url('/get-started'); ?>" class="navbar__nav-link">Get a Mortgage</a></li>
                <li>
                    <a href="<?php echo home_url('/get-started'); ?>" class="navbar__nav-arrow">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Arrow.png" alt="">
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Botón menú móvil -->
        <button class="navbar__menu-btn" aria-label="Menu" aria-expanded="false">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bold_mobile-hamburger-menu-3.png" alt="Menu" class="navbar__menu-icon">
        </button>
    </div>
</nav>

<!-- Menú móvil -->
<div class="mobile-menu">
    <ul class="mobile-menu__list">
        <li><a href="<?php echo home_url('/about'); ?>" class="mobile-menu__link">About</a></li>
        <li><a href="<?php echo home_url('/research'); ?>" class="mobile-menu__link">Research</a></li>
        <li><a href="<?php echo home_url('/get-started'); ?>" class="mobile-menu__link">Get a Mortgage</a></li>
    </ul>
</div>
