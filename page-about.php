<?php
/**
 * Template Name: About Page
 */
$GLOBALS['irr_body_context_classes'] = array('template-about');
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
        'title' => 'The Lowest Interest Rate Guarantee',
        'content' => '<p>BANKIRR is best known for one commitment: the <strong>Lowest Interest Rate Guarantee</strong>. This guarantee is not a slogan. It is the organizing principle behind everything we do.</p><p>Buying a home is the largest financial transaction most families will ever make, yet mortgage pricing remains one of the least transparent consumer credit markets in the United States. Two borrowers with nearly identical financial profiles can receive different interest rates depending on the lender they choose. Even a small difference in rate can translate into tens of thousands of dollars in additional interest over the life of a mortgage.</p><p>BANKIRR exists to eliminate that uncertainty. Our role is to introduce real competition into mortgage lending so borrowers know they are receiving the lowest rate available for their loan.</p><p>This commitment is backed by research. On the <a href="' . home_url('/research') . '">BANKIRR Research page</a> we publish real case studies examining Loan Estimates and mortgage pricing decisions. These investigations document how lenders respond when faced with competing offers and provide a rigorous exploration of the economics driving margins in mortgage lending.</p><p>Rather than simply claiming borrowers should shop for a mortgage, we maintain a public record showing how the lowest interest rate is actually discovered in the market.</p>'
    ),
    'section_2' => array(
        'title' => 'Why BANKIRR Exists',
        'content' => '<p>Research from government and academic institutions consistently shows that borrowers benefit from comparing multiple mortgage offers. Despite this, many homebuyers still accept the first rate presented to them.</p><p>The reasons are understandable. Mortgage shopping is time consuming, Loan Estimates are difficult to compare, and most borrowers are navigating the process under tight deadlines while trying to close on a home.</p><p>BANKIRR was created to simplify this process and make rate competition routine. Instead of relying on a single lender’s quote, borrowers can introduce a competing offer into the transaction. When lenders know competition exists, pricing becomes more aggressive and borrowers benefit.</p><p>Even modest improvements in mortgage pricing can produce meaningful savings. A reduction of only a fraction of a percentage point can lower monthly payments and reduce lifetime interest costs by thousands of dollars.</p>'
    ),
    'section_3' => array(
        'title' => 'How BANKIRR Works',
        'content' => '<p>Our process is designed to be transparent and simple.</p><p><strong>Step 1: Upload Your Loan Estimate</strong><br>Borrowers begin by submitting a current Loan Estimate from another lender.</p><p><strong>Step 2: Rate Comparison</strong><br>Our team reviews the document and evaluates whether a more competitive offer can be obtained elsewhere in the market.</p><p><strong>Step 3: Introduce Competition</strong><br>If a lower rate exists, we pursue it through lenders competing for the loan.</p><p>The presence of a second offer often changes the economics of the transaction immediately. When lenders know another offer may appear, they price loans more aggressively to win the business.</p>'
    ),
    'section_4' => array(
        'title' => 'Using the BANKIRR Guarantee',
        'content' => '<p>The easiest way to take advantage of the BANKIRR guarantee is by uploading your existing Loan Estimate for comparison.</p><p>If you are purchasing a home, visit the <a href="' . home_url('/get-started') . '">Mortgage page</a> to upload your loan offer. Our team will review the estimate and determine whether a lower rate is available.</p><p>If you are considering refinancing, you can also submit a current refinance Loan Estimate. Visit the <a href="' . home_url('/refinance') . '">Refinance page</a> to upload your offer and check whether a lower rate exists for your refinance.</p><p>Both services are designed to help borrowers confirm that they are receiving the most competitive interest rate available for their loan.</p>'
    ),
    'section_5' => array(
        'title' => 'A Market Built on Competition',
        'content' => '<p>The economic logic behind BANKIRR is straightforward. Markets function best when buyers can compare prices.</p><p>Mortgage lending historically lacked this type of transparency. Borrowers often interact with only one lender and pricing differences across institutions can remain hidden.</p><p>BANKIRR introduces a mechanism that encourages lenders to compete directly for each loan. When borrowers consistently obtain second offers, lender margins compress and interest rates move closer to their true market level.</p><p>This is the same economic principle that improved pricing transparency in industries such as travel booking, insurance comparison, and online retail.</p>'
    ),
    'section_6' => array(
        'title' => 'Research and Transparency',
        'content' => '<p>BANKIRR operates at the intersection of mortgage brokerage and independent research.</p><p>Our research initiative examines real mortgage pricing data to better understand how interest rates are determined across lenders. By studying Loan Estimates and documenting rate comparisons, we build a public record that explains how mortgage competition works in practice.</p><p>These investigations are published on the <a href="' . home_url('/research') . '">Research page</a>, where borrowers can explore case studies analyzing real mortgage pricing scenarios.</p><p>This research promotes transparency in a market where pricing differences are often difficult for consumers to observe.</p>'
    ),
    'section_7' => array(
        'title' => 'Contact Us',
        'content' => '<p>Have questions about mortgage rates or the BANKIRR guarantee? We are here to help.</p><p><strong>Email:</strong> info@bankirr.com</p><p>If you are ready to check whether a lower rate exists, upload your Loan Estimate through our <a href="' . home_url('/get-started') . '">Mortgage page</a> or compare refinance offers on the <a href="' . home_url('/refinance') . '">Refinance page</a>.</p>'
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

                    <section id="about-irr" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[1]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[1]['content']); ?>
                    </section>

                    <section id="our-organization" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[2]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[2]['content']); ?>
                    </section>

                    <section id="how-it-works" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[3]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[3]['content']); ?>
                    </section>

                    <section id="the-guarantee" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[4]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[4]['content']); ?>
                    </section>

                    <section id="who-is-eligible" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[5]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[5]['content']); ?>
                    </section>

                    <section id="research-foundation" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[6]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[6]['content']); ?>
                    </section>

                    <section id="contact" class="about-section">
                        <h2 class="about-section__title"><?php echo esc_html($sections[7]['title']); ?></h2>
                        <?php echo wp_kses_post($sections[7]['content']); ?>
                    </section>

                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
