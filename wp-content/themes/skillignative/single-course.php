<?php
/**
 * Template for single Course CPT pages.
 *
 * Matches the static course-detail.html design, section by section.
 * All content is managed via Course Detail meta boxes in the admin.
 *
 * @package Skillignative
 */

get_header();

/* ── Pull the current course post ── */
$post_id = get_the_ID();
?>

<!-- ================================================================
     SECTION 1 – HERO
     ================================================================ -->
<?php
/* ── meta values with fallbacks ── */
$badge_text      = get_post_meta( $post_id, '_cd_hero_badge_text',      true ) ?: 'GOVT. RECOGNIZED CERTIFICATION';
$title_plain     = get_post_meta( $post_id, '_cd_hero_title_plain',     true ) ?: get_the_title();
$title_hl        = get_post_meta( $post_id, '_cd_hero_title_highlight', true ) ?: '';
$subtitle_plain  = get_post_meta( $post_id, '_cd_hero_subtitle_plain',  true ) ?: '';
$subtitle_hl     = get_post_meta( $post_id, '_cd_hero_subtitle_hl',     true ) ?: '';
$stat1_num       = get_post_meta( $post_id, '_cd_hero_stat1_num',       true ) ?: '4.9/5';
$stat1_label     = get_post_meta( $post_id, '_cd_hero_stat1_label',     true ) ?: 'Rated by 3000+ Alumni';
$stat2_num       = get_post_meta( $post_id, '_cd_hero_stat2_num',       true ) ?: '550+';
$stat2_label     = get_post_meta( $post_id, '_cd_hero_stat2_label',     true ) ?: 'Hiring Partners Globally';
$features        = get_post_meta( $post_id, '_cd_hero_features',        true );
$hired_label     = get_post_meta( $post_id, '_cd_hero_hired_label',     true ) ?: 'TOP GRADUATES HIRED BY';
$hired_logos     = get_post_meta( $post_id, '_cd_hero_hired_logos',     true );
$form_title      = get_post_meta( $post_id, '_cd_hero_form_title',      true ) ?: 'Get Complete Details';
$form_subtitle   = get_post_meta( $post_id, '_cd_hero_form_subtitle',   true ) ?: 'About The Course';
$form_btn_text   = get_post_meta( $post_id, '_cd_hero_form_btn_text',   true ) ?: 'Download Brochure';
$whatsapp_url    = get_post_meta( $post_id, '_cd_hero_whatsapp_url',    true ) ?: '#';
$whatsapp_text   = get_post_meta( $post_id, '_cd_hero_whatsapp_text',   true ) ?: 'Get updates on WhatsApp';

/* defaults for empty repeaters */
if ( empty( $features ) || ! is_array( $features ) ) {
	$features = [
		'Master Performance Marketing, Programmatic Ads, GEO & AI',
		'2 Months Guaranteed Internship',
		'100% Placement Support with Portfolio Building',
		'13+ Certifications (Google, HubSpot, Meta)',
	];
}
if ( empty( $hired_logos ) || ! is_array( $hired_logos ) ) {
	$hired_logos = [];
}
?>

<section class="course-hero">
	<!-- Background SVG Lines -->
	<div class="hero-bg-pattern">
		<svg class="bg-lines" viewBox="0 0 1440 600" preserveAspectRatio="none">
			<line x1="0" y1="100" x2="1440" y2="100" stroke="rgba(21,93,252,0.05)" stroke-width="1"/>
			<line x1="0" y1="200" x2="1440" y2="200" stroke="rgba(21,93,252,0.05)" stroke-width="1"/>
			<line x1="0" y1="300" x2="1440" y2="300" stroke="rgba(21,93,252,0.05)" stroke-width="1"/>
			<line x1="0" y1="400" x2="1440" y2="400" stroke="rgba(21,93,252,0.05)" stroke-width="1"/>
			<line x1="0" y1="500" x2="1440" y2="500" stroke="rgba(21,93,252,0.05)" stroke-width="1"/>
			<line x1="200" y1="0" x2="200" y2="600" stroke="rgba(21,93,252,0.05)" stroke-width="1"/>
			<line x1="400" y1="0" x2="400" y2="600" stroke="rgba(21,93,252,0.05)" stroke-width="1"/>
			<line x1="600" y1="0" x2="600" y2="600" stroke="rgba(21,93,252,0.05)" stroke-width="1"/>
			<line x1="800" y1="0" x2="800" y2="600" stroke="rgba(21,93,252,0.05)" stroke-width="1"/>
			<line x1="1000" y1="0" x2="1000" y2="600" stroke="rgba(21,93,252,0.05)" stroke-width="1"/>
			<line x1="1200" y1="0" x2="1200" y2="600" stroke="rgba(21,93,252,0.05)" stroke-width="1"/>
		</svg>
	</div>

	<!-- Gradient Overlay -->
	<div class="hero-gradient-left"></div>

	<div class="course-hero-container">

		<!-- Left Content -->
		<div class="hero-content">

			<!-- Badge -->
			<div class="hero-badge">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
					<polyline points="22 4 12 14.01 9 11.01"/>
				</svg>
				<span><?php echo esc_html( $badge_text ); ?></span>
			</div>

			<!-- Title -->
			<h1 class="hero-title">
				<?php echo esc_html( $title_plain ); ?>
				<?php if ( $title_hl ) : ?>
					<span><?php echo esc_html( $title_hl ); ?></span>
				<?php endif; ?>
			</h1>

			<!-- Subtitle -->
			<?php if ( $subtitle_plain || $subtitle_hl ) : ?>
			<p class="hero-subtitle">
				<?php echo esc_html( $subtitle_plain ); ?>
				<?php if ( $subtitle_hl ) : ?>
					<span class="highlight"><?php echo esc_html( $subtitle_hl ); ?></span>
				<?php endif; ?>
			</p>
			<?php endif; ?>

			<!-- Stats Cards -->
			<div class="hero-stats">
				<div class="stat-card">
					<div class="stat-icon star">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="#f59e0b" stroke="#f59e0b" stroke-width="1">
							<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
						</svg>
					</div>
					<div class="stat-info">
						<span class="stat-number"><?php echo esc_html( $stat1_num ); ?></span>
						<span class="stat-label"><?php echo esc_html( $stat1_label ); ?></span>
					</div>
				</div>
				<div class="stat-card">
					<div class="stat-icon check">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none">
							<circle cx="12" cy="12" r="10" fill="#10b981"/>
							<path d="M8 12l3 3 5-6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<div class="stat-info">
						<span class="stat-number"><?php echo esc_html( $stat2_num ); ?></span>
						<span class="stat-label"><?php echo esc_html( $stat2_label ); ?></span>
					</div>
				</div>
			</div>

			<!-- Feature Bullets -->
			<?php if ( ! empty( $features ) ) : ?>
			<ul class="hero-features">
				<?php foreach ( $features as $feat ) : ?>
				<li>
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none">
						<circle cx="12" cy="12" r="10" fill="#155dfc" fill-opacity="0.1"/>
						<path d="M8 12l3 3 5-6" stroke="#155dfc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					<span><?php echo esc_html( $feat ); ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>

			<!-- Hired By Logos -->
			<?php if ( ! empty( $hired_logos ) ) : ?>
			<div class="hired-by">
				<span class="hired-by-label"><?php echo esc_html( $hired_label ); ?></span>
				<div class="hired-by-logos">
					<?php foreach ( $hired_logos as $logo ) :
						if ( empty( $logo['id'] ) ) continue;
						$img_url = wp_get_attachment_image_url( $logo['id'], 'full' );
						if ( ! $img_url ) continue;
					?>
					<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>">
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>

		</div><!-- .hero-content -->

		<!-- Right Form -->
		<div class="hero-form-wrapper">
			<!-- Floating Icon -->
			<div class="form-floating-icon">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="2">
					<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
					<circle cx="12" cy="7" r="4"/>
				</svg>
			</div>

			<div class="hero-form-card">
				<!-- Form Header -->
				<div class="form-header">
					<h3><?php echo esc_html( $form_title ); ?></h3>
					<p>
						<span class="status-dot"></span>
						<?php echo esc_html( $form_subtitle ); ?>
					</p>
				</div>

				<!-- Form Body -->
				<form class="hero-form" id="courseForm" method="post">
					<div class="form-group">
						<input type="text" id="fullName" name="fullName" placeholder="Full Name" required>
					</div>
					<div class="form-group">
						<input type="email" id="email" name="email" placeholder="Email Address" required>
					</div>
					<div class="form-group phone-group">
						<div class="country-code">
							<span class="flag">🇮🇳</span>
							<span>+91</span>
						</div>
						<input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
					</div>
					<div class="form-group checkbox-group">
						<input type="checkbox" id="terms" name="terms" required>
						<label for="terms">I agree to the <a href="#">Terms &amp; Conditions</a> and <a href="#">Privacy Policy</a>.</label>
					</div>
					<button type="submit" class="form-submit-btn">
						<?php echo esc_html( $form_btn_text ); ?>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M5 12h14M12 5l7 7-7 7"/>
						</svg>
					</button>
				</form>

				<!-- WhatsApp Link -->
				<a href="<?php echo esc_url( $whatsapp_url ); ?>" class="whatsapp-link" target="_blank" rel="noopener noreferrer">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="#25D366">
						<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
					</svg>
					<span><?php echo esc_html( $whatsapp_text ); ?></span>
				</a>
			</div>
		</div><!-- .hero-form-wrapper -->

	</div><!-- .course-hero-container -->
</section>
<!-- /SECTION 1 – HERO -->


<!-- ================================================================
     SECTION 2 – PLACEMENT RECORD
     ================================================================ -->
<?php
$pr_tag         = get_post_meta( $post_id, '_cd_pr_tag',         true ) ?: 'DIGITAL MARKETING COURSE WITH PLACEMENT GUARANTEE';
$pr_title_plain = get_post_meta( $post_id, '_cd_pr_title_plain', true ) ?: 'Placement Record by';
$pr_title_hl    = get_post_meta( $post_id, '_cd_pr_title_hl',    true ) ?: 'IIM SKILLS';
$pr_description = get_post_meta( $post_id, '_cd_pr_description', true ) ?: 'IIM SKILLS offers the best digital marketing course in India with solid placement services that have helped students land jobs at top brands, companies, & high-growth start-ups.';
$pr_s1v         = get_post_meta( $post_id, '_cd_pr_stat1_value', true ) ?: '95%';
$pr_s1l         = get_post_meta( $post_id, '_cd_pr_stat1_label', true ) ?: 'Placement Rate';
$pr_s2v         = get_post_meta( $post_id, '_cd_pr_stat2_value', true ) ?: '₹30L';
$pr_s2l         = get_post_meta( $post_id, '_cd_pr_stat2_label', true ) ?: 'Highest CTC';
$pr_s3v         = get_post_meta( $post_id, '_cd_pr_stat3_value', true ) ?: '550+';
$pr_s3l         = get_post_meta( $post_id, '_cd_pr_stat3_label', true ) ?: 'Recruitment Partners';
$pr_s4v         = get_post_meta( $post_id, '_cd_pr_stat4_value', true ) ?: '55,000+';
$pr_s4l         = get_post_meta( $post_id, '_cd_pr_stat4_label', true ) ?: 'Students Trained';
?>

<section class="placement-record">
	<div class="placement-record-container">

		<!-- Section Header -->
		<div class="placement-header">
			<span class="placement-tag"><?php echo esc_html( $pr_tag ); ?></span>
			<h2 class="placement-title">
				<?php echo esc_html( $pr_title_plain ); ?>
				<?php if ( $pr_title_hl ) : ?>
					<span><?php echo esc_html( $pr_title_hl ); ?></span>
				<?php endif; ?>
			</h2>
			<?php if ( $pr_description ) : ?>
			<p class="placement-description"><?php echo esc_html( $pr_description ); ?></p>
			<?php endif; ?>
		</div>

		<!-- Stats Bar -->
		<div class="placement-stats-bar">
			<div class="placement-stat stat-purple">
				<span class="stat-value"><?php echo esc_html( $pr_s1v ); ?></span>
				<span class="stat-text"><?php echo esc_html( $pr_s1l ); ?></span>
			</div>
			<div class="placement-stat stat-red">
				<span class="stat-value"><?php echo esc_html( $pr_s2v ); ?></span>
				<span class="stat-text"><?php echo esc_html( $pr_s2l ); ?></span>
			</div>
			<div class="placement-stat stat-blue">
				<span class="stat-value"><?php echo esc_html( $pr_s3v ); ?></span>
				<span class="stat-text"><?php echo esc_html( $pr_s3l ); ?></span>
			</div>
			<div class="placement-stat stat-orange">
				<span class="stat-value"><?php echo esc_html( $pr_s4v ); ?></span>
				<span class="stat-text"><?php echo esc_html( $pr_s4l ); ?></span>
			</div>
		</div>

	</div><!-- .placement-record-container -->

	<!-- Dotted Pattern -->
	<div class="placement-dots-pattern"></div>
