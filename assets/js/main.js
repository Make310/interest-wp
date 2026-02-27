/**
 * IRR Theme - Main JS
 */

(function() {
    'use strict';

    const menuBtn = document.querySelector('.navbar__menu-btn');
    const mobileMenu = document.querySelector('.mobile-menu');
    const menuIcon = document.querySelector('.navbar__menu-icon');
    const body = document.body;

    if (menuBtn && mobileMenu) {
        const openIcon = menuIcon?.dataset.openIcon || menuIcon?.getAttribute('src') || '';
        const closeIcon = menuIcon?.dataset.closeIcon || openIcon;

        function setMenuIcon(isOpen) {
            if (!menuIcon) {
                return;
            }
            menuIcon.setAttribute('src', isOpen ? openIcon : closeIcon);
        }

        setMenuIcon(false);

        menuBtn.addEventListener('click', function() {
            const isActive = this.classList.contains('is-active');

            if (isActive) {
                this.classList.remove('is-active');
                mobileMenu.classList.remove('is-active');
                body.classList.remove('menu-open');
                this.setAttribute('aria-expanded', 'false');
                setMenuIcon(false);
            } else {
                this.classList.add('is-active');
                mobileMenu.classList.add('is-active');
                body.classList.add('menu-open');
                this.setAttribute('aria-expanded', 'true');
                setMenuIcon(true);
            }
        });

        // Cerrar menú al hacer click en un link
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() {
                menuBtn.classList.remove('is-active');
                mobileMenu.classList.remove('is-active');
                body.classList.remove('menu-open');
                menuBtn.setAttribute('aria-expanded', 'false');
                setMenuIcon(false);
            });
        });
    }

    // ================================
    // RESEARCH/BLOG WIDTH CAP TO NAV "RESEARCH"
    // ================================
    function syncResearchContentWidth() {
        if (!body.classList.contains('is-research-context')) {
            return;
        }

        if (window.innerWidth < 768) {
            body.style.removeProperty('--research-content-max-width');
            return;
        }

        const navResearch = document.querySelector('.navbar .navbar__nav .navbar__nav-link[href*="/research"]');
        const contentStart = document.querySelector(
            'body.is-research-context .research-header, ' +
            'body.single-post.is-research-context .article, ' +
            'body.is-research-context .main > .section, ' +
            'body.is-research-context .blog-posts'
        );

        if (!navResearch || !contentStart) {
            body.style.removeProperty('--research-content-max-width');
            return;
        }

        const navRect = navResearch.getBoundingClientRect();
        const contentRect = contentStart.getBoundingClientRect();

        if (navRect.width < 10) {
            body.style.removeProperty('--research-content-max-width');
            return;
        }

        const maxWidth = Math.max(280, navRect.right - contentRect.left);
        body.style.setProperty('--research-content-max-width', `${maxWidth}px`);
    }

    syncResearchContentWidth();
    window.addEventListener('resize', syncResearchContentWidth, { passive: true });
    window.addEventListener('orientationchange', syncResearchContentWidth, { passive: true });
    requestAnimationFrame(syncResearchContentWidth);
    setTimeout(syncResearchContentWidth, 150);
    if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(syncResearchContentWidth);
    }

    // File Upload Dropdown
    const fileDropdown = document.querySelector('.file-dropdown');
    const fileDropdownBtn = document.querySelector('.file-dropdown__btn');

    if (fileDropdown && fileDropdownBtn) {
        fileDropdownBtn.addEventListener('click', function(e) {
            e.preventDefault();
            fileDropdown.classList.toggle('is-open');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!fileDropdown.contains(e.target)) {
                fileDropdown.classList.remove('is-open');
            }
        });

        // Handle dropdown item clicks
        fileDropdown.querySelectorAll('.file-dropdown__item').forEach(item => {
            item.addEventListener('click', function() {
                // Here you can add file upload logic
                const fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.accept = '.pdf,.doc,.docx,.jpg,.jpeg,.png';
                fileInput.click();

                fileInput.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        console.log('File selected:', this.files[0].name);
                        // Add your upload handling here
                    }
                });

                fileDropdown.classList.remove('is-open');
            });
        });
    }

    // ================================
    // MULTI-STEP FORM
    // ================================
    const offerForm = document.getElementById('newOfferForm');

    if (offerForm) {
        let currentStep = 1;
        const totalSteps = 3;
        const steps = offerForm.querySelectorAll('.offer-form__step');
        const pageButtons = offerForm.querySelectorAll('.offer-form__page');

        // Set referrer
        const referrerInput = document.getElementById('referrer');
        if (referrerInput) {
            referrerInput.value = window.location.href;
        }

        // Show specific step
        function showStep(stepNumber) {
            steps.forEach(step => {
                step.classList.remove('offer-form__step--active');
                if (parseInt(step.dataset.step) === stepNumber) {
                    step.classList.add('offer-form__step--active');
                }
            });

            pageButtons.forEach(btn => {
                btn.classList.remove('offer-form__page--active');
                if (parseInt(btn.dataset.page) === stepNumber) {
                    btn.classList.add('offer-form__page--active');
                }
            });

            currentStep = stepNumber;
        }

        // Pagination click handlers
        pageButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const targetStep = parseInt(this.dataset.page);

                // Validate current step before moving forward
                if (targetStep > currentStep) {
                    if (!validateStep(currentStep)) {
                        return;
                    }
                }

                showStep(targetStep);
            });
        });

        // Validate step fields
        function validateStep(stepNumber) {
            const step = offerForm.querySelector(`.offer-form__step[data-step="${stepNumber}"]`);
            const requiredFields = step.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (field.type === 'radio') {
                    const radioGroup = step.querySelectorAll(`[name="${field.name}"]`);
                    const isChecked = Array.from(radioGroup).some(radio => radio.checked);
                    if (!isChecked) {
                        isValid = false;
                        field.closest('.offer-form__options').classList.add('offer-form__options--error');
                    } else {
                        field.closest('.offer-form__options').classList.remove('offer-form__options--error');
                    }
                } else if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('offer-form__input--error');
                } else {
                    field.classList.remove('offer-form__input--error');
                }
            });

            // Special validation for county
            if (stepNumber === 1) {
                const countyMatch = document.getElementById('place_county');
                if (countyMatch && !countyMatch.value) {
                    isValid = false;
                    document.getElementById('place_search').classList.add('offer-form__input--error');
                }
            }

            return isValid;
        }

        // ================================
        // COUNTY AUTOCOMPLETE
        // ================================
        const placeSearch = document.getElementById('place_search');
        const placeCounty = document.getElementById('place_county');
        const countyResults = document.getElementById('county-results');

        if (placeSearch && countyResults) {
            let searchTimeout;

            placeSearch.addEventListener('input', function() {
                const searchTerm = this.value;

                // Clear previous timeout
                clearTimeout(searchTimeout);

                // Clear county match when typing
                placeCounty.value = '';

                if (searchTerm.length < 2) {
                    countyResults.innerHTML = '';
                    countyResults.style.display = 'none';
                    return;
                }

                // Debounce search
                searchTimeout = setTimeout(async () => {
                    try {
                        const response = await fetch(`https://hnp.app/api/search_location?location=${encodeURIComponent(searchTerm)}`);
                        const results = await response.json();

                        countyResults.innerHTML = '';

                        if (results.cities && results.cities.length > 0) {
                            results.cities.forEach(result => {
                                const li = document.createElement('li');
                                if (result.city) {
                                    li.textContent = `${result.city} (${result.county} County, ${result.state})`;
                                } else {
                                    li.textContent = `${result.county} County, ${result.state}`;
                                }
                                li.dataset.county = `${result.county}, ${result.state}`;

                                li.addEventListener('click', function() {
                                    placeSearch.value = this.textContent;
                                    placeCounty.value = this.dataset.county;
                                    countyResults.innerHTML = '';
                                    countyResults.style.display = 'none';
                                    placeSearch.classList.remove('offer-form__input--error');
                                });

                                countyResults.appendChild(li);
                            });
                            countyResults.style.display = 'block';
                        } else {
                            countyResults.style.display = 'none';
                        }
                    } catch (error) {
                        console.error('Error fetching locations:', error);
                    }
                }, 300);
            });

            // Close results when clicking outside
            document.addEventListener('click', function(e) {
                if (!placeSearch.contains(e.target) && !countyResults.contains(e.target)) {
                    countyResults.style.display = 'none';
                }
            });
        }

        // ================================
        // CURRENCY FORMATTING
        // ================================
        const currencyFields = [
            'purchase_price',
            'income',
            'total_savings_down_payment',
            'total_montlhy_debt_payment'
        ];

        currencyFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.addEventListener('input', function() {
                    let value = this.value.replace(/[^0-9]/g, '');
                    if (value) {
                        value = parseInt(value, 10).toLocaleString('en-US');
                        this.value = '$' + value;
                    }
                });

                field.addEventListener('focus', function() {
                    if (this.value === '$') {
                        this.value = '';
                    }
                });

                field.addEventListener('blur', function() {
                    if (this.value && !this.value.startsWith('$')) {
                        let value = this.value.replace(/[^0-9]/g, '');
                        if (value) {
                            value = parseInt(value, 10).toLocaleString('en-US');
                            this.value = '$' + value;
                        }
                    }
                });
            }
        });

        // ================================
        // FORM SUBMISSION
        // ================================
        const submitBtn = offerForm.querySelector('button[type="submit"]');

        offerForm.addEventListener('submit', function(e) {
            // Validate all steps before submit
            for (let i = 1; i <= totalSteps; i++) {
                if (!validateStep(i)) {
                    e.preventDefault();
                    showStep(i);
                    return;
                }
            }

            // Disable submit button to prevent multiple submissions
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Submitting...';
                submitBtn.classList.add('btn--loading');
            }
        });
    }

    // ================================
    // FOOTER SUBSCRIBE MODAL
    // ================================
    const subscribeModal = document.getElementById('footer-subscribe-modal');
    const subscribeModalCloseBtn = document.querySelector('.js-footer-subscribe-close');
    const subscribeTriggerForms = document.querySelectorAll('.js-footer-subscribe-trigger');
    const subscribeModalEmailInput = document.querySelector('.js-footer-subscribe-modal-email');
    const subscribeModalForm = subscribeModal ? subscribeModal.querySelector('.footer-subscribe-modal__form') : null;

    function openFooterSubscribeModal(prefillEmail) {
        if (!subscribeModal) {
            return;
        }

        if (subscribeModalEmailInput && prefillEmail) {
            subscribeModalEmailInput.value = prefillEmail;
        }

        if (typeof subscribeModal.showModal === 'function') {
            subscribeModal.showModal();
        } else {
            subscribeModal.setAttribute('open', 'open');
        }
    }

    function closeFooterSubscribeModal() {
        if (!subscribeModal) {
            return;
        }

        if (typeof subscribeModal.close === 'function') {
            subscribeModal.close();
        } else {
            subscribeModal.removeAttribute('open');
        }
    }

    subscribeTriggerForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const emailInput = form.querySelector('.js-footer-subscribe-email');
            if (!emailInput) {
                openFooterSubscribeModal('');
                return;
            }

            if (!emailInput.checkValidity()) {
                emailInput.reportValidity();
                return;
            }

            openFooterSubscribeModal(emailInput.value.trim());
        });
    });

    if (subscribeModalCloseBtn) {
        subscribeModalCloseBtn.addEventListener('click', function() {
            closeFooterSubscribeModal();
        });
    }

    if (subscribeModal) {
        subscribeModal.addEventListener('click', function(e) {
            const modalBox = subscribeModal.querySelector('.footer-subscribe-modal__inner');
            if (modalBox && !modalBox.contains(e.target)) {
                closeFooterSubscribeModal();
            }
        });
    }

    if (subscribeModalForm) {
        subscribeModalForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            if (!subscribeModalForm.checkValidity()) {
                subscribeModalForm.reportValidity();
                return;
            }

            const submitBtn = subscribeModalForm.querySelector('.footer-subscribe-modal__submit');
            const originalText = submitBtn ? submitBtn.textContent : '';

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = '...';
            }

            try {
                const formData = new FormData(subscribeModalForm);
                await fetch(subscribeModalForm.action, {
                    method: 'POST',
                    body: formData,
                    mode: 'no-cors'
                });

                closeFooterSubscribeModal();
                const homeUrl = subscribeModal.dataset.homeUrl || `${window.location.origin}/`;
                window.location.href = homeUrl;
            } catch (error) {
                console.error('Footer subscribe modal error:', error);
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                }
            }
        });
    }
})();
