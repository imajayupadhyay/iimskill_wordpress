<?php
/**
 * Blog Sidebar Settings — Submenu under Posts
 *
 * Lets admin:
 *  - Change the sidebar image shown on blog detail pages
 *  - Choose which Contact Form 7 form appears in the sidebar
 *
 * Options stored:
 *  _blog_sidebar_image_id  → attachment ID
 *  _blog_sidebar_cf7_id    → CF7 form post ID
 *
 * @package Skillignative
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ============================================================
   REGISTER SUBMENU UNDER POSTS
============================================================ */
function skillignative_sidebar_settings_menu() {
	add_submenu_page(
		'edit.php',
		'Contact Details',
		'Contact Details',
		'manage_options',
		'skillignative-sidebar-settings',
		'skillignative_sidebar_settings_page'
	);
}
add_action( 'admin_menu', 'skillignative_sidebar_settings_menu' );

/* ============================================================
   HANDLE SAVE
============================================================ */
function skillignative_sidebar_settings_save() {
	if (
		! isset( $_POST['skillignative_sidebar_nonce'] ) ||
		! wp_verify_nonce( $_POST['skillignative_sidebar_nonce'], 'skillignative_sidebar_save' )
	) {
		return;
	}
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$image_id = absint( $_POST['_blog_sidebar_image_id'] ?? 0 );
	$cf7_id   = absint( $_POST['_blog_sidebar_cf7_id'] ?? 0 );

	update_option( '_blog_sidebar_image_id', $image_id );
	update_option( '_blog_sidebar_cf7_id',   $cf7_id );

	wp_safe_redirect( add_query_arg(
		array( 'page' => 'skillignative-sidebar-settings', 'saved' => '1' ),
		admin_url( 'edit.php' )
	) );
	exit;
}
add_action( 'admin_post_skillignative_sidebar_save', 'skillignative_sidebar_settings_save' );

/* ============================================================
   ENQUEUE MEDIA UPLOADER ON THIS SCREEN
============================================================ */
function skillignative_sidebar_settings_scripts( $hook ) {
	if ( 'posts_page_skillignative-sidebar-settings' !== $hook ) {
		return;
	}
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'skillignative_sidebar_settings_scripts' );

