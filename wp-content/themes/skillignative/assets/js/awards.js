// Awards Page JavaScript

document.addEventListener('DOMContentLoaded', function() {

    // ================================
    // Scroll Reveal Animation
    // ================================

    var observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all award cards
    var awardCards = document.querySelectorAll('.awards-media-card');
    awardCards.forEach(function(card) {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(card);
    });

    // ================================
    // Hero Section Fade-in
    // ================================

    var heroContent = document.querySelector('.awards-hero-content');
    if (heroContent) {
        heroContent.style.opacity = '0';
        heroContent.style.transform = 'translateY(20px)';
        heroContent.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        setTimeout(function() {
            heroContent.style.opacity = '1';
            heroContent.style.transform = 'translateY(0)';
        }, 100);
    }

    var heroImage = document.querySelector('.awards-hero-image');
    if (heroImage) {
        heroImage.style.opacity = '0';
        heroImage.style.transform = 'translateY(20px)';
        heroImage.style.transition = 'opacity 0.6s ease 0.2s, transform 0.6s ease 0.2s';
        setTimeout(function() {
            heroImage.style.opacity = '1';
            heroImage.style.transform = 'translateY(0)';
        }, 150);
    }

});
