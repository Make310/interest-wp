<?php
/**
 * Home footer template part.
 */

if (!isset($args) || !is_array($args)) {
    $args = array();
}

$footer_classes = 'footer footer--home';
if (!empty($args['fullwidth'])) {
    $footer_classes .= ' footer--fullwidth';
}

$counter_offer_href = !empty($args['counter_offer_href']) ? $args['counter_offer_href'] : home_url('/#step-one');
?>
<footer class="<?php echo esc_attr($footer_classes); ?>">
    <div class="footer__container footer__container--home">
        <div class="footer__left">
            <h2 class="footer__logo">INTEREST RATE RESEARCH</h2>

            <nav class="footer__nav">
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="footer__link">ABOUT</a>
                <a href="<?php echo esc_url(home_url('/research')); ?>" class="footer__link">RESEARCH</a>
                <a href="<?php echo esc_url($counter_offer_href); ?>" class="footer__link">COUNTER OFFER</a>
                <a href="<?php echo esc_url(home_url('/get-started')); ?>" class="footer__link">MORTGAGE APP</a>
            </nav>

            <p class="footer__email">E. INFO@IRR.PRO</p>
        </div>

        <div class="footer__right">
            <form class="footer__form" action="https://hnp.app/api/hnp_form" method="post">
                <input type="email" name="email" placeholder="janedoe@gmail.com" class="footer__input" required>
                <button type="submit" class="footer__submit">JOIN</button>
            </form>
            <p class="footer__form-label">Join our email newsletter</p>
            <p class="footer__copyright"><?php echo esc_html(date('Y')); ?> All rights reserved</p>
        </div>
    </div>
</footer>
