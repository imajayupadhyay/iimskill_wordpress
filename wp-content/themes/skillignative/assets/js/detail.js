// Blog Detail Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    const sidebarForm = document.getElementById('sidebarForm');
    const sidebar = document.querySelector('.sidebar-sticky');
    const header = document.querySelector('.header');

    // Form Submission Handler
    if (sidebarForm) {
        sidebarForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = {
                name: this.querySelector('input[type="text"]').value,
                email: this.querySelector('input[type="email"]').value,
                phone: this.querySelector('input[type="tel"]').value,
                agreedToTerms: this.querySelector('input[type="checkbox"]').checked
            };

            // Validate form
            if (!formData.agreedToTerms) {
                alert('Please agree to the Terms and Privacy Policy');
                return;
            }

            // Show loading state
            const submitBtn = this.querySelector('.form-submit');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Submitting...';
            submitBtn.disabled = true;

            // Simulate form submission (replace with actual API call)
            setTimeout(() => {
                console.log('Form submitted:', formData);
                
                // Show success message
                alert('Thank you! Your request has been submitted successfully. We will contact you soon.');
                
                // Reset form
                sidebarForm.reset();
                
                // Restore button
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }, 1500);
        });
    }

    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerHeight = header ? header.offsetHeight : 70;
                const targetPosition = target.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Sticky Sidebar Adjustment on Scroll
    function adjustSidebarSticky() {
        if (window.innerWidth > 1024 && sidebar) {
            const headerHeight = header ? header.offsetHeight : 70;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const articleHeader = document.querySelector('.article-header');
            
            if (articleHeader && scrollTop > articleHeader.offsetHeight) {
                sidebar.style.top = (headerHeight + 20) + 'px';
            } else {
                sidebar.style.top = '90px';
            }
        }
    }

    // Adjust sticky position on scroll
    window.addEventListener('scroll', adjustSidebarSticky);
    window.addEventListener('resize', adjustSidebarSticky);

    // Initial adjustment
    adjustSidebarSticky();

    // Phone Number Input Validation
    const phoneInput = document.querySelector('.phone-input');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            // Remove non-numeric characters
            let value = e.target.value.replace(/\D/g, '');
            
            // Limit to 10 digits for Indian numbers
            if (value.length > 10) {
                value = value.substring(0, 10);
            }
            
            e.target.value = value;
        });

        // Validate on blur
        phoneInput.addEventListener('blur', function(e) {
            const value = e.target.value;
            if (value.length > 0 && value.length < 10) {
                e.target.setCustomValidity('Please enter a valid 10-digit phone number');
                e.target.reportValidity();
            } else {
                e.target.setCustomValidity('');
            }
        });
    }

    // Email Input Validation
    const emailInput = document.querySelector('input[type="email"]');
    if (emailInput) {
        emailInput.addEventListener('blur', function(e) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (e.target.value && !emailPattern.test(e.target.value)) {
                e.target.setCustomValidity('Please enter a valid email address');
                e.target.reportValidity();
            } else {
                e.target.setCustomValidity('');
            }
        });
    }

    // Reading Progress Bar (Optional Enhancement)
    function createReadingProgress() {
        const progressBar = document.createElement('div');
        progressBar.style.cssText = `
            position: fixed;
            top: 70px;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, #155dfc, #3b82f6);
            z-index: 1000;
            transition: width 0.1s ease;
        `;
        document.body.appendChild(progressBar);

        window.addEventListener('scroll', function() {
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight - windowHeight;
            const scrolled = window.pageYOffset;
            const progress = (scrolled / documentHeight) * 100;
            
            progressBar.style.width = progress + '%';
        });
    }

    // Uncomment to enable reading progress bar
    // createReadingProgress();

    // Social Share Functionality (Optional)
    function setupSocialShare() {
        const articleTitle = document.querySelector('.article-title')?.textContent || '';
        const currentUrl = window.location.href;

        // You can add social share buttons here if needed
        console.log('Article ready to share:', articleTitle);
    }

    setupSocialShare();

    // Print Article Function
    window.printArticle = function() {
        window.print();
    };

    // Copy Link Function
    window.copyArticleLink = function() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(function() {
            alert('Link copied to clipboard!');
        }).catch(function(err) {
            console.error('Failed to copy link:', err);
        });
    };

    // =============================================
    // CF7 Modern Success Card
    // =============================================
    var sidebarFormWrap = document.querySelector('.sidebar-form');

    if (sidebarFormWrap) {

        /* build the success card HTML */
        function buildSuccessCard() {
            return '<div class="cf7-success-card">'
                + '<div class="cf7-check-wrap">'
                +   '<svg viewBox="0 0 72 72" width="72" height="72" xmlns="http://www.w3.org/2000/svg">'
                +     '<circle class="cf7-check-circle" cx="36" cy="36" r="32"/>'
                +     '<polyline class="cf7-check-tick" points="20,37 31,48 52,26"/>'
                +   '</svg>'
                + '</div>'
                + '<h3 class="cf7-success-title">Thank You!</h3>'
                + '<p class="cf7-success-sub">Your enquiry has been submitted successfully.<br>We\'ll get back to you within 24 hours.</p>'
                + '<span class="cf7-success-note">'
                +   '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>'
                +   'Message received'
                + '</span>'
                + '<button class="cf7-success-reset" type="button">Send another enquiry</button>'
                + '</div>';
        }

        /* listen for CF7 successful send */
        document.addEventListener('wpcf7mailsent', function(e) {
            /* only act on the form inside our sidebar */
            var cf7Wrap = sidebarFormWrap.querySelector('.wpcf7');
            if (!cf7Wrap) return;

            /* fade out the form */
            sidebarFormWrap.classList.add('cf7-submitting');

            setTimeout(function() {
                /* hide CF7 wrapper, inject success card */
                cf7Wrap.style.display = 'none';
                sidebarFormWrap.classList.remove('cf7-submitting');

                var card = document.createElement('div');
                card.innerHTML = buildSuccessCard();
                sidebarFormWrap.appendChild(card);

                /* wire up "send another" button */
                card.querySelector('.cf7-success-reset').addEventListener('click', function() {
                    card.remove();
                    cf7Wrap.style.display = '';
                    /* reset CF7 form fields */
                    var formEl = cf7Wrap.querySelector('form');
                    if (formEl) formEl.reset();
                });
            }, 320);

        }, false);
    }

    // Track Reading Time
    let readingStartTime = Date.now();

    window.addEventListener('beforeunload', function() {
        const readingTime = Math.floor((Date.now() - readingStartTime) / 1000);
        console.log('User spent', readingTime, 'seconds reading this article');
        // You can send this data to analytics
    });

    // Lazy Load Images (if not using browser native lazy loading)
    const images = document.querySelectorAll('.article-body img');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    observer.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    }
});
