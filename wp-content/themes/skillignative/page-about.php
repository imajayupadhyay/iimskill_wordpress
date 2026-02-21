<?php
/**
 * Template Name: About Us
 *
 * The About page template.
 * All sections are dynamic via custom meta fields.
 * Edit via Pages > About > Edit in the admin.
 *
 * @package Skillignative
 */

get_header();

$page_id = get_the_ID();

// ============================================================
// HERO SECTION DATA
// ============================================================
$ah_badge_text      = get_post_meta( $page_id, '_ah_badge_text', true ) ?: "World's Fastest Growing Ed-Tech Company";
$ah_title           = get_post_meta( $page_id, '_ah_title', true ) ?: "IIM SKILLS is world's fastest growing";
$ah_title_highlight = get_post_meta( $page_id, '_ah_title_highlight', true ) ?: 'Ed-Tech Company';
$ah_description     = get_post_meta( $page_id, '_ah_description', true ) ?: "IIM SKILLS is world's fastest growing Ed-Tech Company. Headquarters in New Delhi India. IIM SKILLS has a presence in 23 Cities in Asia including Dubai & Singapore catering in the Finance, Marketing, Data & multiple educational domains.";
$ah_btn1_text       = get_post_meta( $page_id, '_ah_btn1_text', true ) ?: 'Explore Programs';
$ah_btn1_url        = get_post_meta( $page_id, '_ah_btn1_url', true ) ?: '#';
$ah_btn2_text       = get_post_meta( $page_id, '_ah_btn2_text', true ) ?: 'Contact Us';
$ah_btn2_url        = get_post_meta( $page_id, '_ah_btn2_url', true ) ?: home_url( '/contact/' );

// ============================================================
// ACHIEVEMENTS SECTION DATA
// ============================================================
$aa_title           = get_post_meta( $page_id, '_aa_title', true ) ?: 'Our';
$aa_title_highlight = get_post_meta( $page_id, '_aa_title_highlight', true ) ?: 'Achievements';
$aa_cards           = get_post_meta( $page_id, '_aa_cards', true );
if ( ! is_array( $aa_cards ) || empty( $aa_cards ) ) {
	$aa_cards = array(
		array( 'icon' => 'graduation', 'number' => '55,000+', 'label' => 'Students Trained' ),
		array( 'icon' => 'training',   'number' => '15,500+', 'label' => 'Trainings' ),
		array( 'icon' => 'calendar',   'number' => '550+',    'label' => 'Hiring Partners' ),
		array( 'icon' => 'lock',       'number' => '10+',     'label' => 'Years of Experience' ),
		array( 'icon' => 'chat',       'number' => '24*7',    'label' => 'Support' ),
		array( 'icon' => 'globe',      'number' => '35+',     'label' => 'Countries' ),
		array( 'icon' => 'star',       'number' => '4.9/5',   'label' => 'Google Rating' ),
		array( 'icon' => 'book',       'number' => '15+',     'label' => 'Courses' ),
	);
}

// ============================================================
// HISTORY & MISSION SECTION DATA
// ============================================================
$ahm_title           = get_post_meta( $page_id, '_ahm_title', true ) ?: 'History &';
$ahm_title_highlight = get_post_meta( $page_id, '_ahm_title_highlight', true ) ?: 'Mission';
$ahm_history_label   = get_post_meta( $page_id, '_ahm_history_label', true ) ?: 'HISTORY';
$ahm_history_text    = get_post_meta( $page_id, '_ahm_history_text', true ) ?: 'IIM SKILLS originated after the foundation of a successful educational blog. After reaching 1 million people digitally for career guidance, we decided to launch our first full-fledged training program. We started with the Content Writing Master Course which transformed the entire Content Education Industry.';
$ahm_mission_label   = get_post_meta( $page_id, '_ahm_mission_label', true ) ?: 'MISSION';
$ahm_mission_text    = get_post_meta( $page_id, '_ahm_mission_text', true ) ?: 'Our mission is to provide World Class Education at affordable pricing through our live online and self-paced learning programs. We are continuously working hard to identify various skill development courses that are in demand and can help professionals to upskill professionally in a few months.';
$ahm_image_id        = get_post_meta( $page_id, '_ahm_image_id', true );
$ahm_image_url       = $ahm_image_id ? wp_get_attachment_url( $ahm_image_id ) : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80';

