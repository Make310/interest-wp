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
            <div class="footer__signup">
                <form class="footer__form js-footer-subscribe-trigger" action="#" method="post" novalidate>
                    <input type="email" name="email" placeholder="janedoe@gmail.com" class="footer__input js-footer-subscribe-email" required>
                    <button type="submit" class="footer__submit">JOIN</button>
                </form>
                <p class="footer__form-label">Join our email newsletter</p>
                <p class="footer__copyright"><?php echo esc_html(date('Y')); ?> All rights reserved</p>
            </div>
            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/footer-crest-dark.png'); ?>"
                alt=""
                class="footer__crest"
                loading="lazy"
                decoding="async"
                aria-hidden="true"
            >
        </div>
    </div>
</footer>

<dialog class="footer-subscribe-modal" id="footer-subscribe-modal" data-home-url="<?php echo esc_url(home_url('/')); ?>">
    <div class="footer-subscribe-modal__inner">
        <div class="footer-subscribe-modal__head">
            <p class="footer-subscribe-modal__close">
                <button type="button" class="js-footer-subscribe-close">Close</button>
            </p>
            <p class="footer-subscribe-modal__kicker">Subscribe Today</p>
            <h3 class="footer-subscribe-modal__title">Stay up to date on the latest news, trends, and home grants.</h3>
        </div>

        <div class="footer-subscribe-modal__body">
            <p class="footer-subscribe-modal__intro">Get the latest insights and updates on real estate, homebuying, and housing grants straight to your inbox.</p>
            <form action="https://hnp.app/api/hnp_subscribe" method="post" class="footer-subscribe-modal__form">
                <div class="footer-subscribe-modal__grid">
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                    <input type="text" name="birthday" placeholder="Birthday" required onfocus="this.type='date'" onblur="if(!this.value){this.type='text'}">
                    <input type="number" name="zip_code" placeholder="Zip code" required>
                </div>
                <input type="email" name="email" class="js-footer-subscribe-modal-email" placeholder="Your email" required>
                <textarea name="details" rows="5" placeholder="Case details..." required></textarea>
                <button type="submit" class="footer-subscribe-modal__submit">Subscribe</button>
            </form>
        </div>
    </div>
</dialog>
