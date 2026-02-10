<?php
/**
 * Template Name: About Page
 */
get_header();

// Helper function to get ACF field with fallback
function irr_get_field($field_name, $fallback = '') {
    if (function_exists('get_field')) {
        $value = get_field($field_name);
        return !empty($value) ? $value : $fallback;
    }
    return $fallback;
}

// Default content for sections
$defaults = array(
    'section_1' => array(
        'title' => 'About Interest Rate Research',
        'content' => '<p>Our mission is to democratize how people access financing to buy a home. We do this by guaranteeing the lowest interest rate available in the market through our nationwide network of participating lenders.</p><p>Interest Rate Research was founded on a simple principle: homebuyers deserve better. Too often, buyers accept the first mortgage rate they\'re offered without realizing they could save thousands of dollars by shopping around.</p>'
    ),
    'section_2' => array(
        'title' => 'Our Organization',
        'content' => '<p>Interest Rate Research provides personalized financing solutions that combine access to over 30 participating lenders with our unique Lower Interest Rate Guarantee.</p><p>Our service is completely free to homebuyers. We work with lenders who compete for your business, ensuring you always get the best possible rate without any cost to you.</p><p>Through years of industry research and relationships with top mortgage professionals nationwide, we\'ve developed a system that consistently delivers lower rates than what borrowers typically find on their own.</p>'
    ),
    'section_3' => array(
        'title' => 'How It Works',
        'content' => '<p>Our process is designed to be simple and transparent:</p><p><strong>Step 1: Counter Offer</strong><br>Upload your current loan estimate and we\'ll analyze it against real-time pricing from our network of over 30 lenders.</p><p><strong>Step 2: Compare Rates</strong><br>Within 24 hours, you\'ll receive a certified counter offer showing the lowest rate available for your specific situation.</p><p><strong>Step 3: Close with Confidence</strong><br>Your IRR Pro will guide you through every step of the closing process, ensuring a smooth transaction with your guaranteed lower rate.</p>'
    ),
    'section_4' => array(
        'title' => 'The Lower Rate Guarantee',
        'content' => '<p>Our Lower Interest Rate Guarantee is unique in the industry. We\'re so confident in our ability to find you a better rate that we put it in writing.</p><p>When you submit your loan estimate, we compare it against current offerings from all of our participating lenders. If a lower rate exists, we\'ll find it. If we can\'t beat your current offer, we\'ll tell you honestly—there\'s no obligation and no pressure.</p><p>This guarantee is built on research. Studies from the Consumer Financial Protection Bureau show that borrowers who shop for mortgage rates can save thousands of dollars over the life of their loan.</p>'
    ),
    'section_5' => array(
        'title' => 'Who Is Eligible?',
        'content' => '<p>Our service is available to all homebuyers, whether you\'re purchasing your first home or your fifth. There are no income limits or property restrictions.</p><p>We work with borrowers across the credit spectrum. Even if you\'ve been told you don\'t qualify for the best rates, our network of lenders may have options that weren\'t available through traditional channels.</p><p>If you\'re buying a home and have received a loan estimate from any lender, you\'re eligible to use our free counter offer service.</p>'
    ),
    'section_6' => array(
        'title' => 'Research Foundation',
        'content' => '<p>Our approach is grounded in research from the most authoritative sources in consumer finance:</p><p>The <strong>Consumer Financial Protection Bureau</strong> states: "Shopping for a mortgage could save you thousands of dollars."</p><p>The <strong>Federal Trade Commission</strong> notes: "Consumers who shop around for rates and fees may save thousands of dollars over the life of a loan."</p><p>The <strong>Federal Reserve</strong> recommends: "Comparing loan offers from multiple lenders can help borrowers find the mortgage that best meets their needs."</p><p>We\'ve taken this research and built a service that does the shopping for you, leveraging our relationships with top lenders to ensure you benefit from competitive pricing.</p>'
    ),
    'section_7' => array(
        'title' => 'Contact Us',
        'content' => '<p>Have questions? We\'re here to help.</p><p><strong>Email:</strong> info@irr.pro</p><p>Ready to find your lower rate? <a href="' . home_url('/get-started') . '">Get started now</a> or <a href="' . home_url('/get-started#schedule-call') . '">schedule a call</a> with an IRR Pro.</p>'
    ),
);

// Get section content (ACF or fallback)
$sections = array();
for ($i = 1; $i <= 7; $i++) {
    $sections[$i] = array(
        'title' => irr_get_field("about_section_{$i}_title", $defaults["section_{$i}"]['title']),
        'content' => irr_get_field("about_section_{$i}_content", $defaults["section_{$i}"]['content']),
    );
}
?>

<main class="main main--about">
    <section class="section">
        <div class="card">
            <div class="about-page">
                <!-- Table of Contents -->
                <nav class="about-toc">
                    <h3 class="about-toc__title">Table of Contents</h3>
                    <ul class="about-toc__list">
                        <li><a href="#about-irr"><?php echo esc_html($sections[1]['title']); ?></a></li>
                        <li><a href="#our-organization"><?php echo esc_html($sections[2]['title']); ?></a></li>
                        <li><a href="#how-it-works"><?php echo esc_html($sections[3]['title']); ?></a></li>
                        <li><a href="#the-guarantee"><?php echo esc_html($sections[4]['title']); ?></a></li>
                        <li><a href="#who-is-eligible"><?php echo esc_html($sections[5]['title']); ?></a></li>
                        <li><a href="#research-foundation"><?php echo esc_html($sections[6]['title']); ?></a></li>
                        <li><a href="#contact"><?php echo esc_html($sections[7]['title']); ?></a></li>
                    </ul>
                </nav>

                <!-- Main Content -->
                <div class="about-main">
                    <!-- Section 1 -->
                    <section id="about-irr" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[1]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[1]['content']); ?>
                    </section>

                    <!-- Section 2 -->
                    <section id="our-organization" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[2]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[2]['content']); ?>
                    </section>

                    <!-- Section 3 -->
                    <section id="how-it-works" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[3]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[3]['content']); ?>
                    </section>

                    <!-- Section 4 -->
                    <section id="the-guarantee" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[4]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[4]['content']); ?>
                    </section>

                    <!-- Section 5 -->
                    <section id="who-is-eligible" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[5]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[5]['content']); ?>
                    </section>

                    <!-- Section 6 -->
                    <section id="research-foundation" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[6]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[6]['content']); ?>
                    </section>

                    <!-- Section 7 -->
                    <section id="contact" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[7]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[7]['content']); ?>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <?php get_template_part('template-parts/footers/home'); ?>
</main>

<?php get_footer(); ?>
