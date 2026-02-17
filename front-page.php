<?php get_header(); ?>

<main class="main">
    <!-- Hero Section -->
    <section class="section">
        <div class="card">
            <div class="hero">
                <div class="hero__content">
                    <h1 class="hero__title">
                        <span class="hero__title-line hero__title-line--desktop">Lower interest rate <span class="underline">guarantee</span></span><br class="hero__break hero__break--desktop">
                        <span class="hero__title-line hero__title-line--desktop">on your home mortgage</span>
                        <span class="hero__title-line hero__title-line--mobile">Lowest interest rate</span>
                        <span class="hero__title-line hero__title-line--mobile"><span class="underline">gauranteed</span>, on your</span>
                        <span class="hero__title-line hero__title-line--mobile">home mortgage</span>
                    </h1>
                    <p class="hero__text">
                        <span class="hero__text-line hero__text-line--desktop">Fast and Free consultation, use</span><br class="hero__break hero__break--desktop">
                        <span class="hero__text-line hero__text-line--desktop">Interest Rate Research for the lowest</span><br class="hero__break hero__break--desktop">
                        <span class="hero__text-line hero__text-line--desktop">interest rate available today from the top lenders.</span>
                        <span class="hero__text-line hero__text-line--mobile">Fast and Free consultation, use</span>
                        <span class="hero__text-line hero__text-line--mobile">Interest Rate Research for the</span>
                        <span class="hero__text-line hero__text-line--mobile">lowest interest rate available</span>
                        <span class="hero__text-line hero__text-line--mobile">today from the top lenders.</span>
                    </p>
                </div>
                <div class="hero__image">
                    <div class="hero__image-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/house tall 2.png" alt="House">
                    </div>
                </div>
            </div>

            <div class="hero__lenders">
                <p class="hero__lenders-title">Thanks to our participating lenders:</p>
                <div class="hero__lenders-logos">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-prmg-300x111.png" alt="PRMG">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Freedom.png" alt="Freedom Mortgage">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Rocket-Mortgage-Logo.png" alt="Rocket Mortgage">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pennymac-logo-1200x630.png" alt="PennyMac" class="hide-mobile">
                </div>
            </div>
        </div>
    </section>

    <!-- Guarantee Section -->
    <section class="section">
        <div class="card card--guarantee">
            <div class="guarantee">
                <div class="guarantee__content">
                    <h1 class="guarantee__title">
                        <span class="guarantee__title-line guarantee__title-line--desktop">Lower Interest Rate Guarantee</span>
                        <span class="guarantee__title-line guarantee__title-line--mobile">Lower</span>
                        <span class="guarantee__title-line guarantee__title-line--mobile">Interest Rate</span>
                        <span class="guarantee__title-line guarantee__title-line--mobile">Gaurantee</span>
                    </h1>
                    <p class="guarantee__text">
                        <span class="guarantee__text-line guarantee__text-line--desktop">Our Lower Interest Rate Guarantee is unique and built on research. Through a nationwide network of mortgage professionals, we focus on providing access to the lowest mortgage interest rate in the market.</span>
                        <span class="guarantee__text-line guarantee__text-line--mobile">Our Lower Interest Rate Guarantee</span>
                        <span class="guarantee__text-line guarantee__text-line--mobile">is unique and built on research. We</span>
                        <span class="guarantee__text-line guarantee__text-line--mobile">focus on providing access to the</span>
                        <span class="guarantee__text-line guarantee__text-line--mobile">lowest mortgage interest rate in the</span>
                        <span class="guarantee__text-line guarantee__text-line--mobile">market.</span>
                    </p>
                    <a href="<?php echo home_url('/get-started'); ?>" class="btn btn--bordered">
                        GET STARTED <span>&rarr;</span>
                    </a>
                </div>
                <div class="guarantee__badge">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/IRR Gaurantee Badge with Ribon.png" alt="Interest Rate Research Guarantee">
                </div>
            </div>
        </div>
    </section>

    <!-- Step One Section -->
    <section class="section" id="step-one">
        <div class="card card--step">
            <div class="step">
                <span class="step__label">STEP ONE</span>
                <h1 class="step__title">Counter Offer</h1>

                <div class="step__upload">
                    <div class="upload-box">
                        <svg class="upload-box__icon" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                        <span class="upload-box__text">CLICK TO UPLOAD</span>
                    </div>
                </div>

                <h2 class="step__subtitle">
                    <span class="step-one__subtitle-line step-one__subtitle-line--desktop">Have you recieved a Loan Estimate?</span>
                    <span class="step-one__subtitle-line step-one__subtitle-line--mobile">Have you recieved a</span>
                    <span class="step-one__subtitle-line step-one__subtitle-line--mobile">Loan Estimate?</span>
                </h2>
                <p class="step__text">
                    <span class="step-one__text-line step-one__text-line--desktop">To use or lower rate gaurantee click the icon above to upload your first offer</span><br class="step-one__break step-one__break--desktop">
                    <span class="step-one__text-line step-one__text-line--desktop"><em>Safe and secure, your information will never be sold or misused here.</em></span><br class="step-one__break step-one__break--desktop">
                    <span class="step-one__text-line step-one__text-line--desktop"><em>You will receive a certified counter offer by the end of the business day</em></span>
                    <span class="step-one__text-line step-one__text-line--mobile">To use or lowest rate gaurantee click</span>
                    <span class="step-one__text-line step-one__text-line--mobile">the icon above to upload your first</span>
                    <span class="step-one__text-line step-one__text-line--mobile">offer. Safe and secure, you will receive</span>
                    <span class="step-one__text-line step-one__text-line--mobile">a certified counter offer by the end of</span>
                    <span class="step-one__text-line step-one__text-line--mobile">the business day.</span>
                </p>
                <a href="#" class="step__faq-link">FAQ's on uploading your loan estimate</a>
            </div>
        </div>
    </section>

    <!-- Step Two Section -->
    <section class="section">
        <div class="card card--step">
            <div class="step">
                <span class="step__label">STEP TWO</span>
                <h1 class="step__title">Compare rates</h1>
                <p class="step__intro">
                    <span class="step-two__intro-line step-two__intro-line--desktop">Fast and Free, use Interest Rate Research</span><br class="step-two__break step-two__break--desktop">
                    <span class="step-two__intro-line step-two__intro-line--desktop">for the lowest inPut our gaurnanteterest</span>
                    <span class="step-two__intro-line step-two__intro-line--mobile">Fast and Free, use Interest</span>
                    <span class="step-two__intro-line step-two__intro-line--mobile">Rate Research for the lowest</span>
                    <span class="step-two__intro-line step-two__intro-line--mobile">inPut our gaurnanteterest</span>
                </p>

                <div class="step__features">
                    <div class="feature">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shaking hands icon.png" alt="Lender Network" class="feature__icon">
                        <h3 class="feature__title">Over 30 participating lenders</h3>
                        <p class="feature__text">
                            <span class="step-two__feature-line step-two__feature-line--desktop">You will benefit from real time pricing</span><br class="step-two__break step-two__break--desktop">
                            <span class="step-two__feature-line step-two__feature-line--desktop">from over 30 lenders nationwide</span>
                            <span class="step-two__feature-line step-two__feature-line--mobile">You will benefit from real time</span>
                            <span class="step-two__feature-line step-two__feature-line--mobile">pricing from over 30 lenders</span>
                            <span class="step-two__feature-line step-two__feature-line--mobile">nationwide</span>
                        </p>
                    </div>

                    <div class="feature">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/equality icon.png" alt="Lowest Rate" class="feature__icon">
                        <h3 class="feature__title">Gauranteed lowest rate</h3>
                        <p class="feature__text">
                            <span class="step-two__feature-line step-two__feature-line--desktop">Fast and Free, use Interest Rate Research</span><br class="step-two__break step-two__break--desktop">
                            <span class="step-two__feature-line step-two__feature-line--desktop">for the lowest inPut our gaurnanteterest</span>
                            <span class="step-two__feature-line step-two__feature-line--mobile">Fast and Free, use Interest</span>
                            <span class="step-two__feature-line step-two__feature-line--mobile">Rate Research for the lowest</span>
                            <span class="step-two__feature-line step-two__feature-line--mobile">inPut our gaurnanteterest</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Step Three Section -->
    <section class="section">
        <div class="card card--step">
            <div class="step">
                <span class="step__label">STEP THREE</span>
                <h1 class="step__title">Close with confidence</h1>

                <div class="step__seal">
                    <div class="step__seal-line"></div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Rate Guarantee Seal.png" alt="Rate Guarantee Seal" class="step__seal-img">
                </div>

                <h2 class="step__subtitle">You got the lowest rate!</h2>
                <p class="step__text">
                    <span class="step-three__text-line step-three__text-line--desktop">Your IRR Pro will work with you through closing</span><br class="step-three__break step-three__break--desktop">
                    <span class="step-three__text-line step-three__text-line--desktop">Fast and efficient. Read what our customers have to say &rarr;</span>
                    <span class="step-three__text-line step-three__text-line--mobile">Your IRR Pro will work with you</span>
                    <span class="step-three__text-line step-three__text-line--mobile">through closing Fast and</span>
                    <span class="step-three__text-line step-three__text-line--mobile">efficient. Read what our</span>
                    <span class="step-three__text-line step-three__text-line--mobile">customers have to say &rarr;</span>
                </p>

                <p class="step__tagline">
                    <em><span class="underline">Counter offer</span>, <span class="underline">compare rates</span>, <span class="underline">close with confidence</span>.</em>
                </p>

                <a href="<?php echo home_url('/get-started'); ?>" class="btn btn--bordered">
                    GET STARTED <span>&rarr;</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Research Excerpts Section -->
    <section class="section">
        <div class="card">
            <div class="research">
                <span class="research__label research__label--mobile">RESEARCH EXCERPTS</span>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/house low 2.png" alt="House" class="research__house">
                <h1 class="research__title">
                    <span class="research__title-line research__title-line--desktop">Benefits of shopping around</span><br class="research__break research__break--desktop">
                    <span class="research__title-line research__title-line--desktop">when buying a home</span>
                    <span class="research__title-line research__title-line--mobile">Benefits of shopping</span>
                    <span class="research__title-line research__title-line--mobile">around when buying</span>
                </h1>
                <p class="research__subtitle">
                    <span class="research__subtitle-line research__subtitle-line--desktop">A center-aligned collection of statements from neutral, authoritative institutions.</span>
                    <span class="research__subtitle-line research__subtitle-line--mobile">A collection of statements from neutral,</span>
                    <span class="research__subtitle-line research__subtitle-line--mobile">authoritative institutions.</span>
                </p>

                <div class="research__divider"></div>

                <div class="research__quotes">
                    <div class="quote">
                        <p class="quote__text">
                            <span class="research__quote-line research__quote-line--desktop">"Shopping for a mortgage could save you thousands of dollars."</span>
                            <span class="research__quote-line research__quote-line--mobile">“Shopping for a mortgage could save you</span>
                            <span class="research__quote-line research__quote-line--mobile">thousands of dollars.”</span>
                        </p>
                        <span class="quote__source">Consumer Financial Protection Bureau</span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cfpb.png" alt="CFPB" class="quote__logo">
                    </div>

                    <div class="quote">
                        <p class="quote__text">
                            <span class="research__quote-line research__quote-line--desktop">"Consumers who shop around for rates and fees may save</span><br class="research__break research__break--desktop">
                            <span class="research__quote-line research__quote-line--desktop">thousands of dollars over the life of a loan."</span>
                            <span class="research__quote-line research__quote-line--mobile">“Consumers who shop around for rates and fees</span>
                            <span class="research__quote-line research__quote-line--mobile">may save thousands of dollars over the life of a</span>
                            <span class="research__quote-line research__quote-line--mobile">loan.”</span>
                        </p>
                        <span class="quote__source">Federal Trade Commission</span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ftc.png" alt="FTC" class="quote__logo">
                    </div>

                    <div class="quote">
                        <p class="quote__text">
                            <span class="research__quote-line research__quote-line--desktop">"You are not required to use the lender or settlement service</span><br class="research__break research__break--desktop">
                            <span class="research__quote-line research__quote-line--desktop">providers recommended by your real estate agent."</span>
                            <span class="research__quote-line research__quote-line--mobile">“You are not required to use the lender or</span>
                            <span class="research__quote-line research__quote-line--mobile">settlement service providers recommended by</span>
                            <span class="research__quote-line research__quote-line--mobile">your real estate agent.”</span>
                        </p>
                        <span class="quote__source">U.S. Department of Housing and Urban Development</span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hud.png" alt="HUD" class="quote__logo">
                    </div>

                    <div class="quote">
                        <p class="quote__text">
                            <span class="research__quote-line research__quote-line--desktop">"Comparing loan offers from multiple lenders can help borrowers find the mortgage that best meets their needs."</span>
                            <span class="research__quote-line research__quote-line--mobile">“Comparing loan offers from multiple lenders can</span>
                            <span class="research__quote-line research__quote-line--mobile">help borrowers find the mortgage that best meets</span>
                            <span class="research__quote-line research__quote-line--mobile">their needs.”</span>
                        </p>
                        <span class="quote__source">Federal Reserve</span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fed.png" alt="Federal Reserve" class="quote__logo">
                    </div>
                </div>

                <div class="research__divider"></div>

                <div class="research__guides">
                    <span class="guides__title">Guides:</span>
                    <div class="guides__links">
                        <a href="#">First home loan</a>
                        <span>|</span>
                        <a href="#">Mortgage Advisors</a>
                        <span>|</span>
                        <a href="#">Mortgage Comparison</a>
                        <span>|</span>
                        <a href="#">Refinance</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <?php get_template_part('template-parts/footers/home', null, array('counter_offer_href' => '#step-one')); ?>
</main>

<?php get_footer(); ?>