// ============================================================
// MEDIA PRESENCE SECTION DATA
// ============================================================
$amp_title           = get_post_meta( $page_id, '_amp_title', true ) ?: 'Media';
$amp_title_highlight = get_post_meta( $page_id, '_amp_title_highlight', true ) ?: 'Presence';
$amp_cards           = get_post_meta( $page_id, '_amp_cards', true );
$amp_fallback_img1 = get_template_directory_uri() . '/assets/images/jagran-josh.png';
$amp_fallback_img2 = get_template_directory_uri() . '/assets/images/HTTech.png';
if ( ! is_array( $amp_cards ) || empty( $amp_cards ) ) {
	$amp_cards = array(
		array( 'logo_type' => 'fallback', 'image_id' => '', 'fallback_url' => $amp_fallback_img1, 'logo_html' => '', 'description' => 'Which courses are giving jobs as work from home options permanently?' ),
		array( 'logo_type' => 'fallback', 'image_id' => '', 'fallback_url' => $amp_fallback_img2, 'logo_html' => '', 'description' => '5 qualities you need to become a great content writer - Here are five qualities you need...' ),
		array( 'logo_type' => 'text',     'image_id' => '', 'fallback_url' => '', 'logo_html' => '<span style="color:#4CAF50;">edu</span><span style="color:#333;">graph</span>', 'description' => 'Top 10 online courses for Creative Writing: Sharpen your storytelling skills' ),
		array( 'logo_type' => 'text',     'image_id' => '', 'fallback_url' => '', 'logo_html' => '<span style="color:#1a1a2e;font-weight:700;">Higher<br>Education</span><span style="color:#155dfc;font-size:12px;font-weight:400;">REVIEW</span>', 'description' => '7 Things to Consider Before Taking up a Digital Marketing Course' ),
	);
}

