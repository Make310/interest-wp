<?php
/**
 * Template Name: Get Started Page
 */
get_header();
?>

<main class="main">
    <!-- Close with Confidence Card -->
    <section class="section">
        <div class="card card--guarantee">
            <div class="guarantee guarantee--getstarted">
                <div class="guarantee__content">
                    <h1 class="guarantee__title">
                        <span class="guarantee__title-line guarantee__title-line--desktop">Close with confidence</span><br class="gs-break-desktop">
                        <span class="guarantee__title-line guarantee__title-line--desktop">you got the lower rate</span>
                        <span class="guarantee__title-line guarantee__title-line--mobile">Close with confidence</span>
                        <span class="guarantee__title-line guarantee__title-line--mobile">you got the lower rate</span>
                    </h1>
                    <p class="guarantee__text">
                        <span class="guarantee__text-line guarantee__text-line--desktop">To take advantage of our lower rate guaranty</span><br class="gs-break-desktop">
                        <span class="guarantee__text-line guarantee__text-line--desktop">upload your first offer for a certified Counter Offer within 24&nbsp;hours.</span><br class="gs-break-desktop">
                        <span class="guarantee__text-line guarantee__text-line--desktop">Otherwise, choose New Offer or schedule a call.</span>
                        <span class="guarantee__text-line guarantee__text-line--mobile">To take advantage of our lower rate guaranty</span>
                        <span class="guarantee__text-line guarantee__text-line--mobile">upload your first offer for a certified</span>
                        <span class="guarantee__text-line guarantee__text-line--mobile">Counter Offer within 24 hours.</span>
                        <span class="guarantee__text-line guarantee__text-line--mobile guarantee__text-line--mobile-p2-start">If you have no you have no offer,</span>
                        <span class="guarantee__text-line guarantee__text-line--mobile">choose New Offer below or schedule a call.</span>
                    </p>
                    <div class="guarantee__buttons">
                        <a href="#counter-offer" class="btn btn--dark">COUNTER OFFER</a>
                        <a href="#new-offer" class="btn btn--outline">NEW OFFER</a>
                        <a href="#schedule-call" class="btn btn--link">SCHEDULE A CALL</a>
                    </div>
                </div>
                <div class="guarantee__badge">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/IRR Gaurantee Seal and Ribbon 2.png" alt="Interest Rate Research Guarantee">
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Offer Card -->
    <section class="section" id="counter-offer">
        <div class="card card--step">
            <div class="step">
                <span class="step__label">COUNTER OFFER</span>

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
                    <span class="counter-offer__title-line counter-offer__title-line--desktop">Have you recieved a Loan Estimate?</span>
                    <span class="counter-offer__title-line counter-offer__title-line--mobile">Have you recieved a</span>
                    <span class="counter-offer__title-line counter-offer__title-line--mobile">Loan Estimate?</span>
                </h2>
                <p class="step__text counter-offer__text">
                    <span class="counter-offer__text-line counter-offer__text-line--desktop">To use or lower rate guarentee click the icon above to upload your first offer</span><br class="gs-break-desktop">
                    <span class="counter-offer__text-line counter-offer__text-line--desktop">Safe and secure, your information will never be sold or misused here.</span><br class="gs-break-desktop">
                    <span class="counter-offer__text-line counter-offer__text-line--desktop">You will receive a certified counter offer by the end of the business day</span>

                    <span class="counter-offer__text-line counter-offer__text-line--mobile">To use or lowest rate guarantee click the</span>
                    <span class="counter-offer__text-line counter-offer__text-line--mobile">icon above to upload your first offer. Safe</span>
                    <span class="counter-offer__text-line counter-offer__text-line--mobile">and secure, you will receive a certified</span>
                    <span class="counter-offer__text-line counter-offer__text-line--mobile">counter offer within 24 hours.</span>
                </p>
                <a href="#" class="step__faq-link">FAQ's on uploading your loan estimate</a>
            </div>

            <div class="hero__lenders">
                <div class="hero__lenders-logos">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-prmg-300x111.png" alt="PRMG" class="hero__lender-logo hero__lender-logo--prmg">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Freedom.png" alt="Freedom Mortgage" class="hero__lender-logo hero__lender-logo--freedom">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Rocket-Mortgage-Logo.png" alt="Rocket Mortgage" class="hero__lender-logo hero__lender-logo--rocket">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pennymac-logo-1200x630.png" alt="PennyMac" class="hero__lender-logo hero__lender-logo--pennymac hide-mobile">
                </div>
            </div>
        </div>
    </section>

    <!-- New Offer Card -->
    <section class="section">
        <div class="card card--step">
            <div class="new-offer" id="new-offer">
                <span class="step__label">NEW OFFER</span>
                <p class="new-offer__subtitle">
                    <span class="new-offer__subtitle-line new-offer__subtitle-line--desktop">Fast and Free, use Interest Rate Research</span><br class="gs-break-desktop">
                    <span class="new-offer__subtitle-line new-offer__subtitle-line--desktop">for the lowest inPut our gaurnanteterest</span>

                    <span class="new-offer__subtitle-line new-offer__subtitle-line--mobile">Fast and Free consultation, use</span>
                    <span class="new-offer__subtitle-line new-offer__subtitle-line--mobile">Interest Rate Research for the lowest</span>
                    <span class="new-offer__subtitle-line new-offer__subtitle-line--mobile">interest rate available today</span>
                    <span class="new-offer__subtitle-line new-offer__subtitle-line--mobile">from the top lenders</span>
                </p>

                <div class="new-offer__form-wrapper">
                    <form class="offer-form" id="newOfferForm" action="https://hnp.app/api/hnp_form" method="post">
                        <button type="button" class="offer-form__info" aria-label="Information">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                        </button>

                        <!-- Step 1: About Your Home -->
                        <div class="offer-form__step offer-form__step--active" data-step="1">
                            <p class="offer-form__instruction"><em>Complete this universal application to check eligibility.</em></p>

                            <div class="offer-form__field">
                                <div class="offer-form__autocomplete">
                                    <input type="text" id="place_search" name="county_input" placeholder="Type your county here" class="offer-form__input" required autocomplete="off">
                                    <ul id="county-results" class="offer-form__results"></ul>
                                </div>
                                <input type="hidden" id="place_county" name="county_match" value="">
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Estimated purchase price</label>
                                <input type="text" id="purchase_price" name="purchase_price" placeholder="$ ___,___" class="offer-form__input offer-form__input--currency" required>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Have you declared bankruptcy in the last 4 years?</label>
                                <div class="offer-form__options">
                                    <label class="offer-form__option">
                                        <input type="radio" name="declared_bankrupcy" value="Yes" required>
                                        <span>Yes</span>
                                    </label>
                                    <label class="offer-form__option">
                                        <input type="radio" name="declared_bankrupcy" value="No">
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Have you completed a HUD approved homebuyer education class from a local agency within last 12 months?</label>
                                <div class="offer-form__options">
                                    <label class="offer-form__option">
                                        <input type="radio" name="hud_class" value="Yes" required>
                                        <span>Yes</span>
                                    </label>
                                    <label class="offer-form__option">
                                        <input type="radio" name="hud_class" value="No">
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: About Your Household -->
                        <div class="offer-form__step" data-step="2">
                            <div class="offer-form__field">
                                <label class="offer-form__label">How many people live in your household?</label>
                                <p class="offer-form__hint">Include yourself, spouse, children, and other adults</p>
                                <select id="household_size" name="household_size" class="offer-form__select" required>
                                    <option value="">Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8+</option>
                                </select>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Have you lived at this location for at least 12 months?</label>
                                <div class="offer-form__options">
                                    <label class="offer-form__option">
                                        <input type="radio" name="lived_at_location" value="Yes" required>
                                        <span>Yes</span>
                                    </label>
                                    <label class="offer-form__option">
                                        <input type="radio" name="lived_at_location" value="No">
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Do you have a co-borrower?</label>
                                <p class="offer-form__hint">If Yes, please add their earnings to your income</p>
                                <div class="offer-form__options">
                                    <label class="offer-form__option">
                                        <input type="radio" name="has_coborrower" value="Yes" required>
                                        <span>Yes</span>
                                    </label>
                                    <label class="offer-form__option">
                                        <input type="radio" name="has_coborrower" value="No">
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Total annual income of household</label>
                                <input type="text" id="income" name="income" placeholder="$ ___,___" class="offer-form__input offer-form__input--currency" required>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">How much do you have in savings for down payment?</label>
                                <input type="text" id="total_savings_down_payment" name="total_savings" placeholder="$ ___,___" class="offer-form__input offer-form__input--currency" required>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">How much debt do you pay each month?</label>
                                <p class="offer-form__hint">Include Credit Cards, Personal Loans, Student Loans, Car Payment. Do NOT include rent or mortgage.</p>
                                <input type="text" id="total_montlhy_debt_payment" name="monthly_debt" placeholder="$ ___,___" class="offer-form__input offer-form__input--currency" required>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">What is your credit score?</label>
                                <p class="offer-form__hint">Use average of Experian, Equifax, and Transunion</p>
                                <input type="number" id="credit_score" name="credit_score" placeholder="---" min="400" max="850" class="offer-form__input" required>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">What is your current employment status?</label>
                                <select id="employment_status" name="employment_status" class="offer-form__select" required>
                                    <option value="">Select</option>
                                    <option value="Employed (W-2)">Employed (W-2)</option>
                                    <option value="Self-Employed / 1099 Contractor">Self-Employed / 1099 Contractor</option>
                                    <option value="Retired">Retired</option>
                                    <option value="Not Employed">Not Employed</option>
                                </select>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Have you owned a home in the last 3 years?</label>
                                <select id="owns_home" name="owns_home" class="offer-form__select" required>
                                    <option value="">Select</option>
                                    <option value="Yes, and will keep">Yes, and will keep</option>
                                    <option value="Yes, and will sell">Yes, and will sell</option>
                                    <option value="Yes, but I sold it">Yes, but I sold it recently</option>
                                    <option value="Yes, but I sold it over three years ago">Yes, but I sold it over three years ago</option>
                                    <option value="No, never owned a home">No, never owned a home</option>
                                </select>
                            </div>
                        </div>

                        <!-- Step 3: Additional Info & Contact -->
                        <div class="offer-form__step" data-step="3">
                            <div class="offer-form__field">
                                <label class="offer-form__label">Date of Birth</label>
                                <input type="date" name="birthday" class="offer-form__input" required>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Are you (or a co-borrower) a current or former member of the U.S. military?</label>
                                <select name="occupation_military" class="offer-form__select" required>
                                    <option value="">Select</option>
                                    <option value="Not Military">Not Military</option>
                                    <option value="Active Duty">Active Duty</option>
                                    <option value="Reserve/National Guard">Reserve/National Guard</option>
                                    <option value="Veteran">Veteran</option>
                                    <option value="Surviving Spouse">Surviving Spouse</option>
                                </select>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Do you have a closing date?</label>
                                <div class="offer-form__options">
                                    <label class="offer-form__option">
                                        <input type="radio" name="has_closing_date" value="Yes" required>
                                        <span>Yes</span>
                                    </label>
                                    <label class="offer-form__option">
                                        <input type="radio" name="has_closing_date" value="No">
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">What is your gender?</label>
                                <div class="offer-form__options">
                                    <label class="offer-form__option">
                                        <input type="radio" name="gender" value="M" required>
                                        <span>Male</span>
                                    </label>
                                    <label class="offer-form__option">
                                        <input type="radio" name="gender" value="F">
                                        <span>Female</span>
                                    </label>
                                </div>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Do you (or a co-borrower or dependent) have a disability?</label>
                                <div class="offer-form__options">
                                    <label class="offer-form__option">
                                        <input type="radio" name="disability" value="Yes" required>
                                        <span>Yes</span>
                                    </label>
                                    <label class="offer-form__option">
                                        <input type="radio" name="disability" value="No">
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Are you of Native American descent?</label>
                                <div class="offer-form__options">
                                    <label class="offer-form__option">
                                        <input type="radio" name="indian_american" value="Yes" required>
                                        <span>Yes</span>
                                    </label>
                                    <label class="offer-form__option">
                                        <input type="radio" name="indian_american" value="No">
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>

                            <div class="offer-form__divider"></div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">First Name</label>
                                <input type="text" name="first_name" placeholder="Your first name" class="offer-form__input" required>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Last Name</label>
                                <input type="text" name="last_name" placeholder="Your last name" class="offer-form__input" required>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Email</label>
                                <input type="email" name="email" placeholder="Your email address" class="offer-form__input" required>
                            </div>

                            <div class="offer-form__field">
                                <label class="offer-form__label">Telephone</label>
                                <input type="tel" name="telephone" placeholder="555-555-5555" class="offer-form__input" required>
                            </div>

                            <div class="offer-form__field offer-form__field--checkbox">
                                <label class="offer-form__checkbox">
                                    <input type="checkbox" name="contact_subscribe" value="Yes">
                                    <span>I give IRR permission to contact me by email with rate information.</span>
                                </label>
                            </div>

                            <div class="offer-form__submit">
                                <button type="submit" class="btn btn--primary btn--full">Submit Application</button>
                            </div>
                        </div>

                        <!-- Hidden Fields -->
                        <input type="hidden" name="return_url" value="<?php echo home_url('/thank-you/'); ?>">
                        <input type="hidden" name="referral_url" id="referrer" value="">

                        <!-- Pagination -->
                        <div class="offer-form__pagination">
                            <button type="button" class="offer-form__page offer-form__page--active" data-page="1">1</button>
                            <button type="button" class="offer-form__page" data-page="2">2</button>
                            <button type="button" class="offer-form__page" data-page="3">3</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule a Call Card -->
    <section class="section">
        <div class="card card--step">
            <div class="schedule-call" id="schedule-call">
                <span class="step__label">SCHEDULE A CALL</span>
                <p class="schedule-call__subtitle">
                    <span class="schedule-call__subtitle-line schedule-call__subtitle-line--desktop">Have questions or just want to talk it over?</span><br class="gs-break-desktop">
                    <span class="schedule-call__subtitle-line schedule-call__subtitle-line--desktop">Pick a time to speak with a Mortgage and Interest Rate Pro</span>

                    <span class="schedule-call__subtitle-line schedule-call__subtitle-line--mobile">Have questions or just want to talk it</span>
                    <span class="schedule-call__subtitle-line schedule-call__subtitle-line--mobile">over? Pick a time to speak with a</span>
                    <span class="schedule-call__subtitle-line schedule-call__subtitle-line--mobile">Mortgage and Interest Rate Pro</span>
                </p>

                <div class="schedule-call__calendar">
                    <!-- Calendly inline widget begin -->
                    <div class="calendly-inline-widget" data-url="https://calendly.com/promotehousing/20min?embed_type=Inline&hide_event_type_details=1&hide_gdpr_banner=1&back=1" style="min-width:320px;height:630px;"></div>
                    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                    <!-- Calendly inline widget end -->
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <?php get_template_part('template-parts/footers/home'); ?>
</main>

<?php get_footer(); ?>
