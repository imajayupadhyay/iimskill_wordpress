<?php
/**
 * Course Detail Page Meta Boxes
 *
 * All dynamic content for the single-course.php template.
 * Each section has its own meta box so admin can control everything.
 *
 * Prefix: _cd_  (course detail)
 *
 * @package Skillignative
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ============================================================
   REGISTER ALL META BOXES
   ============================================================ */
function skillignative_cd_register_meta_boxes() {

	// Section 1 – Hero
	add_meta_box(
		'cd_hero',
		'Section 1 – Hero',
		'skillignative_cd_hero_callback',
		'course',
		'normal',
		'high'
	);

	// Section 2 – Placement Record
	add_meta_box(
		'cd_placement',
		'Section 2 – Placement Record',
		'skillignative_cd_placement_callback',
		'course',
		'normal',
		'high'
	);

	// Section 3 – Employment (P.L.A.C.E. + Comparison Table)
	add_meta_box(
		'cd_employment',
		'Section 3 – Employment (P.L.A.C.E. + Comparison Table)',
		'skillignative_cd_employment_callback',
		'course',
		'normal',
		'high'
	);

	// Section 4 – Curriculum
	add_meta_box(
		'cd_curriculum',
		'Section 4 – Curriculum (Modules + Sidebar)',
		'skillignative_cd_curriculum_callback',
		'course',
		'normal',
		'high'
	);

	// Section 5 – Skills You Will Master
	add_meta_box(
		'cd_skills',
		'Section 5 – Skills You Will Master',
		'skillignative_cd_skills_callback',
		'course',
		'normal',
		'high'
	);

	// Section 6 – Alumni Testimonials
	add_meta_box(
		'cd_alumni',
		'Section 6 – Alumni Testimonials',
		'skillignative_cd_alumni_callback',
		'course',
		'normal',
		'high'
	);

	// Section 7 – Live Projects
	add_meta_box(
		'cd_live_projects',
		'Section 7 – Live Projects (Slider)',
		'skillignative_cd_live_projects_callback',
		'course',
		'normal',
		'high'
	);

	// Section 8 – Portfolio
	add_meta_box(
		'cd_portfolio',
		'Section 8 – Portfolio',
		'skillignative_cd_portfolio_callback',
		'course',
		'normal',
		'high'
	);

	// Section 9 – Recruiter Feedback
	add_meta_box(
		'cd_recruiter',
		'Section 9 – Recruiter Feedback (Auto-scroll)',
		'skillignative_cd_recruiter_callback',
		'course',
		'normal',
		'high'
	);

	// Section 10 – Upcoming Batches
	add_meta_box(
		'cd_batches',
		'Section 10 – Upcoming Batches',
		'skillignative_cd_batches_callback',
		'course',
		'normal',
		'high'
	);

	// Section 11 – Program Fees
	add_meta_box(
		'cd_fees',
		'Section 11 – Program Fees',
		'skillignative_cd_fees_callback',
		'course',
		'normal',
		'high'
	);

	// Section 12 – Admission Process
	add_meta_box(
		'cd_admission',
		'Section 12 – Admission Process',
		'skillignative_cd_admission_callback',
		'course',
		'normal',
		'high'
	);

	// Section 13 – Course Info Tabs
	add_meta_box(
		'cd_info_tabs',
		'Section 13 – Course Info Tabs',
		'skillignative_cd_info_tabs_callback',
		'course',
		'normal',
		'high'
	);

	// Section 14 – Course Overview
	add_meta_box(
		'cd_overview',
		'Section 14 – Course Overview',
		'skillignative_cd_overview_callback',
		'course',
		'normal',
		'high'
	);

	// Section 15 – FAQ
	add_meta_box(
		'cd_faq',
		'Section 15 – FAQ',
		'skillignative_cd_faq_callback',
		'course',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'skillignative_cd_register_meta_boxes' );


/* ============================================================
   SECTION METADATA — single source of truth for navigator + headers
   ============================================================ */
function skillignative_cd_section_meta() {
	return [
		[ 'id' => 'cd_hero',         'num' => '01', 'name' => 'Hero',            'color' => '#155dfc', 'desc' => 'Badge · Title · Stats · Feature bullets · Lead form' ],
		[ 'id' => 'cd_placement',    'num' => '02', 'name' => 'Placement Record', 'color' => '#8b5cf6', 'desc' => 'Tag · Title · Description · 4 color-coded stats' ],
		[ 'id' => 'cd_employment',   'num' => '03', 'name' => 'Employment',       'color' => '#10b981', 'desc' => 'P.L.A.C.E. cards · Comparison table · CTA banner' ],
		[ 'id' => 'cd_curriculum',   'num' => '04', 'name' => 'Curriculum',       'color' => '#f97316', 'desc' => 'Accordion modules · Sticky sidebar (highlights, certifications)' ],
		[ 'id' => 'cd_skills',       'num' => '05', 'name' => 'Skills Master',    'color' => '#ec4899', 'desc' => 'Skill cards grid with icon & color per card · CTA banner' ],
		[ 'id' => 'cd_alumni',       'num' => '06', 'name' => 'Alumni',           'color' => '#06b6d4', 'desc' => 'Testimonial cards · Video player · Detail panel' ],
		[ 'id' => 'cd_live_projects','num' => '07', 'name' => 'Live Projects',    'color' => '#ef4444', 'desc' => 'Project slider with objectives, logo, category per card' ],
		[ 'id' => 'cd_portfolio',    'num' => '08', 'name' => 'Portfolio',        'color' => '#6366f1', 'desc' => 'Course card · Alumni impact · LinkedIn-style profile' ],
		[ 'id' => 'cd_recruiter',    'num' => '09', 'name' => 'Recruiter',        'color' => '#f59e0b', 'desc' => 'Auto-scroll cards with company header, quote, rating' ],
		[ 'id' => 'cd_batches',      'num' => '10', 'name' => 'Batches',          'color' => '#14b8a6', 'desc' => 'Auto-calculated dates · Batches · Benefits grid · Money-back banner' ],
		[ 'id' => 'cd_fees',         'num' => '11', 'name' => 'Program Fees',     'color' => '#059669', 'desc' => 'Pricing card · Features list · Enroll button · Trust indicators' ],
		[ 'id' => 'cd_admission',    'num' => '12', 'name' => 'Admission',        'color' => '#d97706', 'desc' => '4-step timeline with icon, color & auto-numbered steps' ],
		[ 'id' => 'cd_info_tabs',    'num' => '13', 'name' => 'Info Tabs',        'color' => '#7c3aed', 'desc' => '7 content tabs (Definition, Eligibility, Skills, Job Roles…)' ],
		[ 'id' => 'cd_overview',     'num' => '14', 'name' => 'Overview',         'color' => '#0284c7', 'desc' => 'About card · Program specs · Faculty · Toolstack · Feature grid' ],
		[ 'id' => 'cd_faq',          'num' => '15', 'name' => 'FAQ',              'color' => '#e11d48', 'desc' => 'Accordion Q&A pairs · CTA contact button' ],
	];
}


/* ============================================================
   SHARED ADMIN STYLES  (injected once)
   ============================================================ */
function skillignative_cd_admin_styles() {
	$screen = get_current_screen();
	if ( ! $screen || 'course' !== $screen->post_type ) return;
	$sections = skillignative_cd_section_meta();
	?>
	<style>
		/* ── Navigator bar ──────────────────────────── */
		#cd-section-navigator {
			position: sticky; top: 32px; z-index: 99;
			background: #fff; border: 1px solid #e0e0e0;
			border-radius: 10px; padding: 14px 16px 10px;
			margin-bottom: 20px;
			box-shadow: 0 2px 12px rgba(0,0,0,.07);
		}
		#cd-section-navigator .cd-nav-label {
			font-size: 10px; font-weight: 700; color: #999;
			text-transform: uppercase; letter-spacing: 1px;
			display: block; margin-bottom: 10px;
		}
		#cd-section-navigator .cd-nav-chips {
			display: flex; flex-wrap: wrap; gap: 6px;
		}
		#cd-section-navigator .cd-nav-chip {
			display: inline-flex; align-items: center; gap: 5px;
			padding: 5px 10px; border-radius: 20px; cursor: pointer;
			font-size: 11px; font-weight: 600; border: 1.5px solid transparent;
			text-decoration: none; transition: all .15s;
		}
		#cd-section-navigator .cd-nav-chip:hover {
			opacity: .85; transform: translateY(-1px);
			box-shadow: 0 3px 8px rgba(0,0,0,.15);
		}
		#cd-section-navigator .cd-nav-num {
			display: inline-flex; align-items: center; justify-content: center;
			width: 18px; height: 18px; border-radius: 50%;
			font-size: 10px; font-weight: 700;
			background: rgba(255,255,255,.35);
		}

		/* ── Meta box container styling ─────────────── */
		<?php foreach ( $sections as $s ) : ?>
		#<?php echo esc_html( $s['id'] ); ?> {
			border-top: 3px solid <?php echo esc_html( $s['color'] ); ?> !important;
			border-radius: 6px;
			overflow: hidden;
		}
		<?php endforeach; ?>

		/* ── Section header banner inside each meta box ── */
		.cd-box-header {
			display: flex; align-items: center; gap: 14px;
			padding: 14px 16px; margin: -12px -12px 16px;
			border-bottom: 1px solid #f0f0f0;
		}
		.cd-box-num {
			display: flex; align-items: center; justify-content: center;
			width: 42px; height: 42px; border-radius: 10px;
			font-size: 18px; font-weight: 800; color: #fff;
			flex-shrink: 0; letter-spacing: -1px;
		}
		.cd-box-info { flex: 1; }
		.cd-box-info h2 {
			margin: 0 0 3px; font-size: 15px; font-weight: 700; color: #1a1a1a;
			line-height: 1.2;
		}
		.cd-box-info p {
			margin: 0; font-size: 12px; color: #777; line-height: 1.4;
		}
		.cd-box-count {
			background: #f5f5f5; border: 1px solid #e5e5e5;
			border-radius: 20px; padding: 3px 10px;
			font-size: 11px; font-weight: 600; color: #555;
			white-space: nowrap;
		}

		/* ── Shared meta box layout ─────────────────── */
		.cd-meta-box { font-family: -apple-system, sans-serif; }
		.cd-section-title {
			font-size: 12px; font-weight: 700; color: #155dfc;
			text-transform: uppercase; letter-spacing: .5px;
			margin: 20px 0 10px; padding-bottom: 6px;
			border-bottom: 2px solid #eef; display: block;
		}
		.cd-grid { display: grid; gap: 16px; margin-bottom: 16px; }
		.cd-grid-2 { grid-template-columns: 1fr 1fr; }
		.cd-grid-3 { grid-template-columns: 1fr 1fr 1fr; }
		.cd-field { display: flex; flex-direction: column; gap: 4px; }
		.cd-field label { font-weight: 600; font-size: 12px; color: #333; }
		.cd-field input[type="text"],
		.cd-field input[type="url"],
		.cd-field input[type="number"],
		.cd-field textarea {
			width: 100%; padding: 8px 10px; border: 1px solid #ddd;
			border-radius: 4px; font-size: 13px; box-sizing: border-box;
		}
		.cd-field textarea { min-height: 70px; resize: vertical; }
		.cd-field .desc { font-size: 11px; color: #888; margin-top: 2px; }

		/* ── Repeater rows ──────────────────────────── */
		.cd-repeater { border: 1px solid #e0e0e0; border-radius: 6px; overflow: hidden; margin-bottom: 12px; }
		.cd-repeater-row {
			display: grid; gap: 12px; padding: 12px 14px;
			background: #fafafa; border-bottom: 1px solid #e8e8e8;
			align-items: center;
		}
		.cd-repeater-row:last-child { border-bottom: none; }
		.cd-repeater-row .cd-row-num {
			display: inline-flex; align-items: center; justify-content: center;
			width: 22px; height: 22px; border-radius: 50%;
			background: #e8eeff; color: #155dfc;
			font-weight: 700; font-size: 11px;
		}
		.cd-repeater-row input[type="text"],
		.cd-repeater-row input[type="url"],
		.cd-repeater-row textarea {
			width: 100%; padding: 7px 10px; border: 1px solid #ddd;
			border-radius: 4px; font-size: 13px; box-sizing: border-box;
		}
		.cd-repeater-row button.cd-remove-row {
			background: #fff0f0; color: #c00; border: 1px solid #ffc0c0;
			border-radius: 4px; padding: 6px 10px; cursor: pointer;
			font-size: 12px; font-weight: 600; white-space: nowrap;
			transition: background .15s;
		}
		.cd-repeater-row button.cd-remove-row:hover { background: #ff4d4d; color: #fff; border-color: #ff4d4d; }
		.cd-add-row-btn {
			display: inline-flex; align-items: center; gap: 6px;
			background: #155dfc; color: #fff; border: none;
			border-radius: 6px; padding: 8px 16px;
			font-size: 13px; font-weight: 600; cursor: pointer; margin-top: 6px;
			transition: background .15s;
		}
		.cd-add-row-btn:hover { background: #0d4ed8; }

		/* ── Image picker ───────────────────────────── */
		.cd-image-picker { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
		.cd-image-picker img { max-height: 50px; max-width: 120px; border: 1px solid #ddd; border-radius: 4px; padding: 3px; }
		.cd-image-picker .cd-pick-img,
		.cd-image-picker .cd-remove-img {
			padding: 6px 12px; font-size: 12px; cursor: pointer;
			border-radius: 4px; border: 1px solid #ddd; background: #fff;
		}
		.cd-image-picker .cd-pick-img { background: #155dfc; color: #fff; border-color: #155dfc; }
		.cd-image-picker .cd-remove-img { color: #c00; }

		/* ── Collapse/expand meta box title bar style ── */
		.postbox .hndle { cursor: pointer; }
	</style>
	<?php
}
add_action( 'admin_head', 'skillignative_cd_admin_styles' );


/* ============================================================
   MEDIA UPLOADER + NAVIGATOR + SECTION HEADERS JS
   ============================================================ */
function skillignative_cd_admin_scripts() {
	$screen = get_current_screen();
	if ( ! $screen || 'course' !== $screen->post_type ) return;
	wp_enqueue_media();

	$sections = skillignative_cd_section_meta();
	$sections_json = wp_json_encode( $sections );
	?>
	<script>
	jQuery(function($){

		/* ── 1. Generic image picker ─────────────────── */
		$(document).on('click', '.cd-pick-img', function(e){
			e.preventDefault();
			var wrap  = $(this).closest('.cd-image-picker');
			var frame = wp.media({ title: 'Select Image', button: { text: 'Use this image' }, multiple: false });
			frame.on('select', function(){
				var att = frame.state().get('selection').first().toJSON();
				wrap.find('.cd-img-id').val(att.id);
				var src = (att.sizes && att.sizes.thumbnail) ? att.sizes.thumbnail.url : att.url;
				wrap.find('.cd-img-preview').attr('src', src).show();
				wrap.find('.cd-remove-img').show();
			});
			frame.open();
		});

		$(document).on('click', '.cd-remove-img', function(e){
			e.preventDefault();
			var wrap = $(this).closest('.cd-image-picker');
			wrap.find('.cd-img-id').val('');
			wrap.find('.cd-img-preview').hide().attr('src','');
			$(this).hide();
		});


		/* ── 2. Inject section headers into each meta box ── */
		var sections = <?php echo $sections_json; ?>;

		sections.forEach(function(s) {
			var box = $('#' + s.id);
			if (!box.length) return;

			/* colored top border already set via CSS */

			/* inject header banner inside .inside */
			var inside = box.find('.inside');
			var html = '<div class="cd-box-header">'
				+ '<div class="cd-box-num" style="background:' + s.color + ';">' + s.num + '</div>'
				+ '<div class="cd-box-info">'
				+ '<h2>' + s.name + '</h2>'
				+ '<p>' + s.desc + '</p>'
				+ '</div>'
				+ '<span class="cd-box-count">Section ' + s.num + ' / 15</span>'
				+ '</div>';
			inside.prepend(html);
		});


		/* ── 3. Build sticky navigator bar ──────────── */
		var chipHtml = '';
		sections.forEach(function(s) {
			var bg     = s.color + '18';
			var border = s.color;
			chipHtml += '<span class="cd-nav-chip" data-target="' + s.id + '" '
				+ 'style="background:' + bg + ';border-color:' + border + ';color:' + border + ';cursor:pointer;" '
				+ 'title="' + s.desc + '">'
				+ '<span class="cd-nav-num" style="background:' + border + ';color:#fff;">' + s.num + '</span>'
				+ s.name
				+ '</span>';
		});

		var navBar = '<div id="cd-section-navigator">'
			+ '<span class="cd-nav-label">Course Detail — Jump to Section</span>'
			+ '<div class="cd-nav-chips">' + chipHtml + '</div>'
			+ '</div>';

		/* best placement: above #normal-sortables which holds all meta boxes */
		var inserted = false;
		if ($('#normal-sortables').length) {
			$('#normal-sortables').before(navBar);
			inserted = true;
		}
		if (!inserted && $('#cd_hero').length) {
			$('#cd_hero').before(navBar);
		}

		/* chip click → jump to section */
		$('#cd-section-navigator').on('click', '.cd-nav-chip', function(e){
			e.preventDefault();
			e.stopPropagation();

			var targetId = $(this).attr('data-target');
			var $box     = $('#' + targetId);
			if (!$box.length) return;

			/* open if collapsed */
			if ($box.hasClass('closed')) {
				$box.removeClass('closed');
			}

			/* scrollIntoView is the most reliable cross-browser method */
			$box[0].scrollIntoView({ block: 'start' });

			/* nudge up by 90px to clear the sticky bar */
			setTimeout(function(){
				window.scrollBy(0, -90);
			}, 50);
		});


		/* ── 4. Highlight active chip as user scrolls ── */
		$(window).on('scroll.cdnav', function(){
			var scrollTop = window.pageYOffset + 140;
			var active = '';
			sections.forEach(function(s){
				var box = document.getElementById(s.id);
				if (box && box.getBoundingClientRect().top + window.pageYOffset <= scrollTop) {
					active = s.id;
				}
			});
			$('.cd-nav-chip').css('box-shadow','').css('font-weight','600');
			if (active) {
				$('.cd-nav-chip[data-target="' + active + '"]')
					.css({'box-shadow':'0 2px 8px rgba(0,0,0,.2)', 'font-weight':'800'});
			}
		});

	});
	</script>
	<?php
}
add_action( 'admin_footer', 'skillignative_cd_admin_scripts' );


/* ============================================================
   SECTION 1 – HERO  meta box callback
   ============================================================ */
function skillignative_cd_hero_callback( $post ) {
	wp_nonce_field( 'skillignative_cd_nonce', 'skillignative_cd_nonce_field' );

	/* ── pull saved values ── */
	$badge_text        = get_post_meta( $post->ID, '_cd_hero_badge_text',        true ) ?: 'GOVT. RECOGNIZED CERTIFICATION';
	$title_plain       = get_post_meta( $post->ID, '_cd_hero_title_plain',       true ) ?: 'AI Infused Advanced';
	$title_highlight   = get_post_meta( $post->ID, '_cd_hero_title_highlight',   true ) ?: 'Digital Marketing Course';
	$subtitle_plain    = get_post_meta( $post->ID, '_cd_hero_subtitle_plain',    true ) ?: 'Become a Digital Marketer with the Best Digital Marketing Course with';
	$subtitle_hl       = get_post_meta( $post->ID, '_cd_hero_subtitle_hl',       true ) ?: '100% placement support.';
	$stat1_num         = get_post_meta( $post->ID, '_cd_hero_stat1_num',         true ) ?: '4.9/5';
	$stat1_label       = get_post_meta( $post->ID, '_cd_hero_stat1_label',       true ) ?: 'Rated by 3000+ Alumni';
	$stat2_num         = get_post_meta( $post->ID, '_cd_hero_stat2_num',         true ) ?: '550+';
	$stat2_label       = get_post_meta( $post->ID, '_cd_hero_stat2_label',       true ) ?: 'Hiring Partners Globally';
	$features          = get_post_meta( $post->ID, '_cd_hero_features',          true );
	$hired_label       = get_post_meta( $post->ID, '_cd_hero_hired_label',       true ) ?: 'TOP GRADUATES HIRED BY';
	$hired_logos       = get_post_meta( $post->ID, '_cd_hero_hired_logos',       true );
	$form_title        = get_post_meta( $post->ID, '_cd_hero_form_title',        true ) ?: 'Get Complete Details';
	$form_subtitle     = get_post_meta( $post->ID, '_cd_hero_form_subtitle',     true ) ?: 'About The Course';
	$form_btn_text     = get_post_meta( $post->ID, '_cd_hero_form_btn_text',     true ) ?: 'Download Brochure';
	$whatsapp_url      = get_post_meta( $post->ID, '_cd_hero_whatsapp_url',      true ) ?: '#';
	$whatsapp_text     = get_post_meta( $post->ID, '_cd_hero_whatsapp_text',     true ) ?: 'Get updates on WhatsApp';

	/* defaults for repeaters */
	if ( empty( $features ) || ! is_array( $features ) ) {
		$features = [
			'Master Performance Marketing, Programmatic Ads, GEO & AI',
			'2 Months Guaranteed Internship',
			'100% Placement Support with Portfolio Building',
			'13+ Certifications (Google, HubSpot, Meta)',
		];
	}
	if ( empty( $hired_logos ) || ! is_array( $hired_logos ) ) {
		$hired_logos = [
			[ 'id' => '', 'alt' => 'Google' ],
			[ 'id' => '', 'alt' => 'Amazon' ],
			[ 'id' => '', 'alt' => 'Adobe' ],
			[ 'id' => '', 'alt' => 'HubSpot' ],
		];
	}
	?>
	<div class="cd-meta-box">

		<!-- ── Badge & Title ─────────────────────────── -->
		<span class="cd-section-title">Badge &amp; Title</span>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Badge Text</label>
				<input type="text" name="cd_hero_badge_text" value="<?php echo esc_attr( $badge_text ); ?>">
			</div>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Title — Plain Part</label>
				<input type="text" name="cd_hero_title_plain" value="<?php echo esc_attr( $title_plain ); ?>">
				<span class="desc">Text before the blue highlight span</span>
			</div>
			<div class="cd-field">
				<label>Title — Highlighted Part <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_hero_title_highlight" value="<?php echo esc_attr( $title_highlight ); ?>">
			</div>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Subtitle — Plain Part</label>
				<input type="text" name="cd_hero_subtitle_plain" value="<?php echo esc_attr( $subtitle_plain ); ?>">
			</div>
			<div class="cd-field">
				<label>Subtitle — Highlighted Part <span style="color:#155dfc;">(blue bold)</span></label>
				<input type="text" name="cd_hero_subtitle_hl" value="<?php echo esc_attr( $subtitle_hl ); ?>">
			</div>
		</div>

		<!-- ── Stats Cards ───────────────────────────── -->
		<span class="cd-section-title">Stats Cards (Star &amp; Check)</span>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Stat 1 — Number <span style="color:#888;">(star icon)</span></label>
				<input type="text" name="cd_hero_stat1_num" value="<?php echo esc_attr( $stat1_num ); ?>" placeholder="4.9/5">
			</div>
			<div class="cd-field">
				<label>Stat 1 — Label</label>
				<input type="text" name="cd_hero_stat1_label" value="<?php echo esc_attr( $stat1_label ); ?>" placeholder="Rated by 3000+ Alumni">
			</div>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Stat 2 — Number <span style="color:#888;">(check icon)</span></label>
				<input type="text" name="cd_hero_stat2_num" value="<?php echo esc_attr( $stat2_num ); ?>" placeholder="550+">
			</div>
			<div class="cd-field">
				<label>Stat 2 — Label</label>
				<input type="text" name="cd_hero_stat2_label" value="<?php echo esc_attr( $stat2_label ); ?>" placeholder="Hiring Partners Globally">
			</div>
		</div>

		<!-- ── Feature Bullets ───────────────────────── -->
		<span class="cd-section-title">Feature Bullet Points</span>
		<div class="cd-repeater" id="cd-features-repeater">
			<?php foreach ( $features as $i => $feat ) : ?>
			<div class="cd-repeater-row" style="grid-template-columns: 30px 1fr auto;">
				<span class="cd-row-num"><?php echo $i + 1; ?></span>
				<input type="text" name="cd_hero_features[]" value="<?php echo esc_attr( $feat ); ?>" placeholder="Feature bullet text">
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-features-repeater"
			data-template='<div class="cd-repeater-row" style="grid-template-columns: 30px 1fr auto;"><span class="cd-row-num">N</span><input type="text" name="cd_hero_features[]" placeholder="Feature bullet text"><button type="button" class="cd-remove-row">Remove</button></div>'>
			+ Add Feature
		</button>

		<!-- ── Hired By Logos ────────────────────────── -->
		<span class="cd-section-title">Hired By — Label &amp; Logos</span>
		<div class="cd-field" style="max-width:400px;margin-bottom:12px;">
			<label>Section Label</label>
			<input type="text" name="cd_hero_hired_label" value="<?php echo esc_attr( $hired_label ); ?>">
		</div>
		<div class="cd-repeater" id="cd-hired-logos-repeater">
			<?php foreach ( $hired_logos as $i => $logo ) :
				$preview_src = $logo['id'] ? wp_get_attachment_image_url( $logo['id'], 'thumbnail' ) : '';
			?>
			<div class="cd-repeater-row" style="grid-template-columns: 30px 120px 1fr auto;">
				<span class="cd-row-num"><?php echo $i + 1; ?></span>
				<div class="cd-image-picker">
					<input type="hidden" name="cd_hero_hired_logos[<?php echo $i; ?>][id]" value="<?php echo esc_attr( $logo['id'] ); ?>" class="cd-img-id">
					<?php if ( $preview_src ) : ?>
						<img src="<?php echo esc_url( $preview_src ); ?>" class="cd-img-preview">
					<?php else : ?>
						<img class="cd-img-preview" style="display:none;">
					<?php endif; ?>
					<button type="button" class="cd-pick-img">Choose</button>
					<button type="button" class="cd-remove-img" <?php echo $preview_src ? '' : 'style="display:none;"'; ?>>Remove</button>
				</div>
				<input type="text" name="cd_hero_hired_logos[<?php echo $i; ?>][alt]" value="<?php echo esc_attr( $logo['alt'] ); ?>" placeholder="Alt text (e.g. Google)">
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-hired-logos-repeater"
			data-index="<?php echo count( $hired_logos ); ?>"
			data-template='<div class="cd-repeater-row" style="grid-template-columns: 30px 120px 1fr auto;"><span class="cd-row-num">N</span><div class="cd-image-picker"><input type="hidden" name="cd_hero_hired_logos[IDX][id]" value="" class="cd-img-id"><img class="cd-img-preview" style="display:none;"><button type="button" class="cd-pick-img">Choose</button><button type="button" class="cd-remove-img" style="display:none;">Remove</button></div><input type="text" name="cd_hero_hired_logos[IDX][alt]" placeholder="Alt text"><button type="button" class="cd-remove-row">Remove</button></div>'>
			+ Add Logo
		</button>

		<!-- ── Lead Form ─────────────────────────────── -->
		<span class="cd-section-title">Lead Form (right card)</span>
		<div class="cd-grid cd-grid-3">
			<div class="cd-field">
				<label>Form Card Title</label>
				<input type="text" name="cd_hero_form_title" value="<?php echo esc_attr( $form_title ); ?>">
			</div>
			<div class="cd-field">
				<label>Form Card Subtitle</label>
				<input type="text" name="cd_hero_form_subtitle" value="<?php echo esc_attr( $form_subtitle ); ?>">
			</div>
			<div class="cd-field">
				<label>Submit Button Text</label>
				<input type="text" name="cd_hero_form_btn_text" value="<?php echo esc_attr( $form_btn_text ); ?>">
			</div>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>WhatsApp URL</label>
				<input type="url" name="cd_hero_whatsapp_url" value="<?php echo esc_url( $whatsapp_url ); ?>" placeholder="https://wa.me/91XXXXXXXXXX">
			</div>
			<div class="cd-field">
				<label>WhatsApp Link Text</label>
				<input type="text" name="cd_hero_whatsapp_text" value="<?php echo esc_attr( $whatsapp_text ); ?>">
			</div>
		</div>

	</div><!-- .cd-meta-box -->

	<!-- ── Repeater JS ─────────────────────────────────── -->
	<script>
	jQuery(function($){

		/* Add row */
		$(document).on('click', '.cd-add-row-btn', function(){
			var target = '#' + $(this).data('target');
			var tpl    = $(this).data('template');
			var idx    = parseInt( $(this).data('index') || 0 );
			var count  = $(target).find('.cd-repeater-row').length + 1;
			tpl = tpl.replace(/IDX/g, idx).replace(/\bN\b/, count);
			$(this).data('index', idx + 1);
			$(target).append(tpl);
			/* renumber */
			$(target).find('.cd-row-num').each(function(i){ $(this).text(i+1); });
		});

		/* Remove row */
		$(document).on('click', '.cd-remove-row', function(){
			var repeater = $(this).closest('.cd-repeater');
			$(this).closest('.cd-repeater-row').remove();
			repeater.find('.cd-row-num').each(function(i){ $(this).text(i+1); });
		});
	});
	</script>
	<?php
}


/* ============================================================
   SECTION 2 – PLACEMENT RECORD  meta box callback
   ============================================================ */
function skillignative_cd_placement_callback( $post ) {

	$tag         = get_post_meta( $post->ID, '_cd_pr_tag',         true ) ?: 'DIGITAL MARKETING COURSE WITH PLACEMENT GUARANTEE';
	$title_plain = get_post_meta( $post->ID, '_cd_pr_title_plain', true ) ?: 'Placement Record by';
	$title_hl    = get_post_meta( $post->ID, '_cd_pr_title_hl',    true ) ?: 'IIM SKILLS';
	$description = get_post_meta( $post->ID, '_cd_pr_description', true ) ?: 'IIM SKILLS offers the best digital marketing course in India with solid placement services that have helped students land jobs at top brands, companies, & high-growth start-ups.';

	/* 4 stats — value + label */
	$s1v = get_post_meta( $post->ID, '_cd_pr_stat1_value', true ) ?: '95%';
	$s1l = get_post_meta( $post->ID, '_cd_pr_stat1_label', true ) ?: 'Placement Rate';
	$s2v = get_post_meta( $post->ID, '_cd_pr_stat2_value', true ) ?: '₹30L';
	$s2l = get_post_meta( $post->ID, '_cd_pr_stat2_label', true ) ?: 'Highest CTC';
	$s3v = get_post_meta( $post->ID, '_cd_pr_stat3_value', true ) ?: '550+';
	$s3l = get_post_meta( $post->ID, '_cd_pr_stat3_label', true ) ?: 'Recruitment Partners';
	$s4v = get_post_meta( $post->ID, '_cd_pr_stat4_value', true ) ?: '55,000+';
	$s4l = get_post_meta( $post->ID, '_cd_pr_stat4_label', true ) ?: 'Students Trained';
	?>
	<div class="cd-meta-box">

		<!-- ── Tag, Title, Description ────────────────── -->
		<span class="cd-section-title">Header</span>
		<div class="cd-field" style="margin-bottom:12px;">
			<label>Tag / Label</label>
			<input type="text" name="cd_pr_tag" value="<?php echo esc_attr( $tag ); ?>">
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Title — Plain Part</label>
				<input type="text" name="cd_pr_title_plain" value="<?php echo esc_attr( $title_plain ); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Highlighted Part <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_pr_title_hl" value="<?php echo esc_attr( $title_hl ); ?>">
			</div>
		</div>
		<div class="cd-field" style="margin-bottom:16px;">
			<label>Description</label>
			<textarea name="cd_pr_description"><?php echo esc_textarea( $description ); ?></textarea>
		</div>

		<!-- ── 4 Stats ────────────────────────────────── -->
		<span class="cd-section-title">Stats Bar (4 boxes — Purple · Red · Blue · Orange)</span>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Stat 1 Value <span style="color:#8b5cf6;">(purple)</span></label>
				<input type="text" name="cd_pr_stat1_value" value="<?php echo esc_attr( $s1v ); ?>" placeholder="95%">
			</div>
			<div class="cd-field">
				<label>Stat 1 Label</label>
				<input type="text" name="cd_pr_stat1_label" value="<?php echo esc_attr( $s1l ); ?>" placeholder="Placement Rate">
			</div>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Stat 2 Value <span style="color:#ef4444;">(red)</span></label>
				<input type="text" name="cd_pr_stat2_value" value="<?php echo esc_attr( $s2v ); ?>" placeholder="₹30L">
			</div>
			<div class="cd-field">
				<label>Stat 2 Label</label>
				<input type="text" name="cd_pr_stat2_label" value="<?php echo esc_attr( $s2l ); ?>" placeholder="Highest CTC">
			</div>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Stat 3 Value <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_pr_stat3_value" value="<?php echo esc_attr( $s3v ); ?>" placeholder="550+">
			</div>
			<div class="cd-field">
				<label>Stat 3 Label</label>
				<input type="text" name="cd_pr_stat3_label" value="<?php echo esc_attr( $s3l ); ?>" placeholder="Recruitment Partners">
			</div>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Stat 4 Value <span style="color:#f97316;">(orange)</span></label>
				<input type="text" name="cd_pr_stat4_value" value="<?php echo esc_attr( $s4v ); ?>" placeholder="55,000+">
			</div>
			<div class="cd-field">
				<label>Stat 4 Label</label>
				<input type="text" name="cd_pr_stat4_label" value="<?php echo esc_attr( $s4l ); ?>" placeholder="Students Trained">
			</div>
		</div>

	</div><!-- .cd-meta-box -->
	<?php
}


/* ============================================================
   SECTION 3 – EMPLOYMENT  meta box callback
   ============================================================ */
function skillignative_cd_employment_callback( $post ) {

	$badge_text  = get_post_meta( $post->ID, '_cd_emp_badge_text',  true ) ?: 'THE P.L.A.C.E. DELIVERY SYSTEM';
	$title_plain = get_post_meta( $post->ID, '_cd_emp_title_plain', true ) ?: 'Designed for';
	$title_hl    = get_post_meta( $post->ID, '_cd_emp_title_hl',    true ) ?: 'Employment';
	$subtitle    = get_post_meta( $post->ID, '_cd_emp_subtitle',    true ) ?: 'Why IIM SKILLS Digital Marketing Course stands different from every other institute in the market.';

	$place_cards = get_post_meta( $post->ID, '_cd_emp_place_cards', true );
	if ( empty( $place_cards ) || ! is_array( $place_cards ) ) {
		$place_cards = [
			[ 'letter' => 'P', 'title' => 'Practical',  'desc' => 'GOOGLE ADS, YOAST, ELEMENTOR, PABBLY' ],
			[ 'letter' => 'L', 'title' => 'Live',        'desc' => 'INTERACTIVE LIVE CLASSES' ],
			[ 'letter' => 'A', 'title' => 'Applied',     'desc' => 'STARBUCKS, NIKE, & HUBSPOT PROJECTS' ],
			[ 'letter' => 'C', 'title' => 'Career',      'desc' => 'PORTFOLIO & TECH GROOMING' ],
			[ 'letter' => 'E', 'title' => 'Ecosystem',   'desc' => '550+ GLOBAL HIRING PARTNERS' ],
		];
	}

	$col_iim    = get_post_meta( $post->ID, '_cd_emp_col_iim',    true ) ?: 'IIM SKILLS';
	$col_others = get_post_meta( $post->ID, '_cd_emp_col_others', true ) ?: 'OTHERS';

	$comp_rows = get_post_meta( $post->ID, '_cd_emp_comp_rows', true );
	if ( empty( $comp_rows ) || ! is_array( $comp_rows ) ) {
		$comp_rows = [
			[ 'feature' => 'Training Delivery',  'iim' => '100% Practical & Tool-Driven (Building from scratch)', 'others' => 'Theory-heavy lectures & PDF reading material' ],
			[ 'feature' => 'Live Projects',       'iim' => '25+ Assignments & Cases',                             'others' => '2-3 Projects' ],
			[ 'feature' => 'LMS Access',          'iim' => 'Lifetime Access',                                     'others' => '1 Year Limit' ],
			[ 'feature' => 'Work Experience',     'iim' => 'Guaranteed 2-Month Virtual Internship',               'others' => 'No practical work experience provided' ],
			[ 'feature' => 'Placement Support',   'iim' => 'Direct access to 550+ Active Hiring Partners',        'others' => "Basic job alerts or only 'Interview Tips'" ],
		];
	}

	$cta_title    = get_post_meta( $post->ID, '_cd_emp_cta_title',    true ) ?: 'Job Readiness Guaranteed';
	$cta_subtitle = get_post_meta( $post->ID, '_cd_emp_cta_subtitle', true ) ?: 'Join 55,000+ alumni placed globally.';
	$cta_btn_text = get_post_meta( $post->ID, '_cd_emp_cta_btn_text', true ) ?: 'APPLY NOW';
	$cta_btn_url  = get_post_meta( $post->ID, '_cd_emp_cta_btn_url',  true ) ?: '#';
	?>
	<div class="cd-meta-box">

		<!-- ── Header ────────────────────────────────── -->
		<span class="cd-section-title">Section Header</span>
		<div class="cd-field" style="margin-bottom:12px;">
			<label>Badge Text</label>
			<input type="text" name="cd_emp_badge_text" value="<?php echo esc_attr( $badge_text ); ?>">
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Title — Plain Part</label>
				<input type="text" name="cd_emp_title_plain" value="<?php echo esc_attr( $title_plain ); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Highlighted Part <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_emp_title_hl" value="<?php echo esc_attr( $title_hl ); ?>">
			</div>
		</div>
		<div class="cd-field" style="margin-bottom:16px;">
			<label>Subtitle</label>
			<textarea name="cd_emp_subtitle"><?php echo esc_textarea( $subtitle ); ?></textarea>
		</div>

		<!-- ── P.L.A.C.E. Cards ─────────────────────── -->
		<span class="cd-section-title">P.L.A.C.E. Cards</span>
		<div class="cd-repeater" id="cd-place-cards-repeater">
			<?php foreach ( $place_cards as $i => $card ) : ?>
			<div class="cd-repeater-row" style="grid-template-columns: 30px 60px 1fr 2fr auto;">
				<span class="cd-row-num"><?php echo $i + 1; ?></span>
				<input type="text" name="cd_emp_place_cards[<?php echo $i; ?>][letter]" value="<?php echo esc_attr( $card['letter'] ); ?>" placeholder="P" style="text-align:center;font-weight:700;font-size:18px;">
				<input type="text" name="cd_emp_place_cards[<?php echo $i; ?>][title]" value="<?php echo esc_attr( $card['title'] ); ?>" placeholder="Title (e.g. Practical)">
				<input type="text" name="cd_emp_place_cards[<?php echo $i; ?>][desc]" value="<?php echo esc_attr( $card['desc'] ); ?>" placeholder="Description text">
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-place-cards-repeater"
			data-index="<?php echo count( $place_cards ); ?>"
			data-template='<div class="cd-repeater-row" style="grid-template-columns: 30px 60px 1fr 2fr auto;"><span class="cd-row-num">N</span><input type="text" name="cd_emp_place_cards[IDX][letter]" placeholder="P" style="text-align:center;font-weight:700;font-size:18px;"><input type="text" name="cd_emp_place_cards[IDX][title]" placeholder="Title"><input type="text" name="cd_emp_place_cards[IDX][desc]" placeholder="Description"><button type="button" class="cd-remove-row">Remove</button></div>'>
			+ Add Card
		</button>

		<!-- ── Comparison Table ──────────────────────── -->
		<span class="cd-section-title">Comparison Table</span>
		<div class="cd-grid cd-grid-2" style="margin-bottom:12px;">
			<div class="cd-field">
				<label>Column Header — Your Brand</label>
				<input type="text" name="cd_emp_col_iim" value="<?php echo esc_attr( $col_iim ); ?>">
			</div>
			<div class="cd-field">
				<label>Column Header — Others</label>
				<input type="text" name="cd_emp_col_others" value="<?php echo esc_attr( $col_others ); ?>">
			</div>
		</div>
		<p style="font-size:12px;color:#666;margin-bottom:8px;">Each row: Feature label · Your advantage (green ✓) · Others disadvantage (red ✗)</p>
		<div class="cd-repeater" id="cd-comp-rows-repeater">
			<?php foreach ( $comp_rows as $i => $row ) : ?>
			<div class="cd-repeater-row" style="grid-template-columns: 30px 1fr 2fr 2fr auto;">
				<span class="cd-row-num"><?php echo $i + 1; ?></span>
				<input type="text" name="cd_emp_comp_rows[<?php echo $i; ?>][feature]" value="<?php echo esc_attr( $row['feature'] ); ?>" placeholder="Feature name">
				<input type="text" name="cd_emp_comp_rows[<?php echo $i; ?>][iim]" value="<?php echo esc_attr( $row['iim'] ); ?>" placeholder="Your advantage">
				<input type="text" name="cd_emp_comp_rows[<?php echo $i; ?>][others]" value="<?php echo esc_attr( $row['others'] ); ?>" placeholder="Others disadvantage">
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-comp-rows-repeater"
			data-index="<?php echo count( $comp_rows ); ?>"
			data-template='<div class="cd-repeater-row" style="grid-template-columns: 30px 1fr 2fr 2fr auto;"><span class="cd-row-num">N</span><input type="text" name="cd_emp_comp_rows[IDX][feature]" placeholder="Feature name"><input type="text" name="cd_emp_comp_rows[IDX][iim]" placeholder="Your advantage"><input type="text" name="cd_emp_comp_rows[IDX][others]" placeholder="Others disadvantage"><button type="button" class="cd-remove-row">Remove</button></div>'>
			+ Add Row
		</button>

		<!-- ── CTA Banner ────────────────────────────── -->
		<span class="cd-section-title">CTA Banner (bottom of table)</span>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>CTA Title</label>
				<input type="text" name="cd_emp_cta_title" value="<?php echo esc_attr( $cta_title ); ?>">
			</div>
			<div class="cd-field">
				<label>CTA Subtitle</label>
				<input type="text" name="cd_emp_cta_subtitle" value="<?php echo esc_attr( $cta_subtitle ); ?>">
			</div>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Button Text</label>
				<input type="text" name="cd_emp_cta_btn_text" value="<?php echo esc_attr( $cta_btn_text ); ?>">
			</div>
			<div class="cd-field">
				<label>Button URL</label>
				<input type="url" name="cd_emp_cta_btn_url" value="<?php echo esc_url( $cta_btn_url ); ?>">
			</div>
		</div>

	</div><!-- .cd-meta-box -->
	<?php
}


/* ============================================================
   SECTION 4 – CURRICULUM  meta box callback
   ============================================================ */
function skillignative_cd_curriculum_callback( $post ) {

	/* ── Section header ── */
	$tag          = get_post_meta( $post->ID, '_cd_cur_tag',          true ) ?: 'UPDATED FOR 2026';
	$title_plain  = get_post_meta( $post->ID, '_cd_cur_title_plain',  true ) ?: 'The Digital Marketing';
	$title_hl     = get_post_meta( $post->ID, '_cd_cur_title_hl',     true ) ?: 'Master Curriculum';
	$subtitle     = get_post_meta( $post->ID, '_cd_cur_subtitle',     true ) ?: 'A scientifically structured 22-module roadmap. Master every facet of digital growth.';

	/* ── Modules sub-header ── */
	$mod_title    = get_post_meta( $post->ID, '_cd_cur_mod_title',    true ) ?: 'Practitioner Mastery';
	$mod_count    = get_post_meta( $post->ID, '_cd_cur_mod_count',    true ) ?: 'MODULES 01 — 22';
	$mod_badge    = get_post_meta( $post->ID, '_cd_cur_mod_badge',    true ) ?: 'Essential Path';

	/* ── Modules accordion repeater ── */
	$modules = get_post_meta( $post->ID, '_cd_cur_modules', true );
	if ( empty( $modules ) || ! is_array( $modules ) ) {
		$modules = [
			[
				'title'        => 'Module 01: Foundations of the Digital Ecosystem',
				'meta'         => '',
				'icon_color'   => 'blue',
				'content_title'=> 'Core Foundations',
				'content_desc' => 'Understand customer psychology, market research, and the strategic difference between inbound & outbound marketing.',
				'tech_stack'   => 'GOOGLE TRENDS, SIMILARWEB, SURVEYMONKEY, ANSWERTHEPUBLIC, SPYFU',
				'outcomes'     => 'MARKET RESEARCH, PERSONAS',
			],
			[
				'title'        => 'Module 02: Professional Web Design with WordPress',
				'meta'         => 'FOUNDATIONS • CASE STUDIES • TOOLS',
				'icon_color'   => 'purple',
				'content_title'=> 'Web Design Mastery',
				'content_desc' => 'Build professional websites using WordPress, Elementor, and modern design principles for conversion optimization.',
				'tech_stack'   => 'WORDPRESS, ELEMENTOR, YOAST SEO, WPFORMS',
				'outcomes'     => 'WEBSITE BUILDING, LANDING PAGES',
			],
		];
	}

	/* ── Sidebar ── */
	$syllabus_url  = get_post_meta( $post->ID, '_cd_cur_syllabus_url',  true ) ?: '#';
	$syllabus_text = get_post_meta( $post->ID, '_cd_cur_syllabus_text', true ) ?: 'Syllabus PDF';

	$highlights = get_post_meta( $post->ID, '_cd_cur_highlights', true );
	if ( empty( $highlights ) || ! is_array( $highlights ) ) {
		$highlights = [
			'22 High-Impact Modules',
			'AI & GEO Advanced Mastery',
			'Agency Building Blueprint',
			'2 Months Virtual Internship',
		];
	}

	$counsel_text = get_post_meta( $post->ID, '_cd_cur_counsel_text',    true ) ?: 'Speak to our senior academic counselor for a profile evaluation and career roadmap.';
	$counsel_url  = get_post_meta( $post->ID, '_cd_cur_counsel_url',     true ) ?: '#';
	$counsel_btn  = get_post_meta( $post->ID, '_cd_cur_counsel_btn',     true ) ?: 'REQUEST CALL BACK';
	$cert_text    = get_post_meta( $post->ID, '_cd_cur_cert_text',       true ) ?: 'You will earn 15+ industry recognised certificates, including the prestigious Govt of India Master Certificate.';
	$cert_logos   = get_post_meta( $post->ID, '_cd_cur_cert_logos',      true ) ?: 'G, HUB, META';

	/* ── Icon color options ── */
	$color_options = [
		'blue'   => 'Blue (#3b82f6 → #1d4ed8)',
		'purple' => 'Purple (#8b5cf6 → #6d28d9)',
		'pink'   => 'Pink (#ec4899 → #be185d)',
		'red'    => 'Red (#ef4444 → #b91c1c)',
		'green'  => 'Green (#10b981 → #047857)',
		'orange' => 'Orange (#f97316 → #c2410c)',
		'cyan'   => 'Cyan (#06b6d4 → #0e7490)',
		'yellow' => 'Yellow (#f59e0b → #b45309)',
	];
	?>
	<div class="cd-meta-box">

		<!-- ── Section Header ────────────────────────── -->
		<span class="cd-section-title">Section Header</span>
		<div class="cd-field" style="margin-bottom:10px;">
			<label>Tag</label>
			<input type="text" name="cd_cur_tag" value="<?php echo esc_attr( $tag ); ?>">
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Title — Plain Part</label>
				<input type="text" name="cd_cur_title_plain" value="<?php echo esc_attr( $title_plain ); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Highlighted Part <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_cur_title_hl" value="<?php echo esc_attr( $title_hl ); ?>">
			</div>
		</div>
		<div class="cd-field" style="margin-bottom:16px;">
			<label>Subtitle</label>
			<textarea name="cd_cur_subtitle"><?php echo esc_textarea( $subtitle ); ?></textarea>
		</div>

		<!-- ── Modules Sub-Header ────────────────────── -->
		<span class="cd-section-title">Modules Header</span>
		<div class="cd-grid cd-grid-3">
			<div class="cd-field">
				<label>Modules Section Title</label>
				<input type="text" name="cd_cur_mod_title" value="<?php echo esc_attr( $mod_title ); ?>">
			</div>
			<div class="cd-field">
				<label>Module Count Label</label>
				<input type="text" name="cd_cur_mod_count" value="<?php echo esc_attr( $mod_count ); ?>" placeholder="MODULES 01 — 22">
			</div>
			<div class="cd-field">
				<label>Badge Text</label>
				<input type="text" name="cd_cur_mod_badge" value="<?php echo esc_attr( $mod_badge ); ?>">
			</div>
		</div>

		<!-- ── Modules Accordion Repeater ───────────── -->
		<span class="cd-section-title">Accordion Modules</span>
		<p style="font-size:12px;color:#666;margin-bottom:10px;">
			Each module: Title · Sub-label (optional) · Icon color · Content title · Description · Tech stack (comma-separated) · Key outcomes (comma-separated)
		</p>
		<div id="cd-modules-repeater">
			<?php foreach ( $modules as $i => $mod ) : ?>
			<div class="cd-module-row" style="border:1px solid #ddd;border-radius:6px;padding:14px;margin-bottom:10px;background:#fafafa;">
				<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
					<strong style="color:#155dfc;">Module <?php echo $i + 1; ?></strong>
					<button type="button" class="cd-remove-module" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:5px 10px;cursor:pointer;font-size:12px;">Remove</button>
				</div>
				<div class="cd-grid cd-grid-2" style="margin-bottom:8px;">
					<div class="cd-field">
						<label>Module Title</label>
						<input type="text" name="cd_cur_modules[<?php echo $i; ?>][title]" value="<?php echo esc_attr( $mod['title'] ); ?>" placeholder="Module 01: Title Here">
					</div>
					<div class="cd-field">
						<label>Sub-label (optional)</label>
						<input type="text" name="cd_cur_modules[<?php echo $i; ?>][meta]" value="<?php echo esc_attr( $mod['meta'] ?? '' ); ?>" placeholder="FOUNDATIONS • CASE STUDIES • TOOLS">
					</div>
				</div>
				<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">
					<div class="cd-field">
						<label>Icon Color</label>
						<select name="cd_cur_modules[<?php echo $i; ?>][icon_color]" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;">
							<?php foreach ( $color_options as $val => $label ) : ?>
							<option value="<?php echo esc_attr( $val ); ?>" <?php selected( $mod['icon_color'] ?? 'blue', $val ); ?>><?php echo esc_html( $label ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="cd-field">
						<label>Content Title</label>
						<input type="text" name="cd_cur_modules[<?php echo $i; ?>][content_title]" value="<?php echo esc_attr( $mod['content_title'] ?? '' ); ?>" placeholder="Core Foundations">
					</div>
					<div class="cd-field">
						<label>Tech Stack <span style="color:#888;">(comma-separated)</span></label>
						<input type="text" name="cd_cur_modules[<?php echo $i; ?>][tech_stack]" value="<?php echo esc_attr( $mod['tech_stack'] ?? '' ); ?>" placeholder="GOOGLE TRENDS, SEMRUSH">
					</div>
				</div>
				<div class="cd-grid cd-grid-2">
					<div class="cd-field">
						<label>Content Description</label>
						<textarea name="cd_cur_modules[<?php echo $i; ?>][content_desc]" style="min-height:60px;"><?php echo esc_textarea( $mod['content_desc'] ?? '' ); ?></textarea>
					</div>
					<div class="cd-field">
						<label>Key Outcomes <span style="color:#888;">(comma-separated)</span></label>
						<textarea name="cd_cur_modules[<?php echo $i; ?>][outcomes]" style="min-height:60px;"><?php echo esc_textarea( $mod['outcomes'] ?? '' ); ?></textarea>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" id="cd-add-module-btn" class="cd-add-row-btn" data-index="<?php echo count( $modules ); ?>">+ Add Module</button>

		<!-- ── Sidebar ───────────────────────────────── -->
		<span class="cd-section-title">Sidebar — Syllabus Button</span>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Button Text</label>
				<input type="text" name="cd_cur_syllabus_text" value="<?php echo esc_attr( $syllabus_text ); ?>">
			</div>
			<div class="cd-field">
				<label>Syllabus PDF URL</label>
				<input type="url" name="cd_cur_syllabus_url" value="<?php echo esc_url( $syllabus_url ); ?>">
			</div>
		</div>

		<span class="cd-section-title">Sidebar — Program Highlights</span>
		<div class="cd-repeater" id="cd-highlights-repeater">
			<?php foreach ( $highlights as $i => $hl ) : ?>
			<div class="cd-repeater-row" style="grid-template-columns: 30px 1fr auto;">
				<span class="cd-row-num"><?php echo $i + 1; ?></span>
				<input type="text" name="cd_cur_highlights[]" value="<?php echo esc_attr( $hl ); ?>" placeholder="Highlight item">
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-highlights-repeater"
			data-template='<div class="cd-repeater-row" style="grid-template-columns: 30px 1fr auto;"><span class="cd-row-num">N</span><input type="text" name="cd_cur_highlights[]" placeholder="Highlight item"><button type="button" class="cd-remove-row">Remove</button></div>'>
			+ Add Highlight
		</button>

		<span class="cd-section-title">Sidebar — Career Counseling Card</span>
		<div class="cd-field" style="margin-bottom:10px;">
			<label>Description Text</label>
			<textarea name="cd_cur_counsel_text"><?php echo esc_textarea( $counsel_text ); ?></textarea>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Button Text</label>
				<input type="text" name="cd_cur_counsel_btn" value="<?php echo esc_attr( $counsel_btn ); ?>">
			</div>
			<div class="cd-field">
				<label>Button URL</label>
				<input type="url" name="cd_cur_counsel_url" value="<?php echo esc_url( $counsel_url ); ?>">
			</div>
		</div>

		<span class="cd-section-title">Sidebar — Certification Path Card</span>
		<div class="cd-field" style="margin-bottom:10px;">
			<label>Description Text</label>
			<textarea name="cd_cur_cert_text"><?php echo esc_textarea( $cert_text ); ?></textarea>
		</div>
		<div class="cd-field">
			<label>Cert Logo Labels <span style="color:#888;">(comma-separated, e.g. G, HUB, META)</span></label>
			<input type="text" name="cd_cur_cert_logos" value="<?php echo esc_attr( $cert_logos ); ?>">
		</div>

	</div><!-- .cd-meta-box -->

	<!-- ── Module Add/Remove JS ──────────────────────── -->
	<script>
	jQuery(function($){
		var moduleIndex = parseInt($('#cd-add-module-btn').data('index') || 0);

		var colorOptions = <?php echo json_encode( $color_options ); ?>;

		function buildColorSelect(name, selected) {
			var html = '<select name="' + name + '" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;">';
			$.each(colorOptions, function(val, label){
				var sel = (val === selected) ? ' selected' : '';
				html += '<option value="' + val + '"' + sel + '>' + label + '</option>';
			});
			html += '</select>';
			return html;
		}

		$('#cd-add-module-btn').on('click', function(){
			var i = moduleIndex;
			var html = '<div class="cd-module-row" style="border:1px solid #ddd;border-radius:6px;padding:14px;margin-bottom:10px;background:#fafafa;">'
				+ '<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">'
				+ '<strong style="color:#155dfc;">Module ' + ($('#cd-modules-repeater .cd-module-row').length + 1) + '</strong>'
				+ '<button type="button" class="cd-remove-module" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:5px 10px;cursor:pointer;font-size:12px;">Remove</button>'
				+ '</div>'
				+ '<div class="cd-grid cd-grid-2" style="margin-bottom:8px;">'
				+ '<div class="cd-field"><label>Module Title</label><input type="text" name="cd_cur_modules[' + i + '][title]" placeholder="Module 0' + (i+1) + ': Title Here"></div>'
				+ '<div class="cd-field"><label>Sub-label (optional)</label><input type="text" name="cd_cur_modules[' + i + '][meta]" placeholder="FOUNDATIONS • CASE STUDIES • TOOLS"></div>'
				+ '</div>'
				+ '<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">'
				+ '<div class="cd-field"><label>Icon Color</label>' + buildColorSelect('cd_cur_modules[' + i + '][icon_color]', 'blue') + '</div>'
				+ '<div class="cd-field"><label>Content Title</label><input type="text" name="cd_cur_modules[' + i + '][content_title]" placeholder="Core Foundations"></div>'
				+ '<div class="cd-field"><label>Tech Stack (comma-separated)</label><input type="text" name="cd_cur_modules[' + i + '][tech_stack]" placeholder="TOOL1, TOOL2"></div>'
				+ '</div>'
				+ '<div class="cd-grid cd-grid-2">'
				+ '<div class="cd-field"><label>Content Description</label><textarea name="cd_cur_modules[' + i + '][content_desc]" style="min-height:60px;"></textarea></div>'
				+ '<div class="cd-field"><label>Key Outcomes (comma-separated)</label><textarea name="cd_cur_modules[' + i + '][outcomes]" style="min-height:60px;"></textarea></div>'
				+ '</div>'
				+ '</div>';
			$('#cd-modules-repeater').append(html);
			moduleIndex++;
			renumberModules();
		});

		$(document).on('click', '.cd-remove-module', function(){
			$(this).closest('.cd-module-row').remove();
			renumberModules();
		});

		function renumberModules(){
			$('#cd-modules-repeater .cd-module-row').each(function(i){
				$(this).find('strong').text('Module ' + (i+1));
			});
		}
	});
	</script>
	<?php
}


/* ============================================================
   SECTION 5 – SKILLS  meta box callback
   ============================================================ */
function skillignative_cd_skills_callback( $post ) {

	$tag         = get_post_meta( $post->ID, '_cd_sk_tag',         true ) ?: 'INDUSTRY RELEVANT TOOLS';
	$title_plain = get_post_meta( $post->ID, '_cd_sk_title_plain', true ) ?: 'Skills You Will';
	$title_hl    = get_post_meta( $post->ID, '_cd_sk_title_hl',    true ) ?: 'Master';
	$subtitle    = get_post_meta( $post->ID, '_cd_sk_subtitle',    true ) ?: 'An all-around industry-relevant training program covering 40+ core modules.';
	$core_title  = get_post_meta( $post->ID, '_cd_sk_core_title',  true ) ?: 'Core Modules & Competencies';

	$cards = get_post_meta( $post->ID, '_cd_sk_cards', true );
	if ( empty( $cards ) || ! is_array( $cards ) ) {
		$cards = [
			[ 'title' => 'AI & Automation Skills',        'tag' => 'AI',           'desc' => 'Master the use of AI in marketing & automate tasks for efficiency.',                        'color' => 'card-purple',   'icon' => 'star' ],
			[ 'title' => 'Performance Marketing',         'tag' => 'ADS',          'desc' => 'Learn how to run ROI-driven campaigns across various paid platforms.',                       'color' => 'card-yellow',   'icon' => 'chart' ],
			[ 'title' => 'Programmatic Advertising',      'tag' => 'ADS',          'desc' => 'Understand how to automate ad buying for targeting the right audience.',                    'color' => 'card-mint',     'icon' => 'grid' ],
			[ 'title' => 'Search Engine Optimization',    'tag' => 'ORGANIC',      'desc' => 'Rank on Google with on-page SEO strategies and gain organic traffic.',                      'color' => 'card-green',    'icon' => 'search' ],
			[ 'title' => 'Lead Generation',               'tag' => 'STRATEGY',     'desc' => 'Develop effective funnels that convert users into qualified leads.',                        'color' => 'card-lavender', 'icon' => 'filter' ],
			[ 'title' => 'Conversion Rate Optimization',  'tag' => 'STRATEGY',     'desc' => 'Learn how to optimize landing pages for maximum user engagement.',                          'color' => 'card-pink',     'icon' => 'star' ],
			[ 'title' => 'Search Engine Marketing',       'tag' => 'ADS',          'desc' => 'Manage Google Ads campaigns that drive quick, cost-effective traffic.',                     'color' => 'card-cyan',     'icon' => 'send' ],
			[ 'title' => 'Content Marketing',             'tag' => 'CONTENT',      'desc' => 'Make high-quality content that interests and engages users.',                               'color' => 'card-peach',    'icon' => 'document' ],
			[ 'title' => 'Analytics & Data',              'tag' => 'DATA',         'desc' => 'Analyze complex data to help in informed marketing decision-making.',                       'color' => 'card-gray',     'icon' => 'bar-chart' ],
			[ 'title' => 'Power BI Reporting',            'tag' => 'DATA',         'desc' => 'Learn to build interactive dashboards that track performance in real-time.',                'color' => 'card-yellow',   'icon' => 'grid' ],
			[ 'title' => 'OTT Ads',                       'tag' => 'ADS',          'desc' => 'Master how to attract audiences on platforms like Netflix & Hotstar.',                     'color' => 'card-purple',   'icon' => 'video' ],
			[ 'title' => 'Native Ads',                    'tag' => 'ADS',          'desc' => 'Learn to integrate ads within content to boost user engagement.',                           'color' => 'card-gray',     'icon' => 'document' ],
			[ 'title' => 'Email Marketing',               'tag' => 'MARKETING',    'desc' => 'Excel in drip campaigns, list building, and marketing automation workflows.',               'color' => 'card-blue',     'icon' => 'email' ],
			[ 'title' => 'Graphic Designing',             'tag' => 'DESIGN',       'desc' => 'Make impressive social media creatives, ads, and logos on Canva.',                          'color' => 'card-pink',     'icon' => 'target' ],
			[ 'title' => 'CV & Interview Prep',           'tag' => 'CAREER',       'desc' => 'Strengthen your resume and excel in top marketing interviews.',                             'color' => 'card-cyan',     'icon' => 'person' ],
			[ 'title' => 'Interpersonal Skills',          'tag' => 'PROFESSIONAL', 'desc' => 'Build soft skills - leadership, communication, and professional behaviour.',               'color' => 'card-gray',     'icon' => 'people' ],
		];
	}

	$cta_title    = get_post_meta( $post->ID, '_cd_sk_cta_title',    true ) ?: 'Want to know more?';
	$cta_text     = get_post_meta( $post->ID, '_cd_sk_cta_text',     true ) ?: 'Get the detailed module-wise curriculum, tool list, and placement report in our comprehensive brochure.';
	$cta_btn_text = get_post_meta( $post->ID, '_cd_sk_cta_btn_text', true ) ?: 'Download Complete Syllabus';
	$cta_btn_url  = get_post_meta( $post->ID, '_cd_sk_cta_btn_url',  true ) ?: '#';

	$color_options = [
		'card-purple'   => 'Purple',
		'card-yellow'   => 'Yellow',
		'card-mint'     => 'Mint',
		'card-green'    => 'Green',
		'card-lavender' => 'Lavender',
		'card-pink'     => 'Pink',
		'card-cyan'     => 'Cyan',
		'card-peach'    => 'Peach',
		'card-gray'     => 'Gray',
		'card-blue'     => 'Blue',
	];
	$icon_options = [
		'star'      => 'Star',
		'chart'     => 'Chart (trending up)',
		'grid'      => 'Grid (4 squares)',
		'search'    => 'Search (magnifier)',
		'filter'    => 'Filter (funnel)',
		'send'      => 'Send (plane)',
		'document'  => 'Document',
		'bar-chart' => 'Bar Chart',
		'video'     => 'Video / Screen',
		'email'     => 'Email (envelope)',
		'target'    => 'Target / Circle',
		'person'    => 'Person (single)',
		'people'    => 'People (group)',
		'lightning' => 'Lightning bolt',
		'share'     => 'Share nodes',
	];
	?>
	<div class="cd-meta-box">

		<!-- ── Section Header ────────────────────────── -->
		<span class="cd-section-title">Section Header</span>
		<div class="cd-field" style="margin-bottom:10px;">
			<label>Tag</label>
			<input type="text" name="cd_sk_tag" value="<?php echo esc_attr( $tag ); ?>">
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Title — Plain Part</label>
				<input type="text" name="cd_sk_title_plain" value="<?php echo esc_attr( $title_plain ); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Highlighted Part <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_sk_title_hl" value="<?php echo esc_attr( $title_hl ); ?>">
			</div>
		</div>
		<div class="cd-grid cd-grid-2" style="margin-bottom:16px;">
			<div class="cd-field">
				<label>Subtitle</label>
				<textarea name="cd_sk_subtitle"><?php echo esc_textarea( $subtitle ); ?></textarea>
			</div>
			<div class="cd-field">
				<label>Core Modules Section Title</label>
				<input type="text" name="cd_sk_core_title" value="<?php echo esc_attr( $core_title ); ?>">
			</div>
		</div>

		<!-- ── Skill Cards Repeater ──────────────────── -->
		<span class="cd-section-title">Skill Cards</span>
		<p style="font-size:12px;color:#666;margin-bottom:10px;">Each card: Title · Tag badge · Description · Card color · Icon</p>
		<div id="cd-sk-cards-repeater">
			<?php foreach ( $cards as $i => $card ) : ?>
			<div class="cd-sk-card-row" style="border:1px solid #ddd;border-radius:6px;padding:12px;margin-bottom:8px;background:#fafafa;">
				<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;">
					<strong style="color:#555;font-size:12px;">Card <?php echo $i + 1; ?></strong>
					<button type="button" class="cd-remove-sk-card" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button>
				</div>
				<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">
					<div class="cd-field">
						<label>Skill Title</label>
						<input type="text" name="cd_sk_cards[<?php echo $i; ?>][title]" value="<?php echo esc_attr( $card['title'] ); ?>" placeholder="e.g. AI & Automation Skills">
					</div>
					<div class="cd-field">
						<label>Tag Badge</label>
						<input type="text" name="cd_sk_cards[<?php echo $i; ?>][tag]" value="<?php echo esc_attr( $card['tag'] ); ?>" placeholder="e.g. AI, ADS, DATA">
					</div>
					<div class="cd-field">
						<label>Description</label>
						<input type="text" name="cd_sk_cards[<?php echo $i; ?>][desc]" value="<?php echo esc_attr( $card['desc'] ); ?>" placeholder="Short description">
					</div>
				</div>
				<div class="cd-grid cd-grid-2">
					<div class="cd-field">
						<label>Card Color</label>
						<select name="cd_sk_cards[<?php echo $i; ?>][color]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
							<?php foreach ( $color_options as $val => $label ) : ?>
							<option value="<?php echo esc_attr( $val ); ?>" <?php selected( $card['color'] ?? 'card-gray', $val ); ?>><?php echo esc_html( $label ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="cd-field">
						<label>Icon</label>
						<select name="cd_sk_cards[<?php echo $i; ?>][icon]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
							<?php foreach ( $icon_options as $val => $label ) : ?>
							<option value="<?php echo esc_attr( $val ); ?>" <?php selected( $card['icon'] ?? 'star', $val ); ?>><?php echo esc_html( $label ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" id="cd-add-sk-card-btn" class="cd-add-row-btn" data-index="<?php echo count( $cards ); ?>">+ Add Skill Card</button>

		<!-- ── CTA Banner ────────────────────────────── -->
		<span class="cd-section-title">CTA Banner</span>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Title</label>
				<input type="text" name="cd_sk_cta_title" value="<?php echo esc_attr( $cta_title ); ?>">
			</div>
			<div class="cd-field">
				<label>Description</label>
				<textarea name="cd_sk_cta_text" style="min-height:50px;"><?php echo esc_textarea( $cta_text ); ?></textarea>
			</div>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Button Text</label>
				<input type="text" name="cd_sk_cta_btn_text" value="<?php echo esc_attr( $cta_btn_text ); ?>">
			</div>
			<div class="cd-field">
				<label>Button URL</label>
				<input type="url" name="cd_sk_cta_btn_url" value="<?php echo esc_url( $cta_btn_url ); ?>">
			</div>
		</div>

	</div><!-- .cd-meta-box -->

	<script>
	jQuery(function($){
		var skIndex = parseInt( $('#cd-add-sk-card-btn').data('index') || 0 );
		var colorOpts = <?php echo json_encode( $color_options ); ?>;
		var iconOpts  = <?php echo json_encode( $icon_options ); ?>;

		function buildSelect(name, opts, selected) {
			var html = '<select name="' + name + '" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">';
			$.each(opts, function(val, label){
				var sel = (val === selected) ? ' selected' : '';
				html += '<option value="' + val + '"' + sel + '>' + label + '</option>';
			});
			html += '</select>';
			return html;
		}

		$('#cd-add-sk-card-btn').on('click', function(){
			var i = skIndex;
			var n = $('#cd-sk-cards-repeater .cd-sk-card-row').length + 1;
			var html = '<div class="cd-sk-card-row" style="border:1px solid #ddd;border-radius:6px;padding:12px;margin-bottom:8px;background:#fafafa;">'
				+ '<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;">'
				+ '<strong style="color:#555;font-size:12px;">Card ' + n + '</strong>'
				+ '<button type="button" class="cd-remove-sk-card" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button>'
				+ '</div>'
				+ '<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">'
				+ '<div class="cd-field"><label>Skill Title</label><input type="text" name="cd_sk_cards[' + i + '][title]" placeholder="Skill name"></div>'
				+ '<div class="cd-field"><label>Tag Badge</label><input type="text" name="cd_sk_cards[' + i + '][tag]" placeholder="e.g. AI"></div>'
				+ '<div class="cd-field"><label>Description</label><input type="text" name="cd_sk_cards[' + i + '][desc]" placeholder="Short description"></div>'
				+ '</div>'
				+ '<div class="cd-grid cd-grid-2">'
				+ '<div class="cd-field"><label>Card Color</label>' + buildSelect('cd_sk_cards[' + i + '][color]', colorOpts, 'card-gray') + '</div>'
				+ '<div class="cd-field"><label>Icon</label>' + buildSelect('cd_sk_cards[' + i + '][icon]', iconOpts, 'star') + '</div>'
				+ '</div>'
				+ '</div>';
			$('#cd-sk-cards-repeater').append(html);
			skIndex++;
			renumberSkCards();
		});

		$(document).on('click', '.cd-remove-sk-card', function(){
			$(this).closest('.cd-sk-card-row').remove();
			renumberSkCards();
		});

		function renumberSkCards(){
			$('#cd-sk-cards-repeater .cd-sk-card-row').each(function(i){
				$(this).find('strong').text('Card ' + (i+1));
			});
		}
	});
	</script>
	<?php
}


/* ============================================================
   SECTION 6 – ALUMNI TESTIMONIALS  meta box callback
   ============================================================ */
function skillignative_cd_alumni_callback( $post ) {

	$tag         = get_post_meta( $post->ID, '_cd_at_tag',         true ) ?: 'STUDENT SUCCESS STORIES';
	$title_plain = get_post_meta( $post->ID, '_cd_at_title_plain', true ) ?: 'Hear from Our';
	$title_hl    = get_post_meta( $post->ID, '_cd_at_title_hl',    true ) ?: 'Alumni';

	/* Video */
	$video_url      = get_post_meta( $post->ID, '_cd_at_video_url',      true ) ?: '';
	$video_poster   = get_post_meta( $post->ID, '_cd_at_video_poster',   true ) ?: 0;
	$video_name     = get_post_meta( $post->ID, '_cd_at_video_name',     true ) ?: '';
	$video_role     = get_post_meta( $post->ID, '_cd_at_video_role',     true ) ?: '';
	$video_company  = get_post_meta( $post->ID, '_cd_at_video_company',  true ) ?: '';

	/* Journey button */
	$journey_text = get_post_meta( $post->ID, '_cd_at_journey_text', true ) ?: 'Start Your Journey';
	$journey_url  = get_post_meta( $post->ID, '_cd_at_journey_url',  true ) ?: '#';

	/* Alumni repeater */
	$alumni = get_post_meta( $post->ID, '_cd_at_alumni', true );
	if ( empty( $alumni ) || ! is_array( $alumni ) ) {
		$alumni = [
			[ 'photo_id' => 0, 'name' => 'Gunifsa',    'company' => 'Honeywell', 'linkedin_url' => '#', 'quote' => 'Thankful for the real-time practical exposure and full support from the team.',     'testimonial' => '' ],
			[ 'photo_id' => 0, 'name' => 'Anvi',       'company' => 'Fractal',   'linkedin_url' => '#', 'quote' => 'All thanks to the faculty, in-depth training, and internship, I have my portfolio ready.', 'testimonial' => '' ],
			[ 'photo_id' => 0, 'name' => 'Kaushal',    'company' => 'Accenture', 'linkedin_url' => '#', 'quote' => 'The course was of great help, and I got to learn about various marketing skills.',  'testimonial' => '' ],
			[ 'photo_id' => 0, 'name' => 'Varun Joshi','company' => 'MNS',       'linkedin_url' => '#', 'quote' => 'The best course with a practical nature, and it helped me get a client.',           'testimonial' => '' ],
		];
	}

	$poster_src = $video_poster ? wp_get_attachment_image_url( $video_poster, 'medium' ) : '';
	?>
	<div class="cd-meta-box">

		<!-- ── Section Header ────────────────────────── -->
		<span class="cd-section-title">Section Header</span>
		<div class="cd-grid cd-grid-3">
			<div class="cd-field">
				<label>Tag</label>
				<input type="text" name="cd_at_tag" value="<?php echo esc_attr( $tag ); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Plain Part</label>
				<input type="text" name="cd_at_title_plain" value="<?php echo esc_attr( $title_plain ); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Highlighted Part <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_at_title_hl" value="<?php echo esc_attr( $title_hl ); ?>">
			</div>
		</div>

		<!-- ── Video Player ──────────────────────────── -->
		<span class="cd-section-title">Center — Video Player</span>
		<div class="cd-grid cd-grid-2" style="margin-bottom:10px;">
			<div class="cd-field">
				<label>Video URL <span style="color:#888;">(upload to Media Library, copy URL)</span></label>
				<input type="url" name="cd_at_video_url" value="<?php echo esc_url( $video_url ); ?>" placeholder="https://...mp4">
			</div>
			<div class="cd-field">
				<label>Video Poster / Thumbnail</label>
				<div class="cd-image-picker">
					<input type="hidden" name="cd_at_video_poster" value="<?php echo esc_attr( $video_poster ); ?>" class="cd-img-id">
					<?php if ( $poster_src ) : ?>
						<img src="<?php echo esc_url( $poster_src ); ?>" class="cd-img-preview">
					<?php else : ?>
						<img class="cd-img-preview" style="display:none;">
					<?php endif; ?>
					<button type="button" class="cd-pick-img">Choose</button>
					<button type="button" class="cd-remove-img" <?php echo $poster_src ? '' : 'style="display:none;"'; ?>>Remove</button>
				</div>
			</div>
		</div>
		<div class="cd-grid cd-grid-3">
			<div class="cd-field">
				<label>Video Overlay — Name</label>
				<input type="text" name="cd_at_video_name" value="<?php echo esc_attr( $video_name ); ?>" placeholder="e.g. Gunifsa">
			</div>
			<div class="cd-field">
				<label>Video Overlay — Role</label>
				<input type="text" name="cd_at_video_role" value="<?php echo esc_attr( $video_role ); ?>" placeholder="e.g. Digital Marketer">
			</div>
			<div class="cd-field">
				<label>Video Overlay — Company</label>
				<input type="text" name="cd_at_video_company" value="<?php echo esc_attr( $video_company ); ?>" placeholder="e.g. @ Honeywell">
			</div>
		</div>

		<!-- ── Alumni Cards Repeater ─────────────────── -->
		<span class="cd-section-title">Alumni List (left cards)</span>
		<p style="font-size:12px;color:#666;margin-bottom:10px;">
			Each alumnus: Photo · Name · Company · LinkedIn URL · Short quote (shown on card) · Full testimonial (shown in right detail panel when clicked)
		</p>
		<div id="cd-alumni-repeater">
			<?php foreach ( $alumni as $i => $a ) :
				$p_src = $a['photo_id'] ? wp_get_attachment_image_url( $a['photo_id'], 'thumbnail' ) : '';
			?>
			<div class="cd-alumni-row" style="border:1px solid #ddd;border-radius:6px;padding:12px;margin-bottom:10px;background:#fafafa;">
				<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
					<strong style="color:#155dfc;font-size:12px;">Alumni <?php echo $i + 1; ?></strong>
					<button type="button" class="cd-remove-alumni" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button>
				</div>
				<div class="cd-grid cd-grid-3" style="margin-bottom:8px;align-items:start;">
					<div class="cd-field">
						<label>Photo</label>
						<div class="cd-image-picker">
							<input type="hidden" name="cd_at_alumni[<?php echo $i; ?>][photo_id]" value="<?php echo esc_attr( $a['photo_id'] ); ?>" class="cd-img-id">
							<?php if ( $p_src ) : ?>
								<img src="<?php echo esc_url( $p_src ); ?>" class="cd-img-preview">
							<?php else : ?>
								<img class="cd-img-preview" style="display:none;">
							<?php endif; ?>
							<button type="button" class="cd-pick-img">Choose</button>
							<button type="button" class="cd-remove-img" <?php echo $p_src ? '' : 'style="display:none;"'; ?>>Remove</button>
						</div>
					</div>
					<div class="cd-field">
						<label>Name</label>
						<input type="text" name="cd_at_alumni[<?php echo $i; ?>][name]" value="<?php echo esc_attr( $a['name'] ); ?>" placeholder="Alumni name">
					</div>
					<div>
						<div class="cd-field" style="margin-bottom:8px;">
							<label>Company</label>
							<input type="text" name="cd_at_alumni[<?php echo $i; ?>][company]" value="<?php echo esc_attr( $a['company'] ); ?>" placeholder="Company name">
						</div>
						<div class="cd-field">
							<label>LinkedIn URL</label>
							<input type="url" name="cd_at_alumni[<?php echo $i; ?>][linkedin_url]" value="<?php echo esc_url( $a['linkedin_url'] ?? '#' ); ?>" placeholder="https://linkedin.com/in/...">
						</div>
					</div>
				</div>
				<div class="cd-grid cd-grid-2">
					<div class="cd-field">
						<label>Short Quote <span style="color:#888;">(shown on card)</span></label>
						<textarea name="cd_at_alumni[<?php echo $i; ?>][quote]" style="min-height:55px;"><?php echo esc_textarea( $a['quote'] ); ?></textarea>
					</div>
					<div class="cd-field">
						<label>Full Testimonial <span style="color:#888;">(right panel)</span></label>
						<textarea name="cd_at_alumni[<?php echo $i; ?>][testimonial]" style="min-height:55px;"><?php echo esc_textarea( $a['testimonial'] ?? '' ); ?></textarea>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" id="cd-add-alumni-btn" class="cd-add-row-btn" data-index="<?php echo count( $alumni ); ?>">+ Add Alumni</button>

		<!-- ── Journey Button ────────────────────────── -->
		<span class="cd-section-title">Right Panel — Journey Button</span>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Button Text</label>
				<input type="text" name="cd_at_journey_text" value="<?php echo esc_attr( $journey_text ); ?>">
			</div>
			<div class="cd-field">
				<label>Button URL</label>
				<input type="url" name="cd_at_journey_url" value="<?php echo esc_url( $journey_url ); ?>">
			</div>
		</div>

	</div><!-- .cd-meta-box -->

	<script>
	jQuery(function($){
		var alumniIndex = parseInt( $('#cd-add-alumni-btn').data('index') || 0 );

		$('#cd-add-alumni-btn').on('click', function(){
			var i = alumniIndex;
			var n = $('#cd-alumni-repeater .cd-alumni-row').length + 1;
			var html = '<div class="cd-alumni-row" style="border:1px solid #ddd;border-radius:6px;padding:12px;margin-bottom:10px;background:#fafafa;">'
				+ '<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">'
				+ '<strong style="color:#155dfc;font-size:12px;">Alumni ' + n + '</strong>'
				+ '<button type="button" class="cd-remove-alumni" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button>'
				+ '</div>'
				+ '<div class="cd-grid cd-grid-3" style="margin-bottom:8px;align-items:start;">'
				+ '<div class="cd-field"><label>Photo</label><div class="cd-image-picker"><input type="hidden" name="cd_at_alumni[' + i + '][photo_id]" value="" class="cd-img-id"><img class="cd-img-preview" style="display:none;"><button type="button" class="cd-pick-img">Choose</button><button type="button" class="cd-remove-img" style="display:none;">Remove</button></div></div>'
				+ '<div class="cd-field"><label>Name</label><input type="text" name="cd_at_alumni[' + i + '][name]" placeholder="Alumni name"></div>'
				+ '<div><div class="cd-field" style="margin-bottom:8px;"><label>Company</label><input type="text" name="cd_at_alumni[' + i + '][company]" placeholder="Company name"></div><div class="cd-field"><label>LinkedIn URL</label><input type="url" name="cd_at_alumni[' + i + '][linkedin_url]" placeholder="https://linkedin.com/in/..."></div></div>'
				+ '</div>'
				+ '<div class="cd-grid cd-grid-2">'
				+ '<div class="cd-field"><label>Short Quote</label><textarea name="cd_at_alumni[' + i + '][quote]" style="min-height:55px;"></textarea></div>'
				+ '<div class="cd-field"><label>Full Testimonial</label><textarea name="cd_at_alumni[' + i + '][testimonial]" style="min-height:55px;"></textarea></div>'
				+ '</div>'
				+ '</div>';
			$('#cd-alumni-repeater').append(html);
			alumniIndex++;
			renumberAlumni();
		});

		$(document).on('click', '.cd-remove-alumni', function(){
			$(this).closest('.cd-alumni-row').remove();
			renumberAlumni();
		});

		function renumberAlumni(){
			$('#cd-alumni-repeater .cd-alumni-row').each(function(i){
				$(this).find('strong').text('Alumni ' + (i+1));
			});
		}
	});
	</script>
	<?php
}


/* ============================================================
   SECTION 7 – LIVE PROJECTS  meta box callback
   ============================================================ */
function skillignative_cd_live_projects_callback( $post ) {

	$tag         = get_post_meta( $post->ID, '_cd_lp_tag',         true ) ?: 'INDUSTRY RELEVANT PROJECTS';
	$title_plain = get_post_meta( $post->ID, '_cd_lp_title_plain', true ) ?: 'Digital Marketing Course Certification';
	$title_hl    = get_post_meta( $post->ID, '_cd_lp_title_hl',    true ) ?: 'Taught Through Live Projects';
	$subtitle    = get_post_meta( $post->ID, '_cd_lp_subtitle',    true ) ?: 'Theoretical knowledge alone is not enough; our course includes 5+ brand case studies & 25+ assignments for practical learning.';
	$standards   = get_post_meta( $post->ID, '_cd_lp_standards',   true ) ?: 'DIGITAL MARKETING STANDARDS';

	$projects = get_post_meta( $post->ID, '_cd_lp_projects', true );
	if ( empty( $projects ) || ! is_array( $projects ) ) {
		$projects = [
			[ 'badge' => 'Live Project 1', 'logo_id' => 0, 'company' => 'Starbucks', 'category' => 'SOCIAL MEDIA STRATEGY', 'category_color' => 'green',  'objectives' => "Analyze best practices for moment-based marketing on Instagram & Twitter.\nDesign a viral holiday campaign calendar using Canva and AI tools.\nImplement the #Hashtag model to enhance organic brand visibility.\nCreate visual assets for stories, reels, and feed posts targeting Gen Z.\nMeasure engagement metrics (Shares, Saves, Comments) vs. Ad Spend.", 'pdf_url' => '#', 'pdf_text' => 'Project PDF' ],
			[ 'badge' => 'Live Project 2', 'logo_id' => 0, 'company' => 'Nike',      'category' => 'PERFORMANCE MARKETING', 'category_color' => 'orange', 'objectives' => "Build high-converting Google Ads campaigns for sports apparel.\nOptimize landing pages for maximum conversion rate optimization.\nImplement A/B testing strategies for ad creatives and copy.\nSet up remarketing audiences for abandoned cart recovery.\nAnalyze ROAS and optimize budget allocation across channels.",          'pdf_url' => '#', 'pdf_text' => 'Project PDF' ],
			[ 'badge' => 'Live Project 3', 'logo_id' => 0, 'company' => 'Amazon',    'category' => 'E-COMMERCE SEO',        'category_color' => 'purple', 'objectives' => "Conduct comprehensive keyword research for product listings.\nOptimize product titles, bullets, and descriptions for A9 algorithm.\nBuild backend search term strategies for improved visibility.\nCreate A+ Content for enhanced brand storytelling.\nAnalyze competitor strategies and implement differentiation tactics.", 'pdf_url' => '#', 'pdf_text' => 'Project PDF' ],
			[ 'badge' => 'Live Project 4', 'logo_id' => 0, 'company' => 'Spotify',   'category' => 'CONTENT MARKETING',    'category_color' => 'cyan',   'objectives' => "Develop a content calendar for podcast promotion campaigns.\nCreate engaging blog content around music trends and artists.\nBuild email nurture sequences for premium subscription upgrades.\nDesign infographics showcasing listening statistics and trends.\nMeasure content performance using engagement and conversion metrics.", 'pdf_url' => '#', 'pdf_text' => 'Project PDF' ],
			[ 'badge' => 'Live Project 5', 'logo_id' => 0, 'company' => 'Airbnb',    'category' => 'INFLUENCER MARKETING', 'category_color' => 'pink',   'objectives' => "Identify and outreach to travel micro-influencers globally.\nCreate influencer campaign briefs and content guidelines.\nNegotiate partnerships and manage influencer relationships.\nTrack campaign performance using UTM parameters and analytics.\nCalculate influencer ROI and optimize future collaborations.",          'pdf_url' => '#', 'pdf_text' => 'Project PDF' ],
		];
	}

	$cat_colors = [ 'green' => 'Green', 'orange' => 'Orange', 'purple' => 'Purple', 'cyan' => 'Cyan', 'pink' => 'Pink', 'blue' => 'Blue', 'red' => 'Red', 'yellow' => 'Yellow' ];
	?>
	<div class="cd-meta-box">

		<!-- ── Section Header ────────────────────────── -->
		<span class="cd-section-title">Section Header</span>
		<div class="cd-field" style="margin-bottom:10px;">
			<label>Tag</label>
			<input type="text" name="cd_lp_tag" value="<?php echo esc_attr( $tag ); ?>">
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Title — Line 1 (plain)</label>
				<input type="text" name="cd_lp_title_plain" value="<?php echo esc_attr( $title_plain ); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Line 2 highlighted <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_lp_title_hl" value="<?php echo esc_attr( $title_hl ); ?>">
			</div>
		</div>
		<div class="cd-grid cd-grid-2" style="margin-bottom:12px;">
			<div class="cd-field">
				<label>Subtitle</label>
				<textarea name="cd_lp_subtitle"><?php echo esc_textarea( $subtitle ); ?></textarea>
			</div>
			<div class="cd-field">
				<label>Standards Tag <span style="color:#888;">(shared across all cards)</span></label>
				<input type="text" name="cd_lp_standards" value="<?php echo esc_attr( $standards ); ?>">
			</div>
		</div>

		<!-- ── Project Cards Repeater ────────────────── -->
		<span class="cd-section-title">Project Cards (slider)</span>
		<p style="font-size:12px;color:#666;margin-bottom:10px;">Each card: Badge · Logo · Company · Category & color · Objectives (one per line) · PDF link</p>
		<div id="cd-lp-repeater">
			<?php foreach ( $projects as $i => $proj ) :
				$logo_src = $proj['logo_id'] ? wp_get_attachment_image_url( $proj['logo_id'], 'thumbnail' ) : '';
			?>
			<div class="cd-lp-row" style="border:1px solid #ddd;border-radius:6px;padding:14px;margin-bottom:10px;background:#fafafa;">
				<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
					<strong style="color:#155dfc;font-size:12px;">Project <?php echo $i + 1; ?></strong>
					<button type="button" class="cd-remove-lp" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button>
				</div>
				<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">
					<div class="cd-field">
						<label>Badge Label</label>
						<input type="text" name="cd_lp_projects[<?php echo $i; ?>][badge]" value="<?php echo esc_attr( $proj['badge'] ); ?>" placeholder="Live Project 1">
					</div>
					<div class="cd-field">
						<label>Company Name</label>
						<input type="text" name="cd_lp_projects[<?php echo $i; ?>][company]" value="<?php echo esc_attr( $proj['company'] ); ?>" placeholder="e.g. Starbucks">
					</div>
					<div class="cd-field">
						<label>Logo Image</label>
						<div class="cd-image-picker">
							<input type="hidden" name="cd_lp_projects[<?php echo $i; ?>][logo_id]" value="<?php echo esc_attr( $proj['logo_id'] ); ?>" class="cd-img-id">
							<?php if ( $logo_src ) : ?>
								<img src="<?php echo esc_url( $logo_src ); ?>" class="cd-img-preview">
							<?php else : ?>
								<img class="cd-img-preview" style="display:none;">
							<?php endif; ?>
							<button type="button" class="cd-pick-img">Choose</button>
							<button type="button" class="cd-remove-img" <?php echo $logo_src ? '' : 'style="display:none;"'; ?>>Remove</button>
						</div>
					</div>
				</div>
				<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">
					<div class="cd-field">
						<label>Category Label</label>
						<input type="text" name="cd_lp_projects[<?php echo $i; ?>][category]" value="<?php echo esc_attr( $proj['category'] ); ?>" placeholder="SOCIAL MEDIA STRATEGY">
					</div>
					<div class="cd-field">
						<label>Category Color</label>
						<select name="cd_lp_projects[<?php echo $i; ?>][category_color]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
							<?php foreach ( $cat_colors as $val => $lbl ) : ?>
							<option value="<?php echo esc_attr( $val ); ?>" <?php selected( $proj['category_color'] ?? 'green', $val ); ?>><?php echo esc_html( $lbl ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div style="display:grid;gap:8px;">
						<div class="cd-field">
							<label>PDF Button Text</label>
							<input type="text" name="cd_lp_projects[<?php echo $i; ?>][pdf_text]" value="<?php echo esc_attr( $proj['pdf_text'] ?? 'Project PDF' ); ?>">
						</div>
						<div class="cd-field">
							<label>PDF URL</label>
							<input type="url" name="cd_lp_projects[<?php echo $i; ?>][pdf_url]" value="<?php echo esc_url( $proj['pdf_url'] ?? '#' ); ?>">
						</div>
					</div>
				</div>
				<div class="cd-field">
					<label>Key Objectives <span style="color:#888;">(one per line)</span></label>
					<textarea name="cd_lp_projects[<?php echo $i; ?>][objectives]" style="min-height:100px;"><?php echo esc_textarea( $proj['objectives'] ); ?></textarea>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" id="cd-add-lp-btn" class="cd-add-row-btn" data-index="<?php echo count( $projects ); ?>">+ Add Project Card</button>

	</div><!-- .cd-meta-box -->

	<script>
	jQuery(function($){
		var lpIndex = parseInt( $('#cd-add-lp-btn').data('index') || 0 );
		var catColors = <?php echo json_encode( $cat_colors ); ?>;

		function buildSelect(name, opts, sel) {
			var html = '<select name="' + name + '" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">';
			$.each(opts, function(v, l){ html += '<option value="'+v+'"'+(v===sel?' selected':'')+'>'+l+'</option>'; });
			return html + '</select>';
		}

		$('#cd-add-lp-btn').on('click', function(){
			var i = lpIndex;
			var n = $('#cd-lp-repeater .cd-lp-row').length + 1;
			var html = '<div class="cd-lp-row" style="border:1px solid #ddd;border-radius:6px;padding:14px;margin-bottom:10px;background:#fafafa;">'
				+'<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;"><strong style="color:#155dfc;font-size:12px;">Project '+n+'</strong><button type="button" class="cd-remove-lp" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button></div>'
				+'<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">'
				+'<div class="cd-field"><label>Badge Label</label><input type="text" name="cd_lp_projects['+i+'][badge]" placeholder="Live Project '+n+'"></div>'
				+'<div class="cd-field"><label>Company Name</label><input type="text" name="cd_lp_projects['+i+'][company]" placeholder="Company"></div>'
				+'<div class="cd-field"><label>Logo Image</label><div class="cd-image-picker"><input type="hidden" name="cd_lp_projects['+i+'][logo_id]" value="" class="cd-img-id"><img class="cd-img-preview" style="display:none;"><button type="button" class="cd-pick-img">Choose</button><button type="button" class="cd-remove-img" style="display:none;">Remove</button></div></div>'
				+'</div>'
				+'<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">'
				+'<div class="cd-field"><label>Category Label</label><input type="text" name="cd_lp_projects['+i+'][category]" placeholder="CATEGORY"></div>'
				+'<div class="cd-field"><label>Category Color</label>'+buildSelect('cd_lp_projects['+i+'][category_color]',catColors,'green')+'</div>'
				+'<div style="display:grid;gap:8px;"><div class="cd-field"><label>PDF Text</label><input type="text" name="cd_lp_projects['+i+'][pdf_text]" value="Project PDF"></div><div class="cd-field"><label>PDF URL</label><input type="url" name="cd_lp_projects['+i+'][pdf_url]" value="#"></div></div>'
				+'</div>'
				+'<div class="cd-field"><label>Key Objectives (one per line)</label><textarea name="cd_lp_projects['+i+'][objectives]" style="min-height:100px;"></textarea></div>'
				+'</div>';
			$('#cd-lp-repeater').append(html);
			lpIndex++;
			renumberLp();
		});

		$(document).on('click', '.cd-remove-lp', function(){
			$(this).closest('.cd-lp-row').remove();
			renumberLp();
		});

		function renumberLp(){
			$('#cd-lp-repeater .cd-lp-row').each(function(i){ $(this).find('strong').text('Project '+(i+1)); });
		}
	});
	</script>
	<?php
}


/* ============================================================
   SECTION 8 – PORTFOLIO  meta box callback
   ============================================================ */
function skillignative_cd_portfolio_callback( $post ) {

	/* Header */
	$badge_text  = get_post_meta( $post->ID, '_cd_pf_badge_text',  true ) ?: 'LinkedIn Ready';
	$title_plain = get_post_meta( $post->ID, '_cd_pf_title_plain', true ) ?: 'Build a';
	$title_hl    = get_post_meta( $post->ID, '_cd_pf_title_hl',    true ) ?: 'Standout Portfolio';
	$subtitle    = get_post_meta( $post->ID, '_cd_pf_subtitle',    true ) ?: 'Show companies what you bring to the table by building a solid portfolio, including your work on 25+ live projects.';

	/* Course Info Card */
	$card_badge    = get_post_meta( $post->ID, '_cd_pf_card_badge',    true ) ?: 'IIM SKILLS MASTER COURSE';
	$card_title_pl = get_post_meta( $post->ID, '_cd_pf_card_title_pl', true ) ?: 'Master the Art of';
	$card_title_hl = get_post_meta( $post->ID, '_cd_pf_card_title_hl', true ) ?: 'Digital Marketing';
	$card_subtitle = get_post_meta( $post->ID, '_cd_pf_card_subtitle', true ) ?: 'Practical Training for Global Digital Marketing Careers.';
	$cert_btn_text = get_post_meta( $post->ID, '_cd_pf_cert_btn_text', true ) ?: 'Start My Certification';
	$cert_btn_url  = get_post_meta( $post->ID, '_cd_pf_cert_btn_url',  true ) ?: '#';

	$features = get_post_meta( $post->ID, '_cd_pf_features', true );
	if ( empty( $features ) || ! is_array( $features ) ) {
		$features = [
			[ 'icon_color' => 'purple', 'title' => 'Showcase Your Skillset',   'desc' => 'Prove your expertise by showcasing your work, including social media calendars, Google Ads Plans, and SEO Audit Reports.' ],
			[ 'icon_color' => 'blue',   'title' => 'Master Design Tools',      'desc' => 'Build proficiency in tools such as Canva and AI generators, and build case studies that make you stand out & attract recruiters.' ],
			[ 'icon_color' => 'orange', 'title' => 'Excel in Client Pitching', 'desc' => 'We help you understand how to convert your assignments into a "Service Deck" that can be sent to potential freelance clients.' ],
		];
	}

	/* Alumni Impact Card */
	$impact_title     = get_post_meta( $post->ID, '_cd_pf_impact_title',     true ) ?: 'IIM SKILLS Alumni Impact';
	$impact_text      = get_post_meta( $post->ID, '_cd_pf_impact_text',      true ) ?: 'Our graduates are 3.5x more likely to be shortlisted for Marketing roles at top global firms.';
	$impact_link_text = get_post_meta( $post->ID, '_cd_pf_impact_link_text', true ) ?: 'Access Career Support Portal';
	$impact_link_url  = get_post_meta( $post->ID, '_cd_pf_impact_link_url',  true ) ?: '#';

	/* LinkedIn Profile Card */
	$li_watermark  = get_post_meta( $post->ID, '_cd_pf_li_watermark',  true ) ?: 'IIM SKILLS';
	$li_badge      = get_post_meta( $post->ID, '_cd_pf_li_badge',      true ) ?: 'DIGITAL MARKETING';
	$li_master     = get_post_meta( $post->ID, '_cd_pf_li_master',     true ) ?: 'Master Course @ IIM SKILLS';
	$li_photo      = get_post_meta( $post->ID, '_cd_pf_li_photo',      true ) ?: 0;
	$li_name       = get_post_meta( $post->ID, '_cd_pf_li_name',       true ) ?: 'Alex Richardson';
	$li_title      = get_post_meta( $post->ID, '_cd_pf_li_title',      true ) ?: 'Digital Marketer & SEO Specialist | Master Course @ IIM SKILLS';
	$li_location   = get_post_meta( $post->ID, '_cd_pf_li_location',   true ) ?: 'London, UK';
	$li_connections= get_post_meta( $post->ID, '_cd_pf_li_connections',true ) ?: '500+';

	$li_skills = get_post_meta( $post->ID, '_cd_pf_li_skills', true );
	if ( empty( $li_skills ) || ! is_array( $li_skills ) ) {
		$li_skills = [
			[ 'name' => 'Digital Marketing (IIM SKILLS Certified)', 'endorsement' => 'Endorsed by 24 others at Nike' ],
			[ 'name' => 'Analytics (ROI & ROAS)',                   'endorsement' => 'IIM SKILLS Final Assessment Passed' ],
		];
	}

	$li_portfolio = get_post_meta( $post->ID, '_cd_pf_li_portfolio', true );
	if ( empty( $li_portfolio ) || ! is_array( $li_portfolio ) ) {
		$li_portfolio = [
			[ 'tag' => 'IIM PROJECT',   'title' => 'High-Roas Google Ads',    'desc' => 'Real-world Google Ads (SEM) Campaign from IIM SKILLS module 3',      'gradient' => 'blue-gradient'   ],
			[ 'tag' => 'ADVANCED CASE', 'title' => 'Social Media Strategy',   'desc' => 'High-impact social media strategy with performance analysis',          'gradient' => 'purple-gradient' ],
		];
	}

	$li_photo_src = $li_photo ? wp_get_attachment_image_url( $li_photo, 'thumbnail' ) : '';
	$icon_colors  = [ 'purple' => 'Purple', 'blue' => 'Blue', 'orange' => 'Orange', 'green' => 'Green', 'red' => 'Red' ];
	$gradients    = [ 'blue-gradient' => 'Blue', 'purple-gradient' => 'Purple', 'green-gradient' => 'Green', 'orange-gradient' => 'Orange' ];
	?>
	<div class="cd-meta-box">

		<!-- ── Section Header ────────────────────────── -->
		<span class="cd-section-title">Section Header</span>
		<div class="cd-grid cd-grid-3" style="margin-bottom:10px;">
			<div class="cd-field">
				<label>Badge Text</label>
				<input type="text" name="cd_pf_badge_text" value="<?php echo esc_attr( $badge_text ); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Plain Part</label>
				<input type="text" name="cd_pf_title_plain" value="<?php echo esc_attr( $title_plain ); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Highlighted <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_pf_title_hl" value="<?php echo esc_attr( $title_hl ); ?>">
			</div>
		</div>
		<div class="cd-field" style="margin-bottom:16px;">
			<label>Subtitle</label>
			<textarea name="cd_pf_subtitle"><?php echo esc_textarea( $subtitle ); ?></textarea>
		</div>

		<!-- ── Course Info Card ──────────────────────── -->
		<span class="cd-section-title">Left Column — Course Info Card</span>
		<div class="cd-grid cd-grid-2" style="margin-bottom:8px;">
			<div class="cd-field">
				<label>Card Badge</label>
				<input type="text" name="cd_pf_card_badge" value="<?php echo esc_attr( $card_badge ); ?>">
			</div>
			<div class="cd-field">
				<label>Card Subtitle</label>
				<input type="text" name="cd_pf_card_subtitle" value="<?php echo esc_attr( $card_subtitle ); ?>">
			</div>
		</div>
		<div class="cd-grid cd-grid-2" style="margin-bottom:8px;">
			<div class="cd-field">
				<label>Card Title — Plain</label>
				<input type="text" name="cd_pf_card_title_pl" value="<?php echo esc_attr( $card_title_pl ); ?>">
			</div>
			<div class="cd-field">
				<label>Card Title — Highlighted <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_pf_card_title_hl" value="<?php echo esc_attr( $card_title_hl ); ?>">
			</div>
		</div>

		<p style="font-size:12px;color:#666;margin-bottom:8px;">Feature items (icon color · title · description)</p>
		<div class="cd-repeater" id="cd-pf-features-repeater">
			<?php foreach ( $features as $i => $feat ) : ?>
			<div class="cd-repeater-row" style="grid-template-columns:30px 100px 1fr 2fr auto;align-items:start;">
				<span class="cd-row-num"><?php echo $i + 1; ?></span>
				<select name="cd_pf_features[<?php echo $i; ?>][icon_color]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;">
					<?php foreach ( $icon_colors as $v => $l ) : ?>
					<option value="<?php echo esc_attr($v); ?>" <?php selected($feat['icon_color']??'purple',$v); ?>><?php echo esc_html($l); ?></option>
					<?php endforeach; ?>
				</select>
				<input type="text" name="cd_pf_features[<?php echo $i; ?>][title]" value="<?php echo esc_attr($feat['title']); ?>" placeholder="Feature title">
				<textarea name="cd_pf_features[<?php echo $i; ?>][desc]" style="min-height:55px;"><?php echo esc_textarea($feat['desc']); ?></textarea>
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-pf-features-repeater"
			data-index="<?php echo count($features); ?>"
			data-template='<div class="cd-repeater-row" style="grid-template-columns:30px 100px 1fr 2fr auto;align-items:start;"><span class="cd-row-num">N</span><select name="cd_pf_features[IDX][icon_color]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;"><option value="purple">Purple</option><option value="blue">Blue</option><option value="orange">Orange</option><option value="green">Green</option><option value="red">Red</option></select><input type="text" name="cd_pf_features[IDX][title]" placeholder="Feature title"><textarea name="cd_pf_features[IDX][desc]" style="min-height:55px;"></textarea><button type="button" class="cd-remove-row">Remove</button></div>'>
			+ Add Feature
		</button>

		<div class="cd-grid cd-grid-2" style="margin-top:12px;">
			<div class="cd-field">
				<label>CTA Button Text</label>
				<input type="text" name="cd_pf_cert_btn_text" value="<?php echo esc_attr($cert_btn_text); ?>">
			</div>
			<div class="cd-field">
				<label>CTA Button URL</label>
				<input type="url" name="cd_pf_cert_btn_url" value="<?php echo esc_url($cert_btn_url); ?>">
			</div>
		</div>

		<!-- ── Alumni Impact Card ────────────────────── -->
		<span class="cd-section-title">Left Column — Alumni Impact Card</span>
		<div class="cd-field" style="margin-bottom:8px;">
			<label>Title</label>
			<input type="text" name="cd_pf_impact_title" value="<?php echo esc_attr($impact_title); ?>">
		</div>
		<div class="cd-field" style="margin-bottom:8px;">
			<label>Text</label>
			<textarea name="cd_pf_impact_text"><?php echo esc_textarea($impact_text); ?></textarea>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Link Text</label>
				<input type="text" name="cd_pf_impact_link_text" value="<?php echo esc_attr($impact_link_text); ?>">
			</div>
			<div class="cd-field">
				<label>Link URL</label>
				<input type="url" name="cd_pf_impact_link_url" value="<?php echo esc_url($impact_link_url); ?>">
			</div>
		</div>

		<!-- ── LinkedIn Profile Card ─────────────────── -->
		<span class="cd-section-title">Right Column — LinkedIn-style Profile Card</span>
		<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">
			<div class="cd-field">
				<label>Header Watermark Text</label>
				<input type="text" name="cd_pf_li_watermark" value="<?php echo esc_attr($li_watermark); ?>">
			</div>
			<div class="cd-field">
				<label>Corner Badge Text</label>
				<input type="text" name="cd_pf_li_badge" value="<?php echo esc_attr($li_badge); ?>">
			</div>
			<div class="cd-field">
				<label>Corner Sub-text</label>
				<input type="text" name="cd_pf_li_master" value="<?php echo esc_attr($li_master); ?>">
			</div>
		</div>
		<div class="cd-grid cd-grid-2" style="margin-bottom:8px;align-items:start;">
			<div class="cd-field">
				<label>Profile Photo</label>
				<div class="cd-image-picker">
					<input type="hidden" name="cd_pf_li_photo" value="<?php echo esc_attr($li_photo); ?>" class="cd-img-id">
					<?php if ( $li_photo_src ) : ?><img src="<?php echo esc_url($li_photo_src); ?>" class="cd-img-preview"><?php else : ?><img class="cd-img-preview" style="display:none;"><?php endif; ?>
					<button type="button" class="cd-pick-img">Choose</button>
					<button type="button" class="cd-remove-img" <?php echo $li_photo_src ? '' : 'style="display:none;"'; ?>>Remove</button>
				</div>
			</div>
			<div>
				<div class="cd-field" style="margin-bottom:8px;">
					<label>Name</label>
					<input type="text" name="cd_pf_li_name" value="<?php echo esc_attr($li_name); ?>">
				</div>
				<div class="cd-field" style="margin-bottom:8px;">
					<label>Profile Title / Headline</label>
					<input type="text" name="cd_pf_li_title" value="<?php echo esc_attr($li_title); ?>">
				</div>
				<div class="cd-grid cd-grid-2">
					<div class="cd-field">
						<label>Location</label>
						<input type="text" name="cd_pf_li_location" value="<?php echo esc_attr($li_location); ?>">
					</div>
					<div class="cd-field">
						<label>Connections</label>
						<input type="text" name="cd_pf_li_connections" value="<?php echo esc_attr($li_connections); ?>" placeholder="500+">
					</div>
				</div>
			</div>
		</div>

		<p style="font-size:12px;color:#666;margin-bottom:8px;">Top Skills (skill name · endorsement text)</p>
		<div class="cd-repeater" id="cd-pf-skills-repeater">
			<?php foreach ( $li_skills as $i => $sk ) : ?>
			<div class="cd-repeater-row" style="grid-template-columns:30px 2fr 2fr auto;">
				<span class="cd-row-num"><?php echo $i+1; ?></span>
				<input type="text" name="cd_pf_li_skills[<?php echo $i; ?>][name]" value="<?php echo esc_attr($sk['name']); ?>" placeholder="Skill name">
				<input type="text" name="cd_pf_li_skills[<?php echo $i; ?>][endorsement]" value="<?php echo esc_attr($sk['endorsement']); ?>" placeholder="Endorsed by...">
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-pf-skills-repeater"
			data-template='<div class="cd-repeater-row" style="grid-template-columns:30px 2fr 2fr auto;"><span class="cd-row-num">N</span><input type="text" name="cd_pf_li_skills[IDX][name]" placeholder="Skill name"><input type="text" name="cd_pf_li_skills[IDX][endorsement]" placeholder="Endorsed by..."><button type="button" class="cd-remove-row">Remove</button></div>'>
			+ Add Skill
		</button>

		<p style="font-size:12px;color:#666;margin-top:12px;margin-bottom:8px;">Featured Portfolio Items (tag · title · description · gradient color)</p>
		<div class="cd-repeater" id="cd-pf-portfolio-repeater">
			<?php foreach ( $li_portfolio as $i => $pi ) : ?>
			<div class="cd-repeater-row" style="grid-template-columns:30px 80px 1fr 2fr 90px auto;align-items:start;">
				<span class="cd-row-num"><?php echo $i+1; ?></span>
				<input type="text" name="cd_pf_li_portfolio[<?php echo $i; ?>][tag]" value="<?php echo esc_attr($pi['tag']); ?>" placeholder="IIM PROJECT">
				<input type="text" name="cd_pf_li_portfolio[<?php echo $i; ?>][title]" value="<?php echo esc_attr($pi['title']); ?>" placeholder="Title">
				<input type="text" name="cd_pf_li_portfolio[<?php echo $i; ?>][desc]" value="<?php echo esc_attr($pi['desc']); ?>" placeholder="Description">
				<select name="cd_pf_li_portfolio[<?php echo $i; ?>][gradient]" style="padding:7px;border:1px solid #ddd;border-radius:4px;">
					<?php foreach ( $gradients as $v => $l ) : ?><option value="<?php echo esc_attr($v); ?>" <?php selected($pi['gradient']??'blue-gradient',$v); ?>><?php echo esc_html($l); ?></option><?php endforeach; ?>
				</select>
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-pf-portfolio-repeater"
			data-index="<?php echo count($li_portfolio); ?>"
			data-template='<div class="cd-repeater-row" style="grid-template-columns:30px 80px 1fr 2fr 90px auto;align-items:start;"><span class="cd-row-num">N</span><input type="text" name="cd_pf_li_portfolio[IDX][tag]" placeholder="IIM PROJECT"><input type="text" name="cd_pf_li_portfolio[IDX][title]" placeholder="Title"><input type="text" name="cd_pf_li_portfolio[IDX][desc]" placeholder="Description"><select name="cd_pf_li_portfolio[IDX][gradient]" style="padding:7px;border:1px solid #ddd;border-radius:4px;"><option value="blue-gradient">Blue</option><option value="purple-gradient">Purple</option><option value="green-gradient">Green</option><option value="orange-gradient">Orange</option></select><button type="button" class="cd-remove-row">Remove</button></div>'>
			+ Add Portfolio Item
		</button>

	</div><!-- .cd-meta-box -->
	<?php
}


/* ============================================================
   SECTION 9 – RECRUITER FEEDBACK  meta box callback
   ============================================================ */
function skillignative_cd_recruiter_callback( $post ) {

	$tag         = get_post_meta( $post->ID, '_cd_rf_tag',         true ) ?: 'RECRUITER FEEDBACK';
	$title_plain = get_post_meta( $post->ID, '_cd_rf_title_plain', true ) ?: 'Why Top Companies';
	$title_hl    = get_post_meta( $post->ID, '_cd_rf_title_hl',    true ) ?: 'Hire Through Us';
	$subtitle    = get_post_meta( $post->ID, '_cd_rf_subtitle',    true ) ?: 'Direct feedback from hiring managers who value the practical skills of our alumni.';

	$cards = get_post_meta( $post->ID, '_cd_rf_cards', true );
	if ( empty( $cards ) || ! is_array( $cards ) ) {
		$cards = [
			[ 'company_name' => 'Barclays',          'company_logo_id' => 0, 'header_bg' => '#1a1f36', 'logo_style' => 'white', 'avatar_id' => 0, 'name' => 'Onkar Yadav',     'position' => 'AVP',              'rating' => 5, 'rating_color' => 'default', 'quote' => 'I have been hiring from IIM SKILLS for a while and the process has been very smooth. The students bring in real skills and talent to our team.' ],
			[ 'company_name' => 'Ernst & Young',     'company_logo_id' => 0, 'header_bg' => '#ffe600', 'logo_style' => 'dark',  'avatar_id' => 0, 'name' => 'Mohit Budhiraja', 'position' => 'ASSISTANT MANAGER','rating' => 5, 'rating_color' => 'default', 'quote' => 'IIM SKILLS is always my first choice for hiring Marketing professionals. I have personally interviewed their students and find them highly qualified.' ],
			[ 'company_name' => 'The Algebra Group', 'company_logo_id' => 0, 'header_bg' => '#2d1b69', 'logo_style' => 'white', 'avatar_id' => 0, 'name' => 'Ishant Ghai',     'position' => 'VICE PRESIDENT',  'rating' => 5, 'rating_color' => 'blue',    'quote' => 'What makes analysts smart is their technical as well as soft skills. I get to see both of them when I hire from IIM SKILLS.' ],
		];
	}

	$logo_styles    = [ 'white' => 'White (for dark bg)', 'dark' => 'Dark (for light bg)' ];
	$rating_colors  = [ 'default' => 'Gold / Yellow', 'blue' => 'Blue' ];
	?>
	<div class="cd-meta-box">

		<!-- ── Section Header ────────────────────────── -->
		<span class="cd-section-title">Section Header</span>
		<div class="cd-field" style="margin-bottom:10px;">
			<label>Tag</label>
			<input type="text" name="cd_rf_tag" value="<?php echo esc_attr( $tag ); ?>">
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Title — Plain Part</label>
				<input type="text" name="cd_rf_title_plain" value="<?php echo esc_attr( $title_plain ); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Highlighted <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_rf_title_hl" value="<?php echo esc_attr( $title_hl ); ?>">
			</div>
		</div>
		<div class="cd-field" style="margin-bottom:16px;">
			<label>Subtitle</label>
			<textarea name="cd_rf_subtitle"><?php echo esc_textarea( $subtitle ); ?></textarea>
		</div>

		<!-- ── Recruiter Cards Repeater ──────────────── -->
		<span class="cd-section-title">Recruiter Cards</span>
		<p style="font-size:12px;color:#666;margin-bottom:10px;">
			Each card: Company name · Company logo · Header bg color · Recruiter photo · Name · Position · Star rating · Quote.<br>
			<strong>Tip:</strong> Add 3–6 unique cards. The slider auto-scrolls indefinitely.
		</p>
		<div id="cd-rf-repeater">
			<?php foreach ( $cards as $i => $card ) :
				$logo_src   = $card['company_logo_id'] ? wp_get_attachment_image_url( $card['company_logo_id'], 'thumbnail' ) : '';
				$avatar_src = $card['avatar_id']        ? wp_get_attachment_image_url( $card['avatar_id'],        'thumbnail' ) : '';
			?>
			<div class="cd-rf-row" style="border:1px solid #ddd;border-radius:6px;padding:14px;margin-bottom:10px;background:#fafafa;">
				<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
					<strong style="color:#155dfc;font-size:12px;">Card <?php echo $i + 1; ?></strong>
					<button type="button" class="cd-remove-rf" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button>
				</div>

				<!-- Company row -->
				<div class="cd-grid cd-grid-3" style="margin-bottom:8px;align-items:end;">
					<div class="cd-field">
						<label>Company Name</label>
						<input type="text" name="cd_rf_cards[<?php echo $i; ?>][company_name]" value="<?php echo esc_attr($card['company_name']); ?>" placeholder="e.g. Barclays">
					</div>
					<div class="cd-field">
						<label>Company Logo</label>
						<div class="cd-image-picker">
							<input type="hidden" name="cd_rf_cards[<?php echo $i; ?>][company_logo_id]" value="<?php echo esc_attr($card['company_logo_id']); ?>" class="cd-img-id">
							<?php if ($logo_src): ?><img src="<?php echo esc_url($logo_src); ?>" class="cd-img-preview"><?php else: ?><img class="cd-img-preview" style="display:none;"><?php endif; ?>
							<button type="button" class="cd-pick-img">Choose</button>
							<button type="button" class="cd-remove-img" <?php echo $logo_src ? '' : 'style="display:none;"'; ?>>Remove</button>
						</div>
					</div>
					<div class="cd-grid" style="gap:8px;">
						<div class="cd-field">
							<label>Header Background Color</label>
							<input type="color" name="cd_rf_cards[<?php echo $i; ?>][header_bg]" value="<?php echo esc_attr($card['header_bg'] ?? '#1a1f36'); ?>" style="width:100%;height:38px;padding:2px;border:1px solid #ddd;border-radius:4px;cursor:pointer;">
						</div>
						<div class="cd-field">
							<label>Logo Style</label>
							<select name="cd_rf_cards[<?php echo $i; ?>][logo_style]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
								<?php foreach ($logo_styles as $v => $l): ?><option value="<?php echo esc_attr($v); ?>" <?php selected($card['logo_style']??'white',$v); ?>><?php echo esc_html($l); ?></option><?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>

				<!-- Recruiter row -->
				<div class="cd-grid cd-grid-3" style="margin-bottom:8px;align-items:start;">
					<div class="cd-field">
						<label>Recruiter Photo</label>
						<div class="cd-image-picker">
							<input type="hidden" name="cd_rf_cards[<?php echo $i; ?>][avatar_id]" value="<?php echo esc_attr($card['avatar_id']); ?>" class="cd-img-id">
							<?php if ($avatar_src): ?><img src="<?php echo esc_url($avatar_src); ?>" class="cd-img-preview"><?php else: ?><img class="cd-img-preview" style="display:none;"><?php endif; ?>
							<button type="button" class="cd-pick-img">Choose</button>
							<button type="button" class="cd-remove-img" <?php echo $avatar_src ? '' : 'style="display:none;"'; ?>>Remove</button>
						</div>
					</div>
					<div>
						<div class="cd-field" style="margin-bottom:8px;">
							<label>Recruiter Name</label>
							<input type="text" name="cd_rf_cards[<?php echo $i; ?>][name]" value="<?php echo esc_attr($card['name']); ?>" placeholder="Full name">
						</div>
						<div class="cd-field">
							<label>Position / Title</label>
							<input type="text" name="cd_rf_cards[<?php echo $i; ?>][position]" value="<?php echo esc_attr($card['position']); ?>" placeholder="e.g. AVP">
						</div>
					</div>
					<div>
						<div class="cd-grid cd-grid-2" style="margin-bottom:8px;">
							<div class="cd-field">
								<label>Star Rating (1–5)</label>
								<input type="number" name="cd_rf_cards[<?php echo $i; ?>][rating]" value="<?php echo esc_attr($card['rating'] ?? 5); ?>" min="1" max="5" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
							</div>
							<div class="cd-field">
								<label>Star Color</label>
								<select name="cd_rf_cards[<?php echo $i; ?>][rating_color]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
									<?php foreach ($rating_colors as $v => $l): ?><option value="<?php echo esc_attr($v); ?>" <?php selected($card['rating_color']??'default',$v); ?>><?php echo esc_html($l); ?></option><?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="cd-field">
							<label>Quote</label>
							<textarea name="cd_rf_cards[<?php echo $i; ?>][quote]" style="min-height:60px;"><?php echo esc_textarea($card['quote']); ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" id="cd-add-rf-btn" class="cd-add-row-btn" data-index="<?php echo count($cards); ?>">+ Add Recruiter Card</button>

	</div><!-- .cd-meta-box -->

	<script>
	jQuery(function($){
		var rfIndex = parseInt( $('#cd-add-rf-btn').data('index') || 0 );

		$('#cd-add-rf-btn').on('click', function(){
			var i = rfIndex;
			var n = $('#cd-rf-repeater .cd-rf-row').length + 1;
			var html = '<div class="cd-rf-row" style="border:1px solid #ddd;border-radius:6px;padding:14px;margin-bottom:10px;background:#fafafa;">'
				+'<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;"><strong style="color:#155dfc;font-size:12px;">Card '+n+'</strong><button type="button" class="cd-remove-rf" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button></div>'
				+'<div class="cd-grid cd-grid-3" style="margin-bottom:8px;align-items:end;">'
				+'<div class="cd-field"><label>Company Name</label><input type="text" name="cd_rf_cards['+i+'][company_name]" placeholder="Company"></div>'
				+'<div class="cd-field"><label>Company Logo</label><div class="cd-image-picker"><input type="hidden" name="cd_rf_cards['+i+'][company_logo_id]" value="" class="cd-img-id"><img class="cd-img-preview" style="display:none;"><button type="button" class="cd-pick-img">Choose</button><button type="button" class="cd-remove-img" style="display:none;">Remove</button></div></div>'
				+'<div class="cd-grid" style="gap:8px;"><div class="cd-field"><label>Header Background Color</label><input type="color" name="cd_rf_cards['+i+'][header_bg]" value="#1a1f36" style="width:100%;height:38px;padding:2px;border:1px solid #ddd;border-radius:4px;cursor:pointer;"></div><div class="cd-field"><label>Logo Style</label><select name="cd_rf_cards['+i+'][logo_style]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;"><option value="white">White (dark bg)</option><option value="dark">Dark (light bg)</option></select></div></div>'
				+'</div>'
				+'<div class="cd-grid cd-grid-3" style="align-items:start;">'
				+'<div class="cd-field"><label>Recruiter Photo</label><div class="cd-image-picker"><input type="hidden" name="cd_rf_cards['+i+'][avatar_id]" value="" class="cd-img-id"><img class="cd-img-preview" style="display:none;"><button type="button" class="cd-pick-img">Choose</button><button type="button" class="cd-remove-img" style="display:none;">Remove</button></div></div>'
				+'<div><div class="cd-field" style="margin-bottom:8px;"><label>Recruiter Name</label><input type="text" name="cd_rf_cards['+i+'][name]" placeholder="Full name"></div><div class="cd-field"><label>Position</label><input type="text" name="cd_rf_cards['+i+'][position]" placeholder="e.g. AVP"></div></div>'
				+'<div><div class="cd-grid cd-grid-2" style="margin-bottom:8px;"><div class="cd-field"><label>Stars (1-5)</label><input type="number" name="cd_rf_cards['+i+'][rating]" value="5" min="1" max="5" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;"></div><div class="cd-field"><label>Star Color</label><select name="cd_rf_cards['+i+'][rating_color]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;"><option value="default">Gold</option><option value="blue">Blue</option></select></div></div><div class="cd-field"><label>Quote</label><textarea name="cd_rf_cards['+i+'][quote]" style="min-height:60px;"></textarea></div></div>'
				+'</div></div>';
			$('#cd-rf-repeater').append(html);
			rfIndex++;
			renumberRf();
		});

		$(document).on('click', '.cd-remove-rf', function(){
			$(this).closest('.cd-rf-row').remove();
			renumberRf();
		});

		function renumberRf(){
			$('#cd-rf-repeater .cd-rf-row').each(function(i){ $(this).find('strong').text('Card '+(i+1)); });
		}
	});
	</script>
	<?php
}


/* ============================================================
   SECTION 10 – UPCOMING BATCHES  meta box callback
   ============================================================ */
function skillignative_cd_batches_callback( $post ) {

	$title_plain  = get_post_meta( $post->ID, '_cd_ub_title_plain',  true ) ?: 'Digital Marketing';
	$title_hl     = get_post_meta( $post->ID, '_cd_ub_title_hl',     true ) ?: 'Upcoming Batches';
	$subtitle     = get_post_meta( $post->ID, '_cd_ub_subtitle',     true ) ?: 'Choose a batch that fits your life and enjoy comprehensive benefits designed for your success.';
	$batches_note = get_post_meta( $post->ID, '_cd_ub_batches_note', true ) ?: '* Flexible rescheduling available.';

	$batches = get_post_meta( $post->ID, '_cd_ub_batches', true );
	if ( empty( $batches ) || ! is_array( $batches ) ) {
		$batches = [
			[ 'type' => 'WEEKEND BATCH',  'date_mode' => 'auto_sat_1', 'manual_date' => '', 'time' => '10:00 AM - 01:00 PM (IST)', 'days' => 'Sat & Sun',        'seats' => '5 seats left', 'seats_color' => 'green', 'filling_fast' => '',   'btn_text' => 'Secure Seat', 'btn_url' => '#' ],
			[ 'type' => 'WEEKDAYS BATCH', 'date_mode' => 'auto_mon',   'manual_date' => '', 'time' => '08:00 PM - 10:00 PM (IST)', 'days' => 'Mon Tue & Wed', 'seats' => '3 seats left', 'seats_color' => 'red',   'filling_fast' => 'yes', 'btn_text' => 'Secure Seat', 'btn_url' => '#' ],
		];
	}

	$date_modes = [
		'auto_sat_1' => 'Next Saturday (auto)',
		'auto_sun_1' => 'Next Sunday (auto)',
		'auto_sat_2' => 'Sat +1 week (auto)',
		'auto_sun_2' => 'Sun +1 week (auto)',
		'auto_sat_3' => 'Sat +2 weeks (auto)',
		'auto_sun_3' => 'Sun +2 weeks (auto)',
		'auto_mon'   => 'Next Monday (auto)',
		'auto_tue'   => 'Next Tuesday (auto)',
		'auto_wed'   => 'Next Wednesday (auto)',
		'auto_thu'   => 'Next Thursday (auto)',
		'auto_fri'   => 'Next Friday (auto)',
		'manual'     => 'Manual date',
	];

	$benefits = get_post_meta( $post->ID, '_cd_ub_benefits', true );
	if ( empty( $benefits ) || ! is_array( $benefits ) ) {
		$benefits = [
			[ 'icon_color' => 'blue',   'title' => 'Easy EMI Options',         'desc' => 'Pay in 12 Interest-Free EMIs.',                              'full_width' => '' ],
			[ 'icon_color' => 'green',  'title' => '100% Money-Back*',         'desc' => 'Claim refund after 1st session if dissatisfied.',             'full_width' => '' ],
			[ 'icon_color' => 'orange', 'title' => 'Exam & Certification Fees','desc' => 'Includes IIM SKILLS & partner university fees.',              'full_width' => '' ],
			[ 'icon_color' => 'purple', 'title' => 'Group Discount',           'desc' => 'Flat 10% off for 3+ registrations.',                         'full_width' => '' ],
			[ 'icon_color' => 'purple', 'title' => 'Virtual Internship',       'desc' => 'Virtual internships are part of IIM SKILLS in-house, non-paid internship programs. Paid internships are offered through partner firms, subject to interview clearance.', 'full_width' => 'yes' ],
		];
	}

	$mb_title    = get_post_meta( $post->ID, '_cd_ub_mb_title',    true ) ?: '100% Money-Back Guarantee';
	$mb_text     = get_post_meta( $post->ID, '_cd_ub_mb_text',     true ) ?: 'Not satisfied after the 1st session? Full refund.';
	$mb_btn_text = get_post_meta( $post->ID, '_cd_ub_mb_btn_text', true ) ?: 'Request a Call Back';
	$mb_btn_url  = get_post_meta( $post->ID, '_cd_ub_mb_btn_url',  true ) ?: '#';

	$icon_colors  = [ 'blue' => 'Blue', 'green' => 'Green', 'orange' => 'Orange', 'purple' => 'Purple', 'red' => 'Red' ];
	$seats_colors = [ 'green' => 'Green', 'red' => 'Red', 'orange' => 'Orange' ];
	?>
	<div class="cd-meta-box">

		<!-- ── Section Header ────────────────────────── -->
		<span class="cd-section-title">Section Header</span>
		<div class="cd-grid cd-grid-2" style="margin-bottom:10px;">
			<div class="cd-field">
				<label>Title — Plain Part</label>
				<input type="text" name="cd_ub_title_plain" value="<?php echo esc_attr($title_plain); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Highlighted <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_ub_title_hl" value="<?php echo esc_attr($title_hl); ?>">
			</div>
		</div>
		<div class="cd-field" style="margin-bottom:16px;">
			<label>Subtitle</label>
			<textarea name="cd_ub_subtitle"><?php echo esc_textarea($subtitle); ?></textarea>
		</div>

		<!-- ── Batch Items Repeater ──────────────────── -->
		<span class="cd-section-title">Batch Items (left card)</span>
		<div id="cd-ub-batches-repeater">
			<?php foreach ( $batches as $i => $b ) : ?>
			<div class="cd-ub-batch-row" style="border:1px solid #ddd;border-radius:6px;padding:12px;margin-bottom:10px;background:#fafafa;">
				<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
					<strong style="color:#155dfc;font-size:12px;">Batch <?php echo $i+1; ?></strong>
					<button type="button" class="cd-remove-ub-batch" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button>
				</div>
				<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">
					<div class="cd-field">
						<label>Batch Type Label</label>
						<input type="text" name="cd_ub_batches[<?php echo $i; ?>][type]" value="<?php echo esc_attr($b['type']); ?>" placeholder="WEEKEND BATCH">
					</div>
					<div class="cd-field">
						<label>Date Mode <span style="color:#155dfc;">(auto-updates every week)</span></label>
						<select name="cd_ub_batches[<?php echo $i; ?>][date_mode]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
							<?php foreach ($date_modes as $v => $l): ?>
							<option value="<?php echo esc_attr($v); ?>" <?php selected($b['date_mode']??'auto_sat_1',$v); ?>><?php echo esc_html($l); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="cd-field">
						<label>Manual Date <span style="color:#888;">(only if "Manual date" mode above)</span></label>
						<input type="date" name="cd_ub_batches[<?php echo $i; ?>][manual_date]" value="<?php echo esc_attr($b['manual_date']??''); ?>" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
					</div>
				</div>
				<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">
					<div class="cd-field">
						<label>Time</label>
						<input type="text" name="cd_ub_batches[<?php echo $i; ?>][time]" value="<?php echo esc_attr($b['time']); ?>" placeholder="10:00 AM - 01:00 PM (IST)">
					</div>
					<div class="cd-field">
						<label>Days</label>
						<input type="text" name="cd_ub_batches[<?php echo $i; ?>][days]" value="<?php echo esc_attr($b['days']); ?>" placeholder="Sat &amp; Sun">
					</div>
					<div class="cd-field">
						<label>Seats Left Text</label>
						<input type="text" name="cd_ub_batches[<?php echo $i; ?>][seats]" value="<?php echo esc_attr($b['seats']); ?>" placeholder="5 seats left">
					</div>
				</div>
				<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">
					<div class="cd-field">
						<label>Seats Color</label>
						<select name="cd_ub_batches[<?php echo $i; ?>][seats_color]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
							<?php foreach ($seats_colors as $v => $l): ?><option value="<?php echo esc_attr($v); ?>" <?php selected($b['seats_color']??'green',$v); ?>><?php echo esc_html($l); ?></option><?php endforeach; ?>
						</select>
					</div>
					<div class="cd-field">
						<label>Show "Filling Fast" Badge?</label>
						<select name="cd_ub_batches[<?php echo $i; ?>][filling_fast]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
							<option value="" <?php selected($b['filling_fast']??'',''); ?>>No</option>
							<option value="yes" <?php selected($b['filling_fast']??'','yes'); ?>>Yes</option>
						</select>
					</div>
					<div class="cd-field">
						<label>Button Text</label>
						<input type="text" name="cd_ub_batches[<?php echo $i; ?>][btn_text]" value="<?php echo esc_attr($b['btn_text']??'Secure Seat'); ?>">
					</div>
				</div>
				<div class="cd-field">
					<label>Button URL</label>
					<input type="url" name="cd_ub_batches[<?php echo $i; ?>][btn_url]" value="<?php echo esc_url($b['btn_url']??'#'); ?>">
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<div style="display:flex;align-items:center;gap:16px;margin-bottom:16px;">
			<button type="button" id="cd-add-ub-batch-btn" class="cd-add-row-btn" data-index="<?php echo count($batches); ?>">+ Add Batch</button>
			<div class="cd-field" style="flex:1;">
				<label>Note below batches</label>
				<input type="text" name="cd_ub_batches_note" value="<?php echo esc_attr($batches_note); ?>">
			</div>
		</div>

		<!-- ── Benefits Grid Repeater ────────────────── -->
		<span class="cd-section-title">Benefits Grid (right column)</span>
		<p style="font-size:12px;color:#666;margin-bottom:8px;">Icon color · Title · Description · Full width? (last card spans 2 columns)</p>
		<div class="cd-repeater" id="cd-ub-benefits-repeater">
			<?php foreach ( $benefits as $i => $ben ) : ?>
			<div class="cd-repeater-row" style="grid-template-columns:30px 80px 1fr 2fr 80px auto;align-items:start;">
				<span class="cd-row-num"><?php echo $i+1; ?></span>
				<select name="cd_ub_benefits[<?php echo $i; ?>][icon_color]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;">
					<?php foreach ($icon_colors as $v => $l): ?><option value="<?php echo esc_attr($v); ?>" <?php selected($ben['icon_color']??'blue',$v); ?>><?php echo esc_html($l); ?></option><?php endforeach; ?>
				</select>
				<input type="text" name="cd_ub_benefits[<?php echo $i; ?>][title]" value="<?php echo esc_attr($ben['title']); ?>" placeholder="Benefit title">
				<textarea name="cd_ub_benefits[<?php echo $i; ?>][desc]" style="min-height:55px;"><?php echo esc_textarea($ben['desc']); ?></textarea>
				<select name="cd_ub_benefits[<?php echo $i; ?>][full_width]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;">
					<option value="" <?php selected($ben['full_width']??'',''); ?>>Normal</option>
					<option value="yes" <?php selected($ben['full_width']??'','yes'); ?>>Full Width</option>
				</select>
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-ub-benefits-repeater"
			data-index="<?php echo count($benefits); ?>"
			data-template='<div class="cd-repeater-row" style="grid-template-columns:30px 80px 1fr 2fr 80px auto;align-items:start;"><span class="cd-row-num">N</span><select name="cd_ub_benefits[IDX][icon_color]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;"><option value="blue">Blue</option><option value="green">Green</option><option value="orange">Orange</option><option value="purple">Purple</option><option value="red">Red</option></select><input type="text" name="cd_ub_benefits[IDX][title]" placeholder="Benefit title"><textarea name="cd_ub_benefits[IDX][desc]" style="min-height:55px;"></textarea><select name="cd_ub_benefits[IDX][full_width]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;"><option value="">Normal</option><option value="yes">Full Width</option></select><button type="button" class="cd-remove-row">Remove</button></div>'>
			+ Add Benefit
		</button>

		<!-- ── Money Back Banner ─────────────────────── -->
		<span class="cd-section-title">Money-Back Guarantee Banner</span>
		<div class="cd-grid cd-grid-2" style="margin-bottom:8px;">
			<div class="cd-field">
				<label>Title</label>
				<input type="text" name="cd_ub_mb_title" value="<?php echo esc_attr($mb_title); ?>">
			</div>
			<div class="cd-field">
				<label>Text</label>
				<input type="text" name="cd_ub_mb_text" value="<?php echo esc_attr($mb_text); ?>">
			</div>
		</div>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field">
				<label>Button Text</label>
				<input type="text" name="cd_ub_mb_btn_text" value="<?php echo esc_attr($mb_btn_text); ?>">
			</div>
			<div class="cd-field">
				<label>Button URL</label>
				<input type="url" name="cd_ub_mb_btn_url" value="<?php echo esc_url($mb_btn_url); ?>">
			</div>
		</div>

	</div><!-- .cd-meta-box -->

	<script>
	jQuery(function($){
		var ubIndex = parseInt( $('#cd-add-ub-batch-btn').data('index') || 0 );

		$('#cd-add-ub-batch-btn').on('click', function(){
			var i = ubIndex, n = $('#cd-ub-batches-repeater .cd-ub-batch-row').length + 1;
			var html = '<div class="cd-ub-batch-row" style="border:1px solid #ddd;border-radius:6px;padding:12px;margin-bottom:10px;background:#fafafa;">'
				+'<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;"><strong style="color:#155dfc;font-size:12px;">Batch '+n+'</strong><button type="button" class="cd-remove-ub-batch" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button></div>'
				+'<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">'
				+'<div class="cd-field"><label>Batch Type</label><input type="text" name="cd_ub_batches['+i+'][type]" placeholder="WEEKEND BATCH"></div>'
				+'<div class="cd-field"><label>Date Mode</label><select name="cd_ub_batches['+i+'][date_mode]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;"><option value="auto_sat_1">Next Saturday (auto)</option><option value="auto_sun_1">Next Sunday (auto)</option><option value="auto_sat_2">Sat +1 week (auto)</option><option value="auto_sun_2">Sun +1 week (auto)</option><option value="auto_sat_3">Sat +2 weeks (auto)</option><option value="auto_sun_3">Sun +2 weeks (auto)</option><option value="auto_mon">Next Monday (auto)</option><option value="auto_tue">Next Tuesday (auto)</option><option value="auto_wed">Next Wednesday (auto)</option><option value="auto_thu">Next Thursday (auto)</option><option value="auto_fri">Next Friday (auto)</option><option value="manual">Manual date</option></select></div>'
				+'<div class="cd-field"><label>Manual Date (if manual mode)</label><input type="date" name="cd_ub_batches['+i+'][manual_date]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;"></div>'
				+'</div>'
				+'<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">'
				+'<div class="cd-field"><label>Time</label><input type="text" name="cd_ub_batches['+i+'][time]" placeholder="10:00 AM - 01:00 PM (IST)"></div>'
				+'<div class="cd-field"><label>Days</label><input type="text" name="cd_ub_batches['+i+'][days]" placeholder="Sat &amp; Sun"></div>'
				+'<div class="cd-field"><label>Seats Left</label><input type="text" name="cd_ub_batches['+i+'][seats]" placeholder="5 seats left"></div>'
				+'</div>'
				+'<div class="cd-grid cd-grid-3" style="margin-bottom:8px;">'
				+'<div class="cd-field"><label>Seats Color</label><select name="cd_ub_batches['+i+'][seats_color]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;"><option value="green">Green</option><option value="red">Red</option><option value="orange">Orange</option></select></div>'
				+'<div class="cd-field"><label>Filling Fast?</label><select name="cd_ub_batches['+i+'][filling_fast]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;"><option value="">No</option><option value="yes">Yes</option></select></div>'
				+'<div class="cd-field"><label>Button Text</label><input type="text" name="cd_ub_batches['+i+'][btn_text]" value="Secure Seat"></div>'
				+'</div>'
				+'<div class="cd-field"><label>Button URL</label><input type="url" name="cd_ub_batches['+i+'][btn_url]" value="#"></div>'
				+'</div>';
			$('#cd-ub-batches-repeater').append(html);
			ubIndex++;
			renumberUbBatches();
		});

		$(document).on('click', '.cd-remove-ub-batch', function(){
			$(this).closest('.cd-ub-batch-row').remove();
			renumberUbBatches();
		});

		function renumberUbBatches(){
			$('#cd-ub-batches-repeater .cd-ub-batch-row').each(function(i){ $(this).find('strong').text('Batch '+(i+1)); });
		}
	});
	</script>
	<?php
}


/* ============================================================
   SECTION 11 – PROGRAM FEES  meta box callback
   ============================================================ */
function skillignative_cd_fees_callback( $post ) {

	/* Header */
	$tag          = get_post_meta( $post->ID, '_cd_fees_tag',          true ) ?: 'PROGRAM OPTIONS';
	$title_plain  = get_post_meta( $post->ID, '_cd_fees_title_plain',  true ) ?: 'IIM SKILLS Digital Marketing Course';
	$title_hl     = get_post_meta( $post->ID, '_cd_fees_title_hl',     true ) ?: 'Fees';
	$subtitle     = get_post_meta( $post->ID, '_cd_fees_subtitle',     true ) ?: 'A perfect fit for learners looking for a well-rounded, AI-integrated course with expert mentorship and career guidance.';

	/* Pricing card */
	$popular_badge   = get_post_meta( $post->ID, '_cd_fees_popular_badge',  true ) ?: 'Most Popular';
	$program_label   = get_post_meta( $post->ID, '_cd_fees_program_label',  true ) ?: 'Master Program';
	$currency        = get_post_meta( $post->ID, '_cd_fees_currency',       true ) ?: '₹';
	$price           = get_post_meta( $post->ID, '_cd_fees_price',          true ) ?: '59,900';
	$price_suffix    = get_post_meta( $post->ID, '_cd_fees_price_suffix',   true ) ?: '(excl. taxes)';
	$divider_text    = get_post_meta( $post->ID, '_cd_fees_divider_text',   true ) ?: "What's Included";
	$enroll_btn_text = get_post_meta( $post->ID, '_cd_fees_enroll_btn_text',true ) ?: 'Enroll in Master Program';
	$enroll_btn_url  = get_post_meta( $post->ID, '_cd_fees_enroll_btn_url', true ) ?: '#';
	$trust1          = get_post_meta( $post->ID, '_cd_fees_trust1',         true ) ?: 'Secure Payment';
	$trust2          = get_post_meta( $post->ID, '_cd_fees_trust2',         true ) ?: 'Money-Back Guarantee';
	$trust3          = get_post_meta( $post->ID, '_cd_fees_trust3',         true ) ?: 'Instant Access';

	$features = get_post_meta( $post->ID, '_cd_fees_features', true );
	if ( empty( $features ) || ! is_array( $features ) ) {
		$features = [
			[ 'text' => '6 Months of Live Training',                              'highlight' => '' ],
			[ 'text' => '2 Months of Virtual Internship',                         'highlight' => '' ],
			[ 'text' => 'Lifetime LMS Access',                                    'highlight' => '' ],
			[ 'text' => 'Unlimited Re-Enrollments at No Cost',                    'highlight' => '' ],
			[ 'text' => 'Real-Time Ad Budget Support up to INR 2,000',           'highlight' => '' ],
			[ 'text' => '15+ Globally Recognised Certifications',                 'highlight' => '' ],
			[ 'text' => 'AI-Infused Curriculum',                                  'highlight' => '' ],
			[ 'text' => '6 Months of Paid Tools Worth INR 79,000+',              'highlight' => '' ],
			[ 'text' => '100% Job Guarantee',                                     'highlight' => 'yes' ],
			[ 'text' => 'Up to 1 Year of Doubt-Solving Sessions with Mentors',   'highlight' => '' ],
			[ 'text' => 'Mock Interviews & LinkedIn Profile Optimisation',        'highlight' => '' ],
			[ 'text' => 'Portfolio Building on Live Projects with a Dedicated Mentor', 'highlight' => '' ],
		];
	}
	?>
	<div class="cd-meta-box">

		<!-- ── Section Header ────────────────────────── -->
		<span class="cd-section-title">Section Header</span>
		<div class="cd-field" style="margin-bottom:10px;">
			<label>Tag</label>
			<input type="text" name="cd_fees_tag" value="<?php echo esc_attr($tag); ?>">
		</div>
		<div class="cd-grid cd-grid-2" style="margin-bottom:10px;">
			<div class="cd-field">
				<label>Title — Plain Part</label>
				<input type="text" name="cd_fees_title_plain" value="<?php echo esc_attr($title_plain); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Highlighted <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_fees_title_hl" value="<?php echo esc_attr($title_hl); ?>">
			</div>
		</div>
		<div class="cd-field" style="margin-bottom:16px;">
			<label>Subtitle</label>
			<textarea name="cd_fees_subtitle"><?php echo esc_textarea($subtitle); ?></textarea>
		</div>

		<!-- ── Pricing Card ──────────────────────────── -->
		<span class="cd-section-title">Pricing Card</span>
		<div class="cd-grid cd-grid-3" style="margin-bottom:10px;">
			<div class="cd-field">
				<label>Popular Badge Text <span style="color:#888;">(leave blank to hide)</span></label>
				<input type="text" name="cd_fees_popular_badge" value="<?php echo esc_attr($popular_badge); ?>" placeholder="Most Popular">
			</div>
			<div class="cd-field">
				<label>Program Label</label>
				<input type="text" name="cd_fees_program_label" value="<?php echo esc_attr($program_label); ?>" placeholder="Master Program">
			</div>
			<div class="cd-field">
				<label>Divider Text</label>
				<input type="text" name="cd_fees_divider_text" value="<?php echo esc_attr($divider_text); ?>" placeholder="What's Included">
			</div>
		</div>
		<div class="cd-grid cd-grid-3" style="margin-bottom:16px;">
			<div class="cd-field">
				<label>Currency Symbol</label>
				<input type="text" name="cd_fees_currency" value="<?php echo esc_attr($currency); ?>" placeholder="₹">
			</div>
			<div class="cd-field">
				<label>Price Amount</label>
				<input type="text" name="cd_fees_price" value="<?php echo esc_attr($price); ?>" placeholder="59,900">
			</div>
			<div class="cd-field">
				<label>Price Suffix</label>
				<input type="text" name="cd_fees_price_suffix" value="<?php echo esc_attr($price_suffix); ?>" placeholder="(excl. taxes)">
			</div>
		</div>

		<!-- ── Features Repeater ─────────────────────── -->
		<span class="cd-section-title">Features List</span>
		<p style="font-size:12px;color:#666;margin-bottom:8px;">Feature text · Highlight? (adds special styling — use for 1 key feature like "100% Job Guarantee")</p>
		<div class="cd-repeater" id="cd-fees-features-repeater">
			<?php foreach ( $features as $i => $feat ) : ?>
			<div class="cd-repeater-row" style="grid-template-columns:30px 1fr 100px auto;align-items:center;">
				<span class="cd-row-num"><?php echo $i+1; ?></span>
				<input type="text" name="cd_fees_features[<?php echo $i; ?>][text]" value="<?php echo esc_attr($feat['text']); ?>" placeholder="Feature text">
				<select name="cd_fees_features[<?php echo $i; ?>][highlight]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;">
					<option value="" <?php selected($feat['highlight']??'',''); ?>>Normal</option>
					<option value="yes" <?php selected($feat['highlight']??'','yes'); ?>>Highlight</option>
				</select>
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-fees-features-repeater"
			data-index="<?php echo count($features); ?>"
			data-template='<div class="cd-repeater-row" style="grid-template-columns:30px 1fr 100px auto;align-items:center;"><span class="cd-row-num">N</span><input type="text" name="cd_fees_features[IDX][text]" placeholder="Feature text"><select name="cd_fees_features[IDX][highlight]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;"><option value="">Normal</option><option value="yes">Highlight</option></select><button type="button" class="cd-remove-row">Remove</button></div>'>
			+ Add Feature
		</button>

		<!-- ── CTA & Trust ───────────────────────────── -->
		<span class="cd-section-title">Enroll Button</span>
		<div class="cd-grid cd-grid-2" style="margin-bottom:16px;">
			<div class="cd-field">
				<label>Button Text</label>
				<input type="text" name="cd_fees_enroll_btn_text" value="<?php echo esc_attr($enroll_btn_text); ?>">
			</div>
			<div class="cd-field">
				<label>Button URL</label>
				<input type="url" name="cd_fees_enroll_btn_url" value="<?php echo esc_url($enroll_btn_url); ?>">
			</div>
		</div>

		<span class="cd-section-title">Trust Indicators (3 fixed)</span>
		<div class="cd-grid cd-grid-3">
			<div class="cd-field">
				<label>Trust 1 <span style="color:#888;">(Shield icon)</span></label>
				<input type="text" name="cd_fees_trust1" value="<?php echo esc_attr($trust1); ?>">
			</div>
			<div class="cd-field">
				<label>Trust 2 <span style="color:#888;">(Check icon)</span></label>
				<input type="text" name="cd_fees_trust2" value="<?php echo esc_attr($trust2); ?>">
			</div>
			<div class="cd-field">
				<label>Trust 3 <span style="color:#888;">(Clock icon)</span></label>
				<input type="text" name="cd_fees_trust3" value="<?php echo esc_attr($trust3); ?>">
			</div>
		</div>

	</div><!-- .cd-meta-box -->
	<?php
}


/* ============================================================
   SECTION 12 – ADMISSION PROCESS  meta box callback
   ============================================================ */
function skillignative_cd_admission_callback( $post ) {

	$tag         = get_post_meta( $post->ID, '_cd_ap_tag',         true ) ?: 'YOUR PATH TO SUCCESS';
	$title_plain = get_post_meta( $post->ID, '_cd_ap_title_plain', true ) ?: 'Admission';
	$title_hl    = get_post_meta( $post->ID, '_cd_ap_title_hl',    true ) ?: 'Process';
	$subtitle    = get_post_meta( $post->ID, '_cd_ap_subtitle',    true ) ?: 'The enrollment process is completely straightforward. Complete the following steps, and admission is done.';
	$cta_text    = get_post_meta( $post->ID, '_cd_ap_cta_text',    true ) ?: 'Ready to transform your career?';
	$cta_btn_text= get_post_meta( $post->ID, '_cd_ap_cta_btn_text',true ) ?: 'Start Your Application';
	$cta_btn_url = get_post_meta( $post->ID, '_cd_ap_cta_btn_url', true ) ?: '#';

	$steps = get_post_meta( $post->ID, '_cd_ap_steps', true );
	if ( empty( $steps ) || ! is_array( $steps ) ) {
		$steps = [
			[ 'title' => 'Apply on website',   'desc' => 'Fill up the application form and get your process started instantly.',                                          'color' => 'yellow', 'icon' => 'document', 'final' => '' ],
			[ 'title' => 'Talk to counselor',  'desc' => 'A detailed discussion to align your career goals with the program outcomes.',                                   'color' => 'blue',   'icon' => 'chat',     'final' => '' ],
			[ 'title' => 'Select your batch',  'desc' => 'Flexibility to choose between weekend or weekday batch, whichever aligns with your schedule.',                  'color' => 'green',  'icon' => 'calendar', 'final' => '' ],
			[ 'title' => 'Start your journey', 'desc' => 'Complete formalities and kickstart your career transformation. Welcome aboard!',                                'color' => 'orange', 'icon' => 'lightning','final' => 'yes' ],
		];
	}

	$colors = [ 'yellow'=>'Yellow','blue'=>'Blue','green'=>'Green','orange'=>'Orange','purple'=>'Purple','red'=>'Red' ];
	$icons  = [ 'document'=>'Document','chat'=>'Chat bubble','calendar'=>'Calendar','lightning'=>'Lightning','star'=>'Star','search'=>'Search','person'=>'Person','check'=>'Check circle','email'=>'Email' ];
	?>
	<div class="cd-meta-box">

		<span class="cd-section-title">Section Header</span>
		<div class="cd-field" style="margin-bottom:10px;">
			<label>Tag</label>
			<input type="text" name="cd_ap_tag" value="<?php echo esc_attr($tag); ?>">
		</div>
		<div class="cd-grid cd-grid-2" style="margin-bottom:10px;">
			<div class="cd-field">
				<label>Title — Plain Part</label>
				<input type="text" name="cd_ap_title_plain" value="<?php echo esc_attr($title_plain); ?>">
			</div>
			<div class="cd-field">
				<label>Title — Highlighted <span style="color:#155dfc;">(blue)</span></label>
				<input type="text" name="cd_ap_title_hl" value="<?php echo esc_attr($title_hl); ?>">
			</div>
		</div>
		<div class="cd-field" style="margin-bottom:16px;">
			<label>Subtitle</label>
			<textarea name="cd_ap_subtitle"><?php echo esc_textarea($subtitle); ?></textarea>
		</div>

		<span class="cd-section-title">Process Steps</span>
		<p style="font-size:12px;color:#666;margin-bottom:10px;">Step number is auto-generated (01, 02…). Mark the last step as "Final" — it gets a check-mark dot.</p>
		<div id="cd-ap-steps-repeater">
			<?php foreach ( $steps as $i => $step ) : ?>
			<div class="cd-ap-step-row" style="border:1px solid #ddd;border-radius:6px;padding:12px;margin-bottom:10px;background:#fafafa;">
				<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
					<strong style="color:#155dfc;font-size:12px;">Step <?php echo $i+1; ?></strong>
					<button type="button" class="cd-remove-ap-step" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button>
				</div>
				<div class="cd-grid cd-grid-2" style="margin-bottom:8px;">
					<div class="cd-field">
						<label>Step Title</label>
						<input type="text" name="cd_ap_steps[<?php echo $i; ?>][title]" value="<?php echo esc_attr($step['title']); ?>" placeholder="Step title">
					</div>
					<div class="cd-field">
						<label>Description</label>
						<input type="text" name="cd_ap_steps[<?php echo $i; ?>][desc]" value="<?php echo esc_attr($step['desc']); ?>" placeholder="Short description">
					</div>
				</div>
				<div class="cd-grid cd-grid-3">
					<div class="cd-field">
						<label>Badge & Icon Color</label>
						<select name="cd_ap_steps[<?php echo $i; ?>][color]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
							<?php foreach ($colors as $v=>$l): ?><option value="<?php echo esc_attr($v); ?>" <?php selected($step['color']??'yellow',$v); ?>><?php echo esc_html($l); ?></option><?php endforeach; ?>
						</select>
					</div>
					<div class="cd-field">
						<label>Icon</label>
						<select name="cd_ap_steps[<?php echo $i; ?>][icon]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
							<?php foreach ($icons as $v=>$l): ?><option value="<?php echo esc_attr($v); ?>" <?php selected($step['icon']??'document',$v); ?>><?php echo esc_html($l); ?></option><?php endforeach; ?>
						</select>
					</div>
					<div class="cd-field">
						<label>Final Step?</label>
						<select name="cd_ap_steps[<?php echo $i; ?>][final]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">
							<option value="" <?php selected($step['final']??'',''); ?>>No</option>
							<option value="yes" <?php selected($step['final']??'','yes'); ?>>Yes (check-mark dot)</option>
						</select>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" id="cd-add-ap-step-btn" class="cd-add-row-btn" data-index="<?php echo count($steps); ?>">+ Add Step</button>

		<span class="cd-section-title" style="margin-top:16px;display:block;">CTA</span>
		<div class="cd-grid cd-grid-3">
			<div class="cd-field">
				<label>CTA Text</label>
				<input type="text" name="cd_ap_cta_text" value="<?php echo esc_attr($cta_text); ?>">
			</div>
			<div class="cd-field">
				<label>Button Text</label>
				<input type="text" name="cd_ap_cta_btn_text" value="<?php echo esc_attr($cta_btn_text); ?>">
			</div>
			<div class="cd-field">
				<label>Button URL</label>
				<input type="url" name="cd_ap_cta_btn_url" value="<?php echo esc_url($cta_btn_url); ?>">
			</div>
		</div>

	</div><!-- .cd-meta-box -->

	<script>
	jQuery(function($){
		var apIdx = parseInt($('#cd-add-ap-step-btn').data('index')||0);
		var colors = <?php echo json_encode($colors); ?>;
		var icons  = <?php echo json_encode($icons); ?>;

		function buildSel(name, opts, sel){
			var h='<select name="'+name+'" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;">';
			$.each(opts,function(v,l){ h+='<option value="'+v+'"'+(v===sel?' selected':'')+'>'+l+'</option>'; });
			return h+'</select>';
		}

		$('#cd-add-ap-step-btn').on('click',function(){
			var i=apIdx, n=$('#cd-ap-steps-repeater .cd-ap-step-row').length+1;
			var html='<div class="cd-ap-step-row" style="border:1px solid #ddd;border-radius:6px;padding:12px;margin-bottom:10px;background:#fafafa;">'
				+'<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;"><strong style="color:#155dfc;font-size:12px;">Step '+n+'</strong><button type="button" class="cd-remove-ap-step" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button></div>'
				+'<div class="cd-grid cd-grid-2" style="margin-bottom:8px;"><div class="cd-field"><label>Step Title</label><input type="text" name="cd_ap_steps['+i+'][title]" placeholder="Step title"></div><div class="cd-field"><label>Description</label><input type="text" name="cd_ap_steps['+i+'][desc]" placeholder="Short description"></div></div>'
				+'<div class="cd-grid cd-grid-3"><div class="cd-field"><label>Color</label>'+buildSel('cd_ap_steps['+i+'][color]',colors,'yellow')+'</div><div class="cd-field"><label>Icon</label>'+buildSel('cd_ap_steps['+i+'][icon]',icons,'document')+'</div><div class="cd-field"><label>Final Step?</label><select name="cd_ap_steps['+i+'][final]" style="width:100%;padding:7px;border:1px solid #ddd;border-radius:4px;"><option value="">No</option><option value="yes">Yes</option></select></div></div>'
				+'</div>';
			$('#cd-ap-steps-repeater').append(html);
			apIdx++;
			$('#cd-ap-steps-repeater .cd-ap-step-row').each(function(i){ $(this).find('strong').text('Step '+(i+1)); });
		});

		$(document).on('click','.cd-remove-ap-step',function(){
			$(this).closest('.cd-ap-step-row').remove();
			$('#cd-ap-steps-repeater .cd-ap-step-row').each(function(i){ $(this).find('strong').text('Step '+(i+1)); });
		});
	});
	</script>
	<?php
}


/* ============================================================
   SECTION 13 – COURSE INFO TABS  meta box callback
   ============================================================ */
function skillignative_cd_info_tabs_callback( $post ) {

	$brand         = get_post_meta( $post->ID, '_cd_cit_brand',         true ) ?: 'IIM SKILLS';
	$card_title    = get_post_meta( $post->ID, '_cd_cit_card_title',    true ) ?: 'Digital Marketing Course';
	$brochure_url  = get_post_meta( $post->ID, '_cd_cit_brochure_url',  true ) ?: '#';
	$brochure_text = get_post_meta( $post->ID, '_cd_cit_brochure_text', true ) ?: 'Download Brochure';
	$stat1         = get_post_meta( $post->ID, '_cd_cit_stat1',         true ) ?: 'PLACEMENT SUPPORT';
	$stat2         = get_post_meta( $post->ID, '_cd_cit_stat2',         true ) ?: '40+ MODULES';
	$stat3         = get_post_meta( $post->ID, '_cd_cit_stat3',         true ) ?: 'LIVE CLASSES';
	$stat4         = get_post_meta( $post->ID, '_cd_cit_stat4',         true ) ?: '15+ CERTIFICATIONS';

	/* 7 fixed tabs */
	$tab_defaults = [
		'definition'  => [ 'label' => 'Definition',   'title' => 'IIM SKILLS Digital Marketing Course with Gen AI',
			'content' => "The impact of Artificial Intelligence on each industry is prominent, and so it is in digital marketing.\n\nAt IIM SKILLS, we aim to provide an updated curriculum that covers the latest industry trends and techniques.",
			'list' => '', 'tags' => '', 'roles' => '' ],
		'concepts'    => [ 'label' => 'Concepts',     'title' => 'Core Concepts Covered in the Course',
			'content' => "Our comprehensive curriculum covers all essential digital marketing concepts from foundational to advanced levels.\n\nEach concept is taught with practical applications and real-world case studies.",
			'list' => '', 'tags' => '', 'roles' => '' ],
		'eligibility' => [ 'label' => 'Eligibility',  'title' => 'Who Can Enroll in This Course?',
			'content' => "This course is designed for anyone passionate about digital marketing.",
			'list' => "Graduate in any discipline (Final year students can also apply)\nBasic computer knowledge\nGood internet connectivity for live sessions\nDedication to complete assignments and projects",
			'tags' => '', 'roles' => '' ],
		'why-choose'  => [ 'label' => 'Why Choose Us','title' => 'Why Choose IIM SKILLS?',
			'content' => "IIM SKILLS stands out as a premier institute for digital marketing education.",
			'list' => "Live interactive sessions with industry experts\n100% placement assistance with guaranteed interviews\n15+ globally recognized certifications\nLifetime access to updated course content\nReal-time projects with actual ad budgets\nDedicated mentorship throughout the program",
			'tags' => '', 'roles' => '' ],
		'skills'      => [ 'label' => 'Skills',       'title' => 'Skills You Will Acquire',
			'content' => "Upon completion, you will master a comprehensive set of digital marketing skills:",
			'list' => '', 'tags' => 'SEO & SEM, Google Ads, Meta Advertising, Content Strategy, Social Media Management, Email Marketing, Marketing Analytics, AI Tools, Copywriting, Lead Generation',
			'roles' => '' ],
		'career'      => [ 'label' => 'Career Choice', 'title' => 'Career Opportunities After the Course',
			'content' => "Digital marketing offers diverse career paths with excellent growth potential.",
			'list' => "Digital Marketing Manager (₹8-25 LPA)\nSEO Specialist (₹4-12 LPA)\nPerformance Marketing Expert (₹6-20 LPA)\nSocial Media Manager (₹4-15 LPA)\nContent Marketing Strategist (₹5-18 LPA)\nStart your own digital marketing agency",
			'tags' => '', 'roles' => '' ],
		'job-roles'   => [ 'label' => 'Job Roles',    'title' => 'Job Roles You Can Apply For',
			'content' => "After completing the course, you'll be qualified for numerous in-demand job roles:",
			'list' => '', 'tags' => '',
			'roles' => "📊 Digital Marketing Executive\n🔍 SEO Analyst\n📱 Social Media Executive\n💰 PPC Specialist\n✍️ Content Marketer\n📧 Email Marketing Specialist\n📈 Growth Hacker\n🤖 Marketing Automation Expert" ],
	];

	$tabs = get_post_meta( $post->ID, '_cd_cit_tabs', true );
	if ( empty($tabs) || ! is_array($tabs) ) { $tabs = $tab_defaults; }
	?>
	<div class="cd-meta-box">

		<!-- ── Card Header ───────────────────────────── -->
		<span class="cd-section-title">Card Header</span>
		<div class="cd-grid cd-grid-2" style="margin-bottom:10px;">
			<div class="cd-field">
				<label>Brand Label</label>
				<input type="text" name="cd_cit_brand" value="<?php echo esc_attr($brand); ?>">
			</div>
			<div class="cd-field">
				<label>Card Title</label>
				<input type="text" name="cd_cit_card_title" value="<?php echo esc_attr($card_title); ?>">
			</div>
		</div>
		<div class="cd-grid cd-grid-2" style="margin-bottom:16px;">
			<div class="cd-field">
				<label>Brochure Button Text</label>
				<input type="text" name="cd_cit_brochure_text" value="<?php echo esc_attr($brochure_text); ?>">
			</div>
			<div class="cd-field">
				<label>Brochure URL</label>
				<input type="url" name="cd_cit_brochure_url" value="<?php echo esc_url($brochure_url); ?>">
			</div>
		</div>

		<!-- ── 7 Tabs ────────────────────────────────── -->
		<span class="cd-section-title">Tab Content</span>
		<p style="font-size:12px;color:#666;margin-bottom:12px;">
			<strong>Content</strong> = paragraphs (blank line between paragraphs) &nbsp;·&nbsp;
			<strong>List Items</strong> = one per line → renders as bullet list &nbsp;·&nbsp;
			<strong>Skill Tags</strong> = comma-separated (Skills tab) &nbsp;·&nbsp;
			<strong>Job Roles</strong> = one per line "emoji Role" (Job Roles tab)
		</p>
		<?php foreach ( $tabs as $tab_id => $tab ) : ?>
		<div style="border:1px solid #ddd;border-radius:6px;padding:14px;margin-bottom:12px;background:#f9f9f9;">
			<div class="cd-grid cd-grid-2" style="margin-bottom:10px;">
				<div class="cd-field">
					<label><strong style="color:#155dfc;"><?php echo esc_html(strtoupper($tab_id)); ?></strong> — Tab Button Label</label>
					<input type="text" name="cd_cit_tabs[<?php echo esc_attr($tab_id); ?>][label]" value="<?php echo esc_attr($tab['label']); ?>">
				</div>
				<div class="cd-field">
					<label>Tab Panel Title</label>
					<input type="text" name="cd_cit_tabs[<?php echo esc_attr($tab_id); ?>][title]" value="<?php echo esc_attr($tab['title']); ?>">
				</div>
			</div>
			<div class="cd-field" style="margin-bottom:8px;">
				<label>Content <span style="color:#888;">(paragraphs — blank line between each)</span></label>
				<textarea name="cd_cit_tabs[<?php echo esc_attr($tab_id); ?>][content]" style="min-height:80px;"><?php echo esc_textarea($tab['content']); ?></textarea>
			</div>
			<?php if ( in_array($tab_id, ['eligibility','why-choose','career']) ) : ?>
			<div class="cd-field" style="margin-bottom:8px;">
				<label>Bullet List Items <span style="color:#888;">(one per line)</span></label>
				<textarea name="cd_cit_tabs[<?php echo esc_attr($tab_id); ?>][list]" style="min-height:80px;"><?php echo esc_textarea($tab['list']); ?></textarea>
			</div>
			<?php elseif ( $tab_id === 'skills' ) : ?>
			<div class="cd-field" style="margin-bottom:8px;">
				<label>Skill Tags <span style="color:#888;">(comma-separated)</span></label>
				<input type="text" name="cd_cit_tabs[<?php echo esc_attr($tab_id); ?>][tags]" value="<?php echo esc_attr($tab['tags']); ?>">
			</div>
			<?php elseif ( $tab_id === 'job-roles' ) : ?>
			<div class="cd-field" style="margin-bottom:8px;">
				<label>Job Roles <span style="color:#888;">(one per line — format: "emoji Role name", e.g. 📊 Digital Marketing Executive)</span></label>
				<textarea name="cd_cit_tabs[<?php echo esc_attr($tab_id); ?>][roles]" style="min-height:80px;"><?php echo esc_textarea($tab['roles']); ?></textarea>
			</div>
			<?php else : ?>
			<input type="hidden" name="cd_cit_tabs[<?php echo esc_attr($tab_id); ?>][list]" value="">
			<input type="hidden" name="cd_cit_tabs[<?php echo esc_attr($tab_id); ?>][tags]" value="">
			<input type="hidden" name="cd_cit_tabs[<?php echo esc_attr($tab_id); ?>][roles]" value="">
			<?php endif; ?>
		</div>
		<?php endforeach; ?>

		<!-- ── Footer Stats ──────────────────────────── -->
		<span class="cd-section-title">Footer Stats (4 fixed)</span>
		<div class="cd-grid cd-grid-2">
			<div class="cd-field"><label>Stat 1 <span style="color:#888;">(home icon)</span></label><input type="text" name="cd_cit_stat1" value="<?php echo esc_attr($stat1); ?>"></div>
			<div class="cd-field"><label>Stat 2 <span style="color:#888;">(tool icon)</span></label><input type="text" name="cd_cit_stat2" value="<?php echo esc_attr($stat2); ?>"></div>
			<div class="cd-field"><label>Stat 3 <span style="color:#888;">(monitor icon)</span></label><input type="text" name="cd_cit_stat3" value="<?php echo esc_attr($stat3); ?>"></div>
			<div class="cd-field"><label>Stat 4 <span style="color:#888;">(cert icon)</span></label><input type="text" name="cd_cit_stat4" value="<?php echo esc_attr($stat4); ?>"></div>
		</div>

	</div><!-- .cd-meta-box -->
	<?php
}


/* ============================================================
   SECTION 14 – COURSE OVERVIEW  meta box callback
   ============================================================ */
function skillignative_cd_overview_callback( $post ) {

	/* Header */
	$tag         = get_post_meta( $post->ID, '_cd_ov_tag',         true ) ?: 'ABOUT OUR COURSE';
	$title_plain = get_post_meta( $post->ID, '_cd_ov_title_plain', true ) ?: 'Digital Marketing Course Overview at';
	$title_hl    = get_post_meta( $post->ID, '_cd_ov_title_hl',    true ) ?: 'IIM SKILLS';
	$subtitle    = get_post_meta( $post->ID, '_cd_ov_subtitle',    true ) ?: 'Learn industry-focused Digital Marketing Course with IIM SKILLS and make data-driven strategic decisions.';

	/* About Program Card */
	$about_title     = get_post_meta( $post->ID, '_cd_ov_about_title',     true ) ?: 'About the Program';
	$about_desc      = get_post_meta( $post->ID, '_cd_ov_about_desc',      true ) ?: 'If you wish to build expertise in digital marketing and run campaigns that drive results, then IIM SKILLS is for you. Packed with expert-led training, practical exposure, and career support, our program is ranked #1 by top media outlets.';
	$about_link_text = get_post_meta( $post->ID, '_cd_ov_about_link_text', true ) ?: 'Read More About the Course';
	$about_link_url  = get_post_meta( $post->ID, '_cd_ov_about_link_url',  true ) ?: '#';
	$about_tags      = get_post_meta( $post->ID, '_cd_ov_about_tags',      true );
	if ( empty($about_tags) || !is_array($about_tags) ) {
		$about_tags = [ 'Industry-led curriculum', 'Experiential learning focus' ];
	}

	/* Program Specs Card */
	$specs = get_post_meta( $post->ID, '_cd_ov_specs', true );
	if ( empty($specs) || !is_array($specs) ) {
		$specs = [
			[ 'label' => 'FORMAT',         'value' => 'Live classes + Recorded Sessions + Case Projects', 'highlight' => '' ],
			[ 'label' => 'DURATION',       'value' => '6 Months',                                         'highlight' => 'yes' ],
			[ 'label' => 'TOOLS TAUGHT',   'value' => 'Master SEO, Google Ads, Content & AI',             'highlight' => '' ],
			[ 'label' => 'CAREER SUPPORT', 'value' => '1:1 Mentorship, Internship & Placement Assistance','highlight' => '' ],
		];
	}
	$specs_brochure_url  = get_post_meta( $post->ID, '_cd_ov_specs_brochure_url',  true ) ?: '#';
	$specs_brochure_text = get_post_meta( $post->ID, '_cd_ov_specs_brochure_text', true ) ?: 'Download Brochure';

	/* Faculty Card */
	$faculty_title  = get_post_meta( $post->ID, '_cd_ov_faculty_title',  true ) ?: 'Faculty Excellence';
	$faculty_desc   = get_post_meta( $post->ID, '_cd_ov_faculty_desc',   true ) ?: 'Faculty from top firms such as Dentsu and Uprisers — industry-led curriculum.';
	$faculty_label  = get_post_meta( $post->ID, '_cd_ov_faculty_label',  true ) ?: 'Leading Practitioners';
	$faculty_photos = get_post_meta( $post->ID, '_cd_ov_faculty_photos', true );
	if ( empty($faculty_photos) || !is_array($faculty_photos) ) { $faculty_photos = [ 0, 0, 0 ]; }

	/* Toolstack Card */
	$tools_title = get_post_meta( $post->ID, '_cd_ov_tools_title', true ) ?: 'Modern Toolstack Integration';
	$tools       = get_post_meta( $post->ID, '_cd_ov_tools',       true );
	if ( empty($tools) || !is_array($tools) ) {
		$tools = [ ['name'=>'Google Ads','color'=>'blue'], ['name'=>'Semrush','color'=>'green'], ['name'=>'Pabbly','color'=>'orange'], ['name'=>'Meta Ads','color'=>'purple'] ];
	}

	/* Features Grid */
	$features = get_post_meta( $post->ID, '_cd_ov_features', true );
	if ( empty($features) || !is_array($features) ) {
		$features = [
			[ 'icon_color' => 'blue',   'title' => 'Hands-on Emphasis', 'desc' => 'Real-world case studies & capstone projects.' ],
			[ 'icon_color' => 'green',  'title' => 'Core Topics',        'desc' => 'SEO, SEM, Email Marketing, Copywriting.' ],
			[ 'icon_color' => 'orange', 'title' => 'Modern Tools',       'desc' => 'Google Ads, Canva, Yoast, Elementor, ChatGPT, Pabbly & WooCommerce.' ],
			[ 'icon_color' => 'purple', 'title' => 'Career Support',     'desc' => '1:1 mentorship, lifetime resources, guaranteed internships & placement assistance.' ],
		];
	}

	$ic_opts = ['blue'=>'Blue','green'=>'Green','orange'=>'Orange','purple'=>'Purple','red'=>'Red'];
	?>
	<div class="cd-meta-box">

		<!-- ── Header ────────────────────────────────── -->
		<span class="cd-section-title">Section Header</span>
		<div class="cd-field" style="margin-bottom:10px;"><label>Tag</label><input type="text" name="cd_ov_tag" value="<?php echo esc_attr($tag); ?>"></div>
		<div class="cd-grid cd-grid-2" style="margin-bottom:10px;">
			<div class="cd-field"><label>Title — Plain Part</label><input type="text" name="cd_ov_title_plain" value="<?php echo esc_attr($title_plain); ?>"></div>
			<div class="cd-field"><label>Title — Highlighted <span style="color:#155dfc;">(blue)</span></label><input type="text" name="cd_ov_title_hl" value="<?php echo esc_attr($title_hl); ?>"></div>
		</div>
		<div class="cd-field" style="margin-bottom:16px;"><label>Subtitle</label><textarea name="cd_ov_subtitle"><?php echo esc_textarea($subtitle); ?></textarea></div>

		<!-- ── About Program Card ────────────────────── -->
		<span class="cd-section-title">About the Program Card</span>
		<div class="cd-field" style="margin-bottom:8px;"><label>Card Title</label><input type="text" name="cd_ov_about_title" value="<?php echo esc_attr($about_title); ?>"></div>
		<div class="cd-field" style="margin-bottom:8px;"><label>Description</label><textarea name="cd_ov_about_desc"><?php echo esc_textarea($about_desc); ?></textarea></div>
		<div class="cd-grid cd-grid-2" style="margin-bottom:10px;">
			<div class="cd-field"><label>Link Text</label><input type="text" name="cd_ov_about_link_text" value="<?php echo esc_attr($about_link_text); ?>"></div>
			<div class="cd-field"><label>Link URL</label><input type="url" name="cd_ov_about_link_url" value="<?php echo esc_url($about_link_url); ?>"></div>
		</div>
		<div class="cd-repeater" id="cd-ov-about-tags-repeater" style="margin-bottom:8px;">
			<?php foreach($about_tags as $i=>$t): ?>
			<div class="cd-repeater-row" style="grid-template-columns:30px 1fr auto;">
				<span class="cd-row-num"><?php echo $i+1; ?></span>
				<input type="text" name="cd_ov_about_tags[]" value="<?php echo esc_attr($t); ?>" placeholder="Tag text">
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-ov-about-tags-repeater" data-template='<div class="cd-repeater-row" style="grid-template-columns:30px 1fr auto;"><span class="cd-row-num">N</span><input type="text" name="cd_ov_about_tags[]" placeholder="Tag text"><button type="button" class="cd-remove-row">Remove</button></div>'>+ Add Tag</button>

		<!-- ── Program Specs Card ────────────────────── -->
		<span class="cd-section-title">Program Specs Card</span>
		<p style="font-size:12px;color:#666;margin-bottom:8px;">Label · Value · Highlight? (makes value bold-blue)</p>
		<div class="cd-repeater" id="cd-ov-specs-repeater">
			<?php foreach($specs as $i=>$spec): ?>
			<div class="cd-repeater-row" style="grid-template-columns:30px 120px 1fr 80px auto;align-items:center;">
				<span class="cd-row-num"><?php echo $i+1; ?></span>
				<input type="text" name="cd_ov_specs[<?php echo $i; ?>][label]" value="<?php echo esc_attr($spec['label']); ?>" placeholder="LABEL">
				<input type="text" name="cd_ov_specs[<?php echo $i; ?>][value]" value="<?php echo esc_attr($spec['value']); ?>" placeholder="Value text">
				<select name="cd_ov_specs[<?php echo $i; ?>][highlight]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;">
					<option value="" <?php selected($spec['highlight']??'',''); ?>>Normal</option>
					<option value="yes" <?php selected($spec['highlight']??'','yes'); ?>>Highlight</option>
				</select>
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<div style="display:flex;align-items:center;gap:16px;margin-top:8px;margin-bottom:16px;">
			<button type="button" class="cd-add-row-btn" data-target="cd-ov-specs-repeater" data-index="<?php echo count($specs); ?>" data-template='<div class="cd-repeater-row" style="grid-template-columns:30px 120px 1fr 80px auto;align-items:center;"><span class="cd-row-num">N</span><input type="text" name="cd_ov_specs[IDX][label]" placeholder="LABEL"><input type="text" name="cd_ov_specs[IDX][value]" placeholder="Value text"><select name="cd_ov_specs[IDX][highlight]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;"><option value="">Normal</option><option value="yes">Highlight</option></select><button type="button" class="cd-remove-row">Remove</button></div>'>+ Add Spec</button>
			<div class="cd-field" style="flex:1;"><label>Brochure Text</label><input type="text" name="cd_ov_specs_brochure_text" value="<?php echo esc_attr($specs_brochure_text); ?>"></div>
			<div class="cd-field" style="flex:1;"><label>Brochure URL</label><input type="url" name="cd_ov_specs_brochure_url" value="<?php echo esc_url($specs_brochure_url); ?>"></div>
		</div>

		<!-- ── Faculty Card ──────────────────────────── -->
		<span class="cd-section-title">Faculty Card</span>
		<div class="cd-grid cd-grid-2" style="margin-bottom:8px;">
			<div class="cd-field"><label>Title</label><input type="text" name="cd_ov_faculty_title" value="<?php echo esc_attr($faculty_title); ?>"></div>
			<div class="cd-field"><label>Avatar Stack Label</label><input type="text" name="cd_ov_faculty_label" value="<?php echo esc_attr($faculty_label); ?>"></div>
		</div>
		<div class="cd-field" style="margin-bottom:10px;"><label>Description</label><textarea name="cd_ov_faculty_desc"><?php echo esc_textarea($faculty_desc); ?></textarea></div>
		<p style="font-size:12px;color:#666;margin-bottom:8px;">Faculty avatars (up to 3 photos)</p>
		<div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:12px;margin-bottom:16px;">
			<?php for ($fi=0; $fi<3; $fi++): $fid=$faculty_photos[$fi]??0; $fsrc=$fid?wp_get_attachment_image_url($fid,'thumbnail'):''; ?>
			<div class="cd-field">
				<label>Faculty Photo <?php echo $fi+1; ?></label>
				<div class="cd-image-picker">
					<input type="hidden" name="cd_ov_faculty_photos[<?php echo $fi; ?>]" value="<?php echo esc_attr($fid); ?>" class="cd-img-id">
					<?php if($fsrc): ?><img src="<?php echo esc_url($fsrc); ?>" class="cd-img-preview"><?php else: ?><img class="cd-img-preview" style="display:none;"><?php endif; ?>
					<button type="button" class="cd-pick-img">Choose</button>
					<button type="button" class="cd-remove-img" <?php echo $fsrc?'':'style="display:none;"'; ?>>Remove</button>
				</div>
			</div>
			<?php endfor; ?>
		</div>

		<!-- ── Toolstack Card ────────────────────────── -->
		<span class="cd-section-title">Toolstack Card</span>
		<div class="cd-field" style="margin-bottom:10px;"><label>Card Title</label><input type="text" name="cd_ov_tools_title" value="<?php echo esc_attr($tools_title); ?>"></div>
		<div class="cd-repeater" id="cd-ov-tools-repeater">
			<?php foreach($tools as $i=>$tool): ?>
			<div class="cd-repeater-row" style="grid-template-columns:30px 1fr 80px auto;align-items:center;">
				<span class="cd-row-num"><?php echo $i+1; ?></span>
				<input type="text" name="cd_ov_tools[<?php echo $i; ?>][name]" value="<?php echo esc_attr($tool['name']); ?>" placeholder="Tool name">
				<select name="cd_ov_tools[<?php echo $i; ?>][color]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;">
					<?php foreach($ic_opts as $v=>$l): ?><option value="<?php echo esc_attr($v); ?>" <?php selected($tool['color']??'blue',$v); ?>><?php echo esc_html($l); ?></option><?php endforeach; ?>
				</select>
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-ov-tools-repeater" data-index="<?php echo count($tools); ?>" data-template='<div class="cd-repeater-row" style="grid-template-columns:30px 1fr 80px auto;align-items:center;"><span class="cd-row-num">N</span><input type="text" name="cd_ov_tools[IDX][name]" placeholder="Tool name"><select name="cd_ov_tools[IDX][color]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;"><option value="blue">Blue</option><option value="green">Green</option><option value="orange">Orange</option><option value="purple">Purple</option><option value="red">Red</option></select><button type="button" class="cd-remove-row">Remove</button></div>'>+ Add Tool</button>

		<!-- ── Features Grid ─────────────────────────── -->
		<span class="cd-section-title">Features Grid (bottom 4 cards)</span>
		<div class="cd-repeater" id="cd-ov-features-repeater">
			<?php foreach($features as $i=>$feat): ?>
			<div class="cd-repeater-row" style="grid-template-columns:30px 80px 1fr 2fr auto;align-items:start;">
				<span class="cd-row-num"><?php echo $i+1; ?></span>
				<select name="cd_ov_features[<?php echo $i; ?>][icon_color]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;">
					<?php foreach($ic_opts as $v=>$l): ?><option value="<?php echo esc_attr($v); ?>" <?php selected($feat['icon_color']??'blue',$v); ?>><?php echo esc_html($l); ?></option><?php endforeach; ?>
				</select>
				<input type="text" name="cd_ov_features[<?php echo $i; ?>][title]" value="<?php echo esc_attr($feat['title']); ?>" placeholder="Feature title">
				<textarea name="cd_ov_features[<?php echo $i; ?>][desc]" style="min-height:55px;"><?php echo esc_textarea($feat['desc']); ?></textarea>
				<button type="button" class="cd-remove-row">Remove</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="cd-add-row-btn" data-target="cd-ov-features-repeater" data-index="<?php echo count($features); ?>" data-template='<div class="cd-repeater-row" style="grid-template-columns:30px 80px 1fr 2fr auto;align-items:start;"><span class="cd-row-num">N</span><select name="cd_ov_features[IDX][icon_color]" style="padding:7px;border:1px solid #ddd;border-radius:4px;width:100%;"><option value="blue">Blue</option><option value="green">Green</option><option value="orange">Orange</option><option value="purple">Purple</option><option value="red">Red</option></select><input type="text" name="cd_ov_features[IDX][title]" placeholder="Feature title"><textarea name="cd_ov_features[IDX][desc]" style="min-height:55px;"></textarea><button type="button" class="cd-remove-row">Remove</button></div>'>+ Add Feature</button>

	</div><!-- .cd-meta-box -->
	<?php
}


/* ============================================================
   SECTION 15 – FAQ  meta box callback
   ============================================================ */
function skillignative_cd_faq_callback( $post ) {

	$tag         = get_post_meta( $post->ID, '_cd_faq_tag',          true ) ?: 'HAVE QUESTIONS?';
	$title_plain = get_post_meta( $post->ID, '_cd_faq_title_plain',  true ) ?: 'Frequently Asked';
	$title_hl    = get_post_meta( $post->ID, '_cd_faq_title_hl',     true ) ?: 'Questions';
	$subtitle    = get_post_meta( $post->ID, '_cd_faq_subtitle',     true ) ?: 'Clear your doubts about the curriculum, placements, and certifications.';
	$cta_text    = get_post_meta( $post->ID, '_cd_faq_cta_text',     true ) ?: 'Still have questions?';
	$cta_btn_txt = get_post_meta( $post->ID, '_cd_faq_cta_btn_text', true ) ?: 'Talk to Our Counselor';
	$cta_btn_url = get_post_meta( $post->ID, '_cd_faq_cta_btn_url',  true ) ?: '#';

	$items = get_post_meta( $post->ID, '_cd_faq_items', true );
	if ( empty($items) || !is_array($items) ) {
		$items = [
			[ 'question' => 'What Makes IIM SKILLS the Best Institute for Digital Marketing Course?',            'answer' => 'IIM SKILLS stands out due to our comprehensive curriculum, industry-expert faculty, 100% placement assistance, and recognition by top media outlets. Our program includes 40+ modules, 15+ certifications, live projects with real ad budgets, and lifetime LMS access.' ],
			[ 'question' => 'I Do Not Have Any Technical Knowledge. Can I Enrol For This Course?',               'answer' => 'Absolutely! Our course is designed for beginners with zero technical background. We start from the fundamentals and gradually progress to advanced concepts. All you need is basic computer knowledge and a willingness to learn.' ],
			[ 'question' => 'Who Are The Mentors At Your Institute?',                                            'answer' => 'Our mentors are industry practitioners from leading companies like Dentsu, Uprisers, and other top digital agencies. They bring 10+ years of hands-on experience in SEO, PPC, social media marketing, and content strategy.' ],
			[ 'question' => 'What Are The Certifications Provided In The Online Digital Marketing Courses?',     'answer' => 'Upon completion, you\'ll receive 15+ globally recognized certifications including IIM SKILLS Master Certification, Google Ads, Google Analytics, HubSpot, Facebook Blueprint, and Semrush Certification.' ],
			[ 'question' => 'How Will I Get a Virtual Internship? Are There Any Terms Or Conditions?',           'answer' => 'Virtual internships are part of our in-house program available to all students upon course completion. You\'ll work on real client projects under mentor supervision.' ],
			[ 'question' => 'Any Age Limit To Learning Online Digital Marketing Courses?',                       'answer' => 'There\'s no age limit! We\'ve had students ranging from 18-year-old college students to 55-year-old entrepreneurs. Age is never a barrier to learning new skills.' ],
			[ 'question' => 'What Is The Average Duration Of The Digital Marketing Course?',                     'answer' => 'The Master Program duration is 6 months — 4 months of intensive training and 2 months of virtual internship. You also get up to 1 year of doubt-solving sessions and lifetime access to course materials.' ],
			[ 'question' => 'What If I Miss The Lectures?',                                                      'answer' => 'All live sessions are recorded and uploaded to your LMS within 24 hours. You get lifetime access to recordings. We also offer flexible rescheduling — attend the same topic in another batch at no extra cost.' ],
		];
	}
	?>
	<div class="cd-meta-box">

		<!-- ── Header ────────────────────────────────── -->
		<span class="cd-section-title">Section Header</span>
		<div class="cd-field" style="margin-bottom:10px;"><label>Tag</label><input type="text" name="cd_faq_tag" value="<?php echo esc_attr($tag); ?>"></div>
		<div class="cd-grid cd-grid-2" style="margin-bottom:10px;">
			<div class="cd-field"><label>Title — Plain Part</label><input type="text" name="cd_faq_title_plain" value="<?php echo esc_attr($title_plain); ?>"></div>
			<div class="cd-field"><label>Title — Highlighted <span style="color:#155dfc;">(blue)</span></label><input type="text" name="cd_faq_title_hl" value="<?php echo esc_attr($title_hl); ?>"></div>
		</div>
		<div class="cd-field" style="margin-bottom:16px;"><label>Subtitle</label><textarea name="cd_faq_subtitle"><?php echo esc_textarea($subtitle); ?></textarea></div>

		<!-- ── FAQ Items Repeater ────────────────────── -->
		<span class="cd-section-title">FAQ Items</span>
		<div id="cd-faq-repeater">
			<?php foreach ( $items as $i => $item ) : ?>
			<div class="cd-faq-row" style="border:1px solid #ddd;border-radius:6px;padding:14px;margin-bottom:10px;background:#fafafa;">
				<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
					<strong style="color:#155dfc;font-size:12px;">FAQ <?php echo $i+1; ?></strong>
					<button type="button" class="cd-remove-faq" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button>
				</div>
				<div class="cd-field" style="margin-bottom:8px;">
					<label>Question</label>
					<input type="text" name="cd_faq_items[<?php echo $i; ?>][question]" value="<?php echo esc_attr($item['question']); ?>" placeholder="Question text">
				</div>
				<div class="cd-field">
					<label>Answer</label>
					<textarea name="cd_faq_items[<?php echo $i; ?>][answer]" style="min-height:80px;"><?php echo esc_textarea($item['answer']); ?></textarea>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" id="cd-add-faq-btn" class="cd-add-row-btn" data-index="<?php echo count($items); ?>">+ Add FAQ Item</button>

		<!-- ── CTA ───────────────────────────────────── -->
		<span class="cd-section-title" style="margin-top:16px;display:block;">CTA</span>
		<div class="cd-grid cd-grid-3">
			<div class="cd-field"><label>CTA Text</label><input type="text" name="cd_faq_cta_text" value="<?php echo esc_attr($cta_text); ?>"></div>
			<div class="cd-field"><label>Button Text</label><input type="text" name="cd_faq_cta_btn_text" value="<?php echo esc_attr($cta_btn_txt); ?>"></div>
			<div class="cd-field"><label>Button URL</label><input type="url" name="cd_faq_cta_btn_url" value="<?php echo esc_url($cta_btn_url); ?>"></div>
		</div>

	</div><!-- .cd-meta-box -->

	<script>
	jQuery(function($){
		var faqIdx = parseInt($('#cd-add-faq-btn').data('index')||0);

		$('#cd-add-faq-btn').on('click',function(){
			var i=faqIdx, n=$('#cd-faq-repeater .cd-faq-row').length+1;
			var html='<div class="cd-faq-row" style="border:1px solid #ddd;border-radius:6px;padding:14px;margin-bottom:10px;background:#fafafa;">'
				+'<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;"><strong style="color:#155dfc;font-size:12px;">FAQ '+n+'</strong><button type="button" class="cd-remove-faq" style="background:#ff4d4d;color:#fff;border:none;border-radius:4px;padding:4px 8px;cursor:pointer;font-size:11px;">Remove</button></div>'
				+'<div class="cd-field" style="margin-bottom:8px;"><label>Question</label><input type="text" name="cd_faq_items['+i+'][question]" placeholder="Question text"></div>'
				+'<div class="cd-field"><label>Answer</label><textarea name="cd_faq_items['+i+'][answer]" style="min-height:80px;"></textarea></div>'
				+'</div>';
			$('#cd-faq-repeater').append(html);
			faqIdx++;
			$('#cd-faq-repeater .cd-faq-row').each(function(i){ $(this).find('strong').text('FAQ '+(i+1)); });
		});

		$(document).on('click','.cd-remove-faq',function(){
			$(this).closest('.cd-faq-row').remove();
			$('#cd-faq-repeater .cd-faq-row').each(function(i){ $(this).find('strong').text('FAQ '+(i+1)); });
		});
	});
	</script>
	<?php
}


/* ============================================================
   SAVE ALL COURSE DETAIL META
   ============================================================ */
function skillignative_cd_save_meta( $post_id ) {
	if ( ! isset( $_POST['skillignative_cd_nonce_field'] ) ||
		 ! wp_verify_nonce( $_POST['skillignative_cd_nonce_field'], 'skillignative_cd_nonce' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( 'course' !== get_post_type( $post_id ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	/* ── Hero plain text fields ── */
	$text_fields = [
		'cd_hero_badge_text',
		'cd_hero_title_plain',
		'cd_hero_title_highlight',
		'cd_hero_subtitle_plain',
		'cd_hero_subtitle_hl',
		'cd_hero_stat1_num',
		'cd_hero_stat1_label',
		'cd_hero_stat2_num',
		'cd_hero_stat2_label',
		'cd_hero_hired_label',
		'cd_hero_form_title',
		'cd_hero_form_subtitle',
		'cd_hero_form_btn_text',
		'cd_hero_whatsapp_text',
	];
	foreach ( $text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}

	/* ── Section 15 – FAQ ── */
	$faq_txt=['cd_faq_tag','cd_faq_title_plain','cd_faq_title_hl','cd_faq_subtitle','cd_faq_cta_text','cd_faq_cta_btn_text'];
	foreach($faq_txt as $f){ if(isset($_POST[$f])) update_post_meta($post_id,'_'.$f,sanitize_text_field($_POST[$f])); }
	if(isset($_POST['cd_faq_cta_btn_url'])) update_post_meta($post_id,'_cd_faq_cta_btn_url',esc_url_raw($_POST['cd_faq_cta_btn_url']));
	if(isset($_POST['cd_faq_items'])&&is_array($_POST['cd_faq_items'])){
		$faq_data=[];
		foreach($_POST['cd_faq_items'] as $item){
			if(empty($item['question'])) continue;
			$faq_data[]=['question'=>sanitize_text_field($item['question']??''),'answer'=>sanitize_textarea_field($item['answer']??'')];
		}
		update_post_meta($post_id,'_cd_faq_items',$faq_data);
	}

	/* ── Section 14 – Course Overview ── */
	$ov_txt=['cd_ov_tag','cd_ov_title_plain','cd_ov_title_hl','cd_ov_subtitle','cd_ov_about_title','cd_ov_about_desc','cd_ov_about_link_text','cd_ov_faculty_title','cd_ov_faculty_desc','cd_ov_faculty_label','cd_ov_tools_title','cd_ov_specs_brochure_text'];
	foreach($ov_txt as $f){ if(isset($_POST[$f])) update_post_meta($post_id,'_'.$f,sanitize_text_field($_POST[$f])); }
	foreach(['cd_ov_about_link_url','cd_ov_specs_brochure_url'] as $f){ if(isset($_POST[$f])) update_post_meta($post_id,'_'.$f,esc_url_raw($_POST[$f])); }
	if(isset($_POST['cd_ov_about_tags'])&&is_array($_POST['cd_ov_about_tags'])){ update_post_meta($post_id,'_cd_ov_about_tags',array_values(array_filter(array_map('sanitize_text_field',$_POST['cd_ov_about_tags'])))); }
	if(isset($_POST['cd_ov_specs'])&&is_array($_POST['cd_ov_specs'])){ $s=[];foreach($_POST['cd_ov_specs'] as $it){if(empty($it['label']))continue;$s[]=['label'=>sanitize_text_field($it['label']??''),'value'=>sanitize_text_field($it['value']??''),'highlight'=>sanitize_text_field($it['highlight']??'')];}update_post_meta($post_id,'_cd_ov_specs',$s); }
	if(isset($_POST['cd_ov_faculty_photos'])&&is_array($_POST['cd_ov_faculty_photos'])){ update_post_meta($post_id,'_cd_ov_faculty_photos',array_map('absint',$_POST['cd_ov_faculty_photos'])); }
	if(isset($_POST['cd_ov_tools'])&&is_array($_POST['cd_ov_tools'])){ $t=[];foreach($_POST['cd_ov_tools'] as $it){if(empty($it['name']))continue;$t[]=['name'=>sanitize_text_field($it['name']??''),'color'=>sanitize_text_field($it['color']??'blue')];}update_post_meta($post_id,'_cd_ov_tools',$t); }
	if(isset($_POST['cd_ov_features'])&&is_array($_POST['cd_ov_features'])){ $f=[];foreach($_POST['cd_ov_features'] as $it){if(empty($it['title']))continue;$f[]=['icon_color'=>sanitize_text_field($it['icon_color']??'blue'),'title'=>sanitize_text_field($it['title']??''),'desc'=>sanitize_textarea_field($it['desc']??'')];}update_post_meta($post_id,'_cd_ov_features',$f); }

	/* ── Section 13 – Course Info Tabs ── */
	$cit_text = ['cd_cit_brand','cd_cit_card_title','cd_cit_brochure_text','cd_cit_stat1','cd_cit_stat2','cd_cit_stat3','cd_cit_stat4'];
	foreach ($cit_text as $f){ if(isset($_POST[$f])) update_post_meta($post_id,'_'.$f,sanitize_text_field($_POST[$f])); }
	if(isset($_POST['cd_cit_brochure_url'])) update_post_meta($post_id,'_cd_cit_brochure_url',esc_url_raw($_POST['cd_cit_brochure_url']));
	if(isset($_POST['cd_cit_tabs'])&&is_array($_POST['cd_cit_tabs'])){
		$tabs_data=[];
		foreach($_POST['cd_cit_tabs'] as $tid=>$t){
			$tabs_data[sanitize_key($tid)]=[
				'label'   => sanitize_text_field($t['label']??''),
				'title'   => sanitize_text_field($t['title']??''),
				'content' => sanitize_textarea_field($t['content']??''),
				'list'    => sanitize_textarea_field($t['list']??''),
				'tags'    => sanitize_text_field($t['tags']??''),
				'roles'   => sanitize_textarea_field($t['roles']??''),
			];
		}
		update_post_meta($post_id,'_cd_cit_tabs',$tabs_data);
	}

	/* ── Section 12 – Admission Process ── */
	$ap_text = ['cd_ap_tag','cd_ap_title_plain','cd_ap_title_hl','cd_ap_subtitle','cd_ap_cta_text','cd_ap_cta_btn_text'];
	foreach ($ap_text as $f) { if(isset($_POST[$f])) update_post_meta($post_id,'_'.$f,sanitize_text_field($_POST[$f])); }
	if(isset($_POST['cd_ap_cta_btn_url'])) update_post_meta($post_id,'_cd_ap_cta_btn_url',esc_url_raw($_POST['cd_ap_cta_btn_url']));
	if(isset($_POST['cd_ap_steps'])&&is_array($_POST['cd_ap_steps'])){
		$ap_data=[];
		foreach($_POST['cd_ap_steps'] as $item){
			if(empty($item['title'])) continue;
			$ap_data[]=['title'=>sanitize_text_field($item['title']??''),'desc'=>sanitize_text_field($item['desc']??''),'color'=>sanitize_text_field($item['color']??'yellow'),'icon'=>sanitize_text_field($item['icon']??'document'),'final'=>sanitize_text_field($item['final']??'')];
		}
		update_post_meta($post_id,'_cd_ap_steps',$ap_data);
	}

	/* ── Section 11 – Program Fees ── */
	$fees_text = [ 'cd_fees_tag','cd_fees_title_plain','cd_fees_title_hl','cd_fees_subtitle',
		'cd_fees_popular_badge','cd_fees_program_label','cd_fees_currency','cd_fees_price',
		'cd_fees_price_suffix','cd_fees_divider_text','cd_fees_enroll_btn_text',
		'cd_fees_trust1','cd_fees_trust2','cd_fees_trust3',
	];
	foreach ( $fees_text as $f ) {
		if ( isset($_POST[$f]) ) update_post_meta( $post_id, '_'.$f, sanitize_text_field($_POST[$f]) );
	}
	if ( isset($_POST['cd_fees_enroll_btn_url']) ) update_post_meta( $post_id, '_cd_fees_enroll_btn_url', esc_url_raw($_POST['cd_fees_enroll_btn_url']) );
	if ( isset($_POST['cd_fees_features']) && is_array($_POST['cd_fees_features']) ) {
		$feats = [];
		foreach ( $_POST['cd_fees_features'] as $item ) {
			if ( empty($item['text']) ) continue;
			$feats[] = [ 'text' => sanitize_text_field($item['text']??''), 'highlight' => sanitize_text_field($item['highlight']??'') ];
		}
		update_post_meta( $post_id, '_cd_fees_features', $feats );
	}

	/* ── Section 10 – Upcoming Batches ── */
	$ub_text = [ 'cd_ub_title_plain','cd_ub_title_hl','cd_ub_subtitle','cd_ub_batches_note','cd_ub_mb_title','cd_ub_mb_text','cd_ub_mb_btn_text' ];
	foreach ( $ub_text as $f ) {
		if ( isset($_POST[$f]) ) update_post_meta( $post_id, '_'.$f, sanitize_text_field($_POST[$f]) );
	}
	if ( isset($_POST['cd_ub_mb_btn_url']) ) update_post_meta( $post_id, '_cd_ub_mb_btn_url', esc_url_raw($_POST['cd_ub_mb_btn_url']) );

	if ( isset($_POST['cd_ub_batches']) && is_array($_POST['cd_ub_batches']) ) {
		$ub_data = [];
		foreach ( $_POST['cd_ub_batches'] as $item ) {
			if ( empty($item['type']) ) continue;
			$ub_data[] = [
				'type'        => sanitize_text_field($item['type']         ?? ''),
				'date_mode'   => sanitize_text_field($item['date_mode']    ?? 'auto_sat_1'),
				'manual_date' => sanitize_text_field($item['manual_date']  ?? ''),
				'time'        => sanitize_text_field($item['time']          ?? ''),
				'days'         => sanitize_text_field($item['days']         ?? ''),
				'seats'        => sanitize_text_field($item['seats']        ?? ''),
				'seats_color'  => sanitize_text_field($item['seats_color']  ?? 'green'),
				'filling_fast' => sanitize_text_field($item['filling_fast'] ?? ''),
				'btn_text'     => sanitize_text_field($item['btn_text']     ?? 'Secure Seat'),
				'btn_url'      => esc_url_raw($item['btn_url']              ?? '#'),
			];
		}
		update_post_meta( $post_id, '_cd_ub_batches', $ub_data );
	}
	if ( isset($_POST['cd_ub_benefits']) && is_array($_POST['cd_ub_benefits']) ) {
		$ben_data = [];
		foreach ( $_POST['cd_ub_benefits'] as $item ) {
			if ( empty($item['title']) ) continue;
			$ben_data[] = [
				'icon_color' => sanitize_text_field($item['icon_color']  ?? 'blue'),
				'title'      => sanitize_text_field($item['title']       ?? ''),
				'desc'       => sanitize_textarea_field($item['desc']    ?? ''),
				'full_width' => sanitize_text_field($item['full_width']  ?? ''),
			];
		}
		update_post_meta( $post_id, '_cd_ub_benefits', $ben_data );
	}

	/* ── Section 9 – Recruiter Feedback ── */
	$rf_text = [ 'cd_rf_tag', 'cd_rf_title_plain', 'cd_rf_title_hl', 'cd_rf_subtitle' ];
	foreach ( $rf_text as $f ) {
		if ( isset( $_POST[$f] ) ) update_post_meta( $post_id, '_'.$f, sanitize_text_field( $_POST[$f] ) );
	}
	if ( isset( $_POST['cd_rf_cards'] ) && is_array( $_POST['cd_rf_cards'] ) ) {
		$rf_data = [];
		foreach ( $_POST['cd_rf_cards'] as $item ) {
			if ( empty( $item['name'] ) ) continue;
			$rf_data[] = [
				'company_name'    => sanitize_text_field( $item['company_name']    ?? '' ),
				'company_logo_id' => absint( $item['company_logo_id']              ?? 0 ),
				'header_bg'       => sanitize_hex_color( $item['header_bg']        ?? '#1a1f36' ) ?: '#1a1f36',
				'logo_style'      => sanitize_text_field( $item['logo_style']      ?? 'white' ),
				'avatar_id'       => absint( $item['avatar_id']                    ?? 0 ),
				'name'            => sanitize_text_field( $item['name']            ?? '' ),
				'position'        => sanitize_text_field( $item['position']        ?? '' ),
				'rating'          => min( 5, max( 1, intval( $item['rating']       ?? 5 ) ) ),
				'rating_color'    => sanitize_text_field( $item['rating_color']    ?? 'default' ),
				'quote'           => sanitize_textarea_field( $item['quote']       ?? '' ),
			];
		}
		update_post_meta( $post_id, '_cd_rf_cards', $rf_data );
	}

	/* ── Section 8 – Portfolio ── */
	$pf_text = [ 'cd_pf_badge_text','cd_pf_title_plain','cd_pf_title_hl','cd_pf_subtitle',
		'cd_pf_card_badge','cd_pf_card_title_pl','cd_pf_card_title_hl','cd_pf_card_subtitle',
		'cd_pf_cert_btn_text','cd_pf_impact_title','cd_pf_impact_text','cd_pf_impact_link_text',
		'cd_pf_li_watermark','cd_pf_li_badge','cd_pf_li_master','cd_pf_li_name',
		'cd_pf_li_title','cd_pf_li_location','cd_pf_li_connections',
	];
	foreach ( $pf_text as $f ) {
		if ( isset( $_POST[$f] ) ) update_post_meta( $post_id, '_'.$f, sanitize_text_field( $_POST[$f] ) );
	}
	foreach ( ['cd_pf_cert_btn_url','cd_pf_impact_link_url'] as $f ) {
		if ( isset( $_POST[$f] ) ) update_post_meta( $post_id, '_'.$f, esc_url_raw( $_POST[$f] ) );
	}
	if ( isset( $_POST['cd_pf_li_photo'] ) ) update_post_meta( $post_id, '_cd_pf_li_photo', absint( $_POST['cd_pf_li_photo'] ) );

	if ( isset( $_POST['cd_pf_features'] ) && is_array( $_POST['cd_pf_features'] ) ) {
		$pf_feats = [];
		foreach ( $_POST['cd_pf_features'] as $item ) {
			if ( empty($item['title']) ) continue;
			$pf_feats[] = [ 'icon_color' => sanitize_text_field($item['icon_color']??'purple'), 'title' => sanitize_text_field($item['title']??''), 'desc' => sanitize_textarea_field($item['desc']??'') ];
		}
		update_post_meta( $post_id, '_cd_pf_features', $pf_feats );
	}
	if ( isset( $_POST['cd_pf_li_skills'] ) && is_array( $_POST['cd_pf_li_skills'] ) ) {
		$pf_sk = [];
		foreach ( $_POST['cd_pf_li_skills'] as $item ) {
			if ( empty($item['name']) ) continue;
			$pf_sk[] = [ 'name' => sanitize_text_field($item['name']??''), 'endorsement' => sanitize_text_field($item['endorsement']??'') ];
		}
		update_post_meta( $post_id, '_cd_pf_li_skills', $pf_sk );
	}
	if ( isset( $_POST['cd_pf_li_portfolio'] ) && is_array( $_POST['cd_pf_li_portfolio'] ) ) {
		$pf_port = [];
		foreach ( $_POST['cd_pf_li_portfolio'] as $item ) {
			if ( empty($item['title']) ) continue;
			$pf_port[] = [ 'tag' => sanitize_text_field($item['tag']??''), 'title' => sanitize_text_field($item['title']??''), 'desc' => sanitize_text_field($item['desc']??''), 'gradient' => sanitize_text_field($item['gradient']??'blue-gradient') ];
		}
		update_post_meta( $post_id, '_cd_pf_li_portfolio', $pf_port );
	}

	/* ── Section 7 – Live Projects ── */
	$lp_text_fields = [ 'cd_lp_tag', 'cd_lp_title_plain', 'cd_lp_title_hl', 'cd_lp_subtitle', 'cd_lp_standards' ];
	foreach ( $lp_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	if ( isset( $_POST['cd_lp_projects'] ) && is_array( $_POST['cd_lp_projects'] ) ) {
		$lp_data = [];
		foreach ( $_POST['cd_lp_projects'] as $item ) {
			if ( empty( $item['company'] ) ) continue;
			$lp_data[] = [
				'badge'          => sanitize_text_field( $item['badge']          ?? '' ),
				'logo_id'        => absint( $item['logo_id']                     ?? 0 ),
				'company'        => sanitize_text_field( $item['company']        ?? '' ),
				'category'       => sanitize_text_field( $item['category']       ?? '' ),
				'category_color' => sanitize_text_field( $item['category_color'] ?? 'green' ),
				'objectives'     => sanitize_textarea_field( $item['objectives'] ?? '' ),
				'pdf_text'       => sanitize_text_field( $item['pdf_text']       ?? 'Project PDF' ),
				'pdf_url'        => esc_url_raw( $item['pdf_url']                ?? '#' ),
			];
		}
		update_post_meta( $post_id, '_cd_lp_projects', $lp_data );
	}

	/* ── Section 6 – Alumni text fields ── */
	$at_text_fields = [
		'cd_at_tag', 'cd_at_title_plain', 'cd_at_title_hl',
		'cd_at_video_url', 'cd_at_video_name', 'cd_at_video_role', 'cd_at_video_company',
		'cd_at_journey_text',
	];
	foreach ( $at_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	foreach ( [ 'cd_at_journey_url' ] as $url_f ) {
		if ( isset( $_POST[ $url_f ] ) ) {
			update_post_meta( $post_id, '_' . $url_f, esc_url_raw( $_POST[ $url_f ] ) );
		}
	}
	if ( isset( $_POST['cd_at_video_poster'] ) ) {
		update_post_meta( $post_id, '_cd_at_video_poster', absint( $_POST['cd_at_video_poster'] ) );
	}
	if ( isset( $_POST['cd_at_alumni'] ) && is_array( $_POST['cd_at_alumni'] ) ) {
		$alumni_data = [];
		foreach ( $_POST['cd_at_alumni'] as $item ) {
			if ( empty( $item['name'] ) ) continue;
			$alumni_data[] = [
				'photo_id'    => absint( $item['photo_id']    ?? 0 ),
				'name'        => sanitize_text_field( $item['name']        ?? '' ),
				'company'     => sanitize_text_field( $item['company']     ?? '' ),
				'linkedin_url'=> esc_url_raw( $item['linkedin_url'] ?? '#' ),
				'quote'       => sanitize_textarea_field( $item['quote']       ?? '' ),
				'testimonial' => sanitize_textarea_field( $item['testimonial'] ?? '' ),
			];
		}
		update_post_meta( $post_id, '_cd_at_alumni', $alumni_data );
	}

	/* ── Section 5 – Skills text fields ── */
	$sk_text_fields = [
		'cd_sk_tag', 'cd_sk_title_plain', 'cd_sk_title_hl', 'cd_sk_subtitle',
		'cd_sk_core_title', 'cd_sk_cta_title', 'cd_sk_cta_text', 'cd_sk_cta_btn_text',
	];
	foreach ( $sk_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	if ( isset( $_POST['cd_sk_cta_btn_url'] ) ) {
		update_post_meta( $post_id, '_cd_sk_cta_btn_url', esc_url_raw( $_POST['cd_sk_cta_btn_url'] ) );
	}
	if ( isset( $_POST['cd_sk_cards'] ) && is_array( $_POST['cd_sk_cards'] ) ) {
		$sk_cards = [];
		foreach ( $_POST['cd_sk_cards'] as $item ) {
			if ( empty( $item['title'] ) ) continue;
			$sk_cards[] = [
				'title' => sanitize_text_field( $item['title'] ?? '' ),
				'tag'   => sanitize_text_field( $item['tag']   ?? '' ),
				'desc'  => sanitize_text_field( $item['desc']  ?? '' ),
				'color' => sanitize_text_field( $item['color'] ?? 'card-gray' ),
				'icon'  => sanitize_text_field( $item['icon']  ?? 'star' ),
			];
		}
		update_post_meta( $post_id, '_cd_sk_cards', $sk_cards );
	}

	/* ── Section 4 – Curriculum text fields ── */
	$cur_text_fields = [
		'cd_cur_tag', 'cd_cur_title_plain', 'cd_cur_title_hl', 'cd_cur_subtitle',
		'cd_cur_mod_title', 'cd_cur_mod_count', 'cd_cur_mod_badge',
		'cd_cur_syllabus_text',
		'cd_cur_counsel_text', 'cd_cur_counsel_btn',
		'cd_cur_cert_text', 'cd_cur_cert_logos',
	];
	foreach ( $cur_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	foreach ( [ 'cd_cur_syllabus_url', 'cd_cur_counsel_url' ] as $url_field ) {
		if ( isset( $_POST[ $url_field ] ) ) {
			update_post_meta( $post_id, '_' . $url_field, esc_url_raw( $_POST[ $url_field ] ) );
		}
	}

	/* Highlights repeater */
	if ( isset( $_POST['cd_cur_highlights'] ) && is_array( $_POST['cd_cur_highlights'] ) ) {
		$hls = array_values( array_filter( array_map( 'sanitize_text_field', $_POST['cd_cur_highlights'] ) ) );
		update_post_meta( $post_id, '_cd_cur_highlights', $hls );
	}

	/* Modules accordion repeater */
	if ( isset( $_POST['cd_cur_modules'] ) && is_array( $_POST['cd_cur_modules'] ) ) {
		$mods = [];
		foreach ( $_POST['cd_cur_modules'] as $item ) {
			if ( empty( $item['title'] ) ) continue;
			$mods[] = [
				'title'         => sanitize_text_field( $item['title']         ?? '' ),
				'meta'          => sanitize_text_field( $item['meta']          ?? '' ),
				'icon_color'    => sanitize_text_field( $item['icon_color']    ?? 'blue' ),
				'content_title' => sanitize_text_field( $item['content_title'] ?? '' ),
				'content_desc'  => sanitize_textarea_field( $item['content_desc']  ?? '' ),
				'tech_stack'    => sanitize_text_field( $item['tech_stack']    ?? '' ),
				'outcomes'      => sanitize_text_field( $item['outcomes']      ?? '' ),
			];
		}
		update_post_meta( $post_id, '_cd_cur_modules', $mods );
	}

	/* ── Section 3 – Employment text fields ── */
	$emp_text_fields = [
		'cd_emp_badge_text', 'cd_emp_title_plain', 'cd_emp_title_hl', 'cd_emp_subtitle',
		'cd_emp_col_iim', 'cd_emp_col_others',
		'cd_emp_cta_title', 'cd_emp_cta_subtitle', 'cd_emp_cta_btn_text',
	];
	foreach ( $emp_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	if ( isset( $_POST['cd_emp_cta_btn_url'] ) ) {
		update_post_meta( $post_id, '_cd_emp_cta_btn_url', esc_url_raw( $_POST['cd_emp_cta_btn_url'] ) );
	}

	/* P.L.A.C.E. cards repeater */
	if ( isset( $_POST['cd_emp_place_cards'] ) && is_array( $_POST['cd_emp_place_cards'] ) ) {
		$cards = [];
		foreach ( $_POST['cd_emp_place_cards'] as $item ) {
			if ( empty( $item['letter'] ) && empty( $item['title'] ) ) continue;
			$cards[] = [
				'letter' => sanitize_text_field( $item['letter'] ?? '' ),
				'title'  => sanitize_text_field( $item['title']  ?? '' ),
				'desc'   => sanitize_text_field( $item['desc']   ?? '' ),
			];
		}
		update_post_meta( $post_id, '_cd_emp_place_cards', $cards );
	}

	/* Comparison rows repeater */
	if ( isset( $_POST['cd_emp_comp_rows'] ) && is_array( $_POST['cd_emp_comp_rows'] ) ) {
		$rows = [];
		foreach ( $_POST['cd_emp_comp_rows'] as $item ) {
			if ( empty( $item['feature'] ) ) continue;
			$rows[] = [
				'feature' => sanitize_text_field( $item['feature'] ?? '' ),
				'iim'     => sanitize_text_field( $item['iim']     ?? '' ),
				'others'  => sanitize_text_field( $item['others']  ?? '' ),
			];
		}
		update_post_meta( $post_id, '_cd_emp_comp_rows', $rows );
	}

	/* ── Section 2 – Placement Record text fields ── */
	$pr_text_fields = [
		'cd_pr_tag', 'cd_pr_title_plain', 'cd_pr_title_hl', 'cd_pr_description',
		'cd_pr_stat1_value', 'cd_pr_stat1_label',
		'cd_pr_stat2_value', 'cd_pr_stat2_label',
		'cd_pr_stat3_value', 'cd_pr_stat3_label',
		'cd_pr_stat4_value', 'cd_pr_stat4_label',
	];
	foreach ( $pr_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}

	/* ── URL fields ── */
	if ( isset( $_POST['cd_hero_whatsapp_url'] ) ) {
		update_post_meta( $post_id, '_cd_hero_whatsapp_url', esc_url_raw( $_POST['cd_hero_whatsapp_url'] ) );
	}

	/* ── Features repeater (array of strings) ── */
	if ( isset( $_POST['cd_hero_features'] ) && is_array( $_POST['cd_hero_features'] ) ) {
		$features = array_filter( array_map( 'sanitize_text_field', $_POST['cd_hero_features'] ) );
		update_post_meta( $post_id, '_cd_hero_features', array_values( $features ) );
	}

	/* ── Hired logos repeater (array of [id, alt]) ── */
	if ( isset( $_POST['cd_hero_hired_logos'] ) && is_array( $_POST['cd_hero_hired_logos'] ) ) {
		$logos = [];
		foreach ( $_POST['cd_hero_hired_logos'] as $item ) {
			$logos[] = [
				'id'  => absint( $item['id'] ?? 0 ),
				'alt' => sanitize_text_field( $item['alt'] ?? '' ),
			];
		}
		update_post_meta( $post_id, '_cd_hero_hired_logos', $logos );
	}
}
add_action( 'save_post', 'skillignative_cd_save_meta' );
