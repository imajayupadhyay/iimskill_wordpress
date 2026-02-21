<?php
/**
 * Template Name: Contact Us
 *
 * The contact page template.
 * All sections are dynamic via custom meta fields.
 * Edit via Pages > Contact Us > Edit in the admin.
 *
 * @package Skillignative
 */

get_header();

$page_id = get_the_ID();

// ============================================================
// HERO SECTION DATA
// ============================================================
$ch_badge_text      = get_post_meta( $page_id, '_ch_badge_text', true ) ?: '24/7 GLOBAL HELP DESK';
$ch_title           = get_post_meta( $page_id, '_ch_title', true ) ?: "We're Here";
$ch_title_highlight = get_post_meta( $page_id, '_ch_title_highlight', true ) ?: 'To Support You!';
$ch_description     = get_post_meta( $page_id, '_ch_description', true ) ?: "IIM SKILLS is India's leading online education platform, offering globally recognized professional courses in digital marketing, content writing, data analytics, and more. We help learners upskill, boost their careers, and stay ahead in a competitive world with flexible, expert-led programs designed for real-world success.";
$ch_image_id        = get_post_meta( $page_id, '_ch_image_id', true );
$ch_image_url       = $ch_image_id ? wp_get_attachment_url( $ch_image_id ) : 'https://images.unsplash.com/photo-1556745753-b2904692b3cd?w=600&h=400&fit=crop';
$ch_badge_title     = get_post_meta( $page_id, '_ch_badge_title', true ) ?: 'Global Assistance';
$ch_badge_subtitle  = get_post_meta( $page_id, '_ch_badge_subtitle', true ) ?: '35+ COUNTRIES';

// ============================================================
// CONTACT METHODS DATA
// ============================================================
$cm_email_title   = get_post_meta( $page_id, '_cm_email_title', true ) ?: 'Email Us';
$cm_email_address = get_post_meta( $page_id, '_cm_email_address', true ) ?: 'info@iimskills.com';
$cm_phone_title   = get_post_meta( $page_id, '_cm_phone_title', true ) ?: 'Call Support';
$cm_phone_number  = get_post_meta( $page_id, '_cm_phone_number', true ) ?: '+91-9580 740 740';
$cm_hours_title   = get_post_meta( $page_id, '_cm_hours_title', true ) ?: 'Office Hours';
$cm_hours_line1   = get_post_meta( $page_id, '_cm_hours_line1', true ) ?: 'Delhi: Mon - Sun: 9:30 am - 6 pm';
$cm_hours_line2   = get_post_meta( $page_id, '_cm_hours_line2', true ) ?: 'Noida: Mon - Fri: 9:30 am - 6 pm';

// ============================================================
// STATS SECTION DATA
// ============================================================
$cs_badge_text   = get_post_meta( $page_id, '_cs_badge_text', true ) ?: 'GLOBALLY TRUSTED';
$cs_title        = get_post_meta( $page_id, '_cs_title', true ) ?: 'World-Class Education';
$cs_stat1_number = get_post_meta( $page_id, '_cs_stat1_number', true ) ?: '4.8/5';
$cs_stat1_label  = get_post_meta( $page_id, '_cs_stat1_label', true ) ?: 'Google Rating';
$cs_stat2_number = get_post_meta( $page_id, '_cs_stat2_number', true ) ?: '55,000+';
$cs_stat2_label  = get_post_meta( $page_id, '_cs_stat2_label', true ) ?: 'Career Transition';
$cs_stat3_number = get_post_meta( $page_id, '_cs_stat3_number', true ) ?: '550+';
$cs_stat3_label  = get_post_meta( $page_id, '_cs_stat3_label', true ) ?: 'Top Hiring Network';
$cs_stat4_number = get_post_meta( $page_id, '_cs_stat4_number', true ) ?: '24/7';
$cs_stat4_label  = get_post_meta( $page_id, '_cs_stat4_label', true ) ?: 'Support';

// ============================================================
// GLOBAL SUPPORT NETWORK DATA
// ============================================================
$gs_title    = get_post_meta( $page_id, '_gs_title', true ) ?: 'Global Support Network';
$gs_subtitle = get_post_meta( $page_id, '_gs_subtitle', true ) ?: 'Connect with the right department for faster assistance.';
$gs_cards    = get_post_meta( $page_id, '_gs_cards', true );
if ( ! is_array( $gs_cards ) || empty( $gs_cards ) ) {
	$gs_cards = array(
		array( 'icon' => 'course', 'title' => 'Course Inquiries', 'description' => 'Curriculum, fees & batches.', 'email' => 'info@iimskills.com' ),
		array( 'icon' => 'student', 'title' => 'Student Support', 'description' => 'LMS, certificates & support.', 'email' => 'delivery@iimskills.com' ),
		array( 'icon' => 'career', 'title' => 'Careers & HR', 'description' => 'Job openings & internships.', 'email' => 'hr@iimskills.com' ),
	);
}

// ============================================================
// CAREER CTA DATA
// ============================================================
$cta_badge_text  = get_post_meta( $page_id, '_cta_badge_text', true ) ?: 'BUILD YOUR CAREER';
$cta_title       = get_post_meta( $page_id, '_cta_title', true ) ?: 'Looking to Build Your Career with Us?';
$cta_description = get_post_meta( $page_id, '_cta_description', true ) ?: 'Explore exciting career opportunities and become a part of the IIM SKILLS team. Join us in shaping the future of online education.';
$cta_btn_text    = get_post_meta( $page_id, '_cta_btn_text', true ) ?: 'Explore Programs';
$cta_btn_url     = get_post_meta( $page_id, '_cta_btn_url', true ) ?: '#';