/* ============================================================
   RENDER PAGE
============================================================ */
function skillignative_sidebar_settings_page() {
	$image_id  = (int) get_option( '_blog_sidebar_image_id', 0 );
	$cf7_id    = (int) get_option( '_blog_sidebar_cf7_id', 0 );
	$image_url = $image_id ? wp_get_attachment_url( $image_id ) : get_template_directory_uri() . '/assets/images/DSMC-demo.jpg';
	$saved     = isset( $_GET['saved'] ) && '1' === $_GET['saved'];

	// Fetch all published CF7 forms
	$cf7_forms = get_posts( array(
		'post_type'      => 'wpcf7_contact_form',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	) );
	?>
	<div class="wrap">
		<h1 style="display:flex;align-items:center;gap:10px;">
			<span style="font-size:22px;">📋</span> Contact Details — Blog Sidebar Settings
		</h1>
		<p style="color:#666;margin-bottom:24px;">
			Configure the sidebar shown on every blog post detail page.<br>
			Change the banner image and select which Contact Form 7 form captures leads.
		</p>

		<?php if ( $saved ) : ?>
		<div class="notice notice-success is-dismissible">
			<p><strong>Settings saved successfully!</strong></p>
		</div>
		<?php endif; ?>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="skillignative_sidebar_save">
			<?php wp_nonce_field( 'skillignative_sidebar_save', 'skillignative_sidebar_nonce' ); ?>

			<div style="display:grid;grid-template-columns:1fr 1fr;gap:40px;max-width:1100px;">

				<!-- LEFT: Image Setting -->
				<div>
					<div style="background:#fff;border:1px solid #e0e0e0;border-radius:8px;padding:28px;">
						<h2 style="font-size:15px;margin:0 0 6px;color:#1a1a2e;">Sidebar Banner Image</h2>
						<p style="font-size:13px;color:#888;margin:0 0 20px;">This image appears at the top of the sidebar card on blog detail pages.</p>

						<input type="hidden" name="_blog_sidebar_image_id" id="sidebar_image_id" value="<?php echo esc_attr( $image_id ); ?>">

						<!-- Preview -->
						<div style="margin-bottom:16px;">
							<img id="sidebar_image_preview"
								src="<?php echo esc_url( $image_url ); ?>"
								alt="Sidebar image preview"
								style="width:100%;max-width:380px;height:auto;border-radius:8px;border:1px solid #e5e5e5;display:block;">
						</div>

						<div style="display:flex;gap:10px;flex-wrap:wrap;">
							<button type="button" class="button button-primary" id="sidebar_upload_btn">
								Select / Change Image
							</button>
							<button type="button" class="button" id="sidebar_remove_btn" style="<?php echo $image_id ? '' : 'display:none;'; ?>">
								Remove Image
							</button>
						</div>
						<p class="description" style="margin-top:10px;">
							If no image is selected, the default <code>DSMC-demo.jpg</code> image is used.
						</p>
					</div>
				</div>

				<!-- RIGHT: CF7 Form Setting -->
				<div>
					<div style="background:#fff;border:1px solid #e0e0e0;border-radius:8px;padding:28px;">
						<h2 style="font-size:15px;margin:0 0 6px;color:#1a1a2e;">Contact Form 7 — Lead Capture Form</h2>
						<p style="font-size:13px;color:#888;margin:0 0 20px;">Select which CF7 form appears in the sidebar. Use the default <strong>Blog Sidebar Enquiry Form</strong> for the pre-styled design.</p>

						<?php if ( empty( $cf7_forms ) ) : ?>
							<div class="notice notice-warning inline">
								<p>No Contact Form 7 forms found. <a href="<?php echo admin_url( 'admin.php?page=wpcf7' ); ?>">Create a form</a> first.</p>
							</div>
						<?php else : ?>
							<label for="sidebar_cf7_id" style="font-weight:600;font-size:13px;display:block;margin-bottom:8px;">Select Form</label>
							<select name="_blog_sidebar_cf7_id" id="sidebar_cf7_id" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;font-size:14px;">
								<?php foreach ( $cf7_forms as $form ) : ?>
								<option value="<?php echo esc_attr( $form->ID ); ?>" <?php selected( $cf7_id, $form->ID ); ?>>
									<?php echo esc_html( $form->post_title ); ?> (ID: <?php echo $form->ID; ?>)
								</option>
								<?php endforeach; ?>
							</select>

							<!-- Form details preview -->
							<div style="margin-top:16px;padding:14px;background:#f8fafc;border-radius:6px;border:1px solid #e5e5e5;">
								<p style="font-size:12px;font-weight:600;color:#555;margin:0 0 8px;text-transform:uppercase;letter-spacing:0.5px;">Selected Form Info</p>
								<?php
								$selected_form = get_post( $cf7_id ?: ( $cf7_forms[0]->ID ?? 0 ) );
								if ( $selected_form ) :
									$form_meta = get_post_meta( $selected_form->ID, '_mail', true );
									$recipient = is_array( $form_meta ) ? ( $form_meta['recipient'] ?? 'N/A' ) : 'N/A';
								?>
								<p style="font-size:13px;color:#333;margin:0;">
									<strong>Form:</strong> <?php echo esc_html( $selected_form->post_title ); ?><br>
									<strong>Leads sent to:</strong> <?php echo esc_html( $recipient === '[_site_admin_email]' ? get_option('admin_email') : $recipient ); ?><br>
									<strong>Edit form:</strong>
									<a href="<?php echo admin_url( 'admin.php?page=wpcf7&action=edit&post=' . $selected_form->ID ); ?>" target="_blank">
										Open in CF7 editor →
									</a>
								</p>
								<?php endif; ?>
							</div>

							<p class="description" style="margin-top:10px;">
								Submissions are stored as entries and emailed to the admin address.
								<a href="<?php echo admin_url( 'admin.php?page=wpcf7' ); ?>" target="_blank">Manage all forms →</a>
							</p>
						<?php endif; ?>
					</div>

					<!-- Live sidebar preview card -->
					<div style="margin-top:24px;background:#fff;border:1px solid #e0e0e0;border-radius:8px;padding:28px;">
						<h2 style="font-size:15px;margin:0 0 16px;color:#1a1a2e;">Sidebar Card Preview</h2>
						<div style="border-radius:12px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.1);border:1px solid #e5e5e5;max-width:320px;">
							<img id="preview_card_img" src="<?php echo esc_url( $image_url ); ?>" alt="" style="width:100%;display:block;">
							<div style="padding:20px;background:#fff;">
								<div style="height:10px;background:#e5e5e5;border-radius:4px;margin-bottom:10px;"></div>
								<div style="height:10px;background:#e5e5e5;border-radius:4px;width:80%;margin-bottom:10px;"></div>
								<div style="height:10px;background:#e5e5e5;border-radius:4px;width:60%;margin-bottom:16px;"></div>
								<div style="height:36px;background:#155dfc;border-radius:6px;"></div>
							</div>
						</div>
					</div>
				</div>

			</div><!-- grid -->

			<div style="margin-top:30px;">
				<?php submit_button( 'Save Settings', 'primary large', 'submit', false ); ?>
			</div>
		</form>
	</div>

	<script>
	document.addEventListener('DOMContentLoaded', function() {
		var uploadBtn   = document.getElementById('sidebar_upload_btn');
		var removeBtn   = document.getElementById('sidebar_remove_btn');
		var imageIdField = document.getElementById('sidebar_image_id');
		var preview     = document.getElementById('sidebar_image_preview');
		var cardPreview = document.getElementById('preview_card_img');

		var mediaFrame;

		uploadBtn.addEventListener('click', function(e) {
			e.preventDefault();
			if (mediaFrame) {
				mediaFrame.open();
				return;
			}
			mediaFrame = wp.media({
				title: 'Select Sidebar Image',
				button: { text: 'Use This Image' },
				library: { type: 'image' },
				multiple: false
			});
			mediaFrame.on('select', function() {
				var attachment = mediaFrame.state().get('selection').first().toJSON();
				imageIdField.value = attachment.id;
				preview.src = attachment.url;
				if (cardPreview) cardPreview.src = attachment.url;
				removeBtn.style.display = 'inline-block';
			});
			mediaFrame.open();
		});

		removeBtn.addEventListener('click', function(e) {
			e.preventDefault();
			imageIdField.value = '';
			preview.src = '<?php echo esc_js( get_template_directory_uri() . "/assets/images/DSMC-demo.jpg" ); ?>';
			if (cardPreview) cardPreview.src = preview.src;
			this.style.display = 'none';
		});

		// Update form info on select change
		var cf7Select = document.getElementById('sidebar_cf7_id');
		if (cf7Select) {
			cf7Select.addEventListener('change', function() {
				// Reload page to update form info (server-side preview)
				// Or just submit for preview — for now just note the change
			});
		}
	});
	</script>
	<?php
}
