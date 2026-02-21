<?php
/**
 * Contact Page Meta Boxes
 *
 * Registers custom meta boxes for the Contact Us page.
 * Admin can edit all contact page section data from Pages > Contact Us > Edit.
 *
 * @package Skillignative
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register meta boxes for the contact page.
 */
function skillignative_contact_meta_boxes() {
	add_meta_box(
		'skillignative_contact_hero',
		'Contact Hero Section',
		'skillignative_contact_hero_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_contact_methods',
		'Contact Methods Section (Email / Phone / Hours)',
		'skillignative_contact_methods_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_contact_stats',
		'Stats Section (World-Class Education)',
		'skillignative_contact_stats_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_contact_support',
		'Global Support Network Section',
		'skillignative_contact_support_callback',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'skillignative_contact_cta',
		'Career CTA Section',
		'skillignative_contact_cta_callback',
		'page',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes_page', 'skillignative_contact_meta_boxes' );

/* ============================================================
   HERO SECTION
============================================================ */
function skillignative_contact_hero_callback( $post ) {
	wp_nonce_field( 'skillignative_contact_save', 'skillignative_contact_nonce' );
	$badge_text      = get_post_meta( $post->ID, '_ch_badge_text', true ) ?: '24/7 GLOBAL HELP DESK';
	$title           = get_post_meta( $post->ID, '_ch_title', true ) ?: "We're Here";
	$title_highlight = get_post_meta( $post->ID, '_ch_title_highlight', true ) ?: 'To Support You!';
	$description     = get_post_meta( $post->ID, '_ch_description', true ) ?: "IIM SKILLS is India's leading online education platform, offering globally recognized professional courses in digital marketing, content writing, data analytics, and more. We help learners upskill, boost their careers, and stay ahead in a competitive world with flexible, expert-led programs designed for real-world success.";
	$image_id        = get_post_meta( $post->ID, '_ch_image_id', true );
	$image_url       = $image_id ? wp_get_attachment_url( $image_id ) : 'https://images.unsplash.com/photo-1556745753-b2904692b3cd?w=600&h=400&fit=crop';
	$badge_title     = get_post_meta( $post->ID, '_ch_badge_title', true ) ?: 'Global Assistance';
	$badge_subtitle  = get_post_meta( $post->ID, '_ch_badge_subtitle', true ) ?: '35+ COUNTRIES';
	?>
	<table class="form-table">
		<tr>
			<th><label>Badge Text</label></th>
			<td><input type="text" name="_ch_badge_text" value="<?php echo esc_attr( $badge_text ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Title (first line)</label></th>
			<td><input type="text" name="_ch_title" value="<?php echo esc_attr( $title ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Title Highlight (blue line)</label></th>
			<td><input type="text" name="_ch_title_highlight" value="<?php echo esc_attr( $title_highlight ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Description</label></th>
			<td><textarea name="_ch_description" rows="5" class="large-text"><?php echo esc_textarea( $description ); ?></textarea></td>
		</tr>
		<tr>
			<th><label>Hero Image</label></th>
			<td>
				<div class="contact-media-field">
					<input type="hidden" name="_ch_image_id" id="ch_image_id" value="<?php echo esc_attr( $image_id ); ?>">
					<img id="ch_image_preview" src="<?php echo esc_url( $image_url ); ?>" style="max-width:200px;display:<?php echo $image_id ? 'block' : 'none'; ?>;margin-bottom:8px;">
					<button type="button" class="button contact-upload-btn" data-target="ch_image_id" data-preview="ch_image_preview">Select Image</button>
					<button type="button" class="button contact-remove-btn" data-target="ch_image_id" data-preview="ch_image_preview">Remove</button>
					<p class="description">If empty, defaults to Unsplash handshake image.</p>
				</div>
			</td>
		</tr>
		<tr>
			<th><label>Image Badge Title</label></th>
			<td><input type="text" name="_ch_badge_title" value="<?php echo esc_attr( $badge_title ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Image Badge Subtitle</label></th>
			<td><input type="text" name="_ch_badge_subtitle" value="<?php echo esc_attr( $badge_subtitle ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<?php
}

/* ============================================================
   CONTACT METHODS SECTION
============================================================ */
function skillignative_contact_methods_callback( $post ) {
	$email_title   = get_post_meta( $post->ID, '_cm_email_title', true ) ?: 'Email Us';
	$email_address = get_post_meta( $post->ID, '_cm_email_address', true ) ?: 'info@iimskills.com';
	$phone_title   = get_post_meta( $post->ID, '_cm_phone_title', true ) ?: 'Call Support';
	$phone_number  = get_post_meta( $post->ID, '_cm_phone_number', true ) ?: '+91-9580 740 740';
	$hours_title   = get_post_meta( $post->ID, '_cm_hours_title', true ) ?: 'Office Hours';
	$hours_line1   = get_post_meta( $post->ID, '_cm_hours_line1', true ) ?: 'Delhi: Mon - Sun: 9:30 am - 6 pm';
	$hours_line2   = get_post_meta( $post->ID, '_cm_hours_line2', true ) ?: 'Noida: Mon - Fri: 9:30 am - 6 pm';
	?>
	<h4>Email Card</h4>
	<table class="form-table">
		<tr>
			<th><label>Card Title</label></th>
			<td><input type="text" name="_cm_email_title" value="<?php echo esc_attr( $email_title ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Email Address</label></th>
			<td><input type="email" name="_cm_email_address" value="<?php echo esc_attr( $email_address ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<hr>
	<h4>Phone Card</h4>
	<table class="form-table">
		<tr>
			<th><label>Card Title</label></th>
			<td><input type="text" name="_cm_phone_title" value="<?php echo esc_attr( $phone_title ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Phone Number</label></th>
			<td><input type="text" name="_cm_phone_number" value="<?php echo esc_attr( $phone_number ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<hr>
	<h4>Office Hours Card</h4>
	<table class="form-table">
		<tr>
			<th><label>Card Title</label></th>
			<td><input type="text" name="_cm_hours_title" value="<?php echo esc_attr( $hours_title ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Hours Line 1</label></th>
			<td><input type="text" name="_cm_hours_line1" value="<?php echo esc_attr( $hours_line1 ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Hours Line 2</label></th>
			<td><input type="text" name="_cm_hours_line2" value="<?php echo esc_attr( $hours_line2 ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<?php
}

/* ============================================================
   STATS SECTION
============================================================ */
function skillignative_contact_stats_callback( $post ) {
	$badge_text   = get_post_meta( $post->ID, '_cs_badge_text', true ) ?: 'GLOBALLY TRUSTED';
	$title        = get_post_meta( $post->ID, '_cs_title', true ) ?: 'World-Class Education';
	$stat1_number = get_post_meta( $post->ID, '_cs_stat1_number', true ) ?: '4.8/5';
	$stat1_label  = get_post_meta( $post->ID, '_cs_stat1_label', true ) ?: 'Google Rating';
	$stat2_number = get_post_meta( $post->ID, '_cs_stat2_number', true ) ?: '55,000+';
	$stat2_label  = get_post_meta( $post->ID, '_cs_stat2_label', true ) ?: 'Career Transition';
	$stat3_number = get_post_meta( $post->ID, '_cs_stat3_number', true ) ?: '550+';
	$stat3_label  = get_post_meta( $post->ID, '_cs_stat3_label', true ) ?: 'Top Hiring Network';
	$stat4_number = get_post_meta( $post->ID, '_cs_stat4_number', true ) ?: '24/7';
	$stat4_label  = get_post_meta( $post->ID, '_cs_stat4_label', true ) ?: 'Support';
	?>
	<table class="form-table">
		<tr>
			<th><label>Badge Text</label></th>
			<td><input type="text" name="_cs_badge_text" value="<?php echo esc_attr( $badge_text ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Title</label></th>
			<td><input type="text" name="_cs_title" value="<?php echo esc_attr( $title ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<p><strong>Stats (4 items)</strong></p>
	<table class="form-table">
		<tr>
			<th><label>Stat 1 Number</label></th>
			<td><input type="text" name="_cs_stat1_number" value="<?php echo esc_attr( $stat1_number ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Stat 1 Label</label></th>
			<td><input type="text" name="_cs_stat1_label" value="<?php echo esc_attr( $stat1_label ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Stat 2 Number</label></th>
			<td><input type="text" name="_cs_stat2_number" value="<?php echo esc_attr( $stat2_number ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Stat 2 Label</label></th>
			<td><input type="text" name="_cs_stat2_label" value="<?php echo esc_attr( $stat2_label ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Stat 3 Number</label></th>
			<td><input type="text" name="_cs_stat3_number" value="<?php echo esc_attr( $stat3_number ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Stat 3 Label</label></th>
			<td><input type="text" name="_cs_stat3_label" value="<?php echo esc_attr( $stat3_label ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Stat 4 Number</label></th>
			<td><input type="text" name="_cs_stat4_number" value="<?php echo esc_attr( $stat4_number ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Stat 4 Label</label></th>
			<td><input type="text" name="_cs_stat4_label" value="<?php echo esc_attr( $stat4_label ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<?php
}

/* ============================================================
   GLOBAL SUPPORT NETWORK SECTION
============================================================ */
function skillignative_contact_support_callback( $post ) {
	$title    = get_post_meta( $post->ID, '_gs_title', true ) ?: 'Global Support Network';
	$subtitle = get_post_meta( $post->ID, '_gs_subtitle', true ) ?: 'Connect with the right department for faster assistance.';
	$cards    = get_post_meta( $post->ID, '_gs_cards', true );
	if ( ! is_array( $cards ) || empty( $cards ) ) {
		$cards = array(
			array( 'icon' => 'course', 'title' => 'Course Inquiries', 'description' => 'Curriculum, fees & batches.', 'email' => 'info@iimskills.com' ),
			array( 'icon' => 'student', 'title' => 'Student Support', 'description' => 'LMS, certificates & support.', 'email' => 'delivery@iimskills.com' ),
			array( 'icon' => 'career', 'title' => 'Careers & HR', 'description' => 'Job openings & internships.', 'email' => 'hr@iimskills.com' ),
		);
	}
	$icon_options = array( 'course' => 'Course (Graduation cap)', 'student' => 'Student (People)', 'career' => 'Career (Briefcase)' );
	?>
	<table class="form-table">
		<tr>
			<th><label>Section Title</label></th>
			<td><input type="text" name="_gs_title" value="<?php echo esc_attr( $title ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Section Subtitle</label></th>
			<td><input type="text" name="_gs_subtitle" value="<?php echo esc_attr( $subtitle ); ?>" class="regular-text large-text"></td>
		</tr>
	</table>
	<p><strong>Support Cards</strong></p>
	<div id="gs_cards_container">
		<?php foreach ( $cards as $i => $card ) : ?>
		<div class="gs-card-row" style="background:#f9f9f9;padding:16px;margin-bottom:12px;border:1px solid #ddd;border-radius:4px;">
			<p><strong>Card <?php echo $i + 1; ?></strong></p>
			<table class="form-table">
				<tr>
					<th><label>Icon Type</label></th>
					<td>
						<select name="_gs_cards[<?php echo $i; ?>][icon]">
							<?php foreach ( $icon_options as $val => $label ) : ?>
							<option value="<?php echo esc_attr( $val ); ?>" <?php selected( $card['icon'] ?? '', $val ); ?>><?php echo esc_html( $label ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<th><label>Title</label></th>
					<td><input type="text" name="_gs_cards[<?php echo $i; ?>][title]" value="<?php echo esc_attr( $card['title'] ?? '' ); ?>" class="regular-text"></td>
				</tr>
				<tr>
					<th><label>Description</label></th>
					<td><input type="text" name="_gs_cards[<?php echo $i; ?>][description]" value="<?php echo esc_attr( $card['description'] ?? '' ); ?>" class="regular-text"></td>
				</tr>
				<tr>
					<th><label>Email</label></th>
					<td><input type="email" name="_gs_cards[<?php echo $i; ?>][email]" value="<?php echo esc_attr( $card['email'] ?? '' ); ?>" class="regular-text"></td>
				</tr>
			</table>
		</div>
		<?php endforeach; ?>
	</div>
	<?php
}

/* ============================================================
   CAREER CTA SECTION
============================================================ */
function skillignative_contact_cta_callback( $post ) {
	$badge_text  = get_post_meta( $post->ID, '_cta_badge_text', true ) ?: 'BUILD YOUR CAREER';
	$title       = get_post_meta( $post->ID, '_cta_title', true ) ?: 'Looking to Build Your Career with Us?';
	$description = get_post_meta( $post->ID, '_cta_description', true ) ?: 'Explore exciting career opportunities and become a part of the IIM SKILLS team. Join us in shaping the future of online education.';
	$btn_text    = get_post_meta( $post->ID, '_cta_btn_text', true ) ?: 'Explore Programs';
	$btn_url     = get_post_meta( $post->ID, '_cta_btn_url', true ) ?: '#';
	?>
	<table class="form-table">
		<tr>
			<th><label>Badge Text</label></th>
			<td><input type="text" name="_cta_badge_text" value="<?php echo esc_attr( $badge_text ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Title</label></th>
			<td><input type="text" name="_cta_title" value="<?php echo esc_attr( $title ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Description</label></th>
			<td><textarea name="_cta_description" rows="4" class="large-text"><?php echo esc_textarea( $description ); ?></textarea></td>
		</tr>
		<tr>
			<th><label>Button Text</label></th>
			<td><input type="text" name="_cta_btn_text" value="<?php echo esc_attr( $btn_text ); ?>" class="regular-text"></td>
		</tr>
		<tr>
			<th><label>Button URL</label></th>
			<td><input type="url" name="_cta_btn_url" value="<?php echo esc_attr( $btn_url ); ?>" class="regular-text"></td>
		</tr>
	</table>
	<?php
}

/* ============================================================
   SAVE META
============================================================ */
function skillignative_contact_save_meta( $post_id ) {
	if ( ! isset( $_POST['skillignative_contact_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['skillignative_contact_nonce'], 'skillignative_contact_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Hero
	$text_fields = array(
		'_ch_badge_text', '_ch_title', '_ch_title_highlight', '_ch_description',
		'_ch_badge_title', '_ch_badge_subtitle',
		'_cm_email_title', '_cm_email_address', '_cm_phone_title', '_cm_phone_number',
		'_cm_hours_title', '_cm_hours_line1', '_cm_hours_line2',
		'_cs_badge_text', '_cs_title',
		'_cs_stat1_number', '_cs_stat1_label', '_cs_stat2_number', '_cs_stat2_label',
		'_cs_stat3_number', '_cs_stat3_label', '_cs_stat4_number', '_cs_stat4_label',
		'_gs_title', '_gs_subtitle',
		'_cta_badge_text', '_cta_title', '_cta_description', '_cta_btn_text', '_cta_btn_url',
	);

	foreach ( $text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}

	// Textarea fields
	if ( isset( $_POST['_ch_description'] ) ) {
		update_post_meta( $post_id, '_ch_description', sanitize_textarea_field( wp_unslash( $_POST['_ch_description'] ) ) );
	}
	if ( isset( $_POST['_cta_description'] ) ) {
		update_post_meta( $post_id, '_cta_description', sanitize_textarea_field( wp_unslash( $_POST['_cta_description'] ) ) );
	}

	// Image ID
	if ( isset( $_POST['_ch_image_id'] ) ) {
		update_post_meta( $post_id, '_ch_image_id', absint( $_POST['_ch_image_id'] ) );
	}

	// Support cards
	if ( isset( $_POST['_gs_cards'] ) && is_array( $_POST['_gs_cards'] ) ) {
		$cards = array();
		foreach ( $_POST['_gs_cards'] as $card ) {
			$cards[] = array(
				'icon'        => sanitize_text_field( wp_unslash( $card['icon'] ?? '' ) ),
				'title'       => sanitize_text_field( wp_unslash( $card['title'] ?? '' ) ),
				'description' => sanitize_text_field( wp_unslash( $card['description'] ?? '' ) ),
				'email'       => sanitize_email( wp_unslash( $card['email'] ?? '' ) ),
			);
		}
		update_post_meta( $post_id, '_gs_cards', $cards );
	}
}
add_action( 'save_post', 'skillignative_contact_save_meta' );

/* ============================================================
   ENQUEUE MEDIA UPLOADER FOR CONTACT META
============================================================ */
function skillignative_contact_admin_scripts( $hook ) {
	global $post;
	if ( ( 'post.php' === $hook || 'post-new.php' === $hook ) && isset( $post ) && 'page' === $post->post_type ) {
		if ( 'page-contact.php' === get_post_meta( $post->ID, '_wp_page_template', true ) ) {
			wp_enqueue_media();
			wp_add_inline_script( 'jquery', "
				jQuery(document).ready(function(\$) {
					\$('.contact-upload-btn').on('click', function(e) {
						e.preventDefault();
						var targetId = \$(this).data('target');
						var previewId = \$(this).data('preview');
						var frame = wp.media({ title: 'Select Image', button: { text: 'Use Image' }, multiple: false });
						frame.on('select', function() {
							var attachment = frame.state().get('selection').first().toJSON();
							\$('#' + targetId).val(attachment.id);
							\$('#' + previewId).attr('src', attachment.url).show();
						});
						frame.open();
					});
					\$('.contact-remove-btn').on('click', function(e) {
						e.preventDefault();
						var targetId = \$(this).data('target');
						var previewId = \$(this).data('preview');
						\$('#' + targetId).val('');
						\$('#' + previewId).hide();
					});
				});
			" );
		}
	}
}
add_action( 'admin_enqueue_scripts', 'skillignative_contact_admin_scripts' );
