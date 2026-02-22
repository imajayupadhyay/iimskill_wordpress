<?php
/**
 * Template Name: Awards Page
 *
 * Dedicated page template for the Awards & Media Coverage listing page.
 * Assign this template to the "Awards" page in Pages > Edit > Template.
 *
 * Matches the design of awards.html exactly.
 *
 * Sections:
 *  1. Hero       — dynamic via Awards Settings
 *  2. Intro      — dynamic via Awards Settings
 *  3. Cards grid — one card per award post
 *
 * @package Skillignative
 */

get_header();

// ── Settings ────────────────────────────────────────────────────────────────
$hero_title       = get_option( '_awards_hero_title',       'Media Presences & News About' );
$hero_highlight   = get_option( '_awards_hero_highlight',   'IIM SKILLS' );
$hero_description = get_option( '_awards_hero_description', 'IIM SKILLS has been consistently featured in top media platforms for its commitment to quality education and industry-relevant training. Recognized for empowering learners across domains like digital marketing, finance, and data analytics, the platform continues to make headlines for its impactful learning outcomes, expert-led programs, and career-focused approach.' );
$cta_text         = get_option( '_awards_hero_cta_text',    'Contact Us' );
$cta_url          = get_option( '_awards_hero_cta_url',     '' ) ?: home_url( '/contact/' );
$hero_image_id    = (int) get_option( '_awards_hero_image_id', 0 );
$intro_title      = get_option( '_awards_intro_title',      'Making News in' );
$intro_highlight  = get_option( '_awards_intro_highlight',  'Education & Career' );

// Hero image URL — fallback to placeholder
$hero_image_url = $hero_image_id
	? wp_get_attachment_image_url( $hero_image_id, 'large' )
	: 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=800&q=80';

// ── Query all award posts ────────────────────────────────────────────────────
$awards_query = new WP_Query( array(
	'post_type'      => 'award',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );
?>

    <!-- Awards Hero Section -->
    <section class="awards-hero-section">
        <div class="awards-hero-container">
            <div class="awards-hero-content">
                <h1 class="awards-hero-title">
                    <?php echo esc_html( $hero_title ); ?>
                    <span class="awards-title-highlight"><?php echo esc_html( $hero_highlight ); ?></span>
                </h1>
                <p class="awards-hero-description">
                    <?php echo esc_html( $hero_description ); ?>
                </p>
                <a href="<?php echo esc_url( $cta_url ); ?>" class="awards-cta-btn">
                    <?php echo esc_html( $cta_text ); ?>
                </a>
            </div>
            <div class="awards-hero-image">
                <div class="awards-image-card">
                    <img src="<?php echo esc_url( $hero_image_url ); ?>" alt="Media Coverage">
                </div>
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="awards-intro-section">
        <div class="awards-intro-container">
            <h2 class="awards-intro-title">
                <?php echo esc_html( $intro_title ); ?>
                <span class="awards-intro-highlight"><?php echo esc_html( $intro_highlight ); ?></span>
            </h2>
        </div>
    </section>

    <!-- Awards Grid -->
    <section class="awards-grid-section">
        <div class="awards-grid-container">
            <div class="awards-grid-wrapper">

                <?php if ( $awards_query->have_posts() ) :
                    while ( $awards_query->have_posts() ) :
                        $awards_query->the_post();

                        $external_url = get_post_meta( get_the_ID(), '_award_external_url', true );

                        $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
                        $thumb_alt = get_the_title();

                        // Excerpt: use manual excerpt or auto-generate from content
                        $excerpt = get_the_excerpt();
                        if ( ! $excerpt ) {
                            $excerpt = wp_trim_words( get_the_content(), 20, '...' );
                        }
                        ?>

                        <div class="awards-media-card">
                            <div class="awards-card-image-wrapper">
                                <?php if ( $thumb_url ) : ?>
                                    <img src="<?php echo esc_url( $thumb_url ); ?>"
                                        alt="<?php echo esc_attr( $thumb_alt ); ?>"
                                        class="awards-media-logo">
                                <?php else : ?>
                                    <!-- Placeholder when no image is set -->
                                    <div style="display:flex;align-items:center;justify-content:center;width:100%;height:100%;">
                                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5">
                                            <rect x="3" y="3" width="18" height="18" rx="3"/>
                                            <circle cx="8.5" cy="8.5" r="1.5"/>
                                            <polyline points="21 15 16 10 5 21"/>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="awards-card-body">
                                <h3 class="awards-card-title"><?php the_title(); ?></h3>
                                <p class="awards-card-desc"><?php echo esc_html( $excerpt ); ?></p>
                                <?php if ( $external_url ) : ?>
                                <a href="<?php echo esc_url( $external_url ); ?>"
                                    class="awards-read-link"
                                    target="_blank" rel="noopener noreferrer">
                                    Read More &rarr;
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <div style="grid-column:1/-1;text-align:center;padding:80px 20px;color:#888;">
                        <p style="font-size:18px;font-weight:600;">No awards or media coverage added yet.</p>
                        <p style="font-size:15px;margin-top:8px;">
                            <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=award' ) ); ?>" style="color:#155dfc;">
                                Add your first award &rarr;
                            </a>
                        </p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

<?php get_footer(); ?>