</section>
<!-- /SECTION 2 – PLACEMENT RECORD -->

<!-- ================================================================
     SECTION 3 – EMPLOYMENT (P.L.A.C.E. + COMPARISON TABLE)
     ================================================================ -->
<?php
$emp_badge_text  = get_post_meta( $post_id, '_cd_emp_badge_text',  true ) ?: 'THE P.L.A.C.E. DELIVERY SYSTEM';
$emp_title_plain = get_post_meta( $post_id, '_cd_emp_title_plain', true ) ?: 'Designed for';
$emp_title_hl    = get_post_meta( $post_id, '_cd_emp_title_hl',    true ) ?: 'Employment';
$emp_subtitle    = get_post_meta( $post_id, '_cd_emp_subtitle',    true ) ?: 'Why IIM SKILLS Digital Marketing Course stands different from every other institute in the market.';
$emp_place_cards = get_post_meta( $post_id, '_cd_emp_place_cards', true );
$emp_col_iim     = get_post_meta( $post_id, '_cd_emp_col_iim',    true ) ?: 'IIM SKILLS';
$emp_col_others  = get_post_meta( $post_id, '_cd_emp_col_others', true ) ?: 'OTHERS';
$emp_comp_rows   = get_post_meta( $post_id, '_cd_emp_comp_rows',  true );
$emp_cta_title   = get_post_meta( $post_id, '_cd_emp_cta_title',   true ) ?: 'Job Readiness Guaranteed';
$emp_cta_sub     = get_post_meta( $post_id, '_cd_emp_cta_subtitle',true ) ?: 'Join 55,000+ alumni placed globally.';
$emp_cta_btn     = get_post_meta( $post_id, '_cd_emp_cta_btn_text',true ) ?: 'APPLY NOW';
$emp_cta_url     = get_post_meta( $post_id, '_cd_emp_cta_btn_url', true ) ?: '#';

if ( empty( $emp_place_cards ) || ! is_array( $emp_place_cards ) ) {
	$emp_place_cards = [
		[ 'letter' => 'P', 'title' => 'Practical',  'desc' => 'GOOGLE ADS, YOAST, ELEMENTOR, PABBLY' ],
		[ 'letter' => 'L', 'title' => 'Live',        'desc' => 'INTERACTIVE LIVE CLASSES' ],
		[ 'letter' => 'A', 'title' => 'Applied',     'desc' => 'STARBUCKS, NIKE, & HUBSPOT PROJECTS' ],
		[ 'letter' => 'C', 'title' => 'Career',      'desc' => 'PORTFOLIO & TECH GROOMING' ],
		[ 'letter' => 'E', 'title' => 'Ecosystem',   'desc' => '550+ GLOBAL HIRING PARTNERS' ],
	];
}
if ( empty( $emp_comp_rows ) || ! is_array( $emp_comp_rows ) ) {
	$emp_comp_rows = [
		[ 'feature' => 'Training Delivery',  'iim' => '100% Practical & Tool-Driven (Building from scratch)', 'others' => 'Theory-heavy lectures & PDF reading material' ],
		[ 'feature' => 'Live Projects',       'iim' => '25+ Assignments & Cases',                             'others' => '2-3 Projects' ],
		[ 'feature' => 'LMS Access',          'iim' => 'Lifetime Access',                                     'others' => '1 Year Limit' ],
		[ 'feature' => 'Work Experience',     'iim' => 'Guaranteed 2-Month Virtual Internship',               'others' => 'No practical work experience provided' ],
		[ 'feature' => 'Placement Support',   'iim' => 'Direct access to 550+ Active Hiring Partners',        'others' => "Basic job alerts or only 'Interview Tips'" ],
	];
}
?>