// Support card SVG icons map
function skillignative_contact_support_icon( $type ) {
	switch ( $type ) {
		case 'student':
			return '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>';
		case 'career':
			return '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>';
		default: // course
			return '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>';
	}
}
?>

    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="contact-hero-container">
            <div class="contact-hero-content">
                <div class="hero-badge">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    <span><?php echo esc_html( $ch_badge_text ); ?></span>
                </div>

                <h1 class="hero-title">
                    <?php echo esc_html( $ch_title ); ?><br>
                    <span><?php echo esc_html( $ch_title_highlight ); ?></span>
                </h1>

                <p class="hero-description">
                    <?php echo esc_html( $ch_description ); ?>
                </p>
            </div>

            <div class="contact-hero-image">
                <div class="image-card">
                    <img src="<?php echo esc_url( $ch_image_url ); ?>" alt="Business professionals handshake">
                    <div class="image-badge">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M2 12h20"/>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                        </svg>
                        <div class="badge-text">
                            <span class="badge-title"><?php echo esc_html( $ch_badge_title ); ?></span>
                            <span class="badge-subtitle"><?php echo esc_html( $ch_badge_subtitle ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Chat Button -->
        <button class="floating-chat-btn" id="floatingChat">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
            </svg>
        </button>
    </section>

    <!-- Contact Methods Section -->
    <section class="contact-methods-section">
        <div class="contact-methods-container">
            <!-- Email Card -->
            <div class="contact-method-card">
                <div class="method-icon-wrapper">
                    <div class="method-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </div>
                </div>
                <div class="method-content">
                    <h3 class="method-title"><?php echo esc_html( $cm_email_title ); ?></h3>
                    <a href="mailto:<?php echo esc_attr( $cm_email_address ); ?>" class="method-link"><?php echo esc_html( $cm_email_address ); ?></a>
                </div>
            </div>

            <!-- Call Card -->
            <div class="contact-method-card">
                <div class="method-icon-wrapper">
                    <div class="method-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
                        </svg>
                    </div>
                </div>
                <div class="method-content">
                    <h3 class="method-title"><?php echo esc_html( $cm_phone_title ); ?></h3>
                    <a href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', $cm_phone_number ) ); ?>" class="method-link"><?php echo esc_html( $cm_phone_number ); ?></a>
                </div>
            </div>

            <!-- Office Hours Card -->
            <div class="contact-method-card">
                <div class="method-icon-wrapper">
                    <div class="method-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                </div>
                <div class="method-content">
                    <h3 class="method-title"><?php echo esc_html( $cm_hours_title ); ?></h3>
                    <?php if ( $cm_hours_line1 ) : ?>
                    <p class="method-text"><?php echo esc_html( $cm_hours_line1 ); ?></p>
                    <?php endif; ?>
                    <?php if ( $cm_hours_line2 ) : ?>
                    <p class="method-text"><?php echo esc_html( $cm_hours_line2 ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="contact-stats-section">
        <div class="contact-stats-container">
            <div class="stats-card">
                <div class="stats-badge">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                    <span><?php echo esc_html( $cs_badge_text ); ?></span>
                </div>

                <h2 class="stats-title"><?php echo esc_html( $cs_title ); ?></h2>

                <div class="stats-grid">
                    <!-- Stat 1 -->
                    <div class="stat-item">
                        <div class="stat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo esc_html( $cs_stat1_number ); ?></div>
                            <div class="stat-label"><?php echo esc_html( $cs_stat1_label ); ?></div>
                        </div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="stat-item">
                        <div class="stat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo esc_html( $cs_stat2_number ); ?></div>
                            <div class="stat-label"><?php echo esc_html( $cs_stat2_label ); ?></div>
                        </div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="stat-item">
                        <div class="stat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="8" r="7"/>
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
                            </svg>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo esc_html( $cs_stat3_number ); ?></div>
                            <div class="stat-label"><?php echo esc_html( $cs_stat3_label ); ?></div>
                        </div>
                    </div>

                    <!-- Stat 4 -->
                    <div class="stat-item">
                        <div class="stat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo esc_html( $cs_stat4_number ); ?></div>
                            <div class="stat-label"><?php echo esc_html( $cs_stat4_label ); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Support Network Section -->
    <section class="global-support-section">
        <div class="global-support-container">
            <div class="support-header">
                <h2 class="support-title"><?php echo esc_html( $gs_title ); ?></h2>
                <p class="support-subtitle"><?php echo esc_html( $gs_subtitle ); ?></p>
            </div>

            <div class="support-cards-grid">
                <?php foreach ( $gs_cards as $card ) : ?>
                <div class="support-card">
                    <div class="support-card-icon">
                        <?php echo skillignative_contact_support_icon( $card['icon'] ?? 'course' ); ?>
                    </div>
                    <h3 class="support-card-title"><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
                    <p class="support-card-description"><?php echo esc_html( $card['description'] ?? '' ); ?></p>
                    <?php if ( ! empty( $card['email'] ) ) : ?>
                    <a href="mailto:<?php echo esc_attr( $card['email'] ); ?>" class="support-card-email">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <span><?php echo esc_html( $card['email'] ); ?></span>
                    </a>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Career CTA Section -->
    <section class="career-cta-section">
        <div class="career-cta-container">
            <div class="career-cta-card">
                <div class="cta-badge">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                    <span><?php echo esc_html( $cta_badge_text ); ?></span>
                </div>

                <h2 class="cta-title"><?php echo esc_html( $cta_title ); ?></h2>

                <p class="cta-description">
                    <?php echo esc_html( $cta_description ); ?>
                </p>

                <a href="<?php echo esc_url( $cta_btn_url ); ?>" class="cta-button"><?php echo esc_html( $cta_btn_text ); ?></a>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
