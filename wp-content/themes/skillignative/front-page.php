<?php
/**
 * Template Name: Homepage
 *
 * The front page template.
 * All homepage sections are rendered here.
 * Sections are made dynamic one by one using custom meta fields.
 *
 * @package Skillignative
 */

get_header();

// Get the page ID (front page)
$page_id = get_the_ID();

// ========== HERO SECTION DATA (DYNAMIC) ==========
$hero_title           = get_post_meta( $page_id, '_hero_title', true ) ?: 'Professional Courses For';
$hero_title_highlight = get_post_meta( $page_id, '_hero_title_highlight', true ) ?: 'Highly Rewarding Career';
$hero_subtitle        = get_post_meta( $page_id, '_hero_subtitle', true ) ?: 'Courses to Enhance Your Career';
$hero_image_left_id   = get_post_meta( $page_id, '_hero_image_left', true );
$hero_image_right_id  = get_post_meta( $page_id, '_hero_image_right', true );
$hero_btn_primary_text = get_post_meta( $page_id, '_hero_btn_primary_text', true ) ?: 'Explore Programs';
$hero_btn_primary_url  = get_post_meta( $page_id, '_hero_btn_primary_url', true ) ?: '#';
$hero_btn_secondary_text = get_post_meta( $page_id, '_hero_btn_secondary_text', true ) ?: 'Contact Us';
$hero_btn_secondary_url  = get_post_meta( $page_id, '_hero_btn_secondary_url', true ) ?: '#';
$hero_disclaimer      = get_post_meta( $page_id, '_hero_disclaimer', true ) ?: 'Courses aligned with <span>industry standards</span> and <span>accredited by recognized institutions</span>';

$hero_stat1_value = get_post_meta( $page_id, '_hero_stat1_value', true ) ?: '4.8+';
$hero_stat1_label = get_post_meta( $page_id, '_hero_stat1_label', true ) ?: 'Google Rating';
$hero_stat2_value = get_post_meta( $page_id, '_hero_stat2_value', true ) ?: '550+';
$hero_stat2_label = get_post_meta( $page_id, '_hero_stat2_label', true ) ?: 'Hiring Partners';
$hero_stat3_value = get_post_meta( $page_id, '_hero_stat3_value', true ) ?: '24 x 7';
$hero_stat3_label = get_post_meta( $page_id, '_hero_stat3_label', true ) ?: 'Support';
$hero_stat4_value = get_post_meta( $page_id, '_hero_stat4_value', true ) ?: '55,000+';
$hero_stat4_label = get_post_meta( $page_id, '_hero_stat4_label', true ) ?: 'Career Transition';

$hero_badge_number = get_post_meta( $page_id, '_hero_badge_number', true ) ?: '15,000+';
$hero_badge_text   = get_post_meta( $page_id, '_hero_badge_text', true ) ?: 'Trainings';

// Image URLs (fallback to theme assets)
$hero_img_left_url  = $hero_image_left_id ? wp_get_attachment_url( $hero_image_left_id ) : get_template_directory_uri() . '/assets/images/IIM-SKILLS-home.webp';
$hero_img_right_url = $hero_image_right_id ? wp_get_attachment_url( $hero_image_right_id ) : get_template_directory_uri() . '/assets/images/IIMSKILLS-Home1.webp';