// Achievement icon SVG map
function skillignative_achievement_icon( $type ) {
	switch ( $type ) {
		case 'training':
			return '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="8" width="18" height="12" rx="2"/><path d="M7 8V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"/><path d="M12 12v4"/></svg>';
		case 'calendar':
			return '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 3v4M8 3v4M2 11h20"/></svg>';
		case 'lock':
			return '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>';
		case 'chat':
			return '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>';
		case 'globe':
			return '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>';
		case 'star':
			return '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';
		case 'book':
			return '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>';
		default: // graduation
			return '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>';
	}
}
?>

    <!-- About Hero Section -->
    <section class="about-hero">
        <div class="about-hero-background">
            <div class="hero-shape hero-shape-1"></div>
            <div class="hero-shape hero-shape-2"></div>
            <div class="hero-shape hero-shape-3"></div>
        </div>

        <div class="container">
            <div class="about-hero-content">
                <div class="hero-badge">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                    </svg>
                    <span><?php echo esc_html( $ah_badge_text ); ?></span>
                </div>

                <h1 class="about-hero-title">
                    <?php echo esc_html( $ah_title ); ?>
                    <span class="gradient-text"><?php echo esc_html( $ah_title_highlight ); ?></span>
                </h1>

                <p class="about-hero-description">
                    <?php echo esc_html( $ah_description ); ?>
                </p>

                <div class="about-hero-buttons">
                    <a href="<?php echo esc_url( $ah_btn1_url ); ?>" class="btn-primary">
                        <?php echo esc_html( $ah_btn1_text ); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url( $ah_btn2_url ); ?>" class="btn-outline">
                        <?php echo esc_html( $ah_btn2_text ); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="achievements-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">
                    <?php echo esc_html( $aa_title ); ?> <span><?php echo esc_html( $aa_title_highlight ); ?></span>
                </h2>
            </div>

            <div class="achievements-grid">
                <?php foreach ( $aa_cards as $card ) : ?>
                <div class="achievement-card">
                    <div class="achievement-icon">
                        <?php echo skillignative_achievement_icon( $card['icon'] ?? 'graduation' ); ?>
                    </div>
                    <h3 class="achievement-number"><?php echo esc_html( $card['number'] ?? '' ); ?></h3>
                    <p class="achievement-label"><?php echo esc_html( $card['label'] ?? '' ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- History & Mission Section -->
    <section class="history-mission-section">
        <div class="hm-container">
            <div class="section-header">
                <h2 class="section-title">
                    <?php echo esc_html( $ahm_title ); ?> <span><?php echo esc_html( $ahm_title_highlight ); ?></span>
                </h2>
            </div>

            <div class="history-mission-wrapper">
                <div class="history-mission-grid">
                    <!-- History Card -->
                    <div class="hm-card">
                        <div class="hm-icon-wrapper">
                            <div class="hm-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="hm-card-title">OUR <span class="text-blue"><?php echo esc_html( $ahm_history_label ); ?></span></h3>
                        <p class="hm-card-text"><?php echo esc_html( $ahm_history_text ); ?></p>
                    </div>

                    <!-- Mission Card -->
                    <div class="hm-card">
                        <div class="hm-icon-wrapper">
                            <div class="hm-icon">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                    <path d="M2 17l10 5 10-5"/>
                                    <path d="M2 12l10 5 10-5"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="hm-card-title">OUR <span class="text-blue"><?php echo esc_html( $ahm_mission_label ); ?></span></h3>
                        <p class="hm-card-text"><?php echo esc_html( $ahm_mission_text ); ?></p>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="hm-image-section">
                    <div class="hm-image-container">
                        <img src="<?php echo esc_url( $ahm_image_url ); ?>" alt="Team collaboration at IIM SKILLS" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Media Presence Section -->
    <section class="media-presence">
        <div class="media-container">
            <h2 class="section-title"><?php echo esc_html( $amp_title ); ?> <span><?php echo esc_html( $amp_title_highlight ); ?></span></h2>

            <div class="media-slider-wrapper">
                <div class="media-slider">
                    <?php
                    // Render cards twice for seamless infinite loop
                    $render_cards = array_merge( $amp_cards, $amp_cards );
                    foreach ( $render_cards as $card ) :
                        $logo_type   = $card['logo_type'] ?? 'image';
                        $img_url     = ! empty( $card['image_id'] ) ? wp_get_attachment_url( $card['image_id'] ) : '';
                        $fallback    = $card['fallback_url'] ?? '';
                        $display_url = $img_url ?: $fallback;
                    ?>
                    <div class="media-card">
                        <?php if ( ( 'image' === $logo_type || 'fallback' === $logo_type ) && $display_url ) : ?>
                        <div class="media-logo">
                            <img src="<?php echo esc_url( $display_url ); ?>" alt="<?php echo esc_attr( $card['description'] ?? '' ); ?>">
                        </div>
                        <?php elseif ( 'text' === $logo_type && ! empty( $card['logo_html'] ) ) : ?>
                        <div class="media-logo-text">
                            <?php echo wp_kses( $card['logo_html'], array( 'span' => array( 'style' => true ), 'br' => array() ) ); ?>
                        </div>
                        <?php else : ?>
                        <div class="media-logo">
                            <div style="width:100%;height:60px;background:#f0f0f0;border-radius:8px;"></div>
                        </div>
                        <?php endif; ?>
                        <p class="media-description"><?php echo esc_html( $card['description'] ?? '' ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