<section class="employment-section">
	<div class="employment-container">

		<!-- Section Header -->
		<div class="employment-header">
			<div class="employment-badge">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
					<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
				</svg>
				<span><?php echo esc_html( $emp_badge_text ); ?></span>
			</div>
			<h2 class="employment-title">
				<?php echo esc_html( $emp_title_plain ); ?>
				<?php if ( $emp_title_hl ) : ?>
					<span><?php echo esc_html( $emp_title_hl ); ?></span>
				<?php endif; ?>
			</h2>
			<?php if ( $emp_subtitle ) : ?>
			<p class="employment-subtitle"><?php echo esc_html( $emp_subtitle ); ?></p>
			<?php endif; ?>
		</div>

		<!-- P.L.A.C.E. Cards -->
		<?php if ( ! empty( $emp_place_cards ) ) : ?>
		<div class="place-cards">
			<?php foreach ( $emp_place_cards as $card ) : ?>
			<div class="place-card">
				<span class="place-letter"><?php echo esc_html( $card['letter'] ); ?></span>
				<h4 class="place-title"><?php echo esc_html( $card['title'] ); ?></h4>
				<p class="place-desc"><?php echo esc_html( $card['desc'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<!-- Comparison Table -->
		<div class="comparison-table">

			<!-- Table Header -->
			<div class="comparison-header">
				<div class="comparison-col col-feature">FEATURES</div>
				<div class="comparison-col col-iim"><?php echo esc_html( $emp_col_iim ); ?></div>
				<div class="comparison-col col-others"><?php echo esc_html( $emp_col_others ); ?></div>
			</div>

			<!-- Table Rows -->
			<?php foreach ( $emp_comp_rows as $row ) : ?>
			<div class="comparison-row">
				<div class="comparison-col col-feature">
					<div class="feature-icon">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="2">
							<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
						</svg>
					</div>
					<span><?php echo esc_html( $row['feature'] ); ?></span>
				</div>
				<div class="comparison-col col-iim">
					<svg class="check-icon" width="18" height="18" viewBox="0 0 24 24" fill="none">
						<circle cx="12" cy="12" r="10" fill="#10b981"/>
						<path d="M8 12l3 3 5-6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					<span><?php echo esc_html( $row['iim'] ); ?></span>
				</div>
				<div class="comparison-col col-others">
					<svg class="cross-icon" width="18" height="18" viewBox="0 0 24 24" fill="none">
						<circle cx="12" cy="12" r="10" fill="#ef4444"/>
						<path d="M15 9l-6 6M9 9l6 6" stroke="white" stroke-width="2" stroke-linecap="round"/>
					</svg>
					<span><?php echo esc_html( $row['others'] ); ?></span>
				</div>
			</div>
			<?php endforeach; ?>

			<!-- CTA Banner -->
			<div class="comparison-cta">
				<div class="cta-content">
					<div class="cta-icon">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
							<polyline points="22 4 12 14.01 9 11.01"/>
						</svg>
					</div>
					<div class="cta-text">
						<h4><?php echo esc_html( $emp_cta_title ); ?></h4>
						<p><?php echo esc_html( $emp_cta_sub ); ?></p>
					</div>
				</div>
				<a href="<?php echo esc_url( $emp_cta_url ); ?>" class="cta-button">
					<?php echo esc_html( $emp_cta_btn ); ?>
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M5 12h14M12 5l7 7-7 7"/>
					</svg>
				</a>
			</div>

		</div><!-- .comparison-table -->

	</div><!-- .employment-container -->
</section>
<!-- /SECTION 3 – EMPLOYMENT -->

<!-- ================================================================
     SECTION 4 – CURRICULUM (MODULES + SIDEBAR)
     ================================================================ -->
<?php
/* ── icon color map ── */
$cur_icon_gradients = [
	'blue'   => 'linear-gradient(135deg,#3b82f6 0%,#1d4ed8 100%)',
	'purple' => 'linear-gradient(135deg,#8b5cf6 0%,#6d28d9 100%)',
	'pink'   => 'linear-gradient(135deg,#ec4899 0%,#be185d 100%)',
	'red'    => 'linear-gradient(135deg,#ef4444 0%,#b91c1c 100%)',
	'green'  => 'linear-gradient(135deg,#10b981 0%,#047857 100%)',
	'orange' => 'linear-gradient(135deg,#f97316 0%,#c2410c 100%)',
	'cyan'   => 'linear-gradient(135deg,#06b6d4 0%,#0e7490 100%)',
	'yellow' => 'linear-gradient(135deg,#f59e0b 0%,#b45309 100%)',
];
$outcome_colors = [ 'blue', 'purple', 'green', 'orange', 'pink', 'red' ];

$cur_tag         = get_post_meta( $post_id, '_cd_cur_tag',          true ) ?: 'UPDATED FOR 2026';
$cur_title_plain = get_post_meta( $post_id, '_cd_cur_title_plain',  true ) ?: 'The Digital Marketing';
$cur_title_hl    = get_post_meta( $post_id, '_cd_cur_title_hl',     true ) ?: 'Master Curriculum';
$cur_subtitle    = get_post_meta( $post_id, '_cd_cur_subtitle',     true ) ?: 'A scientifically structured module roadmap.';
$cur_mod_title   = get_post_meta( $post_id, '_cd_cur_mod_title',    true ) ?: 'Practitioner Mastery';
$cur_mod_count   = get_post_meta( $post_id, '_cd_cur_mod_count',    true ) ?: 'MODULES 01 — 22';
$cur_mod_badge   = get_post_meta( $post_id, '_cd_cur_mod_badge',    true ) ?: 'Essential Path';
$cur_modules     = get_post_meta( $post_id, '_cd_cur_modules',      true );
$cur_syl_url     = get_post_meta( $post_id, '_cd_cur_syllabus_url', true ) ?: '#';
$cur_syl_text    = get_post_meta( $post_id, '_cd_cur_syllabus_text',true ) ?: 'Syllabus PDF';
$cur_highlights  = get_post_meta( $post_id, '_cd_cur_highlights',   true );
$cur_counsel_txt = get_post_meta( $post_id, '_cd_cur_counsel_text', true ) ?: 'Speak to our senior academic counselor for a profile evaluation and career roadmap.';
$cur_counsel_url = get_post_meta( $post_id, '_cd_cur_counsel_url',  true ) ?: '#';
$cur_counsel_btn = get_post_meta( $post_id, '_cd_cur_counsel_btn',  true ) ?: 'REQUEST CALL BACK';
$cur_cert_txt    = get_post_meta( $post_id, '_cd_cur_cert_text',    true ) ?: 'You will earn 15+ industry recognised certificates, including the prestigious Govt of India Master Certificate.';
$cur_cert_logos  = get_post_meta( $post_id, '_cd_cur_cert_logos',   true ) ?: 'G, HUB, META';

if ( empty( $cur_modules ) || ! is_array( $cur_modules ) ) {
	$cur_modules = [
		[
			'title'         => 'Module 01: Foundations of the Digital Ecosystem',
			'meta'          => '',
			'icon_color'    => 'blue',
			'content_title' => 'Core Foundations',
			'content_desc'  => 'Understand customer psychology, market research, and the strategic difference between inbound & outbound marketing.',
			'tech_stack'    => 'GOOGLE TRENDS, SIMILARWEB, SURVEYMONKEY, ANSWERTHEPUBLIC, SPYFU',
			'outcomes'      => 'MARKET RESEARCH, PERSONAS',
		],
	];
}
if ( empty( $cur_highlights ) || ! is_array( $cur_highlights ) ) {
	$cur_highlights = [ '22 High-Impact Modules', 'AI & GEO Advanced Mastery', 'Agency Building Blueprint', '2 Months Virtual Internship' ];
}

$cert_logo_items = array_filter( array_map( 'trim', explode( ',', $cur_cert_logos ) ) );
?>

<section class="curriculum-section">
	<div class="curriculum-container">

		<!-- Section Header -->
		<div class="curriculum-header">
			<span class="curriculum-tag"><?php echo esc_html( $cur_tag ); ?></span>
			<h2 class="curriculum-title">
				<?php echo esc_html( $cur_title_plain ); ?>
				<?php if ( $cur_title_hl ) : ?><span><?php echo esc_html( $cur_title_hl ); ?></span><?php endif; ?>
			</h2>
			<p class="curriculum-subtitle"><?php echo esc_html( $cur_subtitle ); ?></p>
			<div class="curriculum-actions">
				<button class="btn-expand" id="expandAll">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
					Expand Roadmap
				</button>
				<button class="btn-collapse" id="collapseAll">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="18 15 12 9 6 15"/></svg>
					Collapse All
				</button>
			</div>
		</div>

		<!-- Main Content -->
		<div class="curriculum-content">

			<!-- Left – Modules -->
			<div class="curriculum-modules">
				<div class="modules-header">
					<div class="modules-title-wrap">
						<h3 class="modules-title"><?php echo esc_html( $cur_mod_title ); ?></h3>
						<span class="modules-count"><?php echo esc_html( $cur_mod_count ); ?></span>
					</div>
					<span class="essential-badge">
						<svg width="14" height="14" viewBox="0 0 24 24" fill="#f59e0b">
							<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
						</svg>
						<?php echo esc_html( $cur_mod_badge ); ?>
					</span>
				</div>

				<!-- Accordion -->
				<div class="modules-accordion">
					<?php foreach ( $cur_modules as $mi => $mod ) :
						$gradient  = $cur_icon_gradients[ $mod['icon_color'] ?? 'blue' ] ?? $cur_icon_gradients['blue'];
						$is_active = ( $mi === 0 ) ? ' active' : '';
						$tech_tags = array_filter( array_map( 'trim', explode( ',', $mod['tech_stack'] ?? '' ) ) );
						$out_tags  = array_filter( array_map( 'trim', explode( ',', $mod['outcomes']   ?? '' ) ) );
					?>
					<div class="module-item<?php echo $is_active; ?>">
						<div class="module-header">
							<div class="module-icon" style="background:<?php echo esc_attr( $gradient ); ?>;">
								<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
									<rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
									<line x1="8" y1="21" x2="16" y2="21"/>
									<line x1="12" y1="17" x2="12" y2="21"/>
								</svg>
							</div>
							<div class="module-info">
								<h4><?php echo esc_html( $mod['title'] ); ?></h4>
								<?php if ( ! empty( $mod['meta'] ) ) : ?>
								<span class="module-meta"><?php echo esc_html( $mod['meta'] ); ?></span>
								<?php endif; ?>
							</div>
							<button class="module-toggle">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<polyline points="<?php echo $is_active ? '18 15 12 9 6 15' : '6 9 12 15 18 9'; ?>"/>
								</svg>
							</button>
						</div>
						<div class="module-content">
							<div class="content-block">
								<span class="content-dot"></span>
								<div class="content-details">
									<?php if ( ! empty( $mod['content_title'] ) ) : ?>
									<h5><?php echo esc_html( $mod['content_title'] ); ?></h5>
									<?php endif; ?>
									<?php if ( ! empty( $mod['content_desc'] ) ) : ?>
									<p><?php echo esc_html( $mod['content_desc'] ); ?></p>
									<?php endif; ?>

									<?php if ( ! empty( $tech_tags ) ) : ?>
									<div class="tech-stack">
										<span class="stack-label">TECH STACK</span>
										<div class="stack-tags">
											<?php foreach ( $tech_tags as $tag ) : ?>
											<span class="stack-tag"><?php echo esc_html( $tag ); ?></span>
											<?php endforeach; ?>
										</div>
									</div>
									<?php endif; ?>

									<?php if ( ! empty( $out_tags ) ) : ?>
									<div class="key-outcomes">
										<span class="outcomes-label">KEY OUTCOMES</span>
										<div class="outcomes-tags">
											<?php foreach ( $out_tags as $oi => $out ) :
												$color = $outcome_colors[ $oi % count( $outcome_colors ) ];
											?>
											<span class="outcome-tag <?php echo esc_attr( $color ); ?>">
												<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
													<polyline points="20 6 9 17 4 12"/>
												</svg>
												<?php echo esc_html( $out ); ?>
											</span>
											<?php endforeach; ?>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div><!-- .modules-accordion -->
			</div><!-- .curriculum-modules -->

			<!-- Right – Sticky Sidebar -->
			<div class="curriculum-sidebar">
				<div class="sidebar-sticky">

					<!-- Syllabus PDF Button -->
					<a href="<?php echo esc_url( $cur_syl_url ); ?>" class="syllabus-btn" target="_blank" rel="noopener noreferrer">
						<?php echo esc_html( $cur_syl_text ); ?>
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
							<polyline points="7 10 12 15 17 10"/>
							<line x1="12" y1="15" x2="12" y2="3"/>
						</svg>
					</a>

					<!-- Program Highlights Card -->
					<?php if ( ! empty( $cur_highlights ) ) : ?>
					<div class="sidebar-card highlights-card">
						<div class="card-header">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2">
								<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
							</svg>
							<span>Program Highlights</span>
						</div>
						<ul class="highlights-list">
							<?php foreach ( $cur_highlights as $hl ) : ?>
							<li>
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none">
									<circle cx="12" cy="12" r="10" fill="#10b981" fill-opacity="0.15"/>
									<path d="M8 12l3 3 5-6" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<span><?php echo esc_html( $hl ); ?></span>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>

					<!-- Career Counseling Card -->
					<div class="sidebar-card counseling-card">
						<div class="card-header">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
							</svg>
							<span>Career Counseling</span>
						</div>
						<p><?php echo esc_html( $cur_counsel_txt ); ?></p>
						<a href="<?php echo esc_url( $cur_counsel_url ); ?>" class="callback-btn"><?php echo esc_html( $cur_counsel_btn ); ?></a>
					</div>

					<!-- Certification Path Card -->
					<div class="sidebar-card certification-card">
						<div class="card-header">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<circle cx="12" cy="8" r="7"/>
								<polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
							</svg>
							<span>Certification Path</span>
						</div>
						<p><?php echo esc_html( $cur_cert_txt ); ?></p>
						<?php if ( ! empty( $cert_logo_items ) ) : ?>
						<div class="cert-logos">
							<?php foreach ( $cert_logo_items as $cl ) : ?>
							<span class="cert-logo"><?php echo esc_html( $cl ); ?></span>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>

				</div><!-- .sidebar-sticky -->
			</div><!-- .curriculum-sidebar -->

		</div><!-- .curriculum-content -->
	</div><!-- .curriculum-container -->
</section>
<!-- /SECTION 4 – CURRICULUM -->

<!-- ================================================================
     SECTION 5 – SKILLS YOU WILL MASTER
     ================================================================ -->
<?php
/* ── icon SVG map ── */
$sk_icons = [
	'star'      => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
	'chart'     => '<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>',
	'grid'      => '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>',
	'search'    => '<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>',
	'filter'    => '<polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>',
	'send'      => '<line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>',
	'document'  => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>',
	'bar-chart' => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
	'video'     => '<rect x="2" y="7" width="20" height="15" rx="2" ry="2"/><polyline points="17 2 12 7 7 2"/>',
	'email'     => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>',
	'target'    => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="4"/><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"/><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"/><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"/><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"/>',
	'person'    => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
	'people'    => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
	'lightning' => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
	'share'     => '<circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>',
];

$sk_tag         = get_post_meta( $post_id, '_cd_sk_tag',         true ) ?: 'INDUSTRY RELEVANT TOOLS';
$sk_title_plain = get_post_meta( $post_id, '_cd_sk_title_plain', true ) ?: 'Skills You Will';
$sk_title_hl    = get_post_meta( $post_id, '_cd_sk_title_hl',    true ) ?: 'Master';
$sk_subtitle    = get_post_meta( $post_id, '_cd_sk_subtitle',    true ) ?: 'An all-around industry-relevant training program covering 40+ core modules.';
$sk_core_title  = get_post_meta( $post_id, '_cd_sk_core_title',  true ) ?: 'Core Modules & Competencies';
$sk_cards       = get_post_meta( $post_id, '_cd_sk_cards',       true );
$sk_cta_title   = get_post_meta( $post_id, '_cd_sk_cta_title',   true ) ?: 'Want to know more?';
$sk_cta_text    = get_post_meta( $post_id, '_cd_sk_cta_text',    true ) ?: 'Get the detailed module-wise curriculum, tool list, and placement report in our comprehensive brochure.';
$sk_cta_btn     = get_post_meta( $post_id, '_cd_sk_cta_btn_text',true ) ?: 'Download Complete Syllabus';
$sk_cta_url     = get_post_meta( $post_id, '_cd_sk_cta_btn_url', true ) ?: '#';

if ( empty( $sk_cards ) || ! is_array( $sk_cards ) ) {
	$sk_cards = [
		[ 'title' => 'AI & Automation Skills',     'tag' => 'AI',      'desc' => 'Master the use of AI in marketing & automate tasks for efficiency.',   'color' => 'card-purple', 'icon' => 'star'  ],
		[ 'title' => 'Performance Marketing',      'tag' => 'ADS',     'desc' => 'Learn how to run ROI-driven campaigns across various paid platforms.',  'color' => 'card-yellow', 'icon' => 'chart' ],
		[ 'title' => 'Search Engine Optimization', 'tag' => 'ORGANIC', 'desc' => 'Rank on Google with on-page SEO strategies and gain organic traffic.',  'color' => 'card-green',  'icon' => 'search' ],
		[ 'title' => 'Content Marketing',          'tag' => 'CONTENT', 'desc' => 'Make high-quality content that interests and engages users.',            'color' => 'card-peach',  'icon' => 'document' ],
	];
}
?>

<section class="skills-master-section">
	<div class="skills-master-container">

		<!-- Section Header -->
		<div class="skills-header">
			<span class="skills-tag"><?php echo esc_html( $sk_tag ); ?></span>
			<h2 class="skills-title">
				<?php echo esc_html( $sk_title_plain ); ?>
				<?php if ( $sk_title_hl ) : ?><span><?php echo esc_html( $sk_title_hl ); ?></span><?php endif; ?>
			</h2>
			<p class="skills-subtitle"><?php echo esc_html( $sk_subtitle ); ?></p>
		</div>

		<!-- Rainbow Gradient Line -->
		<div class="rainbow-line"></div>

		<!-- Core Modules Section -->
		<div class="core-modules">
			<h3 class="core-modules-title"><?php echo esc_html( $sk_core_title ); ?></h3>

			<!-- Skills Grid -->
			<div class="skills-grid">
				<?php foreach ( $sk_cards as $card ) :
					$icon_key = $card['icon'] ?? 'star';
					$icon_svg = $sk_icons[ $icon_key ] ?? $sk_icons['star'];
				?>
				<div class="skill-card <?php echo esc_attr( $card['color'] ?? 'card-gray' ); ?>">
					<div class="skill-icon">
						<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<?php echo $icon_svg; ?>
						</svg>
					</div>
					<h4><?php echo esc_html( $card['title'] ); ?></h4>
					<?php if ( ! empty( $card['tag'] ) ) : ?>
					<span class="skill-tag"><?php echo esc_html( $card['tag'] ); ?></span>
					<?php endif; ?>
					<p><?php echo esc_html( $card['desc'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- CTA Banner -->
		<div class="skills-cta-banner">
			<div class="cta-banner-content">
				<h3><?php echo esc_html( $sk_cta_title ); ?></h3>
				<p><?php echo esc_html( $sk_cta_text ); ?></p>
			</div>
			<a href="<?php echo esc_url( $sk_cta_url ); ?>" class="cta-banner-btn" target="_blank" rel="noopener noreferrer">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
					<polyline points="7 10 12 15 17 10"/>
					<line x1="12" y1="15" x2="12" y2="3"/>
				</svg>
				<?php echo esc_html( $sk_cta_btn ); ?>
			</a>
		</div>

	</div><!-- .skills-master-container -->
</section>
<!-- /SECTION 5 – SKILLS YOU WILL MASTER -->

<!-- ================================================================
     SECTION 6 – ALUMNI TESTIMONIALS
     ================================================================ -->
<?php
$at_tag         = get_post_meta( $post_id, '_cd_at_tag',          true ) ?: 'STUDENT SUCCESS STORIES';
$at_title_plain = get_post_meta( $post_id, '_cd_at_title_plain',  true ) ?: 'Hear from Our';
$at_title_hl    = get_post_meta( $post_id, '_cd_at_title_hl',     true ) ?: 'Alumni';
$at_video_url   = get_post_meta( $post_id, '_cd_at_video_url',    true ) ?: '';
$at_video_poster= get_post_meta( $post_id, '_cd_at_video_poster', true ) ?: 0;
$at_video_name  = get_post_meta( $post_id, '_cd_at_video_name',   true ) ?: '';
$at_video_role  = get_post_meta( $post_id, '_cd_at_video_role',   true ) ?: '';
$at_video_co    = get_post_meta( $post_id, '_cd_at_video_company',true ) ?: '';
$at_journey_txt = get_post_meta( $post_id, '_cd_at_journey_text', true ) ?: 'Start Your Journey';
$at_journey_url = get_post_meta( $post_id, '_cd_at_journey_url',  true ) ?: '#';
$at_alumni      = get_post_meta( $post_id, '_cd_at_alumni',       true );

$poster_url = $at_video_poster ? wp_get_attachment_image_url( $at_video_poster, 'large' ) : '';

if ( empty( $at_alumni ) || ! is_array( $at_alumni ) ) { $at_alumni = []; }

/* first active alumnus for initial right-panel state */
$first = ! empty( $at_alumni ) ? $at_alumni[0] : [ 'name' => '', 'company' => '', 'quote' => '', 'testimonial' => '' ];
?>

<section class="alumni-testimonials-section">
	<div class="alumni-testimonials-container">

		<!-- Section Header -->
		<div class="alumni-header">
			<span class="alumni-tag"><?php echo esc_html( $at_tag ); ?></span>
			<h2 class="alumni-title">
				<?php echo esc_html( $at_title_plain ); ?>
				<?php if ( $at_title_hl ) : ?><span><?php echo esc_html( $at_title_hl ); ?></span><?php endif; ?>
			</h2>
		</div>

		<!-- Main Content -->
		<div class="alumni-content">

			<!-- Left – Alumni List -->
			<div class="alumni-list">
				<?php foreach ( $at_alumni as $i => $a ) :
					$photo_url = $a['photo_id'] ? wp_get_attachment_image_url( $a['photo_id'], 'thumbnail' ) : '';
					$is_active = ( $i === 0 ) ? ' active' : '';
				?>
				<div class="alumni-card<?php echo $is_active; ?>"
					data-alumni="<?php echo $i + 1; ?>"
					data-name="<?php echo esc_attr( $a['name'] ); ?>"
					data-company="<?php echo esc_attr( $a['company'] ); ?>"
					data-quote="<?php echo esc_attr( $a['quote'] ); ?>"
					data-testimonial="<?php echo esc_attr( $a['testimonial'] ); ?>">
					<div class="alumni-avatar">
						<?php if ( $photo_url ) : ?>
						<img src="<?php echo esc_url( $photo_url ); ?>" alt="<?php echo esc_attr( $a['name'] ); ?>">
						<?php endif; ?>
					</div>
					<div class="alumni-info">
						<div class="alumni-name-row">
							<h4><?php echo esc_html( $a['name'] ); ?></h4>
							<?php if ( ! empty( $a['linkedin_url'] ) && $a['linkedin_url'] !== '#' ) : ?>
							<a href="<?php echo esc_url( $a['linkedin_url'] ); ?>" target="_blank" rel="noopener noreferrer">
								<svg class="linkedin-icon" width="16" height="16" viewBox="0 0 24 24" fill="#0077b5">
									<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
								</svg>
							</a>
							<?php endif; ?>
						</div>
						<span class="alumni-company"><?php echo esc_html( $a['company'] ); ?></span>
						<p class="alumni-quote">"<?php echo esc_html( $a['quote'] ); ?>"</p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

			<!-- Center – Video Player -->
			<div class="alumni-video-wrapper">
				<div class="video-container" id="videoContainer">
					<video id="alumniVideo" <?php if ( $poster_url ) echo 'poster="' . esc_url( $poster_url ) . '"'; ?>>
						<?php if ( $at_video_url ) : ?>
						<source src="<?php echo esc_url( $at_video_url ); ?>" type="video/mp4">
						<?php endif; ?>
					</video>
					<div class="video-overlay" id="videoOverlay">
						<button class="play-btn" id="playBtn">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="white">
								<polygon points="5 3 19 12 5 21 5 3"/>
							</svg>
						</button>
					</div>
					<?php if ( $at_video_name || $at_video_role || $at_video_co ) : ?>
					<div class="video-info">
						<?php if ( $at_video_name ) : ?><span class="video-name"><?php echo esc_html( $at_video_name ); ?></span><?php endif; ?>
						<?php if ( $at_video_role ) : ?><span class="video-role"><?php echo esc_html( $at_video_role ); ?></span><?php endif; ?>
						<?php if ( $at_video_co )   : ?><span class="video-company"><?php echo esc_html( $at_video_co ); ?></span><?php endif; ?>
					</div>
					<?php endif; ?>
					<div class="video-brand">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/iim-skills-official-logo.png' ); ?>" alt="IIM Skills">
					</div>
				</div>
			</div>

			<!-- Right – Alumni Details Panel -->
			<div class="alumni-details">
				<div class="verified-badge">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="#0077b5">
						<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
					</svg>
					<span>VERIFIED ALUMNI</span>
				</div>

				<h3 class="detail-name" id="detailName"><?php echo esc_html( $first['name'] ); ?></h3>
				<span class="detail-company" id="detailCompany"><?php echo esc_html( $first['company'] ); ?></span>

				<div class="detail-quote">
					<svg class="quote-icon" width="32" height="32" viewBox="0 0 24 24" fill="#f97316">
						<path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
					</svg>
					<p id="detailQuote">"<?php echo esc_html( $first['quote'] ); ?>"</p>
				</div>

				<p class="detail-testimonial" id="detailTestimonial"><?php echo esc_html( $first['testimonial'] ); ?></p>

				<a href="<?php echo esc_url( $at_journey_url ); ?>" class="journey-btn">
					<?php echo esc_html( $at_journey_txt ); ?>
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M5 12h14M12 5l7 7-7 7"/>
					</svg>
				</a>
			</div>

		</div><!-- .alumni-content -->
	</div><!-- .alumni-testimonials-container -->
</section>
<!-- /SECTION 6 – ALUMNI TESTIMONIALS -->

<!-- ================================================================
     SECTION 7 – LIVE PROJECTS (SLIDER)
     ================================================================ -->
<?php
$lp_tag         = get_post_meta( $post_id, '_cd_lp_tag',         true ) ?: 'INDUSTRY RELEVANT PROJECTS';
$lp_title_plain = get_post_meta( $post_id, '_cd_lp_title_plain', true ) ?: 'Digital Marketing Course Certification';
$lp_title_hl    = get_post_meta( $post_id, '_cd_lp_title_hl',    true ) ?: 'Taught Through Live Projects';
$lp_subtitle    = get_post_meta( $post_id, '_cd_lp_subtitle',    true ) ?: '';
$lp_standards   = get_post_meta( $post_id, '_cd_lp_standards',   true ) ?: 'DIGITAL MARKETING STANDARDS';
$lp_projects    = get_post_meta( $post_id, '_cd_lp_projects',    true );

if ( empty( $lp_projects ) || ! is_array( $lp_projects ) ) { $lp_projects = []; }
$lp_count = count( $lp_projects );
?>

<section class="live-projects-section">
	<!-- Background Decorations (static SVG — purely decorative) -->
	<div class="projects-bg-decoration">
		<svg class="decoration-circle-1" width="300" height="300" viewBox="0 0 300 300" fill="none">
			<circle cx="150" cy="150" r="150" fill="url(#lp_grad1)" fill-opacity="0.05"/>
			<defs><linearGradient id="lp_grad1" x1="0" y1="0" x2="300" y2="300"><stop offset="0%" stop-color="#155dfc"/><stop offset="100%" stop-color="#6366f1"/></linearGradient></defs>
		</svg>
		<svg class="decoration-dots" width="120" height="120" viewBox="0 0 120 120" fill="none">
			<?php foreach ( [10,40,70,100] as $cx ) { foreach ( [10,40,70,100] as $cy ) { echo '<circle cx="'.$cx.'" cy="'.$cy.'" r="3" fill="#155dfc" fill-opacity="0.15"/>'; } } ?>
		</svg>
	</div>

	<div class="live-projects-container">

		<!-- Section Header -->
		<div class="projects-header">
			<span class="projects-tag"><?php echo esc_html( $lp_tag ); ?></span>
			<h2 class="projects-title">
				<?php echo esc_html( $lp_title_plain ); ?><br>
				<?php if ( $lp_title_hl ) : ?><span><?php echo esc_html( $lp_title_hl ); ?></span><?php endif; ?>
			</h2>
			<?php if ( $lp_subtitle ) : ?>
			<p class="projects-subtitle"><?php echo esc_html( $lp_subtitle ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $lp_projects ) ) : ?>
		<!-- Slider -->
		<div class="projects-slider-wrapper">
			<button class="slider-arrow slider-prev" id="projectPrev">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
			</button>

			<div class="projects-slider" id="projectsSlider">
				<?php foreach ( $lp_projects as $pi => $proj ) :
					$logo_url   = $proj['logo_id'] ? wp_get_attachment_image_url( $proj['logo_id'], 'medium' ) : '';
					$is_active  = ( $pi === 0 ) ? ' active' : '';
					$objectives = array_filter( array_map( 'trim', explode( "\n", $proj['objectives'] ?? '' ) ) );
				?>
				<div class="project-card<?php echo $is_active; ?>" data-project="<?php echo $pi + 1; ?>">
					<div class="project-card-inner">
						<div class="project-left">
							<span class="project-badge">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
									<polyline points="22 4 12 14.01 9 11.01"/>
								</svg>
								<?php echo esc_html( $proj['badge'] ); ?>
							</span>
							<?php if ( $logo_url ) : ?>
							<div class="project-logo">
								<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $proj['company'] ); ?>">
							</div>
							<?php endif; ?>
							<h3 class="project-company"><?php echo esc_html( $proj['company'] ); ?></h3>
							<span class="project-category <?php echo esc_attr( $proj['category_color'] ?? 'green' ); ?>">
								<?php echo esc_html( $proj['category'] ); ?>
							</span>
						</div>
						<div class="project-right">
							<h4 class="objectives-title">KEY OBJECTIVES</h4>
							<ul class="objectives-list">
								<?php foreach ( $objectives as $obj ) : ?>
								<li>
									<svg width="18" height="18" viewBox="0 0 24 24" fill="none">
										<circle cx="12" cy="12" r="10" fill="#155dfc" fill-opacity="0.1"/>
										<path d="M8 12l3 3 5-6" stroke="#155dfc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
									<?php echo esc_html( $obj ); ?>
								</li>
								<?php endforeach; ?>
							</ul>
							<div class="project-footer">
								<span class="standards-tag"><?php echo esc_html( $lp_standards ); ?></span>
								<?php if ( ! empty( $proj['pdf_url'] ) && $proj['pdf_url'] !== '#' ) : ?>
								<a href="<?php echo esc_url( $proj['pdf_url'] ); ?>" class="project-pdf-btn" target="_blank" rel="noopener noreferrer">
									<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
										<polyline points="7 10 12 15 17 10"/>
										<line x1="12" y1="15" x2="12" y2="3"/>
									</svg>
									<?php echo esc_html( $proj['pdf_text'] ?? 'Project PDF' ); ?>
								</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

			<button class="slider-arrow slider-next" id="projectNext">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
			</button>
		</div>

		<!-- Slider Dots (auto-generated from project count) -->
		<div class="slider-dots" id="sliderDots">
			<?php for ( $d = 1; $d <= $lp_count; $d++ ) : ?>
			<button class="slider-dot<?php echo $d === 1 ? ' active' : ''; ?>" data-slide="<?php echo $d; ?>"></button>
			<?php endfor; ?>
		</div>

		<!-- Progress Bar -->
		<div class="slider-progress">
			<div class="progress-bar" id="progressBar"></div>
		</div>
		<?php endif; ?>

	</div><!-- .live-projects-container -->
</section>
<!-- /SECTION 7 – LIVE PROJECTS -->

<!-- ================================================================
     SECTION 8 – PORTFOLIO
     ================================================================ -->
<?php
$pf_badge_text   = get_post_meta( $post_id, '_cd_pf_badge_text',   true ) ?: 'LinkedIn Ready';
$pf_title_plain  = get_post_meta( $post_id, '_cd_pf_title_plain',  true ) ?: 'Build a';
$pf_title_hl     = get_post_meta( $post_id, '_cd_pf_title_hl',     true ) ?: 'Standout Portfolio';
$pf_subtitle     = get_post_meta( $post_id, '_cd_pf_subtitle',     true ) ?: '';
$pf_card_badge   = get_post_meta( $post_id, '_cd_pf_card_badge',   true ) ?: 'IIM SKILLS MASTER COURSE';
$pf_card_title_pl= get_post_meta( $post_id, '_cd_pf_card_title_pl',true ) ?: 'Master the Art of';
$pf_card_title_hl= get_post_meta( $post_id, '_cd_pf_card_title_hl',true ) ?: 'Digital Marketing';
$pf_card_subtitle= get_post_meta( $post_id, '_cd_pf_card_subtitle',true ) ?: '';
$pf_cert_btn_txt = get_post_meta( $post_id, '_cd_pf_cert_btn_text',true ) ?: 'Start My Certification';
$pf_cert_btn_url = get_post_meta( $post_id, '_cd_pf_cert_btn_url', true ) ?: '#';
$pf_features     = get_post_meta( $post_id, '_cd_pf_features',     true );
$pf_impact_title = get_post_meta( $post_id, '_cd_pf_impact_title', true ) ?: 'IIM SKILLS Alumni Impact';
$pf_impact_text  = get_post_meta( $post_id, '_cd_pf_impact_text',  true ) ?: '';
$pf_impact_ltxt  = get_post_meta( $post_id, '_cd_pf_impact_link_text', true ) ?: 'Access Career Support Portal';
$pf_impact_lurl  = get_post_meta( $post_id, '_cd_pf_impact_link_url',  true ) ?: '#';
$pf_li_watermark = get_post_meta( $post_id, '_cd_pf_li_watermark', true ) ?: 'IIM SKILLS';
$pf_li_badge     = get_post_meta( $post_id, '_cd_pf_li_badge',     true ) ?: 'DIGITAL MARKETING';
$pf_li_master    = get_post_meta( $post_id, '_cd_pf_li_master',    true ) ?: 'Master Course @ IIM SKILLS';
$pf_li_photo     = get_post_meta( $post_id, '_cd_pf_li_photo',     true ) ?: 0;
$pf_li_name      = get_post_meta( $post_id, '_cd_pf_li_name',      true ) ?: 'Alex Richardson';
$pf_li_title_txt = get_post_meta( $post_id, '_cd_pf_li_title',     true ) ?: '';
$pf_li_location  = get_post_meta( $post_id, '_cd_pf_li_location',  true ) ?: '';
$pf_li_conns     = get_post_meta( $post_id, '_cd_pf_li_connections',true ) ?: '500+';
$pf_li_skills    = get_post_meta( $post_id, '_cd_pf_li_skills',    true );
$pf_li_portfolio = get_post_meta( $post_id, '_cd_pf_li_portfolio', true );

$pf_li_photo_url = $pf_li_photo ? wp_get_attachment_image_url( $pf_li_photo, 'thumbnail' ) : '';
if ( empty( $pf_features )    || ! is_array( $pf_features ) )    { $pf_features    = []; }
if ( empty( $pf_li_skills )   || ! is_array( $pf_li_skills ) )   { $pf_li_skills   = []; }
if ( empty( $pf_li_portfolio ) || ! is_array( $pf_li_portfolio ) ) { $pf_li_portfolio = []; }

/* icon SVGs per feature color */
$pf_icons = [
	'purple' => '<path d="M12 2l2.4 7.4H22l-6 4.6 2.3 7-6.3-4.6L5.7 21l2.3-7-6-4.6h7.6z"/>',
	'blue'   => '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>',
	'orange' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
	'green'  => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
	'red'    => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
];
?>

<section class="portfolio-section">
	<div class="portfolio-container">

		<!-- Section Header -->
		<div class="portfolio-header">
			<span class="linkedin-badge">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
					<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
				</svg>
				<?php echo esc_html( $pf_badge_text ); ?>
			</span>
			<h2 class="portfolio-title">
				<?php echo esc_html( $pf_title_plain ); ?>
				<?php if ( $pf_title_hl ) : ?><span><?php echo esc_html( $pf_title_hl ); ?></span><?php endif; ?>
			</h2>
			<?php if ( $pf_subtitle ) : ?>
			<p class="portfolio-subtitle"><?php echo esc_html( $pf_subtitle ); ?></p>
			<?php endif; ?>
		</div>

		<!-- Main Content Grid -->
		<div class="portfolio-content">

			<!-- Left Column -->
			<div class="portfolio-left">

				<!-- Course Info Card -->
				<div class="course-info-card">
					<span class="course-badge"><?php echo esc_html( $pf_card_badge ); ?></span>
					<h3 class="course-card-title">
						<?php echo esc_html( $pf_card_title_pl ); ?><br>
						<?php if ( $pf_card_title_hl ) : ?><span><?php echo esc_html( $pf_card_title_hl ); ?></span><?php endif; ?>
					</h3>
					<?php if ( $pf_card_subtitle ) : ?>
					<p class="course-card-subtitle"><?php echo esc_html( $pf_card_subtitle ); ?></p>
					<?php endif; ?>

					<?php if ( ! empty( $pf_features ) ) : ?>
					<div class="course-features">
						<?php foreach ( $pf_features as $feat ) :
							$icon_path = $pf_icons[ $feat['icon_color'] ?? 'purple' ] ?? $pf_icons['purple'];
						?>
						<div class="course-feature">
							<div class="feature-icon-box <?php echo esc_attr( $feat['icon_color'] ?? 'purple' ); ?>">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<?php echo $icon_path; ?>
								</svg>
							</div>
							<div class="feature-text">
								<h4><?php echo esc_html( $feat['title'] ); ?></h4>
								<p><?php echo esc_html( $feat['desc'] ); ?></p>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>

					<a href="<?php echo esc_url( $pf_cert_btn_url ); ?>" class="certification-btn">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
							<polyline points="22 4 12 14.01 9 11.01"/>
						</svg>
						<?php echo esc_html( $pf_cert_btn_txt ); ?>
					</a>
				</div>

				<!-- Alumni Impact Card -->
				<div class="alumni-impact-card">
					<div class="impact-icons">
						<svg class="bolt-icon left" width="24" height="24" viewBox="0 0 24 24" fill="#155dfc"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
						<svg class="bolt-icon right" width="24" height="24" viewBox="0 0 24 24" fill="#155dfc"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
					</div>
					<h4 class="impact-title"><?php echo esc_html( $pf_impact_title ); ?></h4>
					<p class="impact-text"><?php echo esc_html( $pf_impact_text ); ?></p>
					<a href="<?php echo esc_url( $pf_impact_lurl ); ?>" class="impact-link">
						<?php echo esc_html( $pf_impact_ltxt ); ?>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
					</a>
				</div>
			</div><!-- .portfolio-left -->

			<!-- Right Column – LinkedIn Profile Card -->
			<div class="portfolio-right">
				<div class="linkedin-profile-card">

					<!-- Profile Header -->
					<div class="profile-header-bg">
						<span class="watermark-text"><?php echo esc_html( $pf_li_watermark ); ?></span>
						<div class="profile-badge-corner">
							<span class="dm-badge"><?php echo esc_html( $pf_li_badge ); ?></span>
							<span class="master-text"><?php echo esc_html( $pf_li_master ); ?></span>
						</div>
					</div>

					<!-- Profile Info -->
					<div class="profile-info-section">
						<div class="profile-avatar">
							<?php if ( $pf_li_photo_url ) : ?>
							<img src="<?php echo esc_url( $pf_li_photo_url ); ?>" alt="<?php echo esc_attr( $pf_li_name ); ?>">
							<?php endif; ?>
						</div>
						<div class="profile-details">
							<div class="profile-name-row">
								<h3><?php echo esc_html( $pf_li_name ); ?></h3>
								<svg class="linkedin-icon-blue" width="24" height="24" viewBox="0 0 24 24" fill="#0077b5">
									<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
								</svg>
							</div>
							<?php if ( $pf_li_title_txt ) : ?>
							<p class="profile-title"><?php echo esc_html( $pf_li_title_txt ); ?></p>
							<?php endif; ?>
							<?php if ( $pf_li_location ) : ?>
							<p class="profile-location">
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
								<?php echo esc_html( $pf_li_location ); ?> · <span><?php echo esc_html( $pf_li_conns ); ?> connections</span>
							</p>
							<?php endif; ?>
							<div class="profile-actions">
								<a href="#" class="btn-connect">Connect</a>
								<a href="#" class="btn-message">Message</a>
							</div>
						</div>
					</div>

					<!-- Top Skills -->
					<?php if ( ! empty( $pf_li_skills ) ) : ?>
					<div class="profile-skills">
						<h4>Top Skills</h4>
						<?php foreach ( $pf_li_skills as $sk ) : ?>
						<div class="skill-item">
							<div class="skill-icon">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#155dfc" stroke-width="2">
									<rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
									<path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
								</svg>
							</div>
							<div class="skill-details">
								<span class="skill-name"><?php echo esc_html( $sk['name'] ); ?></span>
								<span class="skill-endorsement"><?php echo esc_html( $sk['endorsement'] ); ?></span>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>

					<!-- Featured Portfolio -->
					<?php if ( ! empty( $pf_li_portfolio ) ) : ?>
					<div class="featured-portfolio">
						<div class="portfolio-header-row">
							<h4>Featured Portfolio</h4>
							<button class="more-btn">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/><circle cx="5" cy="12" r="2"/></svg>
							</button>
						</div>
						<div class="portfolio-items">
							<?php foreach ( $pf_li_portfolio as $pi ) : ?>
							<div class="portfolio-item <?php echo esc_attr( $pi['gradient'] ?? 'blue-gradient' ); ?>">
								<span class="item-tag"><?php echo esc_html( $pi['tag'] ); ?></span>
								<h5><?php echo esc_html( $pi['title'] ); ?></h5>
								<p><?php echo esc_html( $pi['desc'] ); ?></p>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

				</div><!-- .linkedin-profile-card -->
			</div><!-- .portfolio-right -->

		</div><!-- .portfolio-content -->
	</div><!-- .portfolio-container -->
</section>
<!-- /SECTION 8 – PORTFOLIO -->

<!-- ================================================================
     SECTION 9 – RECRUITER FEEDBACK (AUTO-SCROLL)
     ================================================================ -->
<?php
$rf_tag         = get_post_meta( $post_id, '_cd_rf_tag',         true ) ?: 'RECRUITER FEEDBACK';
$rf_title_plain = get_post_meta( $post_id, '_cd_rf_title_plain', true ) ?: 'Why Top Companies';
$rf_title_hl    = get_post_meta( $post_id, '_cd_rf_title_hl',    true ) ?: 'Hire Through Us';
$rf_subtitle    = get_post_meta( $post_id, '_cd_rf_subtitle',    true ) ?: '';
$rf_cards       = get_post_meta( $post_id, '_cd_rf_cards',       true );

if ( empty( $rf_cards ) || ! is_array( $rf_cards ) ) { $rf_cards = []; }

/* star SVG path (reused per card) */
$star_path = '<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>';
?>

<main class="course-detail-main">
<section class="recruiter-feedback-section">
	<div class="recruiter-feedback-container">
		<div class="recruiter-feedback-header">
			<span class="recruiter-feedback-tag"><?php echo esc_html( $rf_tag ); ?></span>
			<h2 class="recruiter-feedback-title">
				<?php echo esc_html( $rf_title_plain ); ?>
				<?php if ( $rf_title_hl ) : ?><span><?php echo esc_html( $rf_title_hl ); ?></span><?php endif; ?>
			</h2>
			<?php if ( $rf_subtitle ) : ?>
			<p class="recruiter-feedback-subtitle"><?php echo esc_html( $rf_subtitle ); ?></p>
			<?php endif; ?>
		</div>
	</div>

	<?php if ( ! empty( $rf_cards ) ) : ?>
	<div class="recruiter-slider-wrapper">
		<div class="recruiter-slider-track">
			<?php foreach ( $rf_cards as $card ) :
				$logo_url   = $card['company_logo_id'] ? wp_get_attachment_image_url( $card['company_logo_id'], 'medium' ) : '';
				$avatar_url = $card['avatar_id']        ? wp_get_attachment_image_url( $card['avatar_id'],        'thumbnail' ) : '';
				$logo_class = ( ( $card['logo_style'] ?? 'white' ) === 'white' ) ? 'company-logo-white' : 'company-logo-dark';
				$header_bg  = $card['header_bg'] ?? '#1a1f36';
				$stars      = intval( $card['rating'] ?? 5 );
				$star_class = ( ( $card['rating_color'] ?? 'default' ) === 'blue' ) ? ' blue' : '';
			?>
			<div class="recruiter-card">
				<div class="recruiter-card-header" style="background:<?php echo esc_attr( $header_bg ); ?>;">
					<?php if ( $logo_url ) : ?>
					<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $card['company_name'] ); ?>" class="<?php echo esc_attr( $logo_class ); ?>">
					<?php endif; ?>
					<?php if ( ! empty( $card['company_name'] ) ) : ?>
					<span class="company-name"><?php echo esc_html( $card['company_name'] ); ?></span>
					<?php endif; ?>
				</div>
				<div class="recruiter-card-body">
					<?php if ( $avatar_url ) : ?>
					<div class="recruiter-avatar">
						<img src="<?php echo esc_url( $avatar_url ); ?>" alt="<?php echo esc_attr( $card['name'] ); ?>">
					</div>
					<?php endif; ?>
					<h4 class="recruiter-name"><?php echo esc_html( $card['name'] ); ?></h4>
					<span class="recruiter-position"><?php echo esc_html( $card['position'] ); ?></span>
					<div class="recruiter-rating<?php echo esc_attr( $star_class ); ?>">
						<?php for ( $s = 1; $s <= $stars; $s++ ) : ?>
						<svg viewBox="0 0 24 24" fill="currentColor"><?php echo $star_path; ?></svg>
						<?php endfor; ?>
					</div>
					<div class="recruiter-quote">
						<span class="quote-icon open">"</span>
						<p><?php echo esc_html( $card['quote'] ); ?></p>
						<span class="quote-icon close">"</span>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

</section>
<!-- /SECTION 9 – RECRUITER FEEDBACK -->

<!-- ================================================================
     SECTION 10 – UPCOMING BATCHES
     ================================================================ -->
<?php
$ub_title_plain  = get_post_meta( $post_id, '_cd_ub_title_plain',  true ) ?: 'Digital Marketing';
$ub_title_hl     = get_post_meta( $post_id, '_cd_ub_title_hl',     true ) ?: 'Upcoming Batches';
$ub_subtitle     = get_post_meta( $post_id, '_cd_ub_subtitle',     true ) ?: '';
$ub_batches_note = get_post_meta( $post_id, '_cd_ub_batches_note', true ) ?: '* Flexible rescheduling available.';
$ub_batches      = get_post_meta( $post_id, '_cd_ub_batches',      true );
$ub_benefits     = get_post_meta( $post_id, '_cd_ub_benefits',     true );
$ub_mb_title     = get_post_meta( $post_id, '_cd_ub_mb_title',     true ) ?: '100% Money-Back Guarantee';
$ub_mb_text      = get_post_meta( $post_id, '_cd_ub_mb_text',      true ) ?: 'Not satisfied after the 1st session? Full refund.';
$ub_mb_btn_text  = get_post_meta( $post_id, '_cd_ub_mb_btn_text',  true ) ?: 'Request a Call Back';
$ub_mb_btn_url   = get_post_meta( $post_id, '_cd_ub_mb_btn_url',   true ) ?: '#';

if ( empty( $ub_batches )  || ! is_array( $ub_batches ) )  { $ub_batches  = []; }
if ( empty( $ub_benefits ) || ! is_array( $ub_benefits ) ) { $ub_benefits = []; }

/* ── Auto-date engine (IST) ── */
$ist = new DateTimeZone( 'Asia/Kolkata' );
$now = new DateTime( 'now', $ist );

/* next occurrence of each weekday */
function skillignative_ub_next_weekday( $now, $day_name ) {
	$d = clone $now;
	if ( strtolower( $d->format('l') ) === strtolower( $day_name ) ) {
		$d->modify( '+7 days' ); // already that day → use next week
	} else {
		$d->modify( 'next ' . $day_name );
	}
	return $d;
}

$sat1 = skillignative_ub_next_weekday( $now, 'Saturday' );
$sun1 = clone $sat1; $sun1->modify('+1 day');
$sat2 = clone $sat1; $sat2->modify('+7 days');
$sun2 = clone $sat2; $sun2->modify('+1 day');
$sat3 = clone $sat2; $sat3->modify('+7 days');
$sun3 = clone $sat3; $sun3->modify('+1 day');

$ub_date_map = [
	'auto_sat_1' => $sat1, 'auto_sun_1' => $sun1,
	'auto_sat_2' => $sat2, 'auto_sun_2' => $sun2,
	'auto_sat_3' => $sat3, 'auto_sun_3' => $sun3,
	'auto_mon'   => skillignative_ub_next_weekday( $now, 'Monday' ),
	'auto_tue'   => skillignative_ub_next_weekday( $now, 'Tuesday' ),
	'auto_wed'   => skillignative_ub_next_weekday( $now, 'Wednesday' ),
	'auto_thu'   => skillignative_ub_next_weekday( $now, 'Thursday' ),
	'auto_fri'   => skillignative_ub_next_weekday( $now, 'Friday' ),
];

/* Resolve a batch date → returns ['number'=>'07','month'=>'FEB'] */
function skillignative_ub_resolve_date( $batch, $ub_date_map ) {
	$mode = $batch['date_mode'] ?? 'auto_sat_1';
	if ( isset( $ub_date_map[ $mode ] ) ) {
		$d = $ub_date_map[ $mode ];
		return [ 'number' => $d->format('d'), 'month' => strtoupper($d->format('M')) ];
	}
	/* manual */
	$manual = $batch['manual_date'] ?? '';
	if ( $manual ) {
		$d = DateTime::createFromFormat( 'Y-m-d', $manual, new DateTimeZone('Asia/Kolkata') );
		if ( $d ) return [ 'number' => $d->format('d'), 'month' => strtoupper($d->format('M')) ];
	}
	return [ 'number' => '--', 'month' => '---' ];
}

/* benefit icon SVG paths */
$ben_icons = [
	'blue'   => '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>',
	'green'  => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
	'orange' => '<circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>',
	'purple' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
	'red'    => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
];
?>

<section class="upcoming-batches-section">
	<div class="upcoming-batches-container">

		<!-- Section Header -->
		<div class="upcoming-batches-header">
			<h2 class="upcoming-batches-title">
				<?php echo esc_html( $ub_title_plain ); ?>
				<?php if ( $ub_title_hl ) : ?><span><?php echo esc_html( $ub_title_hl ); ?></span><?php endif; ?>
			</h2>
			<?php if ( $ub_subtitle ) : ?>
			<p class="upcoming-batches-subtitle"><?php echo esc_html( $ub_subtitle ); ?></p>
			<?php endif; ?>
		</div>

		<!-- Content Grid -->
		<div class="upcoming-batches-content">

			<!-- Left – Batches Card -->
			<div class="batches-card">
				<div class="batches-card-gradient-border"></div>
				<div class="batches-card-inner">
					<div class="batches-card-header">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
							<line x1="16" y1="2" x2="16" y2="6"/>
							<line x1="8" y1="2" x2="8" y2="6"/>
							<line x1="3" y1="10" x2="21" y2="10"/>
						</svg>
						<h3>Upcoming Batches</h3>
					</div>

					<?php foreach ( $ub_batches as $batch ) :
						$resolved = skillignative_ub_resolve_date( $batch, $ub_date_map );
					?>
					<div class="batch-item">
						<?php if ( ! empty( $batch['filling_fast'] ) ) : ?>
						<div class="batch-type-row">
							<span class="batch-type-tag"><?php echo esc_html( $batch['type'] ); ?></span>
							<span class="filling-fast-tag">
								Filling Fast
								<svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
							</span>
						</div>
						<?php else : ?>
						<span class="batch-type-tag"><?php echo esc_html( $batch['type'] ); ?></span>
						<?php endif; ?>

						<div class="batch-details">
							<div class="batch-date">
								<span class="date-number"><?php echo esc_html( $resolved['number'] ); ?></span>
								<span class="date-month"><?php echo esc_html( $resolved['month'] ); ?></span>
							</div>
							<div class="batch-info">
								<div class="batch-time">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
									</svg>
									<span><?php echo esc_html( $batch['time'] ); ?></span>
								</div>
								<span class="batch-days"><?php echo esc_html( $batch['days'] ); ?></span>
								<?php if ( ! empty( $batch['seats'] ) ) : ?>
								<span class="batch-seats <?php echo esc_attr( $batch['seats_color'] ?? 'green' ); ?>"><?php echo esc_html( $batch['seats'] ); ?></span>
								<?php endif; ?>
							</div>
						</div>
						<a href="<?php echo esc_url( $batch['btn_url'] ?? '#' ); ?>" class="secure-seat-btn"><?php echo esc_html( $batch['btn_text'] ?? 'Secure Seat' ); ?></a>
					</div>
					<?php endforeach; ?>

					<?php if ( $ub_batches_note ) : ?>
					<p class="batches-note"><?php echo esc_html( $ub_batches_note ); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<!-- Right – Benefits Grid -->
			<?php if ( ! empty( $ub_benefits ) ) : ?>
			<div class="benefits-grid">
				<?php foreach ( $ub_benefits as $ben ) :
					$icon_svg   = $ben_icons[ $ben['icon_color'] ?? 'blue' ] ?? $ben_icons['blue'];
					$fw_class   = ! empty( $ben['full_width'] ) ? ' full-width' : '';
				?>
				<div class="benefit-card<?php echo esc_attr( $fw_class ); ?>">
					<div class="benefit-icon <?php echo esc_attr( $ben['icon_color'] ?? 'blue' ); ?>">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<?php echo $icon_svg; ?>
						</svg>
					</div>
					<h4 class="benefit-title"><?php echo esc_html( $ben['title'] ); ?></h4>
					<p class="benefit-desc"><?php echo esc_html( $ben['desc'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

		</div><!-- .upcoming-batches-content -->

		<!-- Money Back Guarantee Banner -->
		<div class="money-back-banner">
			<div class="money-back-content">
				<div class="money-back-icon">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
						<polyline points="22 4 12 14.01 9 11.01"/>
					</svg>
				</div>
				<div class="money-back-text">
					<h4><?php echo esc_html( $ub_mb_title ); ?></h4>
					<p><?php echo esc_html( $ub_mb_text ); ?></p>
				</div>
			</div>
			<a href="<?php echo esc_url( $ub_mb_btn_url ); ?>" class="callback-btn"><?php echo esc_html( $ub_mb_btn_text ); ?></a>
		</div>

	</div><!-- .upcoming-batches-container -->
</section>
<!-- /SECTION 10 – UPCOMING BATCHES -->

<!-- ================================================================
     SECTION 11 – PROGRAM FEES
     ================================================================ -->
<?php
$fees_tag          = get_post_meta( $post_id, '_cd_fees_tag',          true ) ?: 'PROGRAM OPTIONS';
$fees_title_plain  = get_post_meta( $post_id, '_cd_fees_title_plain',  true ) ?: 'IIM SKILLS Digital Marketing Course';
$fees_title_hl     = get_post_meta( $post_id, '_cd_fees_title_hl',     true ) ?: 'Fees';
$fees_subtitle     = get_post_meta( $post_id, '_cd_fees_subtitle',     true ) ?: '';
$fees_popular      = get_post_meta( $post_id, '_cd_fees_popular_badge',true ) ?: 'Most Popular';
$fees_prog_label   = get_post_meta( $post_id, '_cd_fees_program_label',true ) ?: 'Master Program';
$fees_currency     = get_post_meta( $post_id, '_cd_fees_currency',     true ) ?: '₹';
$fees_price        = get_post_meta( $post_id, '_cd_fees_price',        true ) ?: '59,900';
$fees_suffix       = get_post_meta( $post_id, '_cd_fees_price_suffix', true ) ?: '(excl. taxes)';
$fees_divider      = get_post_meta( $post_id, '_cd_fees_divider_text', true ) ?: "What's Included";
$fees_enroll_text  = get_post_meta( $post_id, '_cd_fees_enroll_btn_text', true ) ?: 'Enroll in Master Program';
$fees_enroll_url   = get_post_meta( $post_id, '_cd_fees_enroll_btn_url',  true ) ?: '#';
$fees_trust1       = get_post_meta( $post_id, '_cd_fees_trust1',       true ) ?: 'Secure Payment';
$fees_trust2       = get_post_meta( $post_id, '_cd_fees_trust2',       true ) ?: 'Money-Back Guarantee';
$fees_trust3       = get_post_meta( $post_id, '_cd_fees_trust3',       true ) ?: 'Instant Access';
$fees_features     = get_post_meta( $post_id, '_cd_fees_features',     true );

if ( empty( $fees_features ) || ! is_array( $fees_features ) ) { $fees_features = []; }
?>

<section class="program-fees-section">
	<!-- Decorative Background -->
	<div class="fees-bg-shapes">
		<div class="shape shape-1"></div>
		<div class="shape shape-2"></div>
		<div class="shape shape-3"></div>
	</div>

	<div class="program-fees-container">

		<!-- Section Header -->
		<div class="program-fees-header">
			<span class="program-fees-tag"><?php echo esc_html( $fees_tag ); ?></span>
			<h2 class="program-fees-title">
				<?php echo esc_html( $fees_title_plain ); ?>
				<?php if ( $fees_title_hl ) : ?><span><?php echo esc_html( $fees_title_hl ); ?></span><?php endif; ?>
			</h2>
			<?php if ( $fees_subtitle ) : ?>
			<p class="program-fees-subtitle"><?php echo esc_html( $fees_subtitle ); ?></p>
			<?php endif; ?>
		</div>

		<!-- Pricing Card -->
		<div class="pricing-card-wrapper">
			<div class="pricing-card">
				<div class="card-glow"></div>

				<!-- Popular Badge -->
				<?php if ( $fees_popular ) : ?>
				<div class="popular-badge">
					<svg viewBox="0 0 24 24" fill="currentColor">
						<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
					</svg>
					<?php echo esc_html( $fees_popular ); ?>
				</div>
				<?php endif; ?>

				<!-- Card Header -->
				<div class="pricing-card-header">
					<span class="program-label"><?php echo esc_html( $fees_prog_label ); ?></span>
					<div class="price-wrapper">
						<span class="currency"><?php echo esc_html( $fees_currency ); ?></span>
						<span class="price-amount"><?php echo esc_html( $fees_price ); ?></span>
						<span class="price-suffix"><?php echo esc_html( $fees_suffix ); ?></span>
					</div>
				</div>

				<!-- Divider -->
				<div class="pricing-divider">
					<div class="divider-line"></div>
					<span class="divider-text"><?php echo esc_html( $fees_divider ); ?></span>
					<div class="divider-line"></div>
				</div>

				<!-- Features Grid -->
				<?php if ( ! empty( $fees_features ) ) : ?>
				<div class="pricing-features">
					<?php foreach ( $fees_features as $feat ) :
						$hl_class = ! empty( $feat['highlight'] ) ? ' highlight' : '';
					?>
					<div class="feature-item<?php echo esc_attr( $hl_class ); ?>">
						<div class="feature-check<?php echo ( ! empty( $feat['highlight'] ) ) ? ' special' : ''; ?>">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
								<polyline points="20 6 9 17 4 12"/>
							</svg>
						</div>
						<span><?php echo esc_html( $feat['text'] ); ?></span>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>

				<!-- CTA Button -->
				<a href="<?php echo esc_url( $fees_enroll_url ); ?>" class="enroll-btn">
					<span><?php echo esc_html( $fees_enroll_text ); ?></span>
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<line x1="5" y1="12" x2="19" y2="12"/>
						<polyline points="12 5 19 12 12 19"/>
					</svg>
				</a>

				<!-- Trust Indicators -->
				<div class="trust-indicators">
					<div class="trust-item">
						<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
						<span><?php echo esc_html( $fees_trust1 ); ?></span>
					</div>
					<div class="trust-item">
						<svg viewBox="0 0 24 24" fill="currentColor"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01" fill="none" stroke="currentColor" stroke-width="2"/></svg>
						<span><?php echo esc_html( $fees_trust2 ); ?></span>
					</div>
					<div class="trust-item">
						<svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14" fill="none" stroke="white" stroke-width="2"/></svg>
						<span><?php echo esc_html( $fees_trust3 ); ?></span>
					</div>
				</div>

			</div><!-- .pricing-card -->
		</div><!-- .pricing-card-wrapper -->

	</div><!-- .program-fees-container -->
</section>
<!-- /SECTION 11 – PROGRAM FEES -->

<!-- ================================================================
     SECTION 12 – ADMISSION PROCESS
     ================================================================ -->
<?php
$ap_tag         = get_post_meta( $post_id, '_cd_ap_tag',          true ) ?: 'YOUR PATH TO SUCCESS';
$ap_title_plain = get_post_meta( $post_id, '_cd_ap_title_plain',  true ) ?: 'Admission';
$ap_title_hl    = get_post_meta( $post_id, '_cd_ap_title_hl',     true ) ?: 'Process';
$ap_subtitle    = get_post_meta( $post_id, '_cd_ap_subtitle',     true ) ?: '';
$ap_cta_text    = get_post_meta( $post_id, '_cd_ap_cta_text',     true ) ?: 'Ready to transform your career?';
$ap_cta_btn_txt = get_post_meta( $post_id, '_cd_ap_cta_btn_text', true ) ?: 'Start Your Application';
$ap_cta_btn_url = get_post_meta( $post_id, '_cd_ap_cta_btn_url',  true ) ?: '#';
$ap_steps       = get_post_meta( $post_id, '_cd_ap_steps',        true );

if ( empty( $ap_steps ) || ! is_array( $ap_steps ) ) { $ap_steps = []; }

/* step icon SVG paths */
$ap_icons = [
	'document' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>',
	'chat'     => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
	'calendar' => '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><path d="M9 16l2 2 4-4"/>',
	'lightning'=> '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
	'star'     => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
	'search'   => '<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>',
	'person'   => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
	'check'    => '<circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/>',
	'email'    => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>',
];
?>

<section class="admission-process-section">
	<div class="admission-process-container">

		<!-- Section Header -->
		<div class="admission-process-header">
			<span class="admission-process-tag"><?php echo esc_html( $ap_tag ); ?></span>
			<h2 class="admission-process-title">
				<?php echo esc_html( $ap_title_plain ); ?>
				<?php if ( $ap_title_hl ) : ?><span><?php echo esc_html( $ap_title_hl ); ?></span><?php endif; ?>
			</h2>
			<?php if ( $ap_subtitle ) : ?>
			<p class="admission-process-subtitle"><?php echo esc_html( $ap_subtitle ); ?></p>
			<?php endif; ?>
		</div>

		<!-- Process Timeline -->
		<?php if ( ! empty( $ap_steps ) ) : ?>
		<div class="process-timeline">
			<div class="timeline-connector"><div class="connector-progress"></div></div>

			<?php foreach ( $ap_steps as $si => $step ) :
				$num       = str_pad( $si + 1, 2, '0', STR_PAD_LEFT );
				$color     = $step['color'] ?? 'yellow';
				$icon_path = $ap_icons[ $step['icon'] ?? 'document' ] ?? $ap_icons['document'];
				$is_final  = ! empty( $step['final'] );
			?>
			<div class="process-step" data-step="<?php echo esc_attr( $num ); ?>">
				<div class="step-card">
					<div class="step-number-bg"><?php echo esc_html( $num ); ?></div>
					<div class="step-badge <?php echo esc_attr( $color !== 'yellow' ? $color : '' ); ?>">
						<span><?php echo esc_html( $num ); ?></span>
					</div>
					<div class="step-content">
						<h3 class="step-title"><?php echo esc_html( $step['title'] ); ?></h3>
						<p class="step-description"><?php echo esc_html( $step['desc'] ); ?></p>
					</div>
					<div class="step-icon <?php echo esc_attr( $color ); ?>">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<?php echo $icon_path; ?>
						</svg>
					</div>
				</div>
				<div class="step-dot<?php echo $is_final ? ' final' : ''; ?>">
					<div class="dot-inner">
						<?php if ( $is_final ) : ?>
						<svg viewBox="0 0 24 24" fill="currentColor">
							<polyline points="20 6 9 17 4 12" fill="none" stroke="currentColor" stroke-width="3"/>
						</svg>
						<?php endif; ?>
					</div>
					<div class="dot-pulse"></div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<!-- CTA -->
		<div class="admission-cta">
			<p><?php echo esc_html( $ap_cta_text ); ?></p>
			<a href="<?php echo esc_url( $ap_cta_btn_url ); ?>" class="start-application-btn">
				<span><?php echo esc_html( $ap_cta_btn_txt ); ?></span>
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<circle cx="12" cy="12" r="10"/>
					<polygon points="10 8 16 12 10 16 10 8" fill="currentColor"/>
				</svg>
			</a>
		</div>

	</div><!-- .admission-process-container -->
</section>
<!-- /SECTION 12 – ADMISSION PROCESS -->

<!-- ================================================================
     SECTION 13 – COURSE INFO TABS
     ================================================================ -->
<?php
$cit_brand        = get_post_meta( $post_id, '_cd_cit_brand',        true ) ?: 'IIM SKILLS';
$cit_card_title   = get_post_meta( $post_id, '_cd_cit_card_title',   true ) ?: get_the_title();
$cit_brochure_url = get_post_meta( $post_id, '_cd_cit_brochure_url', true ) ?: '#';
$cit_brochure_txt = get_post_meta( $post_id, '_cd_cit_brochure_text',true ) ?: 'Download Brochure';
$cit_stat1        = get_post_meta( $post_id, '_cd_cit_stat1',        true ) ?: 'PLACEMENT SUPPORT';
$cit_stat2        = get_post_meta( $post_id, '_cd_cit_stat2',        true ) ?: '40+ MODULES';
$cit_stat3        = get_post_meta( $post_id, '_cd_cit_stat3',        true ) ?: 'LIVE CLASSES';
$cit_stat4        = get_post_meta( $post_id, '_cd_cit_stat4',        true ) ?: '15+ CERTIFICATIONS';
$cit_tabs         = get_post_meta( $post_id, '_cd_cit_tabs',         true );

/* tab order & icons (fixed) */
$cit_tab_meta = [
	'definition'  => [ 'icon' => '<circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/>',                                                                                                                                                                                                                                                                                                                                    'default_label' => 'Definition' ],
	'concepts'    => [ 'icon' => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 3.6a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.6a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>', 'default_label' => 'Concepts' ],
	'eligibility' => [ 'icon' => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',                                                                                                                                                                                                                                                                                                                                                                'default_label' => 'Eligibility' ],
	'why-choose'  => [ 'icon' => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',                                                                                                                                                                                                                                                                                                                                                                    'default_label' => 'Why Choose Us' ],
	'skills'      => [ 'icon' => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',                                                                                                                                                                                                                                                                                                                                     'default_label' => 'Skills' ],
	'career'      => [ 'icon' => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',                                                                                                                                                                                                                                                                                                                                    'default_label' => 'Career Choice' ],
	'job-roles'   => [ 'icon' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',                                                                                                                                                                                                                                                                                        'default_label' => 'Job Roles' ],
];

if ( empty($cit_tabs) || ! is_array($cit_tabs) ) { $cit_tabs = []; }
?>

<section class="course-info-tabs-section">
	<div class="course-info-tabs-container">
		<div class="course-info-card">

			<!-- Card Header -->
			<div class="info-card-header">
				<div class="header-left">
					<span class="header-brand">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
							<polyline points="17 6 23 6 23 12"/>
						</svg>
						<?php echo esc_html( $cit_brand ); ?>
					</span>
					<h2 class="header-title"><?php echo esc_html( $cit_card_title ); ?></h2>
				</div>
				<a href="<?php echo esc_url( $cit_brochure_url ); ?>" class="download-brochure-btn" target="_blank" rel="noopener noreferrer">
					<span><?php echo esc_html( $cit_brochure_txt ); ?></span>
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
						<polyline points="7 10 12 15 17 10"/>
						<line x1="12" y1="15" x2="12" y2="3"/>
					</svg>
				</a>
			</div>

			<!-- Tabs -->
			<div class="info-tabs-wrapper">
				<!-- Tab Nav -->
				<div class="info-tabs-nav">
					<?php $first_tab = true; foreach ( $cit_tab_meta as $tid => $tmeta ) :
						$tab     = $cit_tabs[$tid] ?? [];
						$label   = $tab['label'] ?? $tmeta['default_label'];
						$active  = $first_tab ? ' active' : '';
						$first_tab = false;
					?>
					<button class="info-tab-btn<?php echo $active; ?>" data-tab="<?php echo esc_attr($tid); ?>">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<?php echo $tmeta['icon']; ?>
						</svg>
						<span><?php echo esc_html( $label ); ?></span>
					</button>
					<?php endforeach; ?>
				</div>

				<!-- Tab Content -->
				<div class="info-tabs-content">
					<?php $first_panel = true; foreach ( $cit_tab_meta as $tid => $tmeta ) :
						$tab     = $cit_tabs[$tid] ?? [];
						$title   = $tab['title']   ?? '';
						$content = $tab['content'] ?? '';
						$list    = $tab['list']     ?? '';
						$tags    = $tab['tags']     ?? '';
						$roles   = $tab['roles']    ?? '';
						$active  = $first_panel ? ' active' : '';
						$first_panel = false;
						$paras   = array_filter( array_map( 'trim', explode( "\n\n", $content ) ) );
						$list_items = array_filter( array_map( 'trim', explode( "\n", $list ) ) );
						$tag_items  = array_filter( array_map( 'trim', explode( ',', $tags ) ) );
						$role_items = array_filter( array_map( 'trim', explode( "\n", $roles ) ) );
					?>
					<div class="info-tab-panel<?php echo $active; ?>" id="<?php echo esc_attr($tid); ?>">
						<?php if ( $title ) : ?><h3 class="tab-content-title"><?php echo esc_html($title); ?></h3><?php endif; ?>
						<div class="tab-content-divider"></div>
						<div class="tab-content-body">
							<?php foreach ( $paras as $para ) : ?>
							<p><?php echo esc_html($para); ?></p>
							<?php endforeach; ?>

							<?php if ( ! empty( $list_items ) ) : ?>
							<ul class="tab-list">
								<?php foreach ( $list_items as $item ) : ?>
								<li><?php echo esc_html($item); ?></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>

							<?php if ( ! empty( $tag_items ) ) : ?>
							<div class="skills-tags">
								<?php foreach ( $tag_items as $tag ) : ?>
								<span class="skill-tag"><?php echo esc_html($tag); ?></span>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>

							<?php if ( ! empty( $role_items ) ) : ?>
							<div class="job-roles-grid">
								<?php foreach ( $role_items as $role ) :
									/* split "emoji Label" — emoji is first char(s) before space */
									$parts = preg_split('/\s+/', trim($role), 2);
									$icon  = $parts[0] ?? '';
									$label = $parts[1] ?? $role;
								?>
								<div class="job-role-item">
									<span class="role-icon"><?php echo esc_html($icon); ?></span>
									<span><?php echo esc_html($label); ?></span>
								</div>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- Card Footer Stats -->
			<div class="info-card-footer">
				<div class="footer-stat">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
					<span><?php echo esc_html($cit_stat1); ?></span>
				</div>
				<div class="footer-stat">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
					<span><?php echo esc_html($cit_stat2); ?></span>
				</div>
				<div class="footer-stat">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
					<span><?php echo esc_html($cit_stat3); ?></span>
				</div>
				<div class="footer-stat">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
					<span><?php echo esc_html($cit_stat4); ?></span>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- /SECTION 13 – COURSE INFO TABS -->

<!-- ================================================================
     SECTION 14 – COURSE OVERVIEW
     ================================================================ -->
<?php
$ov_tag            = get_post_meta( $post_id, '_cd_ov_tag',               true ) ?: 'ABOUT OUR COURSE';
$ov_title_plain    = get_post_meta( $post_id, '_cd_ov_title_plain',       true ) ?: 'Course Overview at';
$ov_title_hl       = get_post_meta( $post_id, '_cd_ov_title_hl',         true ) ?: 'IIM SKILLS';
$ov_subtitle       = get_post_meta( $post_id, '_cd_ov_subtitle',         true ) ?: '';
$ov_about_title    = get_post_meta( $post_id, '_cd_ov_about_title',       true ) ?: 'About the Program';
$ov_about_desc     = get_post_meta( $post_id, '_cd_ov_about_desc',       true ) ?: '';
$ov_about_ltxt     = get_post_meta( $post_id, '_cd_ov_about_link_text',  true ) ?: 'Read More About the Course';
$ov_about_lurl     = get_post_meta( $post_id, '_cd_ov_about_link_url',   true ) ?: '#';
$ov_about_tags     = get_post_meta( $post_id, '_cd_ov_about_tags',       true );
$ov_specs          = get_post_meta( $post_id, '_cd_ov_specs',            true );
$ov_specs_btxt     = get_post_meta( $post_id, '_cd_ov_specs_brochure_text', true ) ?: 'Download Brochure';
$ov_specs_burl     = get_post_meta( $post_id, '_cd_ov_specs_brochure_url',  true ) ?: '#';
$ov_faculty_title  = get_post_meta( $post_id, '_cd_ov_faculty_title',    true ) ?: 'Faculty Excellence';
$ov_faculty_desc   = get_post_meta( $post_id, '_cd_ov_faculty_desc',     true ) ?: '';
$ov_faculty_label  = get_post_meta( $post_id, '_cd_ov_faculty_label',    true ) ?: 'Leading Practitioners';
$ov_faculty_photos = get_post_meta( $post_id, '_cd_ov_faculty_photos',   true );
$ov_tools_title    = get_post_meta( $post_id, '_cd_ov_tools_title',      true ) ?: 'Modern Toolstack Integration';
$ov_tools          = get_post_meta( $post_id, '_cd_ov_tools',            true );
$ov_features       = get_post_meta( $post_id, '_cd_ov_features',         true );

if ( empty($ov_about_tags)     || !is_array($ov_about_tags) )     { $ov_about_tags     = []; }
if ( empty($ov_specs)          || !is_array($ov_specs) )          { $ov_specs          = []; }
if ( empty($ov_faculty_photos) || !is_array($ov_faculty_photos) ) { $ov_faculty_photos = []; }
if ( empty($ov_tools)          || !is_array($ov_tools) )          { $ov_tools          = []; }
if ( empty($ov_features)       || !is_array($ov_features) )       { $ov_features       = []; }

/* tag icons cycle */
$ov_tag_icons = [
	'<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
	'<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
	'<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
];

/* feature icons per color */
$ov_feat_icons = [
	'blue'   => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>',
	'green'  => '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/>',
	'orange' => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-2.82 1.17V21a2 2 0 0 1-4 0v-.09a1.65 1.65 0 0 0-2.82-1.17l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.6 9H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 3.6l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 1.51V1a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 2.82 1.17l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 2z"/>',
	'purple' => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
	'red'    => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
];
?>

<section class="course-overview-section">
	<div class="course-overview-container">

		<!-- Header -->
		<div class="course-overview-header">
			<span class="overview-tag"><?php echo esc_html($ov_tag); ?></span>
			<h2 class="overview-title">
				<?php echo esc_html($ov_title_plain); ?>
				<?php if($ov_title_hl): ?><span><?php echo esc_html($ov_title_hl); ?></span><?php endif; ?>
			</h2>
			<?php if($ov_subtitle): ?><p class="overview-subtitle"><?php echo esc_html($ov_subtitle); ?></p><?php endif; ?>
		</div>

		<!-- Main Content Grid -->
		<div class="overview-main-grid">

			<!-- About Program Card -->
			<div class="about-program-card">
				<div class="program-icon">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>
					</svg>
				</div>
				<h3 class="program-card-title"><?php echo esc_html($ov_about_title); ?></h3>
				<?php if($ov_about_desc): ?><p class="program-description"><?php echo esc_html($ov_about_desc); ?></p><?php endif; ?>
				<a href="<?php echo esc_url($ov_about_lurl); ?>" class="read-more-link">
					<?php echo esc_html($ov_about_ltxt); ?>
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
				</a>
				<?php if(!empty($ov_about_tags)): ?>
				<div class="program-tags">
					<?php foreach($ov_about_tags as $ti=>$tag): $icon=$ov_tag_icons[$ti % count($ov_tag_icons)]; ?>
					<span class="program-tag">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><?php echo $icon; ?></svg>
						<?php echo esc_html($tag); ?>
					</span>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>

			<!-- Program Specs Card -->
			<div class="program-specs-card">
				<div class="specs-header">
					<h3>Program Specs</h3>
					<div class="specs-icon">
						<svg viewBox="0 0 24 24" fill="currentColor"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
					</div>
				</div>
				<?php if(!empty($ov_specs)): ?>
				<div class="specs-list">
					<?php foreach($ov_specs as $spec): $hl=!empty($spec['highlight'])?'highlight':''; ?>
					<div class="spec-item">
						<span class="spec-label"><?php echo esc_html($spec['label']); ?></span>
						<span class="spec-value <?php echo esc_attr($hl); ?>"><?php echo esc_html($spec['value']); ?></span>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
				<a href="<?php echo esc_url($ov_specs_burl); ?>" class="download-brochure-cta" target="_blank" rel="noopener noreferrer">
					<?php echo esc_html($ov_specs_btxt); ?>
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
				</a>
			</div>
		</div>

		<!-- Secondary Grid -->
		<div class="overview-secondary-grid">

			<!-- Faculty Card -->
			<div class="faculty-card">
				<div class="faculty-icon">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
				</div>
				<h4 class="faculty-title"><?php echo esc_html($ov_faculty_title); ?></h4>
				<?php if($ov_faculty_desc): ?><p class="faculty-description"><?php echo esc_html($ov_faculty_desc); ?></p><?php endif; ?>
				<div class="faculty-avatars">
					<?php $has_photos = array_filter($ov_faculty_photos); if(!empty($has_photos)): ?>
					<div class="avatar-stack">
						<?php foreach($ov_faculty_photos as $fid): $furl=$fid?wp_get_attachment_image_url($fid,'thumbnail'):''; if(!$furl) continue; ?>
						<img src="<?php echo esc_url($furl); ?>" alt="Faculty">
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<span class="avatar-label"><?php echo esc_html($ov_faculty_label); ?></span>
				</div>
			</div>

			<!-- Toolstack Card -->
			<div class="toolstack-card">
				<h4 class="toolstack-title"><?php echo esc_html($ov_tools_title); ?></h4>
				<?php if(!empty($ov_tools)): ?>
				<div class="tools-grid">
					<?php foreach($ov_tools as $tool): $tc=esc_attr($tool['color']??'blue'); ?>
					<div class="tool-item">
						<div class="tool-icon <?php echo $tc; ?>">
							<svg viewBox="0 0 24 24" fill="currentColor">
								<circle cx="12" cy="12" r="10"/>
								<path d="M8 12l3 3 5-6" stroke="white" stroke-width="2" fill="none"/>
							</svg>
						</div>
						<span><?php echo esc_html($tool['name']); ?></span>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>

		<!-- Features Grid -->
		<?php if(!empty($ov_features)): ?>
		<div class="overview-features-grid">
			<?php foreach($ov_features as $feat):
				$fic = $feat['icon_color'] ?? 'blue';
				$fsvg= $ov_feat_icons[$fic] ?? $ov_feat_icons['blue'];
			?>
			<div class="feature-card-modern">
				<div class="feature-icon-modern <?php echo esc_attr($fic); ?>">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><?php echo $fsvg; ?></svg>
				</div>
				<h4 class="feature-title-modern"><?php echo esc_html($feat['title']); ?></h4>
				<p class="feature-desc-modern"><?php echo esc_html($feat['desc']); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

	</div>
</section>
<!-- /SECTION 14 – COURSE OVERVIEW -->

<!-- ================================================================
     SECTION 15 – FAQ
     ================================================================ -->
<?php
$faq_tag         = get_post_meta( $post_id, '_cd_faq_tag',          true ) ?: 'HAVE QUESTIONS?';
$faq_title_plain = get_post_meta( $post_id, '_cd_faq_title_plain',  true ) ?: 'Frequently Asked';
$faq_title_hl    = get_post_meta( $post_id, '_cd_faq_title_hl',     true ) ?: 'Questions';
$faq_subtitle    = get_post_meta( $post_id, '_cd_faq_subtitle',     true ) ?: '';
$faq_cta_text    = get_post_meta( $post_id, '_cd_faq_cta_text',     true ) ?: 'Still have questions?';
$faq_cta_btn_txt = get_post_meta( $post_id, '_cd_faq_cta_btn_text', true ) ?: 'Talk to Our Counselor';
$faq_cta_btn_url = get_post_meta( $post_id, '_cd_faq_cta_btn_url',  true ) ?: '#';
$faq_items       = get_post_meta( $post_id, '_cd_faq_items',        true );

if ( empty($faq_items) || !is_array($faq_items) ) { $faq_items = []; }
?>

<section class="faq-section">
	<!-- Background Decorations -->
	<div class="faq-bg-gradient"></div>
	<div class="faq-bg-circle"></div>

	<div class="faq-container">

		<!-- Section Header -->
		<div class="faq-header">
			<span class="faq-tag"><?php echo esc_html( $faq_tag ); ?></span>
			<h2 class="faq-title">
				<?php echo esc_html( $faq_title_plain ); ?>
				<?php if ( $faq_title_hl ) : ?><span><?php echo esc_html( $faq_title_hl ); ?></span><?php endif; ?>
			</h2>
			<?php if ( $faq_subtitle ) : ?>
			<p class="faq-subtitle"><?php echo esc_html( $faq_subtitle ); ?></p>
			<?php endif; ?>
		</div>

		<!-- FAQ Accordion -->
		<?php if ( ! empty( $faq_items ) ) : ?>
		<div class="faq-accordion">
			<?php foreach ( $faq_items as $faq ) : ?>
			<div class="faq-item">
				<button class="faq-question">
					<div class="faq-icon">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<circle cx="12" cy="12" r="10"/>
							<path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
							<line x1="12" y1="17" x2="12.01" y2="17"/>
						</svg>
					</div>
					<span class="faq-question-text"><?php echo esc_html( $faq['question'] ); ?></span>
					<div class="faq-toggle">
						<span></span>
						<span></span>
					</div>
				</button>
				<div class="faq-answer">
					<div class="faq-answer-content">
						<p><?php echo esc_html( $faq['answer'] ); ?></p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<!-- Contact CTA -->
		<div class="faq-cta">
			<p><?php echo esc_html( $faq_cta_text ); ?></p>
			<a href="<?php echo esc_url( $faq_cta_btn_url ); ?>" class="faq-contact-btn">
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
				</svg>
				<?php echo esc_html( $faq_cta_btn_txt ); ?>
			</a>
		</div>

	</div><!-- .faq-container -->
</section>
<!-- /SECTION 15 – FAQ -->

</main><!-- /.course-detail-main -->

<?php get_footer(); ?>