$assets = get_template_directory_uri() . '/assets';
?>

    <!-- Hero Section (DYNAMIC) -->
    <section class="hero">
        <div class="hero-container">
            <!-- Left Image -->
            <div class="hero-image hero-image-left">
                <img src="<?php echo esc_url( $hero_img_left_url ); ?>" alt="Professional">
                <div class="floating-icon icon-check">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M20 6L9 17L4 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="floating-icon icon-chart">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                        <rect x="3" y="12" width="4" height="9" fill="#FBBF24"/>
                        <rect x="10" y="8" width="4" height="13" fill="#34D399"/>
                        <rect x="17" y="4" width="4" height="17" fill="#60A5FA"/>
                    </svg>
                </div>
            </div>

            <!-- Center Content -->
            <div class="hero-content">
                <h1 class="hero-title">
                    <?php echo esc_html( $hero_title ); ?> <span><?php echo esc_html( $hero_title_highlight ); ?></span>
                </h1>
                <p class="hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>

                <!-- Stats Bar -->
                <div class="stats-bar">
                    <div class="stat-item">
                        <div class="stat-top">
                            <span class="stat-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d4a900" stroke-width="1.5">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                                </svg>
                            </span>
                            <span class="stat-value"><?php echo esc_html( $hero_stat1_value ); ?></span>
                        </div>
                        <div class="stat-label"><?php echo esc_html( $hero_stat1_label ); ?></div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <div class="stat-top">
                            <span class="stat-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                            </span>
                            <span class="stat-value"><?php echo esc_html( $hero_stat2_value ); ?></span>
                        </div>
                        <div class="stat-label"><?php echo esc_html( $hero_stat2_label ); ?></div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <div class="stat-top">
                            <span class="stat-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                            </span>
                            <span class="stat-value"><?php echo esc_html( $hero_stat3_value ); ?></span>
                        </div>
                        <div class="stat-label"><?php echo esc_html( $hero_stat3_label ); ?></div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <div class="stat-top">
                            <span class="stat-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d4a900" stroke-width="1.5">
                                    <circle cx="12" cy="8" r="7"/>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
                                </svg>
                            </span>
                            <span class="stat-value"><?php echo esc_html( $hero_stat4_value ); ?></span>
                        </div>
                        <div class="stat-label"><?php echo esc_html( $hero_stat4_label ); ?></div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="hero-buttons">
                    <a href="<?php echo esc_url( $hero_btn_primary_url ); ?>" class="btn btn-primary"><?php echo esc_html( $hero_btn_primary_text ); ?></a>
                    <a href="<?php echo esc_url( $hero_btn_secondary_url ); ?>" class="btn btn-outline"><?php echo esc_html( $hero_btn_secondary_text ); ?></a>
                </div>

                <!-- Bottom Text -->
                <p class="hero-disclaimer">
                    <?php echo wp_kses_post( $hero_disclaimer ); ?>
                </p>
            </div>

            <!-- Right Image -->
            <div class="hero-image hero-image-right">
                <img src="<?php echo esc_url( $hero_img_right_url ); ?>" alt="Professional">
                <div class="floating-badge">
                    <span class="badge-number"><?php echo esc_html( $hero_badge_number ); ?></span>
                    <span class="badge-text"><?php echo esc_html( $hero_badge_text ); ?></span>
                </div>
                <div class="floating-icon icon-signal">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <path d="M5 12.55a11 11 0 0 1 14.08 0"/>
                        <path d="M1.42 9a16 16 0 0 1 21.16 0"/>
                        <path d="M8.53 16.11a6 6 0 0 1 6.95 0"/>
                        <circle cx="12" cy="20" r="1"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== SECTIONS BELOW ARE STATIC (will be made dynamic one by one) ========== -->

    <!-- Logo Marquee Section (DYNAMIC) -->
    <?php
    $marquee_logos = get_post_meta( $page_id, '_marquee_logos', true );
    // Fallback to theme default logos if none set
    if ( ! is_array( $marquee_logos ) || empty( $marquee_logos ) ) {
        $default_logos = array(
            array( 'src' => $assets . '/images/MSME.svg', 'alt' => 'MSME' ),
            array( 'src' => $assets . '/images/AAPC.svg', 'alt' => 'AAPC' ),
            array( 'src' => $assets . '/images/Google.svg', 'alt' => 'Google' ),
            array( 'src' => $assets . '/images/Amazon.svg', 'alt' => 'Amazon' ),
            array( 'src' => $assets . '/images/Adobe.svg', 'alt' => 'Adobe' ),
            array( 'src' => $assets . '/images/Hubspot.svg', 'alt' => 'Hubspot' ),
        );
        $use_defaults = true;
    } else {
        $use_defaults = false;
    }
    ?>
    <section class="logo-marquee">
        <div class="marquee-track">
            <?php for ( $set = 0; $set < 2; $set++ ) : ?>
            <div class="marquee-content">
                <?php if ( $use_defaults ) : ?>
                    <?php foreach ( $default_logos as $logo ) : ?>
                        <div class="logo-item"><img src="<?php echo esc_url( $logo['src'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>"></div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ( $marquee_logos as $logo ) :
                        $logo_url = wp_get_attachment_url( $logo['id'] );
                        if ( ! $logo_url ) continue;
                    ?>
                        <div class="logo-item"><img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>"></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <?php endfor; ?>
        </div>
    </section>

    <!-- Success Stories Section (DYNAMIC) -->
    <?php
    $stories_title           = get_post_meta( $page_id, '_stories_title', true ) ?: 'Hear it from';
    $stories_title_highlight = get_post_meta( $page_id, '_stories_title_highlight', true ) ?: 'our Alumni';
    $stories_subtitle        = get_post_meta( $page_id, '_stories_subtitle', true ) ?: 'With alumni across 35+ countries, we are proud to be rated 4.8/5 and achieve a Net Promoter Score of 9.3/10, reflecting their trust and satisfaction with our programs.';

    $rating_badges = get_post_meta( $page_id, '_stories_rating_badges', true );
    if ( ! is_array( $rating_badges ) || empty( $rating_badges ) ) {
        $rating_badges = array(
            array( 'score' => '4.9', 'brand' => 'Google', 'css_class' => 'google-text' ),
            array( 'score' => '5.0', 'brand' => 'COURSE REPORT', 'css_class' => 'course-report' ),
            array( 'score' => '4.2', 'brand' => 'GLASSDOOR', 'css_class' => 'glassdoor' ),
        );
    }

    $story_cards = get_post_meta( $page_id, '_stories_cards', true );
    $use_default_stories = ! is_array( $story_cards ) || empty( $story_cards );
    ?>
    <section class="success-stories">
        <div class="success-stories-container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html( $stories_title ); ?> <span><?php echo esc_html( $stories_title_highlight ); ?></span></h2>
                <p class="section-subtitle"><?php echo esc_html( $stories_subtitle ); ?></p>
                <div class="rating-badges">
                    <?php foreach ( $rating_badges as $badge ) :
                        $brand_class = ! empty( $badge['css_class'] ) ? ' ' . esc_attr( $badge['css_class'] ) : '';
                        // Handle line breaks for brands like "COURSE REPORT" -> "COURSE<br>REPORT"
                        $brand_display = esc_html( $badge['brand'] );
                        if ( stripos( $badge['brand'], ' ' ) !== false && in_array( $badge['css_class'], array( 'course-report' ), true ) ) {
                            $brand_display = str_replace( ' ', '<br>', $brand_display );
                        }
                    ?>
                    <div class="rating-badge">
                        <span class="rating-score"><?php echo esc_html( $badge['score'] ); ?><span class="star">&#9733;</span></span>
                        <span class="rating-divider">|</span>
                        <span class="rating-brand<?php echo $brand_class; ?>"><?php echo $brand_display; ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="story-cards">
                <?php if ( $use_default_stories ) : ?>
                    <?php for ( $i = 0; $i < 4; $i++ ) : ?>
                    <div class="story-card">
                        <div class="card-media">
                            <img src="<?php echo $assets; ?>/images/success-story2-thumbnail.png" alt="Success Story" class="card-thumbnail">
                            <video src="<?php echo $assets; ?>/videos/iimskills-video-1.mp4" class="card-video" muted loop playsinline preload="auto"></video>
                        </div>
                    </div>
                    <?php endfor; ?>
                <?php else : ?>
                    <?php foreach ( $story_cards as $card ) :
                        $thumb_url = $card['thumb_id'] ? wp_get_attachment_url( $card['thumb_id'] ) : $assets . '/images/success-story2-thumbnail.png';
                        $video_url = $card['video_id'] ? wp_get_attachment_url( $card['video_id'] ) : '';
                        $alt_text  = ! empty( $card['alt'] ) ? $card['alt'] : 'Success Story';
                    ?>
                    <div class="story-card">
                        <div class="card-media">
                            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>" class="card-thumbnail">
                            <?php if ( $video_url ) : ?>
                                <video src="<?php echo esc_url( $video_url ); ?>" class="card-video" muted loop playsinline preload="auto"></video>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Accreditation Banner Section (DYNAMIC) -->
    <?php
    $accred_text     = get_post_meta( $page_id, '_accred_text', true ) ?: 'Our Courses Are Designed In Alignment With Industry Standards And Are Accredited Or Approved By Recognized Institutions';
    $accred_image_id = get_post_meta( $page_id, '_accred_image', true );
    $accred_img_url  = $accred_image_id ? wp_get_attachment_url( $accred_image_id ) : $assets . '/images/iim-skills-image-2.png';
    ?>
    <section class="accreditation-banner">
        <div class="accreditation-container">
            <div class="banner-box">
                <span class="dot dot-1"></span>
                <span class="dot dot-2"></span>
                <span class="dot dot-3"></span>
                <span class="dot dot-4"></span>
                <span class="dot dot-5"></span>
                <span class="dot dot-6"></span>
                <div class="banner-content">
                    <h3 class="banner-text"><?php echo esc_html( $accred_text ); ?></h3>
                </div>
                <div class="banner-image">
                    <img src="<?php echo esc_url( $accred_img_url ); ?>" alt="Courses">
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Courses Section (DYNAMIC - CPT) -->
    <?php
    $courses_title           = get_post_meta( $page_id, '_courses_title', true ) ?: 'Popular';
    $courses_title_highlight = get_post_meta( $page_id, '_courses_title_highlight', true ) ?: 'Courses';

    // Get only categories that have at least one FEATURED course
    $all_categories = get_terms( array(
        'taxonomy'   => 'course_category',
        'hide_empty' => true,
        'orderby'    => 'term_order',
    ) );
    $course_categories = array();
    if ( ! empty( $all_categories ) && ! is_wp_error( $all_categories ) ) {
        foreach ( $all_categories as $cat ) {
            $check = new WP_Query( array(
                'post_type'      => 'course',
                'posts_per_page' => 1,
                'fields'         => 'ids',
                'tax_query'      => array(
                    array( 'taxonomy' => 'course_category', 'field' => 'term_id', 'terms' => $cat->term_id ),
                ),
                'meta_query'     => array(
                    array( 'key' => '_course_featured', 'value' => '1' ),
                ),
            ) );
            if ( $check->have_posts() ) {
                $course_categories[] = $cat;
            }
        }
    }
    $has_courses = ! empty( $course_categories );
    ?>
    <section class="popular-courses">
        <div class="courses-container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html( $courses_title ); ?> <span><?php echo esc_html( $courses_title_highlight ); ?></span></h2>
            </div>

            <?php if ( $has_courses ) : ?>
                <!-- Dynamic Tabs from Course Categories -->
                <div class="tabs-nav">
                    <?php foreach ( $course_categories as $index => $cat ) : ?>
                        <button class="tab-btn<?php echo 0 === $index ? ' active' : ''; ?>" data-tab="<?php echo esc_attr( $cat->slug ); ?>"><?php echo esc_html( $cat->name ); ?></button>
                    <?php endforeach; ?>
                </div>

                <div class="tabs-content">
                    <?php foreach ( $course_categories as $index => $cat ) :
                        $courses = new WP_Query( array(
                            'post_type'      => 'course',
                            'posts_per_page' => -1,
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'course_category',
                                    'field'    => 'term_id',
                                    'terms'    => $cat->term_id,
                                ),
                            ),
                            'meta_query'     => array(
                                array(
                                    'key'   => '_course_featured',
                                    'value' => '1',
                                ),
                            ),
                        ) );
                    ?>
                    <div class="tab-panel<?php echo 0 === $index ? ' active' : ''; ?>" id="<?php echo esc_attr( $cat->slug ); ?>">
                        <div class="course-cards">
                            <?php while ( $courses->have_posts() ) : $courses->the_post();
                                $bg_color  = get_post_meta( get_the_ID(), '_course_bg_color', true ) ?: '#f5f0c8';
                                $duration  = get_post_meta( get_the_ID(), '_course_duration', true );
                                $details   = get_post_meta( get_the_ID(), '_course_details', true );
                                $btn_text  = get_post_meta( get_the_ID(), '_course_btn_text', true ) ?: 'More Info';
                                $btn_url   = get_post_meta( get_the_ID(), '_course_btn_url', true ) ?: '#';
                                $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
                            ?>
                            <div class="course-card">
                                <div class="card-image" style="background: <?php echo esc_attr( $bg_color ); ?>;">
                                    <?php if ( $thumb_url ) : ?>
                                        <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <h4 class="course-title"><?php the_title(); ?></h4>
                                    <?php if ( $duration ) : ?>
                                        <p class="course-duration">Duration: <?php echo esc_html( $duration ); ?></p>
                                    <?php endif; ?>
                                    <?php if ( $details ) : ?>
                                        <p class="course-details"><?php echo wp_kses_post( $details ); ?></p>
                                    <?php endif; ?>
                                    <a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn-primary btn-block"><?php echo esc_html( $btn_text ); ?></a>
                                </div>
                            </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            <?php else : ?>
                <!-- Fallback: Static courses when no CPT data exists -->
                <div class="tabs-nav">
                    <button class="tab-btn active" data-tab="trending">Trending</button>
                </div>
                <div class="tabs-content">
                    <div class="tab-panel active" id="trending">
                        <div class="course-cards">
                            <?php
                            $fallback_courses = array(
                                array( 'title' => 'Digital Marketing Master Course', 'img' => 'digital-marketing.png', 'bg' => '#f5f0c8', 'duration' => '3-7 Months', 'details' => 'Internship: 2 Months &nbsp; Fee Start: INR 59,900 + 18% GST' ),
                                array( 'title' => 'Data Analytics Master Course', 'img' => 'data-analytics.png', 'bg' => '#e8f4fc', 'duration' => '6 Months', 'details' => 'Internship: 1 Month &nbsp; Fee Start: INR 49,900 + 18% GST' ),
                                array( 'title' => 'Financial Modeling Master Course', 'img' => 'financial-modeling.png', 'bg' => '#f0e6f5', 'duration' => '5 Months', 'details' => 'Internship: 2 Month &nbsp; Fee Start: INR 49,900 + 18% GST' ),
                                array( 'title' => 'Investment Banking Master Course', 'img' => 'investment-banking.png', 'bg' => '#fef3e6', 'duration' => '5 Months', 'details' => 'Internship: 2 Month &nbsp; Fee Start: INR 49,900 + 18% GST' ),
                            );
                            foreach ( $fallback_courses as $fc ) : ?>
                            <div class="course-card">
                                <div class="card-image" style="background: <?php echo $fc['bg']; ?>;">
                                    <img src="<?php echo $assets; ?>/images/<?php echo $fc['img']; ?>" alt="<?php echo esc_attr( $fc['title'] ); ?>">
                                </div>
                                <div class="card-body">
                                    <h4 class="course-title"><?php echo esc_html( $fc['title'] ); ?></h4>
                                    <p class="course-duration">Duration: <?php echo esc_html( $fc['duration'] ); ?></p>
                                    <p class="course-details"><?php echo $fc['details']; ?></p>
                                    <a href="#" class="btn btn-primary btn-block">More Info</a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Alumni Brands Section (DYNAMIC) -->
    <?php
    $alumni_title           = get_post_meta( $page_id, '_alumni_title', true ) ?: 'Our Alumni Are';
    $alumni_title_highlight = get_post_meta( $page_id, '_alumni_title_highlight', true ) ?: 'Working @ Top Brands';
    $alumni_cards           = get_post_meta( $page_id, '_alumni_cards', true );
    $use_default_alumni     = ! is_array( $alumni_cards ) || empty( $alumni_cards );

    if ( $use_default_alumni ) {
        $alumni_cards = array(
            array( 'photo_id' => 0, 'name' => 'Tanirika Mehra', 'company' => 'BARCLAYS', 'css_class' => 'barclays-logo', 'accent' => '#fce4e8', 'img' => 'TanirikaMehra.png' ),
            array( 'photo_id' => 0, 'name' => 'Iraja Rathi', 'company' => 'Google', 'css_class' => 'google-logo', 'accent' => '#fef9e6', 'img' => 'Iraja.png' ),
            array( 'photo_id' => 0, 'name' => 'Sachin Sharma', 'company' => 'Myntra', 'css_class' => 'myntra-logo', 'accent' => '#f3e8fa', 'img' => 'Sachin.png' ),
            array( 'photo_id' => 0, 'name' => 'Ronak Deshmukh', 'company' => 'amazon', 'css_class' => 'amazon-logo', 'accent' => '#e6f3fe', 'img' => 'Ronak.png' ),
        );
    }
    ?>
    <section class="alumni-brands">
        <div class="alumni-brands-container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html( $alumni_title ); ?> <span><?php echo esc_html( $alumni_title_highlight ); ?></span></h2>
            </div>
            <div class="alumni-marquee-wrapper">
                <div class="alumni-marquee-track">
                    <?php for ( $set = 0; $set < 2; $set++ ) : ?>
                    <div class="alumni-marquee-content">
                        <?php foreach ( $alumni_cards as $card ) :
                            if ( $use_default_alumni ) {
                                $photo_url = $assets . '/images/' . $card['img'];
                            } else {
                                $photo_url = $card['photo_id'] ? wp_get_attachment_url( $card['photo_id'] ) : '';
                            }
                            $logo_class = ! empty( $card['css_class'] ) ? ' ' . esc_attr( $card['css_class'] ) : '';
                        ?>
                        <div class="alumni-card" style="--accent: <?php echo esc_attr( $card['accent'] ); ?>;">
                            <div class="card-accent"></div>
                            <div class="company-logo"><span class="<?php echo esc_attr( trim( $logo_class ) ); ?>"><?php echo esc_html( $card['company'] ); ?></span></div>
                            <?php if ( $photo_url ) : ?>
                            <div class="alumni-photo"><img src="<?php echo esc_url( $photo_url ); ?>" alt="<?php echo esc_attr( $card['name'] ); ?>"></div>
                            <?php endif; ?>
                            <h4 class="alumni-name"><?php echo esc_html( $card['name'] ); ?></h4>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievements Section (DYNAMIC) -->
    <?php
    $achieve_title           = get_post_meta( $page_id, '_achieve_title', true ) ?: 'Our';
    $achieve_title_highlight = get_post_meta( $page_id, '_achieve_title_highlight', true ) ?: 'Achievements';
    $achieve_cards           = get_post_meta( $page_id, '_achieve_cards', true );
    if ( ! is_array( $achieve_cards ) || empty( $achieve_cards ) ) {
        $achieve_cards = array(
            array( 'title' => '15,500+ Trainings', 'desc' => 'Delivered more than 15,500+ trainings across various domains.', 'style' => 'card-style-1' ),
            array( 'title' => '55,000+ Trained', 'desc' => 'We have trained more than 55k+ students in the past 11 years & have successfully placed them.', 'style' => 'card-style-2' ),
            array( 'title' => 'International Certification', 'desc' => 'Get rewarded with an Internationally acceptable certification.', 'style' => 'card-style-3' ),
            array( 'title' => 'Global Placement', 'desc' => 'Get interview assistance and placement support from top global companies.', 'style' => 'card-style-4' ),
        );
    }
    // SVG icons mapped to card styles
    $achieve_icons = array(
        'card-style-1' => '<div class="achievement-icon"><svg width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg></div>',
        'card-style-2' => '<div class="achievement-icon-circle"><svg width="45" height="45" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>',
        'card-style-3' => '<div class="achievement-icon-circle"><svg width="45" height="45" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/><circle cx="16" cy="15" r="2"/></svg></div>',
        'card-style-4' => '<div class="achievement-icon"><svg width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>',
    );
    ?>
    <section class="achievements">
        <div class="achievements-container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html( $achieve_title ); ?> <span><?php echo esc_html( $achieve_title_highlight ); ?></span></h2>
            </div>
            <div class="achievement-cards">
                <?php foreach ( $achieve_cards as $card ) :
                    $style = isset( $card['style'] ) ? $card['style'] : 'card-style-1';
                    $icon  = isset( $achieve_icons[ $style ] ) ? $achieve_icons[ $style ] : $achieve_icons['card-style-1'];
                ?>
                <div class="achievement-card <?php echo esc_attr( $style ); ?>">
                    <?php echo $icon; ?>
                    <h3 class="achievement-title"><?php echo esc_html( $card['title'] ); ?></h3>
                    <p class="achievement-desc"><?php echo esc_html( $card['desc'] ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Master Class Section (DYNAMIC with Auto Weekend Dates) -->
    <?php
    $mc_title           = get_post_meta( $page_id, '_mc_title', true ) ?: 'Join Our';
    $mc_title_highlight = get_post_meta( $page_id, '_mc_title_highlight', true ) ?: 'Master Class Today';
    $mc_cards           = get_post_meta( $page_id, '_mc_cards', true );
    $use_default_mc     = ! is_array( $mc_cards ) || empty( $mc_cards );

    // Calculate 3 upcoming weekends (IST)
    $ist  = new DateTimeZone( 'Asia/Kolkata' );
    $now  = new DateTime( 'now', $ist );
    $sat1 = clone $now;
    if ( (int) $now->format( 'N' ) < 6 ) {
        $sat1->modify( 'next Saturday' );
    } elseif ( (int) $now->format( 'N' ) == 7 ) {
        $sat1->modify( 'next Saturday' );
    }
    $sun1 = clone $sat1; $sun1->modify( '+1 day' );
    $sat2 = clone $sat1; $sat2->modify( '+7 days' );
    $sun2 = clone $sat2; $sun2->modify( '+1 day' );
    $sat3 = clone $sat2; $sat3->modify( '+7 days' );
    $sun3 = clone $sat3; $sun3->modify( '+1 day' );

    $mc_date_map = array(
        'auto_sat_1' => $sat1, 'auto_sun_1' => $sun1,
        'auto_sat_2' => $sat2, 'auto_sun_2' => $sun2,
        'auto_sat_3' => $sat3, 'auto_sun_3' => $sun3,
        // Legacy support
        'auto_sat' => $sat1, 'auto_sun' => $sun1,
    );

    // Helper to resolve card date
    function skillignative_resolve_mc_date( $card, $mc_date_map ) {
        $mode = isset( $card['date_mode'] ) ? $card['date_mode'] : 'auto_sat_1';
        if ( isset( $mc_date_map[ $mode ] ) ) {
            return $mc_date_map[ $mode ]->format( 'F jS (l)' );
        }
        // Manual mode
        $manual = isset( $card['manual_date'] ) ? $card['manual_date'] : '';
        if ( $manual ) {
            $d = DateTime::createFromFormat( 'Y-m-d', $manual );
            return $d ? $d->format( 'F jS (l)' ) : $manual;
        }
        return $mc_date_map['auto_sat_1']->format( 'F jS (l)' );
    }

    if ( $use_default_mc ) {
        // 6 cards: 1 per day across 3 upcoming weekends (Sat, Sun, Sat, Sun, Sat, Sun)
        $mc_cards = array(
            array( 'image_id' => 0, 'date_mode' => 'auto_sat_1', 'manual_date' => '', 'time' => '03:00 PM - 04:30 PM (IST)', 'btn_url' => '#' ),
            array( 'image_id' => 0, 'date_mode' => 'auto_sun_1', 'manual_date' => '', 'time' => '03:00 PM - 04:30 PM (IST)', 'btn_url' => '#' ),
            array( 'image_id' => 0, 'date_mode' => 'auto_sat_2', 'manual_date' => '', 'time' => '03:00 PM - 04:30 PM (IST)', 'btn_url' => '#' ),
            array( 'image_id' => 0, 'date_mode' => 'auto_sun_2', 'manual_date' => '', 'time' => '03:00 PM - 04:30 PM (IST)', 'btn_url' => '#' ),
            array( 'image_id' => 0, 'date_mode' => 'auto_sat_3', 'manual_date' => '', 'time' => '03:00 PM - 04:30 PM (IST)', 'btn_url' => '#' ),
            array( 'image_id' => 0, 'date_mode' => 'auto_sun_3', 'manual_date' => '', 'time' => '03:00 PM - 04:30 PM (IST)', 'btn_url' => '#' ),
        );
    }

    $calendar_svg = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>';
    $clock_svg = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>';
    ?>
    <section class="master-class">
        <div class="master-class-container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html( $mc_title ); ?> <span><?php echo esc_html( $mc_title_highlight ); ?></span></h2>
            </div>
            <div class="demo-slider-container">
                <button class="demo-nav demo-nav-prev">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <div class="demo-marquee-wrapper">
                    <div class="demo-marquee-track">
                        <?php for ( $set = 0; $set < 2; $set++ ) : ?>
                        <div class="demo-marquee-content">
                            <?php foreach ( $mc_cards as $card ) :
                                $card_img = $card['image_id'] ? wp_get_attachment_url( $card['image_id'] ) : $assets . '/images/DSMC-demo.jpg';
                                $card_date = skillignative_resolve_mc_date( $card, $mc_date_map );
                                $card_time = ! empty( $card['time'] ) ? $card['time'] : '03:00 PM - 04:30 PM (IST)';
                                $card_url  = ! empty( $card['btn_url'] ) ? $card['btn_url'] : '#';
                            ?>
                            <div class="demo-card">
                                <div class="demo-card-header">
                                    <img src="<?php echo esc_url( $card_img ); ?>" alt="Demo Class">
                                </div>
                                <div class="demo-card-footer">
                                    <div class="demo-schedule">
                                        <div class="schedule-item">
                                            <?php echo $calendar_svg; ?>
                                            Date: <?php echo esc_html( $card_date ); ?>
                                        </div>
                                        <div class="schedule-item">
                                            <?php echo $clock_svg; ?>
                                            Time: <?php echo esc_html( $card_time ); ?>
                                        </div>
                                    </div>
                                    <a href="<?php echo esc_url( $card_url ); ?>" class="btn btn-primary btn-block">Join Demo</a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <button class="demo-nav demo-nav-next">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Key Reasons Section (DYNAMIC) -->
    <?php
    $kr_title           = get_post_meta( $page_id, '_kr_title', true ) ?: 'KEY REASONS TO';
    $kr_title_highlight = get_post_meta( $page_id, '_kr_title_highlight', true ) ?: 'JOIN IIM SKILLS';
    $kr_image_id        = get_post_meta( $page_id, '_kr_image', true );
    $kr_img_url         = $kr_image_id ? wp_get_attachment_url( $kr_image_id ) : $assets . '/images/keyreason.png';
    $kr_features        = get_post_meta( $page_id, '_kr_features', true );
    if ( ! is_array( $kr_features ) || empty( $kr_features ) ) {
        $kr_features = array(
            "World's Best Faculty & Industry Experts", 'Lifetime LMS Access', 'Guaranteed Virtual Internships',
            'Placement Assurance Programs', 'Direct Mentorship with the Faculty', '100% Money Back Guarantee*',
            '24*7 Learning Support', 'Portfolio Building', 'Live Interactive Trainings', 'Practical Assignments',
        );
    }
    // SVG icons pool (cycles through for each feature)
    $kr_icons = array(
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>',
    );
    $half = ceil( count( $kr_features ) / 2 );
    ?>
    <section class="key-reasons">
        <div class="key-reasons-container">
            <div class="reasons-content">
                <h2 class="section-title"><?php echo esc_html( $kr_title ); ?> <span><?php echo esc_html( $kr_title_highlight ); ?></span></h2>
                <div class="features-grid">
                    <div class="features-column">
                        <?php for ( $i = 0; $i < $half; $i++ ) : if ( ! isset( $kr_features[ $i ] ) ) continue; ?>
                        <div class="feature-item">
                            <div class="feature-icon"><?php echo $kr_icons[ $i % count( $kr_icons ) ]; ?></div>
                            <span><?php echo esc_html( $kr_features[ $i ] ); ?></span>
                        </div>
                        <?php endfor; ?>
                    </div>
                    <div class="features-column">
                        <?php for ( $i = $half; $i < count( $kr_features ); $i++ ) : ?>
                        <div class="feature-item">
                            <div class="feature-icon"><?php echo $kr_icons[ $i % count( $kr_icons ) ]; ?></div>
                            <span><?php echo esc_html( $kr_features[ $i ] ); ?></span>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <div class="reasons-visual">
                <div class="visual-container">
                    <div class="floating-reason-icon icon-pos-1 rainbow-red"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#FF5252" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
                    <div class="floating-reason-icon icon-pos-2 rainbow-orange"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#FF9800" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg></div>
                    <div class="floating-reason-icon icon-pos-3 rainbow-yellow"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#FFC107" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div>
                    <div class="floating-reason-icon icon-pos-4 rainbow-green"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#4CAF50" stroke-width="1.5"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14v7"/><path d="M5.5 11.5v5a7.5 7.5 0 0 0 13 0v-5"/></svg></div>
                    <div class="floating-reason-icon icon-pos-5 rainbow-blue"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2196F3" stroke-width="1.5"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg></div>
                    <div class="floating-reason-icon icon-pos-6 rainbow-purple"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#9C27B0" stroke-width="1.5"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg></div>
                    <svg class="curved-line" viewBox="0 0 420 480" fill="none">
                        <circle cx="210" cy="240" r="180" stroke="#155dfc" stroke-width="2.5" fill="none" opacity="0.5"/>
                        <circle cx="210" cy="240" r="140" stroke="#3b82f6" stroke-width="2" fill="none" opacity="0.3"/>
                        <circle cx="210" cy="240" r="100" stroke="#155dfc" stroke-width="1.5" fill="none" opacity="0.2"/>
                    </svg>
                    <div class="person-image"><img src="<?php echo esc_url( $kr_img_url ); ?>" alt="Student"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Learner Benefits Section (DYNAMIC) -->
    <?php
    $lb_title           = get_post_meta( $page_id, '_lb_title', true ) ?: 'Learner';
    $lb_title_highlight = get_post_meta( $page_id, '_lb_title_highlight', true ) ?: 'Benefits';
    $lb_pedagogy_title  = get_post_meta( $page_id, '_lb_pedagogy_title', true ) ?: 'World Class Pedagogy';
    $lb_pedagogy_items  = get_post_meta( $page_id, '_lb_pedagogy_items', true );
    if ( ! is_array( $lb_pedagogy_items ) || empty( $lb_pedagogy_items ) ) {
        $lb_pedagogy_items = array( 'Participate in Hackathons & Group Activities', 'Learn with fun Hands-on Exercises & Assignments', "Learn from the World's Best Faculty & Industry Experts" );
    }
    $lb_benefits = get_post_meta( $page_id, '_lb_benefits', true );
    if ( ! is_array( $lb_benefits ) || empty( $lb_benefits ) ) {
        $lb_benefits = array( '4.8/5 Rating', 'Practical Learning', '24*7 Support', '1:1 Mentorship', '55,000+ Career Transition', '550+ Hiring Partners', 'Career Assistance', 'Personalized Guidance' );
    }
    $lb_benefit_icons = array(
        '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><div class="rating-stars"><svg width="16" height="16" viewBox="0 0 24 24" fill="#FFC107" stroke="#FFC107" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="16" height="16" viewBox="0 0 24 24" fill="#FFC107" stroke="#FFC107" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="16" height="16" viewBox="0 0 24 24" fill="#FFC107" stroke="#FFC107" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>',
        '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/><path d="M12 11h.01"/><path d="M12 14l3-3"/></svg>',
        '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/><path d="M16.24 7.76A6 6 0 0 1 12 18a6 6 0 0 1-4.24-10.24"/></svg>',
        '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 10h4M6 14h8"/><rect x="14" y="9" width="4" height="6" rx="1"/></svg>',
        '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><path d="M20 8v6M23 11h-6"/><rect x="17" y="6" width="6" height="4" rx="1"/></svg>',
        '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/><path d="M22 11l-3 3-2-2"/></svg>',
        '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="19" cy="7" r="2"/></svg>',
    );
    $check_svg = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>';
    ?>
    <section class="learner-benefits">
        <div class="benefits-container">
            <h2 class="section-title"><?php echo esc_html( $lb_title ); ?> <span><?php echo esc_html( $lb_title_highlight ); ?></span></h2>
            <div class="benefits-layout">
                <div class="pedagogy-card">
                    <div class="pedagogy-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <h3 class="pedagogy-title"><?php echo esc_html( $lb_pedagogy_title ); ?></h3>
                    <ul class="pedagogy-list">
                        <?php foreach ( $lb_pedagogy_items as $item ) : ?>
                        <li><?php echo $check_svg; ?><span><?php echo esc_html( $item ); ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="benefits-grid">
                    <?php foreach ( $lb_benefits as $i => $benefit ) : ?>
                    <div class="benefit-card">
                        <div class="benefit-icon"><?php echo isset( $lb_benefit_icons[ $i ] ) ? $lb_benefit_icons[ $i ] : $lb_benefit_icons[ $i % count( $lb_benefit_icons ) ]; ?></div>
                        <p class="benefit-label"><?php echo esc_html( $benefit ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Media Presence Section (DYNAMIC) -->
    <?php
    $mp_title           = get_post_meta( $page_id, '_mp_title', true ) ?: 'Media';
    $mp_title_highlight = get_post_meta( $page_id, '_mp_title_highlight', true ) ?: 'Presence';
    $mp_cards           = get_post_meta( $page_id, '_mp_cards', true );
    $use_default_mp     = ! is_array( $mp_cards ) || empty( $mp_cards );

    if ( $use_default_mp ) {
        $mp_cards = array(
            array( 'logo_type' => 'image', 'logo_id' => 0, 'logo_text' => '', 'desc' => 'Which courses are giving jobs as work from home options permanently?', 'img' => 'jagran-josh.png', 'alt' => 'Jagran Josh' ),
            array( 'logo_type' => 'image', 'logo_id' => 0, 'logo_text' => '', 'desc' => '5 qualities you need to become a great content writer - Here are five qualities you need...', 'img' => 'HTTech.png', 'alt' => 'HT Tech' ),
            array( 'logo_type' => 'text', 'logo_id' => 0, 'logo_text' => '<span style="color: #4CAF50;">edu</span><span style="color: #333;">graph</span>', 'desc' => 'Top 10 online courses for Creative Writing: Sharpen your storytelling skills' ),
            array( 'logo_type' => 'text', 'logo_id' => 0, 'logo_text' => '<span style="color: #1a1a2e; font-weight: 700;">Higher<br>Education</span><span style="color: #155dfc; font-size: 12px; font-weight: 400;">REVIEW</span>', 'desc' => '7 Things to Consider Before Taking up a Digital Marketing Course' ),
        );
    }
    ?>
    <section class="media-presence">
        <div class="media-container">
            <h2 class="section-title"><?php echo esc_html( $mp_title ); ?> <span><?php echo esc_html( $mp_title_highlight ); ?></span></h2>
            <div class="media-slider-wrapper">
                <div class="media-slider">
                    <?php for ( $set = 0; $set < 2; $set++ ) : ?>
                        <?php foreach ( $mp_cards as $card ) : ?>
                        <div class="media-card">
                            <?php if ( ( $card['logo_type'] ?? 'image' ) === 'image' ) : ?>
                                <div class="media-logo">
                                    <?php
                                    $logo_url = '';
                                    if ( ! empty( $card['logo_id'] ) ) {
                                        $logo_url = wp_get_attachment_url( $card['logo_id'] );
                                    } elseif ( $use_default_mp && ! empty( $card['img'] ) ) {
                                        $logo_url = $assets . '/images/' . $card['img'];
                                    }
                                    if ( $logo_url ) : ?>
                                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $card['alt'] ?? '' ); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php else : ?>
                                <div class="media-logo-text"><?php echo wp_kses_post( $card['logo_text'] ); ?></div>
                            <?php endif; ?>
                            <p class="media-description"><?php echo esc_html( $card['desc'] ); ?></p>
                        </div>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
