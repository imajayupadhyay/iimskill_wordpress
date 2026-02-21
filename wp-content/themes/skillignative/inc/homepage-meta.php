<?php
/**
 * Homepage Meta Boxes
 *
 * Registers custom meta boxes for the Homepage page.
 * Admin can edit all homepage section data from Pages > Homepage > Edit.
 *
 * @package Skillignative
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register meta boxes for homepage.
 */
function skillignative_homepage_meta_boxes() {
	// Only show on pages
	add_meta_box(
		'skillignative_hero_section',
		'Hero Section',
		'skillignative_hero_section_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_marquee_section',
		'Logo Marquee Section (Partner Logos)',
		'skillignative_marquee_section_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_stories_section',
		'Success Stories Section (Alumni Testimonials)',
		'skillignative_stories_section_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_accreditation_section',
		'Accreditation Banner Section',
		'skillignative_accreditation_section_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_courses_section',
		'Popular Courses Section',
		'skillignative_courses_section_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_alumni_section',
		'Alumni Brands Section',
		'skillignative_alumni_section_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_achievements_section',
		'Achievements Section',
		'skillignative_achievements_section_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_masterclass_section',
		'Master Class Section (Demo Classes)',
		'skillignative_masterclass_section_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_keyreasons_section',
		'Key Reasons Section',
		'skillignative_keyreasons_section_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_benefits_section',
		'Learner Benefits Section',
		'skillignative_benefits_section_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_media_section',
		'Media Presence Section',
		'skillignative_media_section_callback',
		'page',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'skillignative_homepage_meta_boxes' );

/**
 * Hero Section meta box callback.
 */
function skillignative_hero_section_callback( $post ) {
	// Only show on the page set as front page or a page with "Homepage" template
	wp_nonce_field( 'skillignative_homepage_nonce', 'skillignative_homepage_nonce_field' );

	// Get saved values
	$hero_title          = get_post_meta( $post->ID, '_hero_title', true );
	$hero_title_highlight = get_post_meta( $post->ID, '_hero_title_highlight', true );
	$hero_subtitle       = get_post_meta( $post->ID, '_hero_subtitle', true );
	$hero_image_left     = get_post_meta( $post->ID, '_hero_image_left', true );
	$hero_image_right    = get_post_meta( $post->ID, '_hero_image_right', true );
	$hero_btn_primary_text = get_post_meta( $post->ID, '_hero_btn_primary_text', true );
	$hero_btn_primary_url  = get_post_meta( $post->ID, '_hero_btn_primary_url', true );
	$hero_btn_secondary_text = get_post_meta( $post->ID, '_hero_btn_secondary_text', true );
	$hero_btn_secondary_url  = get_post_meta( $post->ID, '_hero_btn_secondary_url', true );
	$hero_disclaimer     = get_post_meta( $post->ID, '_hero_disclaimer', true );

	// Stats
	$hero_stat1_value = get_post_meta( $post->ID, '_hero_stat1_value', true );
	$hero_stat1_label = get_post_meta( $post->ID, '_hero_stat1_label', true );
	$hero_stat2_value = get_post_meta( $post->ID, '_hero_stat2_value', true );
	$hero_stat2_label = get_post_meta( $post->ID, '_hero_stat2_label', true );
	$hero_stat3_value = get_post_meta( $post->ID, '_hero_stat3_value', true );
	$hero_stat3_label = get_post_meta( $post->ID, '_hero_stat3_label', true );
	$hero_stat4_value = get_post_meta( $post->ID, '_hero_stat4_value', true );
	$hero_stat4_label = get_post_meta( $post->ID, '_hero_stat4_label', true );

	// Floating badge
	$hero_badge_number = get_post_meta( $post->ID, '_hero_badge_number', true );
	$hero_badge_text   = get_post_meta( $post->ID, '_hero_badge_text', true );

	// Defaults
	if ( empty( $hero_title ) ) $hero_title = 'Professional Courses For';
	if ( empty( $hero_title_highlight ) ) $hero_title_highlight = 'Highly Rewarding Career';
	if ( empty( $hero_subtitle ) ) $hero_subtitle = 'Courses to Enhance Your Career';
	if ( empty( $hero_btn_primary_text ) ) $hero_btn_primary_text = 'Explore Programs';
	if ( empty( $hero_btn_primary_url ) ) $hero_btn_primary_url = '#';
	if ( empty( $hero_btn_secondary_text ) ) $hero_btn_secondary_text = 'Contact Us';
	if ( empty( $hero_btn_secondary_url ) ) $hero_btn_secondary_url = '#';
	if ( empty( $hero_disclaimer ) ) $hero_disclaimer = 'Courses aligned with <span>industry standards</span> and <span>accredited by recognized institutions</span>';
	if ( empty( $hero_stat1_value ) ) $hero_stat1_value = '4.8+';
	if ( empty( $hero_stat1_label ) ) $hero_stat1_label = 'Google Rating';
	if ( empty( $hero_stat2_value ) ) $hero_stat2_value = '550+';
	if ( empty( $hero_stat2_label ) ) $hero_stat2_label = 'Hiring Partners';
	if ( empty( $hero_stat3_value ) ) $hero_stat3_value = '24 x 7';
	if ( empty( $hero_stat3_label ) ) $hero_stat3_label = 'Support';
	if ( empty( $hero_stat4_value ) ) $hero_stat4_value = '55,000+';
	if ( empty( $hero_stat4_label ) ) $hero_stat4_label = 'Career Transition';
	if ( empty( $hero_badge_number ) ) $hero_badge_number = '15,000+';
	if ( empty( $hero_badge_text ) ) $hero_badge_text = 'Trainings';

	?>
	<style>
		.skillignative-meta-box { padding: 15px 0; }
		.skillignative-meta-box h3 { margin: 20px 0 10px; padding: 10px 0; border-bottom: 2px solid #155dfc; color: #155dfc; font-size: 16px; }
		.skillignative-meta-box h3:first-child { margin-top: 0; }
		.skillignative-field { margin-bottom: 15px; }
		.skillignative-field label { display: block; font-weight: 600; margin-bottom: 5px; color: #1a1a2e; }
		.skillignative-field input[type="text"],
		.skillignative-field input[type="url"],
		.skillignative-field textarea { width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
		.skillignative-field textarea { min-height: 60px; }
		.skillignative-field .description { font-size: 12px; color: #666; margin-top: 4px; }
		.skillignative-stats-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
		.skillignative-stat-box { background: #f8fafc; padding: 15px; border-radius: 8px; border: 1px solid #eef2f6; }
		.skillignative-stat-box h4 { margin: 0 0 10px; font-size: 14px; color: #155dfc; }
		.skillignative-image-field { display: flex; align-items: center; gap: 10px; }
		.skillignative-image-field img { max-width: 150px; max-height: 100px; border-radius: 8px; border: 1px solid #ddd; }
		.skillignative-image-field .button { flex-shrink: 0; }
	</style>

	<div class="skillignative-meta-box">

		<h3>Hero Title</h3>
		<div class="skillignative-field">
			<label for="hero_title">Title (before highlight)</label>
			<input type="text" id="hero_title" name="hero_title" value="<?php echo esc_attr( $hero_title ); ?>">
		</div>
		<div class="skillignative-field">
			<label for="hero_title_highlight">Title (highlighted text - blue color)</label>
			<input type="text" id="hero_title_highlight" name="hero_title_highlight" value="<?php echo esc_attr( $hero_title_highlight ); ?>">
		</div>
		<div class="skillignative-field">
			<label for="hero_subtitle">Subtitle</label>
			<input type="text" id="hero_subtitle" name="hero_subtitle" value="<?php echo esc_attr( $hero_subtitle ); ?>">
		</div>

		<h3>Hero Images</h3>
		<div class="skillignative-field">
			<label for="hero_image_left">Left Image</label>
			<div class="skillignative-image-field">
				<input type="hidden" id="hero_image_left" name="hero_image_left" value="<?php echo esc_attr( $hero_image_left ); ?>">
				<?php if ( $hero_image_left ) : ?>
					<img src="<?php echo esc_url( wp_get_attachment_url( $hero_image_left ) ); ?>" id="hero_image_left_preview">
				<?php else : ?>
					<img src="" id="hero_image_left_preview" style="display:none;">
				<?php endif; ?>
				<button type="button" class="button skillignative-upload-btn" data-target="hero_image_left">Upload Image</button>
				<button type="button" class="button skillignative-remove-btn" data-target="hero_image_left" <?php echo $hero_image_left ? '' : 'style="display:none;"'; ?>>Remove</button>
			</div>
		</div>
		<div class="skillignative-field">
			<label for="hero_image_right">Right Image</label>
			<div class="skillignative-image-field">
				<input type="hidden" id="hero_image_right" name="hero_image_right" value="<?php echo esc_attr( $hero_image_right ); ?>">
				<?php if ( $hero_image_right ) : ?>
					<img src="<?php echo esc_url( wp_get_attachment_url( $hero_image_right ) ); ?>" id="hero_image_right_preview">
				<?php else : ?>
					<img src="" id="hero_image_right_preview" style="display:none;">
				<?php endif; ?>
				<button type="button" class="button skillignative-upload-btn" data-target="hero_image_right">Upload Image</button>
				<button type="button" class="button skillignative-remove-btn" data-target="hero_image_right" <?php echo $hero_image_right ? '' : 'style="display:none;"'; ?>>Remove</button>
			</div>
		</div>

		<h3>Stats Bar</h3>
		<div class="skillignative-stats-grid">
			<div class="skillignative-stat-box">
				<h4>Stat 1</h4>
				<div class="skillignative-field">
					<label for="hero_stat1_value">Value</label>
					<input type="text" id="hero_stat1_value" name="hero_stat1_value" value="<?php echo esc_attr( $hero_stat1_value ); ?>">
				</div>
				<div class="skillignative-field">
					<label for="hero_stat1_label">Label</label>
					<input type="text" id="hero_stat1_label" name="hero_stat1_label" value="<?php echo esc_attr( $hero_stat1_label ); ?>">
				</div>
			</div>
			<div class="skillignative-stat-box">
				<h4>Stat 2</h4>
				<div class="skillignative-field">
					<label for="hero_stat2_value">Value</label>
					<input type="text" id="hero_stat2_value" name="hero_stat2_value" value="<?php echo esc_attr( $hero_stat2_value ); ?>">
				</div>
				<div class="skillignative-field">
					<label for="hero_stat2_label">Label</label>
					<input type="text" id="hero_stat2_label" name="hero_stat2_label" value="<?php echo esc_attr( $hero_stat2_label ); ?>">
				</div>
			</div>
			<div class="skillignative-stat-box">
				<h4>Stat 3</h4>
				<div class="skillignative-field">
					<label for="hero_stat3_value">Value</label>
					<input type="text" id="hero_stat3_value" name="hero_stat3_value" value="<?php echo esc_attr( $hero_stat3_value ); ?>">
				</div>
				<div class="skillignative-field">
					<label for="hero_stat3_label">Label</label>
					<input type="text" id="hero_stat3_label" name="hero_stat3_label" value="<?php echo esc_attr( $hero_stat3_label ); ?>">
				</div>
			</div>
			<div class="skillignative-stat-box">
				<h4>Stat 4</h4>
				<div class="skillignative-field">
					<label for="hero_stat4_value">Value</label>
					<input type="text" id="hero_stat4_value" name="hero_stat4_value" value="<?php echo esc_attr( $hero_stat4_value ); ?>">
				</div>
				<div class="skillignative-field">
					<label for="hero_stat4_label">Label</label>
					<input type="text" id="hero_stat4_label" name="hero_stat4_label" value="<?php echo esc_attr( $hero_stat4_label ); ?>">
				</div>
			</div>
		</div>

		<h3>Buttons</h3>
		<div class="skillignative-stats-grid">
			<div class="skillignative-stat-box">
				<h4>Primary Button</h4>
				<div class="skillignative-field">
					<label for="hero_btn_primary_text">Text</label>
					<input type="text" id="hero_btn_primary_text" name="hero_btn_primary_text" value="<?php echo esc_attr( $hero_btn_primary_text ); ?>">
				</div>
				<div class="skillignative-field">
					<label for="hero_btn_primary_url">URL</label>
					<input type="url" id="hero_btn_primary_url" name="hero_btn_primary_url" value="<?php echo esc_url( $hero_btn_primary_url ); ?>">
				</div>
			</div>
			<div class="skillignative-stat-box">
				<h4>Secondary Button</h4>
				<div class="skillignative-field">
					<label for="hero_btn_secondary_text">Text</label>
					<input type="text" id="hero_btn_secondary_text" name="hero_btn_secondary_text" value="<?php echo esc_attr( $hero_btn_secondary_text ); ?>">
				</div>
				<div class="skillignative-field">
					<label for="hero_btn_secondary_url">URL</label>
					<input type="url" id="hero_btn_secondary_url" name="hero_btn_secondary_url" value="<?php echo esc_url( $hero_btn_secondary_url ); ?>">
				</div>
			</div>
		</div>

		<h3>Floating Badge (Right Image)</h3>
		<div class="skillignative-stats-grid">
			<div class="skillignative-field">
				<label for="hero_badge_number">Number</label>
				<input type="text" id="hero_badge_number" name="hero_badge_number" value="<?php echo esc_attr( $hero_badge_number ); ?>">
			</div>
			<div class="skillignative-field">
				<label for="hero_badge_text">Text</label>
				<input type="text" id="hero_badge_text" name="hero_badge_text" value="<?php echo esc_attr( $hero_badge_text ); ?>">
			</div>
		</div>

		<h3>Disclaimer Text</h3>
		<div class="skillignative-field">
			<label for="hero_disclaimer">Disclaimer (HTML allowed for &lt;span&gt; highlights)</label>
			<textarea id="hero_disclaimer" name="hero_disclaimer"><?php echo esc_textarea( $hero_disclaimer ); ?></textarea>
		</div>

	</div>

	<script>
	jQuery(document).ready(function($) {
		// Media uploader for image fields
		$('.skillignative-upload-btn').on('click', function(e) {
			e.preventDefault();
			var targetId = $(this).data('target');
			var mediaUploader = wp.media({
				title: 'Select Image',
				button: { text: 'Use this image' },
				multiple: false
			});
			mediaUploader.on('select', function() {
				var attachment = mediaUploader.state().get('selection').first().toJSON();
				$('#' + targetId).val(attachment.id);
				$('#' + targetId + '_preview').attr('src', attachment.url).show();
				$('.skillignative-remove-btn[data-target="' + targetId + '"]').show();
			});
			mediaUploader.open();
		});

		// Remove image
		$('.skillignative-remove-btn').on('click', function(e) {
			e.preventDefault();
			var targetId = $(this).data('target');
			$('#' + targetId).val('');
			$('#' + targetId + '_preview').hide();
			$(this).hide();
		});
	});
	</script>
	<?php
}

/**
 * Logo Marquee Section meta box callback.
 */
function skillignative_marquee_section_callback( $post ) {
	$logos = get_post_meta( $post->ID, '_marquee_logos', true );
	if ( ! is_array( $logos ) || empty( $logos ) ) {
		// Default logos
		$logos = array();
	}
	?>
	<style>
		.skillignative-repeater-list { margin: 10px 0; }
		.skillignative-repeater-item {
			display: flex;
			align-items: center;
			gap: 12px;
			padding: 12px 15px;
			background: #f8fafc;
			border: 1px solid #eef2f6;
			border-radius: 8px;
			margin-bottom: 10px;
			transition: background 0.2s;
		}
		.skillignative-repeater-item:hover { background: #eef2f6; }
		.skillignative-repeater-item .drag-handle {
			cursor: grab;
			color: #999;
			font-size: 18px;
			flex-shrink: 0;
			user-select: none;
		}
		.skillignative-repeater-item .drag-handle:active { cursor: grabbing; }
		.skillignative-repeater-item img {
			max-width: 120px;
			max-height: 50px;
			border-radius: 4px;
			border: 1px solid #ddd;
			background: #fff;
			padding: 4px;
		}
		.skillignative-repeater-item input[type="text"] {
			flex: 1;
			padding: 6px 10px;
			border: 1px solid #ddd;
			border-radius: 4px;
			font-size: 13px;
		}
		.skillignative-repeater-item .button-link-delete {
			color: #b32d2e;
			text-decoration: none;
			flex-shrink: 0;
			cursor: pointer;
		}
		.skillignative-repeater-item .button-link-delete:hover { color: #dc3232; }
		#marquee-add-logo { margin-top: 10px; }
		.skillignative-section-desc { color: #666; font-size: 13px; margin-bottom: 15px; }
	</style>

	<div class="skillignative-meta-box">
		<p class="skillignative-section-desc">Add partner/accreditation logos that scroll across the page. Drag to reorder. Recommended: SVG or PNG with transparent background.</p>

		<div id="marquee-logos-list" class="skillignative-repeater-list">
			<?php if ( ! empty( $logos ) ) : ?>
				<?php foreach ( $logos as $i => $logo ) : ?>
					<div class="skillignative-repeater-item" data-index="<?php echo $i; ?>">
						<span class="drag-handle">&#9776;</span>
						<input type="hidden" name="marquee_logos[<?php echo $i; ?>][id]" value="<?php echo esc_attr( $logo['id'] ); ?>" class="logo-id-input">
						<?php $img_url = $logo['id'] ? wp_get_attachment_url( $logo['id'] ) : ''; ?>
						<img src="<?php echo esc_url( $img_url ); ?>" class="logo-preview" <?php echo $img_url ? '' : 'style="display:none;"'; ?>>
						<button type="button" class="button marquee-upload-logo">Select Logo</button>
						<input type="text" name="marquee_logos[<?php echo $i; ?>][alt]" value="<?php echo esc_attr( $logo['alt'] ); ?>" placeholder="Alt text (e.g. Google)">
						<button type="button" class="button-link-delete marquee-remove-logo">&#10005; Remove</button>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<button type="button" class="button button-primary" id="marquee-add-logo">+ Add Logo</button>
	</div>

	<script>
	jQuery(document).ready(function($) {
		var logoIndex = <?php echo ! empty( $logos ) ? count( $logos ) : 0; ?>;

		// Add new logo row
		$('#marquee-add-logo').on('click', function() {
			var html = '<div class="skillignative-repeater-item" data-index="' + logoIndex + '">' +
				'<span class="drag-handle">&#9776;</span>' +
				'<input type="hidden" name="marquee_logos[' + logoIndex + '][id]" value="" class="logo-id-input">' +
				'<img src="" class="logo-preview" style="display:none;">' +
				'<button type="button" class="button marquee-upload-logo">Select Logo</button>' +
				'<input type="text" name="marquee_logos[' + logoIndex + '][alt]" value="" placeholder="Alt text (e.g. Google)">' +
				'<button type="button" class="button-link-delete marquee-remove-logo">&#10005; Remove</button>' +
				'</div>';
			$('#marquee-logos-list').append(html);
			logoIndex++;
		});

		// Upload logo
		$(document).on('click', '.marquee-upload-logo', function(e) {
			e.preventDefault();
			var $item = $(this).closest('.skillignative-repeater-item');
			var mediaUploader = wp.media({
				title: 'Select Logo',
				button: { text: 'Use this logo' },
				multiple: false
			});
			mediaUploader.on('select', function() {
				var attachment = mediaUploader.state().get('selection').first().toJSON();
				$item.find('.logo-id-input').val(attachment.id);
				$item.find('.logo-preview').attr('src', attachment.url).show();
				if ( ! $item.find('input[type="text"]').val() ) {
					$item.find('input[type="text"]').val(attachment.title || attachment.filename.replace(/\.[^/.]+$/, ''));
				}
			});
			mediaUploader.open();
		});

		// Remove logo
		$(document).on('click', '.marquee-remove-logo', function() {
			$(this).closest('.skillignative-repeater-item').remove();
		});

		// Drag & drop sorting
		$('#marquee-logos-list').sortable({
			handle: '.drag-handle',
			placeholder: 'skillignative-repeater-item',
			opacity: 0.7
		});
	});
	</script>
	<?php
}

/**
 * Success Stories Section meta box callback.
 */
function skillignative_stories_section_callback( $post ) {
	// Section header fields
	$stories_title           = get_post_meta( $post->ID, '_stories_title', true ) ?: 'Hear it from';
	$stories_title_highlight = get_post_meta( $post->ID, '_stories_title_highlight', true ) ?: 'our Alumni';
	$stories_subtitle        = get_post_meta( $post->ID, '_stories_subtitle', true ) ?: 'With alumni across 35+ countries, we are proud to be rated 4.8/5 and achieve a Net Promoter Score of 9.3/10, reflecting their trust and satisfaction with our programs.';

	// Rating badges (stored as serialized array)
	$rating_badges = get_post_meta( $post->ID, '_stories_rating_badges', true );
	if ( ! is_array( $rating_badges ) || empty( $rating_badges ) ) {
		$rating_badges = array(
			array( 'score' => '4.9', 'brand' => 'Google', 'css_class' => 'google-text' ),
			array( 'score' => '5.0', 'brand' => 'COURSE REPORT', 'css_class' => 'course-report' ),
			array( 'score' => '4.2', 'brand' => 'GLASSDOOR', 'css_class' => 'glassdoor' ),
		);
	}

	// Story cards (thumbnail + video)
	$story_cards = get_post_meta( $post->ID, '_stories_cards', true );
	if ( ! is_array( $story_cards ) ) {
		$story_cards = array();
	}

	?>
	<div class="skillignative-meta-box">

		<h3>Section Header</h3>
		<div class="skillignative-stats-grid">
			<div class="skillignative-field">
				<label for="stories_title">Title (before highlight)</label>
				<input type="text" id="stories_title" name="stories_title" value="<?php echo esc_attr( $stories_title ); ?>">
			</div>
			<div class="skillignative-field">
				<label for="stories_title_highlight">Title (highlighted - blue)</label>
				<input type="text" id="stories_title_highlight" name="stories_title_highlight" value="<?php echo esc_attr( $stories_title_highlight ); ?>">
			</div>
		</div>
		<div class="skillignative-field">
			<label for="stories_subtitle">Subtitle</label>
			<textarea id="stories_subtitle" name="stories_subtitle"><?php echo esc_textarea( $stories_subtitle ); ?></textarea>
		</div>

		<h3>Rating Badges</h3>
		<p class="skillignative-section-desc">Platform ratings shown below the subtitle. CSS Class options: <code>google-text</code>, <code>course-report</code>, <code>glassdoor</code> (or leave empty for default styling).</p>
		<div id="stories-badges-list" class="skillignative-repeater-list">
			<?php foreach ( $rating_badges as $i => $badge ) : ?>
			<div class="skillignative-repeater-item" data-index="<?php echo $i; ?>">
				<span class="drag-handle">&#9776;</span>
				<input type="text" name="stories_rating_badges[<?php echo $i; ?>][score]" value="<?php echo esc_attr( $badge['score'] ); ?>" placeholder="Score (e.g. 4.9)" style="width:80px;flex:none;">
				<input type="text" name="stories_rating_badges[<?php echo $i; ?>][brand]" value="<?php echo esc_attr( $badge['brand'] ); ?>" placeholder="Brand name (e.g. Google)">
				<input type="text" name="stories_rating_badges[<?php echo $i; ?>][css_class]" value="<?php echo esc_attr( $badge['css_class'] ); ?>" placeholder="CSS class (optional)" style="width:140px;flex:none;">
				<button type="button" class="button-link-delete stories-remove-badge">&#10005;</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="button" id="stories-add-badge">+ Add Rating Badge</button>

		<h3>Story Cards (Thumbnail + Video)</h3>
		<p class="skillignative-section-desc">Each card shows a thumbnail image. On hover, the video plays automatically. Upload both a thumbnail (image) and a video for each card. Drag to reorder.</p>
		<div id="stories-cards-list" class="skillignative-repeater-list">
			<?php if ( ! empty( $story_cards ) ) : ?>
				<?php foreach ( $story_cards as $i => $card ) : ?>
				<div class="skillignative-repeater-item" style="flex-wrap:wrap;" data-index="<?php echo $i; ?>">
					<span class="drag-handle">&#9776;</span>
					<div style="display:flex;gap:15px;flex:1;align-items:center;flex-wrap:wrap;">
						<!-- Thumbnail -->
						<div style="display:flex;align-items:center;gap:8px;">
							<input type="hidden" name="stories_cards[<?php echo $i; ?>][thumb_id]" value="<?php echo esc_attr( $card['thumb_id'] ); ?>" class="story-thumb-id">
							<?php $thumb_url = $card['thumb_id'] ? wp_get_attachment_url( $card['thumb_id'] ) : ''; ?>
							<img src="<?php echo esc_url( $thumb_url ); ?>" class="story-thumb-preview" style="max-width:80px;max-height:60px;border-radius:6px;border:1px solid #ddd;<?php echo $thumb_url ? '' : 'display:none;'; ?>">
							<button type="button" class="button story-upload-thumb">Thumbnail</button>
						</div>
						<!-- Video -->
						<div style="display:flex;align-items:center;gap:8px;">
							<input type="hidden" name="stories_cards[<?php echo $i; ?>][video_id]" value="<?php echo esc_attr( $card['video_id'] ); ?>" class="story-video-id">
							<?php $video_url = $card['video_id'] ? wp_get_attachment_url( $card['video_id'] ) : ''; ?>
							<span class="story-video-name" style="font-size:12px;color:#666;max-width:150px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?php echo $video_url ? basename( $video_url ) : ''; ?></span>
							<button type="button" class="button story-upload-video">Video</button>
						</div>
						<!-- Alt text -->
						<input type="text" name="stories_cards[<?php echo $i; ?>][alt]" value="<?php echo esc_attr( isset( $card['alt'] ) ? $card['alt'] : '' ); ?>" placeholder="Alt text" style="width:140px;flex:none;">
					</div>
					<button type="button" class="button-link-delete stories-remove-card">&#10005;</button>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<button type="button" class="button button-primary" id="stories-add-card">+ Add Story Card</button>

	</div>

	<script>
	jQuery(document).ready(function($) {
		// ===== RATING BADGES =====
		var badgeIndex = <?php echo count( $rating_badges ); ?>;

		$('#stories-add-badge').on('click', function() {
			var html = '<div class="skillignative-repeater-item" data-index="' + badgeIndex + '">' +
				'<span class="drag-handle">&#9776;</span>' +
				'<input type="text" name="stories_rating_badges[' + badgeIndex + '][score]" value="" placeholder="Score (e.g. 4.9)" style="width:80px;flex:none;">' +
				'<input type="text" name="stories_rating_badges[' + badgeIndex + '][brand]" value="" placeholder="Brand name (e.g. Google)">' +
				'<input type="text" name="stories_rating_badges[' + badgeIndex + '][css_class]" value="" placeholder="CSS class (optional)" style="width:140px;flex:none;">' +
				'<button type="button" class="button-link-delete stories-remove-badge">&#10005;</button></div>';
			$('#stories-badges-list').append(html);
			badgeIndex++;
		});

		$(document).on('click', '.stories-remove-badge', function() {
			$(this).closest('.skillignative-repeater-item').remove();
		});

		$('#stories-badges-list').sortable({ handle: '.drag-handle', opacity: 0.7 });

		// ===== STORY CARDS =====
		var cardIndex = <?php echo ! empty( $story_cards ) ? count( $story_cards ) : 0; ?>;

		$('#stories-add-card').on('click', function() {
			var html = '<div class="skillignative-repeater-item" style="flex-wrap:wrap;" data-index="' + cardIndex + '">' +
				'<span class="drag-handle">&#9776;</span>' +
				'<div style="display:flex;gap:15px;flex:1;align-items:center;flex-wrap:wrap;">' +
				'<div style="display:flex;align-items:center;gap:8px;">' +
				'<input type="hidden" name="stories_cards[' + cardIndex + '][thumb_id]" value="" class="story-thumb-id">' +
				'<img src="" class="story-thumb-preview" style="max-width:80px;max-height:60px;border-radius:6px;border:1px solid #ddd;display:none;">' +
				'<button type="button" class="button story-upload-thumb">Thumbnail</button></div>' +
				'<div style="display:flex;align-items:center;gap:8px;">' +
				'<input type="hidden" name="stories_cards[' + cardIndex + '][video_id]" value="" class="story-video-id">' +
				'<span class="story-video-name" style="font-size:12px;color:#666;max-width:150px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"></span>' +
				'<button type="button" class="button story-upload-video">Video</button></div>' +
				'<input type="text" name="stories_cards[' + cardIndex + '][alt]" value="" placeholder="Alt text" style="width:140px;flex:none;"></div>' +
				'<button type="button" class="button-link-delete stories-remove-card">&#10005;</button></div>';
			$('#stories-cards-list').append(html);
			cardIndex++;
		});

		// Upload thumbnail
		$(document).on('click', '.story-upload-thumb', function(e) {
			e.preventDefault();
			var $item = $(this).closest('.skillignative-repeater-item');
			var uploader = wp.media({ title: 'Select Thumbnail Image', button: { text: 'Use this image' }, multiple: false, library: { type: 'image' } });
			uploader.on('select', function() {
				var att = uploader.state().get('selection').first().toJSON();
				$item.find('.story-thumb-id').val(att.id);
				$item.find('.story-thumb-preview').attr('src', att.url).show();
			});
			uploader.open();
		});

		// Upload video
		$(document).on('click', '.story-upload-video', function(e) {
			e.preventDefault();
			var $item = $(this).closest('.skillignative-repeater-item');
			var uploader = wp.media({ title: 'Select Video', button: { text: 'Use this video' }, multiple: false, library: { type: 'video' } });
			uploader.on('select', function() {
				var att = uploader.state().get('selection').first().toJSON();
				$item.find('.story-video-id').val(att.id);
				$item.find('.story-video-name').text(att.filename);
			});
			uploader.open();
		});

		$(document).on('click', '.stories-remove-card', function() {
			$(this).closest('.skillignative-repeater-item').remove();
		});

		$('#stories-cards-list').sortable({ handle: '.drag-handle', opacity: 0.7 });
	});
	</script>
	<?php
}

/**
 * Accreditation Banner Section meta box callback.
 */
function skillignative_accreditation_section_callback( $post ) {
	$accred_text     = get_post_meta( $post->ID, '_accred_text', true ) ?: 'Our Courses Are Designed In Alignment With Industry Standards And Are Accredited Or Approved By Recognized Institutions';
	$accred_image_id = get_post_meta( $post->ID, '_accred_image', true );
	?>
	<div class="skillignative-meta-box">
		<h3>Banner Content</h3>
		<div class="skillignative-field">
			<label for="accred_text">Banner Text</label>
			<textarea id="accred_text" name="accred_text" style="min-height:80px;"><?php echo esc_textarea( $accred_text ); ?></textarea>
		</div>

		<h3>Banner Image</h3>
		<div class="skillignative-field">
			<label>Image (displayed on the right side of the banner)</label>
			<div class="skillignative-image-field">
				<input type="hidden" id="accred_image" name="accred_image" value="<?php echo esc_attr( $accred_image_id ); ?>">
				<?php $img_url = $accred_image_id ? wp_get_attachment_url( $accred_image_id ) : ''; ?>
				<img src="<?php echo esc_url( $img_url ); ?>" id="accred_image_preview" <?php echo $img_url ? '' : 'style="display:none;"'; ?>>
				<button type="button" class="button skillignative-upload-btn" data-target="accred_image">Upload Image</button>
				<button type="button" class="button skillignative-remove-btn" data-target="accred_image" <?php echo $accred_image_id ? '' : 'style="display:none;"'; ?>>Remove</button>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Popular Courses Section meta box callback.
 */
function skillignative_courses_section_callback( $post ) {
	$courses_title           = get_post_meta( $post->ID, '_courses_title', true ) ?: 'Popular';
	$courses_title_highlight = get_post_meta( $post->ID, '_courses_title_highlight', true ) ?: 'Courses';
	?>
	<div class="skillignative-meta-box">
		<h3>Section Header</h3>
		<div class="skillignative-stats-grid">
			<div class="skillignative-field">
				<label for="courses_title">Title (before highlight)</label>
				<input type="text" id="courses_title" name="courses_title" value="<?php echo esc_attr( $courses_title ); ?>">
			</div>
			<div class="skillignative-field">
				<label for="courses_title_highlight">Title (highlighted - blue)</label>
				<input type="text" id="courses_title_highlight" name="courses_title_highlight" value="<?php echo esc_attr( $courses_title_highlight ); ?>">
			</div>
		</div>

		<h3>Course Management</h3>
		<p class="skillignative-section-desc">
			Courses are managed as a <strong>Custom Post Type</strong>. Go to <strong><a href="<?php echo admin_url( 'edit.php?post_type=course' ); ?>">Courses</a></strong> in the admin sidebar to add/edit/delete courses.<br>
			Assign each course a <strong><a href="<?php echo admin_url( 'edit-tags.php?taxonomy=course_category&post_type=course' ); ?>">Course Category</a></strong> (e.g. Trending, Analytics, Finance) — these become the tabs on the homepage.<br>
			Courses appear on the homepage grouped by category. The first category tab is active by default.
		</p>
		<a href="<?php echo admin_url( 'post-new.php?post_type=course' ); ?>" class="button button-primary" target="_blank">+ Add New Course</a>
		<a href="<?php echo admin_url( 'edit.php?post_type=course' ); ?>" class="button" target="_blank">Manage All Courses</a>
		<a href="<?php echo admin_url( 'edit-tags.php?taxonomy=course_category&post_type=course' ); ?>" class="button" target="_blank">Manage Categories (Tabs)</a>
	</div>
	<?php
}

/**
 * Alumni Brands Section meta box callback.
 */
function skillignative_alumni_section_callback( $post ) {
	$alumni_title           = get_post_meta( $post->ID, '_alumni_title', true ) ?: 'Our Alumni Are';
	$alumni_title_highlight = get_post_meta( $post->ID, '_alumni_title_highlight', true ) ?: 'Working @ Top Brands';
	$alumni_cards           = get_post_meta( $post->ID, '_alumni_cards', true );
	if ( ! is_array( $alumni_cards ) ) $alumni_cards = array();
	?>
	<div class="skillignative-meta-box">
		<h3>Section Header</h3>
		<div class="skillignative-stats-grid">
			<div class="skillignative-field">
				<label for="alumni_title">Title (before highlight)</label>
				<input type="text" id="alumni_title" name="alumni_title" value="<?php echo esc_attr( $alumni_title ); ?>">
			</div>
			<div class="skillignative-field">
				<label for="alumni_title_highlight">Title (highlighted - blue)</label>
				<input type="text" id="alumni_title_highlight" name="alumni_title_highlight" value="<?php echo esc_attr( $alumni_title_highlight ); ?>">
			</div>
		</div>

		<h3>Alumni Cards</h3>
		<p class="skillignative-section-desc">Each card shows an alumni photo, their name, company logo text, and a card accent color. CSS class options for company logo: <code>barclays-logo</code>, <code>google-logo</code>, <code>myntra-logo</code>, <code>amazon-logo</code> (or leave empty for default).</p>

		<div id="alumni-cards-list" class="skillignative-repeater-list">
			<?php foreach ( $alumni_cards as $i => $card ) : ?>
			<div class="skillignative-repeater-item" style="flex-wrap:wrap;gap:10px;" data-index="<?php echo $i; ?>">
				<span class="drag-handle">&#9776;</span>
				<div style="display:flex;gap:10px;flex:1;align-items:center;flex-wrap:wrap;">
					<!-- Photo -->
					<div style="display:flex;align-items:center;gap:6px;">
						<input type="hidden" name="alumni_cards[<?php echo $i; ?>][photo_id]" value="<?php echo esc_attr( $card['photo_id'] ); ?>" class="alumni-photo-id">
						<?php $photo_url = $card['photo_id'] ? wp_get_attachment_url( $card['photo_id'] ) : ''; ?>
						<img src="<?php echo esc_url( $photo_url ); ?>" class="alumni-photo-preview" style="width:50px;height:50px;border-radius:50%;object-fit:cover;border:2px solid #ddd;<?php echo $photo_url ? '' : 'display:none;'; ?>">
						<button type="button" class="button alumni-upload-photo">Photo</button>
					</div>
					<input type="text" name="alumni_cards[<?php echo $i; ?>][name]" value="<?php echo esc_attr( $card['name'] ); ?>" placeholder="Alumni Name" style="width:130px;flex:none;">
					<input type="text" name="alumni_cards[<?php echo $i; ?>][company]" value="<?php echo esc_attr( $card['company'] ); ?>" placeholder="Company Name" style="width:120px;flex:none;">
					<input type="text" name="alumni_cards[<?php echo $i; ?>][css_class]" value="<?php echo esc_attr( $card['css_class'] ); ?>" placeholder="Logo CSS class" style="width:120px;flex:none;">
					<input type="color" name="alumni_cards[<?php echo $i; ?>][accent]" value="<?php echo esc_attr( $card['accent'] ?: '#fce4e8' ); ?>" title="Card accent color" style="width:40px;height:32px;padding:1px;border:1px solid #ddd;border-radius:4px;cursor:pointer;">
				</div>
				<button type="button" class="button-link-delete alumni-remove-card">&#10005;</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="button button-primary" id="alumni-add-card">+ Add Alumni Card</button>
	</div>

	<script>
	jQuery(document).ready(function($) {
		var alumniIndex = <?php echo ! empty( $alumni_cards ) ? count( $alumni_cards ) : 0; ?>;

		$('#alumni-add-card').on('click', function() {
			var html = '<div class="skillignative-repeater-item" style="flex-wrap:wrap;gap:10px;" data-index="' + alumniIndex + '">' +
				'<span class="drag-handle">&#9776;</span>' +
				'<div style="display:flex;gap:10px;flex:1;align-items:center;flex-wrap:wrap;">' +
				'<div style="display:flex;align-items:center;gap:6px;">' +
				'<input type="hidden" name="alumni_cards[' + alumniIndex + '][photo_id]" value="" class="alumni-photo-id">' +
				'<img src="" class="alumni-photo-preview" style="width:50px;height:50px;border-radius:50%;object-fit:cover;border:2px solid #ddd;display:none;">' +
				'<button type="button" class="button alumni-upload-photo">Photo</button></div>' +
				'<input type="text" name="alumni_cards[' + alumniIndex + '][name]" value="" placeholder="Alumni Name" style="width:130px;flex:none;">' +
				'<input type="text" name="alumni_cards[' + alumniIndex + '][company]" value="" placeholder="Company Name" style="width:120px;flex:none;">' +
				'<input type="text" name="alumni_cards[' + alumniIndex + '][css_class]" value="" placeholder="Logo CSS class" style="width:120px;flex:none;">' +
				'<input type="color" name="alumni_cards[' + alumniIndex + '][accent]" value="#fce4e8" title="Card accent color" style="width:40px;height:32px;padding:1px;border:1px solid #ddd;border-radius:4px;cursor:pointer;"></div>' +
				'<button type="button" class="button-link-delete alumni-remove-card">&#10005;</button></div>';
			$('#alumni-cards-list').append(html);
			alumniIndex++;
		});

		$(document).on('click', '.alumni-upload-photo', function(e) {
			e.preventDefault();
			var $item = $(this).closest('.skillignative-repeater-item');
			var uploader = wp.media({ title: 'Select Alumni Photo', button: { text: 'Use this photo' }, multiple: false, library: { type: 'image' } });
			uploader.on('select', function() {
				var att = uploader.state().get('selection').first().toJSON();
				$item.find('.alumni-photo-id').val(att.id);
				$item.find('.alumni-photo-preview').attr('src', att.url).show();
			});
			uploader.open();
		});

		$(document).on('click', '.alumni-remove-card', function() {
			$(this).closest('.skillignative-repeater-item').remove();
		});

		$('#alumni-cards-list').sortable({ handle: '.drag-handle', opacity: 0.7 });
	});
	</script>
	<?php
}

/**
 * Achievements Section meta box callback.
 */
function skillignative_achievements_section_callback( $post ) {
	$achieve_title           = get_post_meta( $post->ID, '_achieve_title', true ) ?: 'Our';
	$achieve_title_highlight = get_post_meta( $post->ID, '_achieve_title_highlight', true ) ?: 'Achievements';
	$achieve_cards           = get_post_meta( $post->ID, '_achieve_cards', true );
	if ( ! is_array( $achieve_cards ) || empty( $achieve_cards ) ) {
		$achieve_cards = array(
			array( 'title' => '15,500+ Trainings', 'desc' => 'Delivered more than 15,500+ trainings across various domains.', 'style' => 'card-style-1' ),
			array( 'title' => '55,000+ Trained', 'desc' => 'We have trained more than 55k+ students in the past 11 years & have successfully placed them.', 'style' => 'card-style-2' ),
			array( 'title' => 'International Certification', 'desc' => 'Get rewarded with an Internationally acceptable certification.', 'style' => 'card-style-3' ),
			array( 'title' => 'Global Placement', 'desc' => 'Get interview assistance and placement support from top global companies.', 'style' => 'card-style-4' ),
		);
	}
	?>
	<div class="skillignative-meta-box">
		<h3>Section Header</h3>
		<div class="skillignative-stats-grid">
			<div class="skillignative-field">
				<label for="achieve_title">Title (before highlight)</label>
				<input type="text" id="achieve_title" name="achieve_title" value="<?php echo esc_attr( $achieve_title ); ?>">
			</div>
			<div class="skillignative-field">
				<label for="achieve_title_highlight">Title (highlighted - blue)</label>
				<input type="text" id="achieve_title_highlight" name="achieve_title_highlight" value="<?php echo esc_attr( $achieve_title_highlight ); ?>">
			</div>
		</div>

		<h3>Achievement Cards</h3>
		<p class="skillignative-section-desc">Edit the title and description for each card. Card style determines the visual variant (card-style-1 through card-style-4). SVG icons are part of the design layout.</p>

		<div id="achieve-cards-list" class="skillignative-repeater-list">
			<?php foreach ( $achieve_cards as $i => $card ) : ?>
			<div class="skillignative-repeater-item" style="flex-wrap:wrap;" data-index="<?php echo $i; ?>">
				<span class="drag-handle">&#9776;</span>
				<div style="display:flex;gap:10px;flex:1;flex-wrap:wrap;align-items:flex-start;">
					<input type="text" name="achieve_cards[<?php echo $i; ?>][title]" value="<?php echo esc_attr( $card['title'] ); ?>" placeholder="Title" style="width:200px;flex:none;">
					<input type="text" name="achieve_cards[<?php echo $i; ?>][desc]" value="<?php echo esc_attr( $card['desc'] ); ?>" placeholder="Description" style="flex:1;min-width:200px;">
					<select name="achieve_cards[<?php echo $i; ?>][style]" style="width:130px;flex:none;">
						<?php for ( $s = 1; $s <= 4; $s++ ) : ?>
							<option value="card-style-<?php echo $s; ?>" <?php selected( $card['style'], 'card-style-' . $s ); ?>>Style <?php echo $s; ?></option>
						<?php endfor; ?>
					</select>
				</div>
				<button type="button" class="button-link-delete achieve-remove-card">&#10005;</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="button button-primary" id="achieve-add-card">+ Add Achievement Card</button>
	</div>

	<script>
	jQuery(document).ready(function($) {
		var achieveIndex = <?php echo count( $achieve_cards ); ?>;
		$('#achieve-add-card').on('click', function() {
			var html = '<div class="skillignative-repeater-item" style="flex-wrap:wrap;" data-index="' + achieveIndex + '">' +
				'<span class="drag-handle">&#9776;</span>' +
				'<div style="display:flex;gap:10px;flex:1;flex-wrap:wrap;align-items:flex-start;">' +
				'<input type="text" name="achieve_cards[' + achieveIndex + '][title]" value="" placeholder="Title" style="width:200px;flex:none;">' +
				'<input type="text" name="achieve_cards[' + achieveIndex + '][desc]" value="" placeholder="Description" style="flex:1;min-width:200px;">' +
				'<select name="achieve_cards[' + achieveIndex + '][style]" style="width:130px;flex:none;"><option value="card-style-1">Style 1</option><option value="card-style-2">Style 2</option><option value="card-style-3">Style 3</option><option value="card-style-4">Style 4</option></select></div>' +
				'<button type="button" class="button-link-delete achieve-remove-card">&#10005;</button></div>';
			$('#achieve-cards-list').append(html);
			achieveIndex++;
		});
		$(document).on('click', '.achieve-remove-card', function() { $(this).closest('.skillignative-repeater-item').remove(); });
		$('#achieve-cards-list').sortable({ handle: '.drag-handle', opacity: 0.7 });
	});
	</script>
	<?php
}

/**
 * Master Class Section meta box callback.
 */
function skillignative_masterclass_section_callback( $post ) {
	$mc_title           = get_post_meta( $post->ID, '_mc_title', true ) ?: 'Join Our';
	$mc_title_highlight = get_post_meta( $post->ID, '_mc_title_highlight', true ) ?: 'Master Class Today';
	$mc_cards           = get_post_meta( $post->ID, '_mc_cards', true );
	if ( ! is_array( $mc_cards ) ) $mc_cards = array();

	// Calculate 3 upcoming weekends
	$ist  = new DateTimeZone( 'Asia/Kolkata' );
	$now  = new DateTime( 'now', $ist );
	$sat1 = clone $now;
	if ( (int) $now->format( 'N' ) < 6 ) {
		$sat1->modify( 'next Saturday' );
	} elseif ( (int) $now->format( 'N' ) == 7 ) {
		$sat1->modify( 'next Saturday' );
	}
	// If today is Saturday, sat1 = today
	$sun1 = clone $sat1; $sun1->modify( '+1 day' );
	$sat2 = clone $sat1; $sat2->modify( '+7 days' );
	$sun2 = clone $sat2; $sun2->modify( '+1 day' );
	$sat3 = clone $sat2; $sat3->modify( '+7 days' );
	$sun3 = clone $sat3; $sun3->modify( '+1 day' );

	$weekends = array(
		'auto_sat_1' => $sat1->format( 'F jS (l)' ),
		'auto_sun_1' => $sun1->format( 'F jS (l)' ),
		'auto_sat_2' => $sat2->format( 'F jS (l)' ),
		'auto_sun_2' => $sun2->format( 'F jS (l)' ),
		'auto_sat_3' => $sat3->format( 'F jS (l)' ),
		'auto_sun_3' => $sun3->format( 'F jS (l)' ),
	);

	$date_mode_labels = array(
		'auto_sat_1' => 'Weekend 1 - Sat',
		'auto_sun_1' => 'Weekend 1 - Sun',
		'auto_sat_2' => 'Weekend 2 - Sat',
		'auto_sun_2' => 'Weekend 2 - Sun',
		'auto_sat_3' => 'Weekend 3 - Sat',
		'auto_sun_3' => 'Weekend 3 - Sun',
		'manual'     => 'Manual Date',
	);

	?>
	<div class="skillignative-meta-box">
		<h3>Section Header</h3>
		<div class="skillignative-stats-grid">
			<div class="skillignative-field">
				<label for="mc_title">Title (before highlight)</label>
				<input type="text" id="mc_title" name="mc_title" value="<?php echo esc_attr( $mc_title ); ?>">
			</div>
			<div class="skillignative-field">
				<label for="mc_title_highlight">Title (highlighted - blue)</label>
				<input type="text" id="mc_title_highlight" name="mc_title_highlight" value="<?php echo esc_attr( $mc_title_highlight ); ?>">
			</div>
		</div>

		<h3>Demo Class Cards</h3>
		<div style="background:#ebf4fe;padding:12px 16px;border-radius:8px;margin-bottom:15px;border-left:4px solid #155dfc;">
			<strong>Auto Weekend Dates (3 upcoming weekends):</strong>
			<table style="margin-top:6px;font-size:13px;border-collapse:collapse;">
				<?php foreach ( $weekends as $key => $display ) : ?>
				<tr><td style="padding:2px 12px 2px 0;color:#155dfc;font-weight:600;"><?php echo $date_mode_labels[ $key ]; ?></td><td><code><?php echo $display; ?></code></td></tr>
				<?php endforeach; ?>
			</table>
			<em style="font-size:12px;color:#666;display:block;margin-top:8px;">Each card = 1 day. Dates auto-roll every week. Use "Manual Date" to override with a custom date.</em>
		</div>

		<div id="mc-cards-list" class="skillignative-repeater-list">
			<?php foreach ( $mc_cards as $i => $card ) : ?>
			<div class="skillignative-repeater-item" style="flex-wrap:wrap;gap:8px;" data-index="<?php echo $i; ?>">
				<span class="drag-handle">&#9776;</span>
				<div style="display:flex;gap:10px;flex:1;flex-wrap:wrap;align-items:center;">
					<div style="display:flex;align-items:center;gap:6px;">
						<input type="hidden" name="mc_cards[<?php echo $i; ?>][image_id]" value="<?php echo esc_attr( $card['image_id'] ); ?>" class="mc-image-id">
						<?php $img_url = $card['image_id'] ? wp_get_attachment_url( $card['image_id'] ) : ''; ?>
						<img src="<?php echo esc_url( $img_url ); ?>" class="mc-image-preview" style="max-width:80px;max-height:50px;border-radius:6px;border:1px solid #ddd;<?php echo $img_url ? '' : 'display:none;'; ?>">
						<button type="button" class="button mc-upload-image">Image</button>
					</div>
					<select name="mc_cards[<?php echo $i; ?>][date_mode]" class="mc-date-mode" style="width:155px;flex:none;">
						<?php foreach ( $date_mode_labels as $mode_key => $mode_label ) : ?>
							<option value="<?php echo esc_attr( $mode_key ); ?>" <?php selected( $card['date_mode'], $mode_key ); ?>><?php echo esc_html( $mode_label ); ?></option>
						<?php endforeach; ?>
					</select>
					<input type="date" name="mc_cards[<?php echo $i; ?>][manual_date]" value="<?php echo esc_attr( $card['manual_date'] ?? '' ); ?>" class="mc-manual-date" style="width:150px;flex:none;<?php echo ( $card['date_mode'] ?? '' ) !== 'manual' ? 'opacity:0.4;' : ''; ?>">
					<input type="text" name="mc_cards[<?php echo $i; ?>][time]" value="<?php echo esc_attr( $card['time'] ); ?>" placeholder="e.g. 03:00 PM - 04:30 PM (IST)" style="width:220px;flex:none;">
					<input type="url" name="mc_cards[<?php echo $i; ?>][btn_url]" value="<?php echo esc_url( $card['btn_url'] ?? '#' ); ?>" placeholder="Button URL" style="width:160px;flex:none;">
				</div>
				<button type="button" class="button-link-delete mc-remove-card">&#10005;</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="button button-primary" id="mc-add-card">+ Add Demo Card</button>
	</div>

	<script>
	jQuery(document).ready(function($) {
		var mcIndex = <?php echo ! empty( $mc_cards ) ? count( $mc_cards ) : 0; ?>;
		var modeOptions = '<?php foreach ( $date_mode_labels as $k => $l ) { echo "<option value=\"" . esc_attr( $k ) . "\">" . esc_html( $l ) . "</option>"; } ?>';

		$('#mc-add-card').on('click', function() {
			var html = '<div class="skillignative-repeater-item" style="flex-wrap:wrap;gap:8px;" data-index="' + mcIndex + '">' +
				'<span class="drag-handle">&#9776;</span>' +
				'<div style="display:flex;gap:10px;flex:1;flex-wrap:wrap;align-items:center;">' +
				'<div style="display:flex;align-items:center;gap:6px;">' +
				'<input type="hidden" name="mc_cards[' + mcIndex + '][image_id]" value="" class="mc-image-id">' +
				'<img src="" class="mc-image-preview" style="max-width:80px;max-height:50px;border-radius:6px;border:1px solid #ddd;display:none;">' +
				'<button type="button" class="button mc-upload-image">Image</button></div>' +
				'<select name="mc_cards[' + mcIndex + '][date_mode]" class="mc-date-mode" style="width:155px;flex:none;">' + modeOptions + '</select>' +
				'<input type="date" name="mc_cards[' + mcIndex + '][manual_date]" value="" class="mc-manual-date" style="width:150px;flex:none;opacity:0.4;">' +
				'<input type="text" name="mc_cards[' + mcIndex + '][time]" value="03:00 PM - 04:30 PM (IST)" placeholder="Time" style="width:220px;flex:none;">' +
				'<input type="url" name="mc_cards[' + mcIndex + '][btn_url]" value="#" placeholder="Button URL" style="width:160px;flex:none;"></div>' +
				'<button type="button" class="button-link-delete mc-remove-card">&#10005;</button></div>';
			$('#mc-cards-list').append(html);
			mcIndex++;
		});

		$(document).on('change', '.mc-date-mode', function() {
			var $manual = $(this).closest('.skillignative-repeater-item').find('.mc-manual-date');
			$manual.css('opacity', $(this).val() === 'manual' ? '1' : '0.4');
		});

		$(document).on('click', '.mc-upload-image', function(e) {
			e.preventDefault();
			var $item = $(this).closest('.skillignative-repeater-item');
			var uploader = wp.media({ title: 'Select Demo Image', button: { text: 'Use this image' }, multiple: false, library: { type: 'image' } });
			uploader.on('select', function() {
				var att = uploader.state().get('selection').first().toJSON();
				$item.find('.mc-image-id').val(att.id);
				$item.find('.mc-image-preview').attr('src', att.url).show();
			});
			uploader.open();
		});

		$(document).on('click', '.mc-remove-card', function() { $(this).closest('.skillignative-repeater-item').remove(); });
		$('#mc-cards-list').sortable({ handle: '.drag-handle', opacity: 0.7 });
	});
	</script>
	<?php
}

/**
 * Key Reasons Section meta box callback.
 */
function skillignative_keyreasons_section_callback( $post ) {
	$kr_title           = get_post_meta( $post->ID, '_kr_title', true ) ?: 'KEY REASONS TO';
	$kr_title_highlight = get_post_meta( $post->ID, '_kr_title_highlight', true ) ?: 'JOIN IIM SKILLS';
	$kr_image_id        = get_post_meta( $post->ID, '_kr_image', true );
	$kr_features        = get_post_meta( $post->ID, '_kr_features', true );
	if ( ! is_array( $kr_features ) || empty( $kr_features ) ) {
		$kr_features = array(
			"World's Best Faculty & Industry Experts",
			'Lifetime LMS Access',
			'Guaranteed Virtual Internships',
			'Placement Assurance Programs',
			'Direct Mentorship with the Faculty',
			'100% Money Back Guarantee*',
			'24*7 Learning Support',
			'Portfolio Building',
			'Live Interactive Trainings',
			'Practical Assignments',
		);
	}
	?>
	<div class="skillignative-meta-box">
		<h3>Section Header</h3>
		<div class="skillignative-stats-grid">
			<div class="skillignative-field">
				<label for="kr_title">Title (before highlight)</label>
				<input type="text" id="kr_title" name="kr_title" value="<?php echo esc_attr( $kr_title ); ?>">
			</div>
			<div class="skillignative-field">
				<label for="kr_title_highlight">Title (highlighted - blue)</label>
				<input type="text" id="kr_title_highlight" name="kr_title_highlight" value="<?php echo esc_attr( $kr_title_highlight ); ?>">
			</div>
		</div>

		<h3>Person Image (Right Side Visual)</h3>
		<div class="skillignative-field">
			<div class="skillignative-image-field">
				<input type="hidden" id="kr_image" name="kr_image" value="<?php echo esc_attr( $kr_image_id ); ?>">
				<?php $img_url = $kr_image_id ? wp_get_attachment_url( $kr_image_id ) : ''; ?>
				<img src="<?php echo esc_url( $img_url ); ?>" id="kr_image_preview" <?php echo $img_url ? '' : 'style="display:none;"'; ?>>
				<button type="button" class="button skillignative-upload-btn" data-target="kr_image">Upload Image</button>
				<button type="button" class="button skillignative-remove-btn" data-target="kr_image" <?php echo $kr_image_id ? '' : 'style="display:none;"'; ?>>Remove</button>
			</div>
			<p class="description" style="margin-top:6px;">The person image displayed on the right side with floating icons. Leave empty to use default.</p>
		</div>

		<h3>Feature Items</h3>
		<p class="skillignative-section-desc">List of key reasons/features. These are split into 2 columns on the frontend (first 5 left, rest right). Icons are part of the design layout. Drag to reorder.</p>

		<div id="kr-features-list" class="skillignative-repeater-list">
			<?php foreach ( $kr_features as $i => $feature ) :
				$text = is_array( $feature ) ? $feature['text'] : $feature;
			?>
			<div class="skillignative-repeater-item" data-index="<?php echo $i; ?>">
				<span class="drag-handle">&#9776;</span>
				<input type="text" name="kr_features[<?php echo $i; ?>]" value="<?php echo esc_attr( $text ); ?>" placeholder="Feature text" style="flex:1;">
				<button type="button" class="button-link-delete kr-remove-feature">&#10005;</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="button button-primary" id="kr-add-feature">+ Add Feature</button>
	</div>

	<script>
	jQuery(document).ready(function($) {
		var krIndex = <?php echo count( $kr_features ); ?>;
		$('#kr-add-feature').on('click', function() {
			var html = '<div class="skillignative-repeater-item" data-index="' + krIndex + '">' +
				'<span class="drag-handle">&#9776;</span>' +
				'<input type="text" name="kr_features[' + krIndex + ']" value="" placeholder="Feature text" style="flex:1;">' +
				'<button type="button" class="button-link-delete kr-remove-feature">&#10005;</button></div>';
			$('#kr-features-list').append(html);
			krIndex++;
		});
		$(document).on('click', '.kr-remove-feature', function() { $(this).closest('.skillignative-repeater-item').remove(); });
		$('#kr-features-list').sortable({ handle: '.drag-handle', opacity: 0.7 });
	});
	</script>
	<?php
}

/**
 * Learner Benefits Section meta box callback.
 */
function skillignative_benefits_section_callback( $post ) {
	$lb_title           = get_post_meta( $post->ID, '_lb_title', true ) ?: 'Learner';
	$lb_title_highlight = get_post_meta( $post->ID, '_lb_title_highlight', true ) ?: 'Benefits';
	$lb_pedagogy_title  = get_post_meta( $post->ID, '_lb_pedagogy_title', true ) ?: 'World Class Pedagogy';
	$lb_pedagogy_items  = get_post_meta( $post->ID, '_lb_pedagogy_items', true );
	if ( ! is_array( $lb_pedagogy_items ) || empty( $lb_pedagogy_items ) ) {
		$lb_pedagogy_items = array(
			'Participate in Hackathons & Group Activities',
			'Learn with fun Hands-on Exercises & Assignments',
			"Learn from the World's Best Faculty & Industry Experts",
		);
	}
	$lb_benefits = get_post_meta( $post->ID, '_lb_benefits', true );
	if ( ! is_array( $lb_benefits ) || empty( $lb_benefits ) ) {
		$lb_benefits = array(
			'4.8/5 Rating', 'Practical Learning', '24*7 Support', '1:1 Mentorship',
			'55,000+ Career Transition', '550+ Hiring Partners', 'Career Assistance', 'Personalized Guidance',
		);
	}
	?>
	<div class="skillignative-meta-box">
		<h3>Section Header</h3>
		<div class="skillignative-stats-grid">
			<div class="skillignative-field">
				<label for="lb_title">Title (before highlight)</label>
				<input type="text" id="lb_title" name="lb_title" value="<?php echo esc_attr( $lb_title ); ?>">
			</div>
			<div class="skillignative-field">
				<label for="lb_title_highlight">Title (highlighted - blue)</label>
				<input type="text" id="lb_title_highlight" name="lb_title_highlight" value="<?php echo esc_attr( $lb_title_highlight ); ?>">
			</div>
		</div>

		<h3>Pedagogy Card (Left Side)</h3>
		<div class="skillignative-field">
			<label for="lb_pedagogy_title">Card Title</label>
			<input type="text" id="lb_pedagogy_title" name="lb_pedagogy_title" value="<?php echo esc_attr( $lb_pedagogy_title ); ?>">
		</div>
		<p class="skillignative-section-desc">Checklist items inside the pedagogy card:</p>
		<div id="lb-pedagogy-list" class="skillignative-repeater-list">
			<?php foreach ( $lb_pedagogy_items as $i => $item ) : ?>
			<div class="skillignative-repeater-item" data-index="<?php echo $i; ?>">
				<span class="drag-handle">&#9776;</span>
				<input type="text" name="lb_pedagogy_items[<?php echo $i; ?>]" value="<?php echo esc_attr( $item ); ?>" style="flex:1;">
				<button type="button" class="button-link-delete lb-remove-pedagogy">&#10005;</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="button" id="lb-add-pedagogy">+ Add Item</button>

		<h3>Benefit Cards (Right Grid)</h3>
		<p class="skillignative-section-desc">Short benefit labels displayed as cards in a grid. Icons are part of the design layout.</p>
		<div id="lb-benefits-list" class="skillignative-repeater-list">
			<?php foreach ( $lb_benefits as $i => $benefit ) : ?>
			<div class="skillignative-repeater-item" data-index="<?php echo $i; ?>">
				<span class="drag-handle">&#9776;</span>
				<input type="text" name="lb_benefits[<?php echo $i; ?>]" value="<?php echo esc_attr( $benefit ); ?>" style="flex:1;">
				<button type="button" class="button-link-delete lb-remove-benefit">&#10005;</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="button button-primary" id="lb-add-benefit">+ Add Benefit Card</button>
	</div>

	<script>
	jQuery(document).ready(function($) {
		var pedIndex = <?php echo count( $lb_pedagogy_items ); ?>;
		$('#lb-add-pedagogy').on('click', function() {
			$('#lb-pedagogy-list').append('<div class="skillignative-repeater-item"><span class="drag-handle">&#9776;</span><input type="text" name="lb_pedagogy_items[' + pedIndex + ']" value="" style="flex:1;"><button type="button" class="button-link-delete lb-remove-pedagogy">&#10005;</button></div>');
			pedIndex++;
		});
		$(document).on('click', '.lb-remove-pedagogy', function() { $(this).closest('.skillignative-repeater-item').remove(); });
		$('#lb-pedagogy-list').sortable({ handle: '.drag-handle', opacity: 0.7 });

		var benIndex = <?php echo count( $lb_benefits ); ?>;
		$('#lb-add-benefit').on('click', function() {
			$('#lb-benefits-list').append('<div class="skillignative-repeater-item"><span class="drag-handle">&#9776;</span><input type="text" name="lb_benefits[' + benIndex + ']" value="" style="flex:1;"><button type="button" class="button-link-delete lb-remove-benefit">&#10005;</button></div>');
			benIndex++;
		});
		$(document).on('click', '.lb-remove-benefit', function() { $(this).closest('.skillignative-repeater-item').remove(); });
		$('#lb-benefits-list').sortable({ handle: '.drag-handle', opacity: 0.7 });
	});
	</script>
	<?php
}

/**
 * Media Presence Section meta box callback.
 */
function skillignative_media_section_callback( $post ) {
	$mp_title           = get_post_meta( $post->ID, '_mp_title', true ) ?: 'Media';
	$mp_title_highlight = get_post_meta( $post->ID, '_mp_title_highlight', true ) ?: 'Presence';
	$mp_cards           = get_post_meta( $post->ID, '_mp_cards', true );
	if ( ! is_array( $mp_cards ) ) $mp_cards = array();
	?>
	<div class="skillignative-meta-box">
		<h3>Section Header</h3>
		<div class="skillignative-stats-grid">
			<div class="skillignative-field">
				<label for="mp_title">Title (before highlight)</label>
				<input type="text" id="mp_title" name="mp_title" value="<?php echo esc_attr( $mp_title ); ?>">
			</div>
			<div class="skillignative-field">
				<label for="mp_title_highlight">Title (highlighted - blue)</label>
				<input type="text" id="mp_title_highlight" name="mp_title_highlight" value="<?php echo esc_attr( $mp_title_highlight ); ?>">
			</div>
		</div>

		<h3>Media Cards</h3>
		<p class="skillignative-section-desc">Each card shows a media outlet logo (image upload) and a description/headline. Cards scroll in a marquee. Use "Logo Type" to choose between an uploaded image or text-based logo.</p>

		<div id="mp-cards-list" class="skillignative-repeater-list">
			<?php foreach ( $mp_cards as $i => $card ) : ?>
			<div class="skillignative-repeater-item" style="flex-wrap:wrap;gap:8px;" data-index="<?php echo $i; ?>">
				<span class="drag-handle">&#9776;</span>
				<div style="display:flex;gap:10px;flex:1;flex-wrap:wrap;align-items:center;">
					<select name="mp_cards[<?php echo $i; ?>][logo_type]" class="mp-logo-type" style="width:100px;flex:none;">
						<option value="image" <?php selected( $card['logo_type'] ?? 'image', 'image' ); ?>>Image</option>
						<option value="text" <?php selected( $card['logo_type'] ?? 'image', 'text' ); ?>>Text</option>
					</select>
					<!-- Image logo -->
					<div class="mp-image-wrap" style="display:flex;align-items:center;gap:6px;<?php echo ( $card['logo_type'] ?? 'image' ) === 'text' ? 'opacity:0.4;' : ''; ?>">
						<input type="hidden" name="mp_cards[<?php echo $i; ?>][logo_id]" value="<?php echo esc_attr( $card['logo_id'] ?? '' ); ?>" class="mp-logo-id">
						<?php $logo_url = ! empty( $card['logo_id'] ) ? wp_get_attachment_url( $card['logo_id'] ) : ''; ?>
						<img src="<?php echo esc_url( $logo_url ); ?>" class="mp-logo-preview" style="max-width:80px;max-height:40px;border:1px solid #ddd;border-radius:4px;<?php echo $logo_url ? '' : 'display:none;'; ?>">
						<button type="button" class="button mp-upload-logo">Logo</button>
					</div>
					<!-- Text logo -->
					<input type="text" name="mp_cards[<?php echo $i; ?>][logo_text]" value="<?php echo esc_attr( $card['logo_text'] ?? '' ); ?>" placeholder="Text logo HTML" style="width:150px;flex:none;<?php echo ( $card['logo_type'] ?? 'image' ) !== 'text' ? 'opacity:0.4;' : ''; ?>" class="mp-logo-text-input">
					<!-- Description -->
					<input type="text" name="mp_cards[<?php echo $i; ?>][desc]" value="<?php echo esc_attr( $card['desc'] ?? '' ); ?>" placeholder="Description / headline" style="flex:1;min-width:200px;">
				</div>
				<button type="button" class="button-link-delete mp-remove-card">&#10005;</button>
			</div>
			<?php endforeach; ?>
		</div>
		<button type="button" class="button button-primary" id="mp-add-card">+ Add Media Card</button>
	</div>

	<script>
	jQuery(document).ready(function($) {
		var mpIndex = <?php echo ! empty( $mp_cards ) ? count( $mp_cards ) : 0; ?>;

		$('#mp-add-card').on('click', function() {
			var html = '<div class="skillignative-repeater-item" style="flex-wrap:wrap;gap:8px;" data-index="' + mpIndex + '">' +
				'<span class="drag-handle">&#9776;</span>' +
				'<div style="display:flex;gap:10px;flex:1;flex-wrap:wrap;align-items:center;">' +
				'<select name="mp_cards[' + mpIndex + '][logo_type]" class="mp-logo-type" style="width:100px;flex:none;"><option value="image">Image</option><option value="text">Text</option></select>' +
				'<div class="mp-image-wrap" style="display:flex;align-items:center;gap:6px;">' +
				'<input type="hidden" name="mp_cards[' + mpIndex + '][logo_id]" value="" class="mp-logo-id">' +
				'<img src="" class="mp-logo-preview" style="max-width:80px;max-height:40px;border:1px solid #ddd;border-radius:4px;display:none;">' +
				'<button type="button" class="button mp-upload-logo">Logo</button></div>' +
				'<input type="text" name="mp_cards[' + mpIndex + '][logo_text]" value="" placeholder="Text logo HTML" style="width:150px;flex:none;opacity:0.4;" class="mp-logo-text-input">' +
				'<input type="text" name="mp_cards[' + mpIndex + '][desc]" value="" placeholder="Description / headline" style="flex:1;min-width:200px;"></div>' +
				'<button type="button" class="button-link-delete mp-remove-card">&#10005;</button></div>';
			$('#mp-cards-list').append(html);
			mpIndex++;
		});

		$(document).on('change', '.mp-logo-type', function() {
			var $item = $(this).closest('.skillignative-repeater-item');
			var isText = $(this).val() === 'text';
			$item.find('.mp-image-wrap').css('opacity', isText ? '0.4' : '1');
			$item.find('.mp-logo-text-input').css('opacity', isText ? '1' : '0.4');
		});

		$(document).on('click', '.mp-upload-logo', function(e) {
			e.preventDefault();
			var $item = $(this).closest('.skillignative-repeater-item');
			var uploader = wp.media({ title: 'Select Media Logo', button: { text: 'Use this logo' }, multiple: false, library: { type: 'image' } });
			uploader.on('select', function() {
				var att = uploader.state().get('selection').first().toJSON();
				$item.find('.mp-logo-id').val(att.id);
				$item.find('.mp-logo-preview').attr('src', att.url).show();
			});
			uploader.open();
		});

		$(document).on('click', '.mp-remove-card', function() { $(this).closest('.skillignative-repeater-item').remove(); });
		$('#mp-cards-list').sortable({ handle: '.drag-handle', opacity: 0.7 });
	});
	</script>
	<?php
}

/**
 * Save homepage meta box data.
 */
function skillignative_save_homepage_meta( $post_id ) {
	// Verify nonce
	if ( ! isset( $_POST['skillignative_homepage_nonce_field'] ) ||
		 ! wp_verify_nonce( $_POST['skillignative_homepage_nonce_field'], 'skillignative_homepage_nonce' ) ) {
		return;
	}

	// Check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check permissions
	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}

	// Hero section fields
	$fields = array(
		'hero_title',
		'hero_title_highlight',
		'hero_subtitle',
		'hero_image_left',
		'hero_image_right',
		'hero_btn_primary_text',
		'hero_btn_primary_url',
		'hero_btn_secondary_text',
		'hero_btn_secondary_url',
		'hero_stat1_value',
		'hero_stat1_label',
		'hero_stat2_value',
		'hero_stat2_label',
		'hero_stat3_value',
		'hero_stat3_label',
		'hero_stat4_value',
		'hero_stat4_label',
		'hero_badge_number',
		'hero_badge_text',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}

	// Disclaimer allows limited HTML
	if ( isset( $_POST['hero_disclaimer'] ) ) {
		update_post_meta( $post_id, '_hero_disclaimer', wp_kses_post( $_POST['hero_disclaimer'] ) );
	}

	// Logo Marquee section
	if ( isset( $_POST['marquee_logos'] ) && is_array( $_POST['marquee_logos'] ) ) {
		$logos = array();
		foreach ( $_POST['marquee_logos'] as $logo ) {
			if ( ! empty( $logo['id'] ) ) {
				$logos[] = array(
					'id'  => absint( $logo['id'] ),
					'alt' => sanitize_text_field( $logo['alt'] ),
				);
			}
		}
		update_post_meta( $post_id, '_marquee_logos', $logos );
	} else {
		update_post_meta( $post_id, '_marquee_logos', array() );
	}

	// Success Stories section - text fields
	$stories_text_fields = array( 'stories_title', 'stories_title_highlight' );
	foreach ( $stories_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	if ( isset( $_POST['stories_subtitle'] ) ) {
		update_post_meta( $post_id, '_stories_subtitle', sanitize_textarea_field( $_POST['stories_subtitle'] ) );
	}

	// Success Stories - Rating badges
	if ( isset( $_POST['stories_rating_badges'] ) && is_array( $_POST['stories_rating_badges'] ) ) {
		$badges = array();
		foreach ( $_POST['stories_rating_badges'] as $badge ) {
			if ( ! empty( $badge['score'] ) || ! empty( $badge['brand'] ) ) {
				$badges[] = array(
					'score'     => sanitize_text_field( $badge['score'] ),
					'brand'     => sanitize_text_field( $badge['brand'] ),
					'css_class' => sanitize_html_class( $badge['css_class'] ),
				);
			}
		}
		update_post_meta( $post_id, '_stories_rating_badges', $badges );
	}

	// Success Stories - Story cards
	if ( isset( $_POST['stories_cards'] ) && is_array( $_POST['stories_cards'] ) ) {
		$cards = array();
		foreach ( $_POST['stories_cards'] as $card ) {
			if ( ! empty( $card['thumb_id'] ) || ! empty( $card['video_id'] ) ) {
				$cards[] = array(
					'thumb_id' => absint( $card['thumb_id'] ),
					'video_id' => absint( $card['video_id'] ),
					'alt'      => sanitize_text_field( $card['alt'] ),
				);
			}
		}
		update_post_meta( $post_id, '_stories_cards', $cards );
	}

	// Accreditation Banner section
	if ( isset( $_POST['accred_text'] ) ) {
		update_post_meta( $post_id, '_accred_text', sanitize_textarea_field( $_POST['accred_text'] ) );
	}
	if ( isset( $_POST['accred_image'] ) ) {
		update_post_meta( $post_id, '_accred_image', absint( $_POST['accred_image'] ) );
	}

	// Popular Courses section title
	$courses_text_fields = array( 'courses_title', 'courses_title_highlight' );
	foreach ( $courses_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}

	// Alumni Brands section
	$alumni_text_fields = array( 'alumni_title', 'alumni_title_highlight' );
	foreach ( $alumni_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	if ( isset( $_POST['alumni_cards'] ) && is_array( $_POST['alumni_cards'] ) ) {
		$cards = array();
		foreach ( $_POST['alumni_cards'] as $card ) {
			if ( ! empty( $card['name'] ) || ! empty( $card['photo_id'] ) ) {
				$cards[] = array(
					'photo_id'  => absint( $card['photo_id'] ),
					'name'      => sanitize_text_field( $card['name'] ),
					'company'   => sanitize_text_field( $card['company'] ),
					'css_class' => sanitize_html_class( $card['css_class'] ),
					'accent'    => sanitize_hex_color( $card['accent'] ) ?: '#fce4e8',
				);
			}
		}
		update_post_meta( $post_id, '_alumni_cards', $cards );
	}

	// Achievements section
	$achieve_text_fields = array( 'achieve_title', 'achieve_title_highlight' );
	foreach ( $achieve_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	if ( isset( $_POST['achieve_cards'] ) && is_array( $_POST['achieve_cards'] ) ) {
		$cards = array();
		foreach ( $_POST['achieve_cards'] as $card ) {
			if ( ! empty( $card['title'] ) ) {
				$cards[] = array(
					'title' => sanitize_text_field( $card['title'] ),
					'desc'  => sanitize_text_field( $card['desc'] ),
					'style' => sanitize_html_class( $card['style'] ) ?: 'card-style-1',
				);
			}
		}
		update_post_meta( $post_id, '_achieve_cards', $cards );
	}

	// Master Class section
	$mc_text_fields = array( 'mc_title', 'mc_title_highlight' );
	foreach ( $mc_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	if ( isset( $_POST['mc_cards'] ) && is_array( $_POST['mc_cards'] ) ) {
		$cards = array();
		foreach ( $_POST['mc_cards'] as $card ) {
			$cards[] = array(
				'image_id'    => absint( $card['image_id'] ),
				'date_mode'   => sanitize_text_field( $card['date_mode'] ),
				'manual_date' => sanitize_text_field( $card['manual_date'] ),
				'time'        => sanitize_text_field( $card['time'] ),
				'btn_url'     => esc_url_raw( $card['btn_url'] ),
			);
		}
		update_post_meta( $post_id, '_mc_cards', $cards );
	}

	// Key Reasons section
	$kr_text_fields = array( 'kr_title', 'kr_title_highlight' );
	foreach ( $kr_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	if ( isset( $_POST['kr_image'] ) ) {
		update_post_meta( $post_id, '_kr_image', absint( $_POST['kr_image'] ) );
	}
	if ( isset( $_POST['kr_features'] ) && is_array( $_POST['kr_features'] ) ) {
		$features = array();
		foreach ( $_POST['kr_features'] as $f ) {
			$text = sanitize_text_field( $f );
			if ( ! empty( $text ) ) {
				$features[] = $text;
			}
		}
		update_post_meta( $post_id, '_kr_features', $features );
	}

	// Learner Benefits section
	$lb_text_fields = array( 'lb_title', 'lb_title_highlight', 'lb_pedagogy_title' );
	foreach ( $lb_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	if ( isset( $_POST['lb_pedagogy_items'] ) && is_array( $_POST['lb_pedagogy_items'] ) ) {
		$items = array_values( array_filter( array_map( 'sanitize_text_field', $_POST['lb_pedagogy_items'] ) ) );
		update_post_meta( $post_id, '_lb_pedagogy_items', $items );
	}
	if ( isset( $_POST['lb_benefits'] ) && is_array( $_POST['lb_benefits'] ) ) {
		$benefits = array_values( array_filter( array_map( 'sanitize_text_field', $_POST['lb_benefits'] ) ) );
		update_post_meta( $post_id, '_lb_benefits', $benefits );
	}

	// Media Presence section
	$mp_text_fields = array( 'mp_title', 'mp_title_highlight' );
	foreach ( $mp_text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}
	if ( isset( $_POST['mp_cards'] ) && is_array( $_POST['mp_cards'] ) ) {
		$cards = array();
		foreach ( $_POST['mp_cards'] as $card ) {
			if ( ! empty( $card['desc'] ) || ! empty( $card['logo_id'] ) || ! empty( $card['logo_text'] ) ) {
				$cards[] = array(
					'logo_type' => sanitize_text_field( $card['logo_type'] ),
					'logo_id'   => absint( $card['logo_id'] ),
					'logo_text' => wp_kses_post( $card['logo_text'] ),
					'desc'      => sanitize_text_field( $card['desc'] ),
				);
			}
		}
		update_post_meta( $post_id, '_mp_cards', $cards );
	}
}
add_action( 'save_post', 'skillignative_save_homepage_meta' );

/**
 * Enqueue media uploader on page edit screens.
 */
function skillignative_admin_scripts( $hook ) {
	if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
		wp_enqueue_media();
		wp_enqueue_script( 'jquery-ui-sortable' );
	}
}
add_action( 'admin_enqueue_scripts', 'skillignative_admin_scripts' );
