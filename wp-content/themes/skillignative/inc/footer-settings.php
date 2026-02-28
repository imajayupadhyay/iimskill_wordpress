<?php
/**
 * Footer Settings — Appearance submenu
 *
 * Central admin page to manage all footer content:
 *   Column 1: Logo + Description + social links
 *   Column 2: Quick Links (repeater)
 *   Column 3: Popular Courses (repeater)
 *   Column 4: Contact Info (address, phone, email, hours)
 *   Bottom: Copyright + policy links
 *
 * All stored as wp_options with prefix _footer_
 *
 * @package Skillignative
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ============================================================
   REGISTER MENU PAGE
============================================================ */
function skillignative_footer_settings_menu() {
	add_theme_page(
		'Footer Settings',
		'Footer Settings',
		'manage_options',
		'skillignative-footer-settings',
		'skillignative_footer_settings_page'
	);
}
add_action( 'admin_menu', 'skillignative_footer_settings_menu' );

/* ============================================================
   SAVE HANDLER
============================================================ */
function skillignative_footer_settings_save() {
	if ( ! isset( $_POST['_footer_nonce'] ) || ! wp_verify_nonce( $_POST['_footer_nonce'], 'skillignative_footer_save' ) ) {
		return;
	}
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Column 1 — About
	update_option( '_footer_logo_url', esc_url_raw( wp_unslash( $_POST['_footer_logo_url'] ?? '' ) ) );
	update_option( '_footer_description', sanitize_textarea_field( wp_unslash( $_POST['_footer_description'] ?? '' ) ) );
	$socials = array( 'facebook', 'twitter', 'linkedin', 'instagram', 'youtube' );
	foreach ( $socials as $s ) {
		update_option( "_footer_{$s}_url", esc_url_raw( wp_unslash( $_POST["_footer_{$s}_url"] ?? '' ) ) );
	}

	// Column 2 — Quick Links
	update_option( '_footer_col2_title', sanitize_text_field( wp_unslash( $_POST['_footer_col2_title'] ?? '' ) ) );
	$col2 = array();
	if ( isset( $_POST['_footer_col2_links'] ) && is_array( $_POST['_footer_col2_links'] ) ) {
		foreach ( $_POST['_footer_col2_links'] as $link ) {
			$label = sanitize_text_field( wp_unslash( $link['label'] ?? '' ) );
			$url   = esc_url_raw( wp_unslash( $link['url'] ?? '' ) );
			if ( $label ) {
				$col2[] = array( 'label' => $label, 'url' => $url );
			}
		}
	}
	update_option( '_footer_col2_links', $col2 );

	// Column 3 — Popular Courses
	update_option( '_footer_col3_title', sanitize_text_field( wp_unslash( $_POST['_footer_col3_title'] ?? '' ) ) );
	$col3 = array();
	if ( isset( $_POST['_footer_col3_links'] ) && is_array( $_POST['_footer_col3_links'] ) ) {
		foreach ( $_POST['_footer_col3_links'] as $link ) {
			$label = sanitize_text_field( wp_unslash( $link['label'] ?? '' ) );
			$url   = esc_url_raw( wp_unslash( $link['url'] ?? '' ) );
			if ( $label ) {
				$col3[] = array( 'label' => $label, 'url' => $url );
			}
		}
	}
	update_option( '_footer_col3_links', $col3 );

	// Column 4 — Contact Info
	update_option( '_footer_col4_title', sanitize_text_field( wp_unslash( $_POST['_footer_col4_title'] ?? '' ) ) );
	update_option( '_footer_address', sanitize_text_field( wp_unslash( $_POST['_footer_address'] ?? '' ) ) );
	update_option( '_footer_phone', sanitize_text_field( wp_unslash( $_POST['_footer_phone'] ?? '' ) ) );
	update_option( '_footer_email', sanitize_email( wp_unslash( $_POST['_footer_email'] ?? '' ) ) );
	update_option( '_footer_hours', sanitize_text_field( wp_unslash( $_POST['_footer_hours'] ?? '' ) ) );

	// Bottom — Copyright + Policy Links
	update_option( '_footer_copyright', sanitize_text_field( wp_unslash( $_POST['_footer_copyright'] ?? '' ) ) );
	$policy = array();
	if ( isset( $_POST['_footer_policy_links'] ) && is_array( $_POST['_footer_policy_links'] ) ) {
		foreach ( $_POST['_footer_policy_links'] as $link ) {
			$label = sanitize_text_field( wp_unslash( $link['label'] ?? '' ) );
			$url   = esc_url_raw( wp_unslash( $link['url'] ?? '' ) );
			if ( $label ) {
				$policy[] = array( 'label' => $label, 'url' => $url );
			}
		}
	}
	update_option( '_footer_policy_links', $policy );

	wp_safe_redirect( add_query_arg( array( 'page' => 'skillignative-footer-settings', 'saved' => '1' ), admin_url( 'themes.php' ) ) );
	exit;
}
add_action( 'admin_post_skillignative_footer_save', 'skillignative_footer_settings_save' );

