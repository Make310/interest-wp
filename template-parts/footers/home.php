<?php
/**
 * Home footer template part.
 */

if (!isset($args) || !is_array($args)) {
    $args = array();
}

$footer_classes = 'footer footer--home footer--bankirr-v2';
if (!empty($args['fullwidth'])) {
    $footer_classes .= ' footer--fullwidth';
}

$counter_offer_href = !empty($args['counter_offer_href']) ? $args['counter_offer_href'] : home_url('/#step-one');
?>
<footer class="<?php echo esc_attr($footer_classes); ?>">
    <div class="footer__container footer__container--home">
        <div class="footer-v2">
            <div class="footer-v2__left">
                <h2 class="footer-v2__brand bankirr-font">BANKIRR</h2>
                <p class="footer-v2__subtitle bankirr-font">BANK INTEREST RATE RESEARCH</p>

                <nav class="footer-v2__nav footer-v2__nav--desktop" aria-label="Footer links">
                    <a href="<?php echo esc_url(home_url('/about')); ?>" class="footer-v2__link bankirr-font">ABOUT</a>
                    <a href="<?php echo esc_url(home_url('/research')); ?>" class="footer-v2__link footer-v2__link--research bankirr-font">
                        <span class="footer-v2__link-desktop">RESEARCH</span>
                        <span class="footer-v2__link-mobile">THE RESEARCH (How we do it)</span>
                    </a>
                    <a href="<?php echo esc_url($counter_offer_href); ?>" class="footer-v2__link bankirr-font">COUNTER OFFER</a>
                    <a href="<?php echo esc_url(home_url('/get-started')); ?>" class="footer-v2__link bankirr-font">
                        <span class="footer-v2__link-desktop">MORTGAGE APPLICATION</span>
                        <span class="footer-v2__link-mobile">MORTGAGE APP</span>
                    </a>
                </nav>

                <p class="footer-v2__email footer-v2__email--desktop bankirr-font">E. INFO@IRR.PRO</p>
                <p class="footer-v2__copyright footer-v2__copyright--mobile footer-v2__copyright--mobile-legacy bankirr-font"><?php echo esc_html(date('Y')); ?> All rights reserved</p>
            </div>

            <div class="footer-v2__seal-wrap" aria-hidden="true">
                <img
                    src="<?php echo esc_url('https://interestrateresearch.com/wp-content/uploads/2026/02/Guarantee-Seal.png'); ?>"
                    alt=""
                    class="footer-v2__seal"
                    loading="lazy"
                    decoding="async"
                >
            </div>
            <div class="footer-v2__right">
                <p class="footer-v2__newsletter-title bankirr-font">
                    <img
                        src="<?php echo esc_url('https://interestrateresearch.com/wp-content/uploads/2026/02/Pen-Img.png'); ?>"
                        alt=""
                        class="footer-v2__pen"
                        loading="lazy"
                        decoding="async"
                        aria-hidden="true"
                    >
                    Join our email newsletter
                </p>

                <div class="footer-v2__signup">
                    <form class="footer-v2__form js-footer-subscribe-trigger" action="#" method="post" novalidate>
                        <input type="email" name="email" placeholder="Johndoe@gmail.com" class="footer-v2__input js-footer-subscribe-email" required>
                        <button type="submit" class="footer-v2__submit bankirr-font">JOIN</button>
                    </form>

                    <label class="footer-v2__permission bankirr-font">
                        <input type="checkbox" name="footer_contact_permission" value="1">
                        <span>I give permission to be contacted by BANKIRR</span>
                    </label>
                    <p class="footer-v2__copyright bankirr-font"><?php echo esc_html(date('Y')); ?> All rights reserved</p>
                </div>
            </div>

            <div class="footer-v2__links-mobile">
                <nav class="footer-v2__nav footer-v2__nav--mobile" aria-label="Footer links mobile">
                    <a href="<?php echo esc_url(home_url('/about')); ?>" class="footer-v2__link bankirr-font">ABOUT</a>
                    <a href="<?php echo esc_url(home_url('/research')); ?>" class="footer-v2__link footer-v2__link--research bankirr-font">THE RESEARCH (How we do it)</a>
                    <a href="<?php echo esc_url($counter_offer_href); ?>" class="footer-v2__link bankirr-font">COUNTER OFFER</a>
                    <a href="<?php echo esc_url(home_url('/get-started')); ?>" class="footer-v2__link bankirr-font">MORTGAGE APP</a>
                </nav>
                <p class="footer-v2__email footer-v2__email--mobile bankirr-font">E. INFO@IRR.PRO</p>
                <p class="footer-v2__copyright footer-v2__copyright--mobile bankirr-font"><?php echo esc_html(date('Y')); ?> All rights reserved</p>
            </div>
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
