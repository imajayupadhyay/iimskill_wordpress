<?php
/**
 * About Page Meta Boxes
 *
 * Registers custom meta boxes for the About Us page.
 * Admin can edit all about page section data from Pages > About > Edit.
 *
 * @package Skillignative
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register meta boxes for the about page.
 */
function skillignative_about_meta_boxes() {
	add_meta_box(
		'skillignative_about_hero',
		'About Hero Section',
		'skillignative_about_hero_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_about_achievements',
		'Achievements Section',
		'skillignative_about_achievements_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_about_history_mission',
		'History & Mission Section',
		'skillignative_about_history_mission_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_about_media',
		'Media Presence Section',
		'skillignative_about_media_callback',
		'page',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes_page', 'skillignative_about_meta_boxes' );

/* ============================================================
   HERO SECTION
============================================================ */
function skillignative_about_hero_callback( $post ) {
	wp_nonce_field( 'skillignative_about_save', 'skillignative_about_nonce' );
	$badge_text      = get_post_meta( $post->ID, '_ah_badge_text', true ) ?: "World's Fastest Growing Ed-Tech Company";
	$title           = get_post_meta( $post->ID, '_ah_title', true ) ?: 'IIM SKILLS is world\'s fastest growing';
	$title_highlight = get_post_meta( $post->ID, '_ah_title_highlight', true ) ?: 'Ed-Tech Company';
	$description     = get_post_meta( $post->ID, '_ah_description', true ) ?: 'IIM SKILLS is world\'s fastest growing Ed-Tech Company. Headquarters in New Delhi India. IIM SKILLS has a presence in 23 Cities in Asia including Dubai & Singapore catering in the Finance, Marketing, Data & multiple educational domains.';
	$btn1_text       = get_post_meta( $post->ID, '_ah_btn1_text', true ) ?: 'Explore Programs';
	$btn1_url        = get_post_meta( $post->ID, '_ah_btn1_url', true ) ?: '#';
	$btn2_text       = get_post_meta( $post->ID, '_ah_btn2_text', true ) ?: 'Contact Us';
	$btn2_url        = get_post_meta( $post->ID, '_ah_btn2_url', true ) ?: home_url( '/contact/' );
	?>
	<table class="form-table">
		<tr>
			<th><label>Badge Text</label></th>
			<td><input type="text" name="_ah_badge_text" value="<?php echo esc_attr( $badge_text ); ?>" class="large-text"></td>
		</tr>
		<tr>
			<th><label>Title (first line)</label></th>
			<td>
				<input type="text" name="_ah_title" value="<?php echo esc_attr( $title ); ?>" class="large-text">
				<p class="description">The main part before the gradient text.</p>
			</td>
		</tr>
		<tr>
			<th><label>Title Highlight (gradient)</label></th>
			<td><input type="text" name="_ah_title_highlight" value="<?php echo esc_attr( $title_highlight ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Description</label></th>
			<td><textarea name="_ah_description" rows="5" class="large-text"><?php echo esc_textarea( $description ); ?></textarea></td>
		</tr>
		<tr>
			<th><label>Button 1 Text (Primary)</label></th>
			<td><input type="text" name="_ah_btn1_text" value="<?php echo esc_attr( $btn1_text ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Button 1 URL</label></th>
			<td><input type="url" name="_ah_btn1_url" value="<?php echo esc_attr( $btn1_url ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Button 2 Text (Outline)</label></th>
			<td><input type="text" name="_ah_btn2_text" value="<?php echo esc_attr( $btn2_text ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Button 2 URL</label></th>
			<td><input type="url" name="_ah_btn2_url" value="<?php echo esc_attr( $btn2_url ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<?php
}

/* ============================================================
   ACHIEVEMENTS SECTION
============================================================ */
function skillignative_about_achievements_callback( $post ) {
	$title           = get_post_meta( $post->ID, '_aa_title', true ) ?: 'Our';
	$title_highlight = get_post_meta( $post->ID, '_aa_title_highlight', true ) ?: 'Achievements';
	$cards           = get_post_meta( $post->ID, '_aa_cards', true );
	if ( ! is_array( $cards ) || empty( $cards ) ) {
		$cards = array(
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

	$icon_options = array(
		'graduation' => 'Graduation Cap (Students)',
		'training'   => 'Briefcase (Trainings)',
		'calendar'   => 'Calendar (Hiring Partners)',
		'lock'       => 'Lock (Experience)',
		'chat'       => 'Chat Bubble (Support)',
		'globe'      => 'Globe (Countries)',
		'star'       => 'Star (Rating)',
		'book'       => 'Book (Courses)',
	);
	?>
	<table class="form-table">
		<tr>
			<th><label>Section Title</label></th>
			<td><input type="text" name="_aa_title" value="<?php echo esc_attr( $title ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Title Highlight (blue)</label></th>
			<td><input type="text" name="_aa_title_highlight" value="<?php echo esc_attr( $title_highlight ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<p><strong>Achievement Cards</strong> (up to 8)</p>
	<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
		<?php foreach ( $cards as $i => $card ) : ?>
		<div style="background:#f9f9f9;padding:14px;border:1px solid #ddd;border-radius:4px;">
			<p style="margin:0 0 10px;font-weight:600;">Card <?php echo $i + 1; ?></p>
			<table class="form-table" style="margin:0;">
				<tr>
					<th style="width:90px;"><label>Icon</label></th>
					<td>
						<select name="_aa_cards[<?php echo $i; ?>][icon]">
							<?php foreach ( $icon_options as $val => $label ) : ?>
							<option value="<?php echo esc_attr( $val ); ?>" <?php selected( $card['icon'] ?? '', $val ); ?>><?php echo esc_html( $label ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<th><label>Number</label></th>
					<td><input type="text" name="_aa_cards[<?php echo $i; ?>][number]" value="<?php echo esc_attr( $card['number'] ?? '' ); ?>" class="regular-text"></td>
				</tr>
				<tr>
					<th><label>Label</label></th>
					<td><input type="text" name="_aa_cards[<?php echo $i; ?>][label]" value="<?php echo esc_attr( $card['label'] ?? '' ); ?>" class="regular-text"></td>
				</tr>
			</table>
		</div>
		<?php endforeach; ?>
	</div>
	<?php
}

/* ============================================================
   HISTORY & MISSION SECTION
============================================================ */
function skillignative_about_history_mission_callback( $post ) {
	$title           = get_post_meta( $post->ID, '_ahm_title', true ) ?: 'History &';
	$title_highlight = get_post_meta( $post->ID, '_ahm_title_highlight', true ) ?: 'Mission';
	$history_label   = get_post_meta( $post->ID, '_ahm_history_label', true ) ?: 'HISTORY';
	$history_text    = get_post_meta( $post->ID, '_ahm_history_text', true ) ?: 'IIM SKILLS originated after the foundation of a successful educational blog. After reaching 1 million people digitally for career guidance, we decided to launch our first full-fledged training program. We started with the Content Writing Master Course which transformed the entire Content Education Industry.';
	$mission_label   = get_post_meta( $post->ID, '_ahm_mission_label', true ) ?: 'MISSION';
	$mission_text    = get_post_meta( $post->ID, '_ahm_mission_text', true ) ?: 'Our mission is to provide World Class Education at affordable pricing through our live online and self-paced learning programs. We are continuously working hard to identify various skill development courses that are in demand and can help professionals to upskill professionally in a few months.';
	$image_id        = get_post_meta( $post->ID, '_ahm_image_id', true );
	$image_url       = $image_id ? wp_get_attachment_url( $image_id ) : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80';
	?>
	<table class="form-table">
		<tr>
			<th><label>Section Title</label></th>
			<td><input type="text" name="_ahm_title" value="<?php echo esc_attr( $title ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Title Highlight (blue)</label></th>
			<td><input type="text" name="_ahm_title_highlight" value="<?php echo esc_attr( $title_highlight ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<hr>
	<h4>History Card</h4>
	<table class="form-table">
		<tr>
			<th><label>Label (e.g. HISTORY)</label></th>
			<td><input type="text" name="_ahm_history_label" value="<?php echo esc_attr( $history_label ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Text</label></th>
			<td><textarea name="_ahm_history_text" rows="5" class="large-text"><?php echo esc_textarea( $history_text ); ?></textarea></td>
		</tr>
	</table>
	<hr>
	<h4>Mission Card</h4>
	<table class="form-table">
		<tr>
			<th><label>Label (e.g. MISSION)</label></th>
			<td><input type="text" name="_ahm_mission_label" value="<?php echo esc_attr( $mission_label ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Text</label></th>
			<td><textarea name="_ahm_mission_text" rows="5" class="large-text"><?php echo esc_textarea( $mission_text ); ?></textarea></td>
		</tr>
	</table>
	<hr>
	<h4>Section Image</h4>
	<table class="form-table">
		<tr>
			<th><label>Image</label></th>
			<td>
				<input type="hidden" name="_ahm_image_id" id="ahm_image_id" value="<?php echo esc_attr( $image_id ); ?>">
				<img id="ahm_image_preview" src="<?php echo esc_url( $image_url ); ?>" style="max-width:200px;display:<?php echo $image_id ? 'block' : 'none'; ?>;margin-bottom:8px;">
				<button type="button" class="button about-upload-btn" data-target="ahm_image_id" data-preview="ahm_image_preview">Select Image</button>
				<button type="button" class="button about-remove-btn" data-target="ahm_image_id" data-preview="ahm_image_preview">Remove</button>
				<p class="description">If empty, defaults to Unsplash team collaboration image.</p>
			</td>
		</tr>
	</table>
	<?php
}

/* ============================================================
   MEDIA PRESENCE SECTION
============================================================ */
function skillignative_about_media_callback( $post ) {
	$title           = get_post_meta( $post->ID, '_amp_title', true ) ?: 'Media';
	$title_highlight = get_post_meta( $post->ID, '_amp_title_highlight', true ) ?: 'Presence';
	$cards           = get_post_meta( $post->ID, '_amp_cards', true );
	if ( ! is_array( $cards ) || empty( $cards ) ) {
		$cards = array(
			array( 'logo_type' => 'image', 'image_id' => '', 'logo_html' => '', 'description' => 'Which courses are giving jobs as work from home options permanently?' ),
			array( 'logo_type' => 'image', 'image_id' => '', 'logo_html' => '', 'description' => '5 qualities you need to become a great content writer - Here are five qualities you need...' ),
			array( 'logo_type' => 'text',  'image_id' => '', 'logo_html' => '<span style="color:#4CAF50;">edu</span><span style="color:#333;">graph</span>', 'description' => 'Top 10 online courses for Creative Writing: Sharpen your storytelling skills' ),
			array( 'logo_type' => 'text',  'image_id' => '', 'logo_html' => '<span style="color:#1a1a2e;font-weight:700;">Higher<br>Education</span><span style="color:#155dfc;font-size:12px;font-weight:400;">REVIEW</span>', 'description' => '7 Things to Consider Before Taking up a Digital Marketing Course' ),
		);
	}
	?>
	<table class="form-table">
		<tr>
			<th><label>Section Title</label></th>
			<td><input type="text" name="_amp_title" value="<?php echo esc_attr( $title ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Title Highlight (blue)</label></th>
			<td><input type="text" name="_amp_title_highlight" value="<?php echo esc_attr( $title_highlight ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<p><strong>Media Cards</strong> <small>(slider auto-duplicates for seamless loop)</small></p>
	<div id="amp_cards_container">
		<?php foreach ( $cards as $i => $card ) :
			$card_image_id  = $card['image_id'] ?? '';
			$card_image_url = $card_image_id ? wp_get_attachment_url( $card_image_id ) : '';
		?>
		<div style="background:#f9f9f9;padding:16px;margin-bottom:12px;border:1px solid #ddd;border-radius:4px;">
			<p style="margin:0 0 10px;font-weight:600;">Card <?php echo $i + 1; ?></p>
			<table class="form-table" style="margin:0;">
				<tr>
					<th><label>Logo Type</label></th>
					<td>
						<select name="_amp_cards[<?php echo $i; ?>][logo_type]" class="amp-logo-type" data-index="<?php echo $i; ?>">
							<option value="image" <?php selected( $card['logo_type'] ?? 'image', 'image' ); ?>>Image Upload</option>
							<option value="text"  <?php selected( $card['logo_type'] ?? 'image', 'text' ); ?>>Text/HTML Logo</option>
						</select>
					</td>
				</tr>
				<tr class="amp-image-row-<?php echo $i; ?>" style="display:<?php echo ( ( $card['logo_type'] ?? 'image' ) === 'image' ) ? '' : 'none'; ?>">
					<th><label>Logo Image</label></th>
					<td>
						<input type="hidden" name="_amp_cards[<?php echo $i; ?>][image_id]" id="amp_image_id_<?php echo $i; ?>" value="<?php echo esc_attr( $card_image_id ); ?>">
						<img id="amp_image_preview_<?php echo $i; ?>" src="<?php echo esc_url( $card_image_url ); ?>" style="max-width:150px;display:<?php echo $card_image_id ? 'block' : 'none'; ?>;margin-bottom:8px;">
						<button type="button" class="button about-upload-btn" data-target="amp_image_id_<?php echo $i; ?>" data-preview="amp_image_preview_<?php echo $i; ?>">Select Image</button>
						<button type="button" class="button about-remove-btn" data-target="amp_image_id_<?php echo $i; ?>" data-preview="amp_image_preview_<?php echo $i; ?>">Remove</button>
					</td>
				</tr>
				<tr class="amp-text-row-<?php echo $i; ?>" style="display:<?php echo ( ( $card['logo_type'] ?? 'image' ) === 'text' ) ? '' : 'none'; ?>">
					<th><label>Logo HTML</label></th>
					<td>
						<input type="text" name="_amp_cards[<?php echo $i; ?>][logo_html]" value="<?php echo esc_attr( $card['logo_html'] ?? '' ); ?>" class="large-text">
						<p class="description">HTML allowed for styled text logos (e.g. &lt;span style="color:red;"&gt;edu&lt;/span&gt;graph)</p>
					</td>
				</tr>
				<tr>
					<th><label>Description</label></th>
					<td><input type="text" name="_amp_cards[<?php echo $i; ?>][description]" value="<?php echo esc_attr( $card['description'] ?? '' ); ?>" class="large-text"></td>
				</tr>
			</table>
		</div>
		<?php endforeach; ?>
	</div>
	<?php
}

/* ============================================================
   SAVE META
============================================================ */
function skillignative_about_save_meta( $post_id ) {
	if ( ! isset( $_POST['skillignative_about_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['skillignative_about_nonce'], 'skillignative_about_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Text fields
	$text_fields = array(
		'_ah_badge_text', '_ah_title', '_ah_title_highlight',
		'_ah_btn1_text', '_ah_btn1_url', '_ah_btn2_text', '_ah_btn2_url',
		'_aa_title', '_aa_title_highlight',
		'_ahm_title', '_ahm_title_highlight',
		'_ahm_history_label', '_ahm_mission_label',
		'_amp_title', '_amp_title_highlight',
	);
	foreach ( $text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}

	// Textarea fields
	$textarea_fields = array( '_ah_description', '_ahm_history_text', '_ahm_mission_text' );
	foreach ( $textarea_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $field, sanitize_textarea_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}

	// Image ID
	if ( isset( $_POST['_ahm_image_id'] ) ) {
		update_post_meta( $post_id, '_ahm_image_id', absint( $_POST['_ahm_image_id'] ) );
	}

	// Achievement cards
	if ( isset( $_POST['_aa_cards'] ) && is_array( $_POST['_aa_cards'] ) ) {
		$cards = array();
		foreach ( $_POST['_aa_cards'] as $card ) {
			$cards[] = array(
				'icon'   => sanitize_text_field( wp_unslash( $card['icon'] ?? '' ) ),
				'number' => sanitize_text_field( wp_unslash( $card['number'] ?? '' ) ),
				'label'  => sanitize_text_field( wp_unslash( $card['label'] ?? '' ) ),
			);
		}
		update_post_meta( $post_id, '_aa_cards', $cards );
	}

	// Media cards
	if ( isset( $_POST['_amp_cards'] ) && is_array( $_POST['_amp_cards'] ) ) {
		$cards = array();
		foreach ( $_POST['_amp_cards'] as $card ) {
			$cards[] = array(
				'logo_type'   => sanitize_text_field( wp_unslash( $card['logo_type'] ?? 'image' ) ),
				'image_id'    => absint( $card['image_id'] ?? 0 ),
				'logo_html'   => wp_kses( wp_unslash( $card['logo_html'] ?? '' ), array( 'span' => array( 'style' => true ), 'br' => array() ) ),
				'description' => sanitize_text_field( wp_unslash( $card['description'] ?? '' ) ),
			);
		}
		update_post_meta( $post_id, '_amp_cards', $cards );
	}
}
add_action( 'save_post', 'skillignative_about_save_meta' );

/* ============================================================
   ADMIN SCRIPTS — MEDIA UPLOADER
============================================================ */
function skillignative_about_admin_scripts( $hook ) {
	global $post;
	if ( ( 'post.php' === $hook || 'post-new.php' === $hook ) && isset( $post ) && 'page' === $post->post_type ) {
		if ( 'page-about.php' === get_post_meta( $post->ID, '_wp_page_template', true ) ) {
			wp_enqueue_media();
			wp_add_inline_script( 'jquery', "
				jQuery(document).ready(function(\$) {
					// Image upload
					\$('.about-upload-btn').on('click', function(e) {
						e.preventDefault();
						var targetId  = \$(this).data('target');
						var previewId = \$(this).data('preview');
						var frame = wp.media({ title: 'Select Image', button: { text: 'Use Image' }, multiple: false });
						frame.on('select', function() {
							var attachment = frame.state().get('selection').first().toJSON();
							\$('#' + targetId).val(attachment.id);
							\$('#' + previewId).attr('src', attachment.url).show();
						});
						frame.open();
					});
					// Image remove
					\$('.about-remove-btn').on('click', function(e) {
						e.preventDefault();
						var targetId  = \$(this).data('target');
						var previewId = \$(this).data('preview');
						\$('#' + targetId).val('');
						\$('#' + previewId).hide();
					});
					// Logo type toggle
					\$('.amp-logo-type').on('change', function() {
						var idx  = \$(this).data('index');
						var type = \$(this).val();
						if ( type === 'image' ) {
							\$('.amp-image-row-' + idx).show();
							\$('.amp-text-row-' + idx).hide();
						} else {
							\$('.amp-image-row-' + idx).hide();
							\$('.amp-text-row-' + idx).show();
						}
					});
				});
			" );
		}
	}
}
add_action( 'admin_enqueue_scripts', 'skillignative_about_admin_scripts' );