/* ============================================================
   RENDER PAGE
============================================================ */
function skillignative_footer_settings_page() {

	// Enqueue WP media uploader
	wp_enqueue_media();

	// Load current values with defaults
	$logo_url = get_option( '_footer_logo_url', get_template_directory_uri() . '/assets/images/iim-skills-official-logo.png' );
	$desc     = get_option( '_footer_description', 'IIM SKILLS is a leading online education platform offering industry-relevant courses in Data Analytics, Digital Marketing, Investment Banking, Financial Modeling, and more.' );

	$social_urls = array();
	foreach ( array( 'facebook', 'twitter', 'linkedin', 'instagram', 'youtube' ) as $s ) {
		$social_urls[ $s ] = get_option( "_footer_{$s}_url", '#' );
	}

	$col2_title = get_option( '_footer_col2_title', 'Quick Links' );
	$col2_links = get_option( '_footer_col2_links', array(
		array( 'label' => 'About Us', 'url' => home_url( '/about/' ) ),
		array( 'label' => 'Courses', 'url' => '#' ),
		array( 'label' => 'Success Stories', 'url' => '#' ),
		array( 'label' => 'Blog', 'url' => home_url( '/blog/' ) ),
		array( 'label' => 'Contact Us', 'url' => home_url( '/contact/' ) ),
		array( 'label' => 'FAQ', 'url' => '#' ),
	) );

	$col3_title = get_option( '_footer_col3_title', 'Popular Courses' );
	$col3_links = get_option( '_footer_col3_links', array(
		array( 'label' => 'Data Analytics', 'url' => '#' ),
		array( 'label' => 'Digital Marketing', 'url' => '#' ),
		array( 'label' => 'Investment Banking', 'url' => '#' ),
		array( 'label' => 'Financial Modeling', 'url' => '#' ),
		array( 'label' => 'Business Analytics', 'url' => '#' ),
		array( 'label' => 'Content Writing', 'url' => '#' ),
	) );

	$col4_title = get_option( '_footer_col4_title', 'Contact Info' );
	$address    = get_option( '_footer_address', 'New Delhi, India' );
	$phone      = get_option( '_footer_phone', '+91-9580 740 740' );
	$email      = get_option( '_footer_email', 'info@iimskills.com' );
	$hours      = get_option( '_footer_hours', 'Mon - Sat: 9:00 AM - 6:00 PM' );

	$copyright    = get_option( '_footer_copyright', '' );
	$policy_links = get_option( '_footer_policy_links', array(
		array( 'label' => 'Privacy Policy', 'url' => '#' ),
		array( 'label' => 'Terms & Conditions', 'url' => '#' ),
		array( 'label' => 'Refund Policy', 'url' => '#' ),
	) );

	$saved = isset( $_GET['saved'] ) && '1' === $_GET['saved'];

	// Helper: render a link repeater with remove buttons and add button
	$render_links = function ( $name, $links ) {
		$container_id = 'flc-' . md5( $name );
		echo '<div id="' . esc_attr( $container_id ) . '">';
		foreach ( $links as $i => $link ) {
			echo '<div class="footer-link-row" style="display:flex;gap:8px;margin-bottom:8px;align-items:center;">';
			echo '<input type="text" name="' . esc_attr( $name ) . '[' . $i . '][label]" value="' . esc_attr( $link['label'] ) . '" placeholder="Label" style="flex:1;padding:8px;border:1px solid #ddd;border-radius:4px;">';
			echo '<input type="url" name="' . esc_attr( $name ) . '[' . $i . '][url]" value="' . esc_attr( $link['url'] ) . '" placeholder="URL" style="flex:1;padding:8px;border:1px solid #ddd;border-radius:4px;">';
			echo '<button type="button" class="footer-remove-row" title="Remove" style="background:#dc3232;color:#fff;border:none;border-radius:4px;width:32px;height:34px;cursor:pointer;font-size:18px;font-weight:700;line-height:1;flex-shrink:0;">×</button>';
			echo '</div>';
		}
		echo '</div>';
		$next = count( $links );
		echo '<button type="button" class="button footer-add-row" '
			. 'data-container="' . esc_attr( $container_id ) . '" '
			. 'data-name="' . esc_attr( $name ) . '" '
			. 'data-count="' . $next . '" '
			. 'style="margin-top:4px;">+ Add Link</button>';
	};
	?>
	<div class="wrap">
		<h1>Footer Settings</h1>
		<p style="color:#666;">Manage all footer content. Changes apply site-wide.</p>

		<?php if ( $saved ) : ?>
		<div class="notice notice-success is-dismissible"><p><strong>Footer settings saved!</strong></p></div>
		<?php endif; ?>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="skillignative_footer_save">
			<?php wp_nonce_field( 'skillignative_footer_save', '_footer_nonce' ); ?>

			<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;max-width:1200px;">

				<!-- ======== COLUMN 1: About ======== -->
				<div style="background:#fff;border:1px solid #e0e0e0;border-radius:8px;padding:24px;">
					<h3 style="margin:0 0 16px;font-size:15px;">Column 1 — About & Social</h3>

					<label style="font-weight:600;font-size:13px;display:block;margin-bottom:6px;">Footer Logo</label>
					<div style="display:flex;gap:8px;align-items:center;margin-bottom:8px;">
						<input type="text" id="footer_logo_url" name="_footer_logo_url"
							value="<?php echo esc_attr( $logo_url ); ?>"
							placeholder="Logo image URL"
							style="flex:1;padding:8px;border:1px solid #ddd;border-radius:4px;">
						<button type="button" id="footer_logo_upload_btn" class="button">Upload / Choose</button>
					</div>
					<div id="footer_logo_preview" style="margin-bottom:16px;">
						<?php if ( $logo_url ) : ?>
						<img src="<?php echo esc_url( $logo_url ); ?>" style="max-height:60px;border:1px solid #eee;padding:6px;border-radius:4px;background:#f9f9f9;">
						<?php endif; ?>
					</div>

					<label style="font-weight:600;font-size:13px;">Description</label>
					<textarea name="_footer_description" rows="4" style="width:100%;margin:6px 0 16px;padding:10px;border:1px solid #ddd;border-radius:4px;"><?php echo esc_textarea( $desc ); ?></textarea>

					<p style="font-weight:600;font-size:13px;margin:0 0 8px;">Social Media URLs</p>
					<?php foreach ( $social_urls as $key => $url ) : ?>
					<div style="display:flex;gap:8px;align-items:center;margin-bottom:8px;">
						<label style="width:80px;font-size:12px;text-transform:capitalize;font-weight:500;"><?php echo esc_html( $key ); ?></label>
						<input type="url" name="_footer_<?php echo esc_attr( $key ); ?>_url" value="<?php echo esc_attr( $url ); ?>" style="flex:1;padding:8px;border:1px solid #ddd;border-radius:4px;">
					</div>
					<?php endforeach; ?>
				</div>

				<!-- ======== COLUMN 4: Contact Info ======== -->
				<div style="background:#fff;border:1px solid #e0e0e0;border-radius:8px;padding:24px;">
					<h3 style="margin:0 0 16px;font-size:15px;">Column 4 — Contact Info</h3>
					<table class="form-table" style="margin:0;">
						<tr><th style="width:80px;padding:8px 0;"><label>Title</label></th>
						<td><input type="text" name="_footer_col4_title" value="<?php echo esc_attr( $col4_title ); ?>" class="regular-text"></td></tr>
						<tr><th style="padding:8px 0;"><label>Address</label></th>
						<td><input type="text" name="_footer_address" value="<?php echo esc_attr( $address ); ?>" class="regular-text"></td></tr>
						<tr><th style="padding:8px 0;"><label>Phone</label></th>
						<td><input type="text" name="_footer_phone" value="<?php echo esc_attr( $phone ); ?>" class="regular-text"></td></tr>
						<tr><th style="padding:8px 0;"><label>Email</label></th>
						<td><input type="email" name="_footer_email" value="<?php echo esc_attr( $email ); ?>" class="regular-text"></td></tr>
						<tr><th style="padding:8px 0;"><label>Hours</label></th>
						<td><input type="text" name="_footer_hours" value="<?php echo esc_attr( $hours ); ?>" class="regular-text"></td></tr>
					</table>
				</div>

				<!-- ======== COLUMN 2: Quick Links ======== -->
				<div style="background:#fff;border:1px solid #e0e0e0;border-radius:8px;padding:24px;">
					<h3 style="margin:0 0 4px;font-size:15px;">Column 2 — Quick Links</h3>
					<div style="margin-bottom:12px;">
						<label style="font-weight:600;font-size:13px;">Column Title</label>
						<input type="text" name="_footer_col2_title" value="<?php echo esc_attr( $col2_title ); ?>" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;margin-top:4px;">
					</div>
					<p style="font-weight:600;font-size:13px;margin:0 0 8px;">Links</p>
					<?php $render_links( '_footer_col2_links', $col2_links ); ?>
				</div>

				<!-- ======== COLUMN 3: Popular Courses ======== -->
				<div style="background:#fff;border:1px solid #e0e0e0;border-radius:8px;padding:24px;">
					<h3 style="margin:0 0 4px;font-size:15px;">Column 3 — Popular Courses</h3>
					<div style="margin-bottom:12px;">
						<label style="font-weight:600;font-size:13px;">Column Title</label>
						<input type="text" name="_footer_col3_title" value="<?php echo esc_attr( $col3_title ); ?>" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;margin-top:4px;">
					</div>
					<p style="font-weight:600;font-size:13px;margin:0 0 8px;">Links</p>
					<?php $render_links( '_footer_col3_links', $col3_links ); ?>
				</div>

			</div><!-- grid -->

			<!-- ======== FOOTER BOTTOM ======== -->
			<div style="max-width:1200px;margin-top:24px;background:#fff;border:1px solid #e0e0e0;border-radius:8px;padding:24px;">
				<h3 style="margin:0 0 16px;font-size:15px;">Footer Bottom Bar</h3>
				<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">
					<div>
						<label style="font-weight:600;font-size:13px;">Copyright Text</label>
						<input type="text" name="_footer_copyright" value="<?php echo esc_attr( $copyright ); ?>" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;margin-top:4px;" placeholder="Leave empty for auto: &copy; 2026 Site Name. All rights reserved.">
					</div>
					<div>
						<p style="font-weight:600;font-size:13px;margin:0 0 8px;">Policy Links</p>
						<?php $render_links( '_footer_policy_links', $policy_links ); ?>
					</div>
				</div>
			</div>

			<div style="margin-top:24px;">
				<?php submit_button( 'Save Footer Settings', 'primary large', 'submit', false ); ?>
			</div>
		</form>
	</div>

	<script>
	jQuery(function($){

		/* ---- Remove a link row ---- */
		$(document).on('click', '.footer-remove-row', function(){
			$(this).closest('.footer-link-row').remove();
		});

		/* ---- Add a new link row ---- */
		$(document).on('click', '.footer-add-row', function(){
			var btn       = $(this);
			var container = $('#' + btn.data('container'));
			var name      = btn.data('name');
			var count     = parseInt(btn.data('count'), 10);

			var row = $('<div class="footer-link-row" style="display:flex;gap:8px;margin-bottom:8px;align-items:center;"></div>');
			row.append('<input type="text" name="'+name+'['+count+'][label]" value="" placeholder="Label" style="flex:1;padding:8px;border:1px solid #ddd;border-radius:4px;">');
			row.append('<input type="url"  name="'+name+'['+count+'][url]"   value="" placeholder="URL"   style="flex:1;padding:8px;border:1px solid #ddd;border-radius:4px;">');
			row.append('<button type="button" class="footer-remove-row" title="Remove" style="background:#dc3232;color:#fff;border:none;border-radius:4px;width:32px;height:34px;cursor:pointer;font-size:18px;font-weight:700;line-height:1;flex-shrink:0;">&times;</button>');

			container.append(row);
			btn.data('count', count + 1);
		});

		/* ---- Logo media uploader ---- */
		var mediaUploader;
		$('#footer_logo_upload_btn').on('click', function(e){
			e.preventDefault();
			if ( mediaUploader ) {
				mediaUploader.open();
				return;
			}
			mediaUploader = wp.media({
				title   : 'Choose Footer Logo',
				button  : { text: 'Use as Footer Logo' },
				multiple: false
			});
			mediaUploader.on('select', function(){
				var attachment = mediaUploader.state().get('selection').first().toJSON();
				$('#footer_logo_url').val(attachment.url);
				$('#footer_logo_preview').html(
					'<img src="'+attachment.url+'" style="max-height:60px;border:1px solid #eee;padding:6px;border-radius:4px;background:#f9f9f9;">'
				);
			});
			mediaUploader.open();
		});
	});
	</script>
	<?php
}

/* ============================================================
   HELPER: get footer option with default
============================================================ */
function skillignative_footer_opt( $key, $default = '' ) {
	$val = get_option( "_footer_{$key}", null );
	return ( null === $val || '' === $val ) ? $default : $val;
}
