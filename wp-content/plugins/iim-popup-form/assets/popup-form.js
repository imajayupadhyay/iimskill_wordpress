/**
 * IIM Popup Form - Frontend JS
 * Trigger options (use ANY of these):
 *   1. href="#popup-form"  (easiest - just set the link)
 *   2. class "open-popup-form"
 *   3. data-popup-form attribute
 */
(function () {
    'use strict';

    const overlay = document.getElementById('iim-popup-overlay');
    if (!overlay) return;

    const modal = overlay.querySelector('.iim-popup-modal');
    const closeBtn = overlay.querySelector('.iim-popup-close');

    function openPopup(e) {
        if (e) e.preventDefault();
        overlay.classList.add('active');
        overlay.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';

        // Focus first input after animation
        setTimeout(function () {
            const firstInput = modal.querySelector('input[type="text"], input[type="email"], input[type="tel"]');
            if (firstInput) firstInput.focus();
        }, 350);
    }

    function closePopup() {
        overlay.classList.remove('active');
        overlay.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    // Bind all triggers (works for dynamically added elements too)
    document.addEventListener('click', function (e) {
        const trigger = e.target.closest('.open-popup-form')
            || e.target.closest('a[href="#popup-form"]')
            || e.target.closest('[data-popup-form]');
        if (trigger) {
            openPopup(e);
        }
    });

    // Close on X button
    if (closeBtn) {
        closeBtn.addEventListener('click', closePopup);
    }

    // Close on overlay click (outside modal)
    overlay.addEventListener('click', function (e) {
        if (e.target === overlay) {
            closePopup();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && overlay.classList.contains('active')) {
            closePopup();
        }
    });

    // Auto-close after successful CF7 submission (optional delay for user to see message)
    document.addEventListener('wpcf7mailsent', function (e) {
        if (overlay.classList.contains('active')) {
            setTimeout(closePopup, 3000);
        }
    });
})();
