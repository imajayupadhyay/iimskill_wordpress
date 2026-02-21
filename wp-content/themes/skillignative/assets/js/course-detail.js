// ========================================
// Course Detail Page JavaScript
// NOTE: Navigation (hamburger / mega-menu) is handled by script.js globally.
// This file handles only course-detail-specific interactions.
// All element selections are null-guarded to prevent crashes.
// ========================================

document.addEventListener('DOMContentLoaded', function () {

    // ========================================
    // Curriculum Module Accordion
    // ========================================
    const moduleItems    = document.querySelectorAll('.module-item');
    const expandAllBtn   = document.getElementById('expandAll');
    const collapseAllBtn = document.getElementById('collapseAll');

    moduleItems.forEach(function (item) {
        const header = item.querySelector('.module-header');
        if (!header) return;
        header.addEventListener('click', function () {
            item.classList.toggle('active');
        });
    });

    if (expandAllBtn) {
        expandAllBtn.addEventListener('click', function () {
            moduleItems.forEach(function (item) { item.classList.add('active'); });
        });
    }

    if (collapseAllBtn) {
        collapseAllBtn.addEventListener('click', function () {
            moduleItems.forEach(function (item) { item.classList.remove('active'); });
        });
    }


    // ========================================
    // Alumni Testimonials — Video + Detail Panel
    // Reads from data-* attributes on each .alumni-card
    // ========================================
    const alumniVideo    = document.getElementById('alumniVideo');
    const videoOverlay   = document.getElementById('videoOverlay');
    const playBtn        = document.getElementById('playBtn');
    const alumniCards    = document.querySelectorAll('.alumni-card');

    /* Video play / pause */
    if (playBtn && alumniVideo && videoOverlay) {
        playBtn.addEventListener('click', function () {
            alumniVideo.play();
            videoOverlay.classList.add('hidden');
        });

        alumniVideo.addEventListener('ended', function () {
            videoOverlay.classList.remove('hidden');
        });

        alumniVideo.addEventListener('pause', function () {
            if (!alumniVideo.ended) {
                videoOverlay.classList.remove('hidden');
            }
        });

        alumniVideo.addEventListener('click', function () {
            if (!alumniVideo.paused) {
                alumniVideo.pause();
            }
        });
    }

    /* Alumni card click — update detail panel from data-* attributes */
    alumniCards.forEach(function (card) {
        card.addEventListener('click', function () {
            // Mark active card
            alumniCards.forEach(function (c) { c.classList.remove('active'); });
            card.classList.add('active');

            // Read data from the card's data attributes (set by PHP)
            var name         = card.getAttribute('data-name')        || '';
            var company      = card.getAttribute('data-company')      || '';
            var quote        = card.getAttribute('data-quote')        || '';
            var testimonial  = card.getAttribute('data-testimonial')  || '';

            // Update right panel
            var detailName        = document.getElementById('detailName');
            var detailCompany     = document.getElementById('detailCompany');
            var detailQuote       = document.getElementById('detailQuote');
            var detailTestimonial = document.getElementById('detailTestimonial');

            if (detailName)        detailName.textContent        = name;
            if (detailCompany)     detailCompany.textContent     = company;
            if (detailQuote)       detailQuote.textContent       = '"' + quote + '"';
            if (detailTestimonial) detailTestimonial.textContent = testimonial;

            // Update video overlay labels
            var videoName    = document.querySelector('.video-name');
            var videoRole    = document.querySelector('.video-role');
            var videoCompany = document.querySelector('.video-company');

            if (videoName)    videoName.textContent    = name;
            if (videoCompany) videoCompany.textContent = '@ ' + company;
        });
    });


    // ========================================
    // Live Projects Slider
    // ========================================
    var projectCards  = document.querySelectorAll('.project-card');
    var sliderDots    = document.querySelectorAll('.slider-dot');
    var prevBtn       = document.getElementById('projectPrev');
    var nextBtn       = document.getElementById('projectNext');
    var progressBar   = document.getElementById('progressBar');

    if (projectCards.length === 0) return; // no slider on page

    var currentSlide    = 1;
    var totalSlides     = projectCards.length;
    var isAnimating     = false;
    var autoSlideTimer;

    function updateSlider(newSlide) {
        if (isAnimating || newSlide === currentSlide) return;
        isAnimating = true;

        var currentCard = document.querySelector('.project-card.active');
        var newCard     = document.querySelector('.project-card[data-project="' + newSlide + '"]');

        if (!currentCard || !newCard) { isAnimating = false; return; }

        currentCard.classList.remove('active');
        newCard.classList.add('active');

        // Dots
        sliderDots.forEach(function (dot) { dot.classList.remove('active'); });
        var activeDot = document.querySelector('.slider-dot[data-slide="' + newSlide + '"]');
        if (activeDot) activeDot.classList.add('active');

        // Progress bar
        if (progressBar) {
            progressBar.style.width = ((newSlide / totalSlides) * 100) + '%';
        }

        currentSlide = newSlide;
        isAnimating  = false;
    }

    function goNext() {
        updateSlider(currentSlide >= totalSlides ? 1 : currentSlide + 1);
    }

    function goPrev() {
        updateSlider(currentSlide <= 1 ? totalSlides : currentSlide - 1);
    }

    function resetAuto() {
        clearInterval(autoSlideTimer);
        autoSlideTimer = setInterval(goNext, 5000);
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () { goNext(); resetAuto(); });
    }
    if (prevBtn) {
        prevBtn.addEventListener('click', function () { goPrev(); resetAuto(); });
    }

    sliderDots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            var num = parseInt(dot.getAttribute('data-slide'), 10);
            updateSlider(num);
            resetAuto();
        });
    });

    // Touch / swipe
    var touchStartX = 0;
    var projectsSlider = document.getElementById('projectsSlider');
    if (projectsSlider) {
        projectsSlider.addEventListener('touchstart', function (e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        projectsSlider.addEventListener('touchend', function (e) {
            var diff = touchStartX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 50) {
                diff > 0 ? goNext() : goPrev();
                resetAuto();
            }
        }, { passive: true });
    }

    // Keyboard nav when slider visible
    document.addEventListener('keydown', function (e) {
        var wrapper = document.querySelector('.projects-slider-wrapper');
        if (!wrapper) return;
        var rect = wrapper.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            if (e.key === 'ArrowRight') { goNext(); resetAuto(); }
            if (e.key === 'ArrowLeft')  { goPrev(); resetAuto(); }
        }
    });

    // Set initial progress bar
    if (progressBar) {
        progressBar.style.width = ((1 / totalSlides) * 100) + '%';
    }

    resetAuto();


    // ========================================
    // Recruiter Feedback — Infinite Auto-scroll
    // Clones cards for seamless loop
    // ========================================
    var track = document.querySelector('.recruiter-slider-track');
    if (track) {
        var cards = track.querySelectorAll('.recruiter-card');
        if (cards.length > 0) {
            // Clone all cards and append for infinite effect
            cards.forEach(function (card) {
                var clone = card.cloneNode(true);
                clone.setAttribute('aria-hidden', 'true');
                track.appendChild(clone);
            });
        }
    }


    // ========================================
    // Course Info Tabs
    // ========================================
    var tabButtons = document.querySelectorAll('.info-tab-btn');
    var tabPanels  = document.querySelectorAll('.info-tab-panel');

    tabButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var targetTab = button.getAttribute('data-tab');

            tabButtons.forEach(function (btn) { btn.classList.remove('active'); });
            tabPanels.forEach(function (panel) { panel.classList.remove('active'); });

            button.classList.add('active');
            var target = document.getElementById(targetTab);
            if (target) target.classList.add('active');
        });

        // Keyboard navigation
        button.addEventListener('keydown', function (e) {
            var idx = Array.from(tabButtons).indexOf(button);
            var newIdx;
            if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                e.preventDefault();
                newIdx = (idx + 1) % tabButtons.length;
            } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                e.preventDefault();
                newIdx = (idx - 1 + tabButtons.length) % tabButtons.length;
            }
            if (newIdx !== undefined) {
                tabButtons[newIdx].click();
                tabButtons[newIdx].focus();
            }
        });
    });


    // ========================================
    // FAQ Accordion
    // ========================================
    var faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(function (item) {
        var question = item.querySelector('.faq-question');
        if (!question) return;

        question.addEventListener('click', function () {
            var isActive = item.classList.contains('active');
            faqItems.forEach(function (other) { other.classList.remove('active'); });
            if (!isActive) item.classList.add('active');
        });

        question.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                question.click();
            }
        });
    });

}); // end DOMContentLoaded
