<?php
/**
 * Awards Settings — Submenu under Awards CPT
 *
 * Adds an "Awards Settings" page under the Awards menu in the admin.
 * Lets admin edit the Awards listing page hero & intro sections.
 *
 * Options stored:
 *   _awards_hero_title       — Main title text (before the highlight)
 *   _awards_hero_highlight   — Highlighted word/phrase in the title
 *   _awards_hero_description — Hero paragraph
 *   _awards_hero_cta_text    — CTA button label
 *   _awards_hero_cta_url     — CTA button URL
 *   _awards_hero_image_id    — Hero image attachment ID
 *   _awards_intro_title      — Intro section main text
 *   _awards_intro_highlight  — Intro section highlighted text
 *
 * @package Skillignative
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the submenu page under Awards CPT menu.
 */
function skillignative_awards_settings_menu() {
	add_submenu_page(
		'edit.php?post_type=award',         // Parent: Awards menu
		'Awards Settings',                  // Page title
		'Awards Settings',                  // Menu label
		'manage_options',                   // Capability
		'skillignative-awards-settings',    // Slug
		'skillignative_awards_settings_page' // Callback
	);
}
add_action( 'admin_menu', 'skillignative_awards_settings_menu' );

/**
 * Handle form save.
 */
function skillignative_awards_settings_save() {
	if (
		! isset( $_POST['skillignative_awards_settings_nonce'] ) ||
		! wp_verify_nonce( $_POST['skillignative_awards_settings_nonce'], 'skillignative_awards_settings_save' )
	) {
		return;
	}
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$fields = array(
		'_awards_hero_title',
		'_awards_hero_highlight',
		'_awards_hero_description',
		'_awards_hero_cta_text',
		'_awards_hero_cta_url',
		'_awards_intro_title',
		'_awards_intro_highlight',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			if ( '_awards_hero_cta_url' === $field ) {
				update_option( $field, esc_url_raw( wp_unslash( $_POST[ $field ] ) ) );
			} elseif ( '_awards_hero_description' === $field ) {
				update_option( $field, sanitize_textarea_field( wp_unslash( $_POST[ $field ] ) ) );
			} else {
				update_option( $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
			}
		}
	}

	// Image ID
	if ( isset( $_POST['_awards_hero_image_id'] ) ) {
		update_option( '_awards_hero_image_id', absint( $_POST['_awards_hero_image_id'] ) );
	}

	wp_safe_redirect( add_query_arg(
		array( 'post_type' => 'award', 'page' => 'skillignative-awards-settings', 'saved' => '1' ),
		admin_url( 'edit.php' )
	) );
	exit;
}
add_action( 'admin_post_skillignative_awards_settings_save', 'skillignative_awards_settings_save' );

/**
 * Render the settings page.
 */
function skillignative_awards_settings_page() {
	$hero_title       = get_option( '_awards_hero_title',       'Media Presences & News About' );
	$hero_highlight   = get_option( '_awards_hero_highlight',   'IIM SKILLS' );
	$hero_description = get_option( '_awards_hero_description', 'IIM SKILLS has been consistently featured in top media platforms for its commitment to quality education and industry-relevant training. Recognized for empowering learners across domains like digital marketing, finance, and data analytics, the platform continues to make headlines for its impactful learning outcomes, expert-led programs, and career-focused approach.' );
	$cta_text         = get_option( '_awards_hero_cta_text',    'Contact Us' );
	$cta_url          = get_option( '_awards_hero_cta_url',     '' );
	$hero_image_id    = get_option( '_awards_hero_image_id',    0 );
	$intro_title      = get_option( '_awards_intro_title',      'Making News in' );
	$intro_highlight  = get_option( '_awards_intro_highlight',  'Education & Career' );
	$saved            = isset( $_GET['saved'] ) && '1' === $_GET['saved'];

	$hero_image_url = $hero_image_id ? wp_get_attachment_image_url( $hero_image_id, 'medium' ) : '';
	?>
	<div class="wrap">
		<h1>
			<span style="font-size:20px;">🏆</span> Awards Settings
		</h1>
		<p style="color:#666;margin-bottom:20px;">Edit the hero and intro sections displayed on the Awards listing page (<a href="<?php echo esc_url( home_url( '/awards/' ) ); ?>" target="_blank">/awards/</a>).</p>

		<?php if ( $saved ) : ?>
		<div class="notice notice-success is-dismissible" style="margin-bottom:20px;">
			<p><strong>Settings saved successfully!</strong></p>
		</div>
		<?php endif; ?>

		<div style="max-width:760px;">
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="skillignative_awards_settings_save">
				<?php wp_nonce_field( 'skillignative_awards_settings_save', 'skillignative_awards_settings_nonce' ); ?>

				<!-- Hero Section -->
				<h2 style="border-bottom:2px solid #155dfc;padding-bottom:8px;color:#1a1a2e;">Hero Section</h2>

				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><label for="awards_hero_title">Title (main text)</label></th>
						<td>
							<input type="text" id="awards_hero_title" name="_awards_hero_title"
								value="<?php echo esc_attr( $hero_title ); ?>"
								class="large-text" placeholder="Media Presences & News About">
							<p class="description">The part of the hero title <em>before</em> the highlighted word.</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="awards_hero_highlight">Title (highlighted text)</label></th>
						<td>
							<input type="text" id="awards_hero_highlight" name="_awards_hero_highlight"
								value="<?php echo esc_attr( $hero_highlight ); ?>"
								class="regular-text" placeholder="IIM SKILLS">
							<p class="description">This part appears in <span style="color:#155dfc;font-weight:600;">blue</span> after the main title.</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="awards_hero_description">Description</label></th>
						<td>
							<textarea id="awards_hero_description" name="_awards_hero_description"
								rows="4" class="large-text"
								placeholder="IIM SKILLS has been consistently featured..."><?php echo esc_textarea( $hero_description ); ?></textarea>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="awards_hero_cta_text">CTA Button Text</label></th>
						<td>
							<input type="text" id="awards_hero_cta_text" name="_awards_hero_cta_text"
								value="<?php echo esc_attr( $cta_text ); ?>"
								class="regular-text" placeholder="Contact Us">
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="awards_hero_cta_url">CTA Button URL</label></th>
						<td>
							<input type="url" id="awards_hero_cta_url" name="_awards_hero_cta_url"
								value="<?php echo esc_url( $cta_url ); ?>"
								class="large-text" placeholder="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
							<p class="description">Leave empty to use the default contact page URL.</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Hero Image</label></th>
						<td>
							<input type="hidden" id="awards_hero_image_id" name="_awards_hero_image_id"
								value="<?php echo esc_attr( $hero_image_id ); ?>">
							<div id="awards-hero-image-preview" style="margin-bottom:10px;">
								<?php if ( $hero_image_url ) : ?>
									<img src="<?php echo esc_url( $hero_image_url ); ?>"
										style="max-width:300px;border-radius:8px;border:1px solid #ddd;" alt="">
								<?php else : ?>
									<p style="color:#aaa;font-style:italic;">No image selected.</p>
								<?php endif; ?>
							</div>
							<button type="button" class="button" id="awards-upload-image-btn">Upload / Select Image</button>
							<?php if ( $hero_image_id ) : ?>
								<button type="button" class="button" id="awards-remove-image-btn" style="margin-left:8px;color:#d63638;">Remove Image</button>
							<?php endif; ?>
							<p class="description">The image displayed on the right side of the hero section.</p>
						</td>
					</tr>
				</table>

				<!-- Intro Section -->
				<h2 style="border-bottom:2px solid #155dfc;padding-bottom:8px;color:#1a1a2e;margin-top:30px;">Intro Section (below hero)</h2>

				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><label for="awards_intro_title">Intro Title (main text)</label></th>
						<td>
							<input type="text" id="awards_intro_title" name="_awards_intro_title"
								value="<?php echo esc_attr( $intro_title ); ?>"
								class="large-text" placeholder="Making News in">
							<p class="description">The part of the intro heading <em>before</em> the highlighted word.</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="awards_intro_highlight">Intro Title (highlighted text)</label></th>
						<td>
							<input type="text" id="awards_intro_highlight" name="_awards_intro_highlight"
								value="<?php echo esc_attr( $intro_highlight ); ?>"
								class="regular-text" placeholder="Education & Career">
							<p class="description">This part appears in <span style="color:#155dfc;font-weight:600;">blue</span> after the intro title.</p>
						</td>
					</tr>
				</table>

				<!-- Live Preview -->
				<div style="background:linear-gradient(135deg,#e8f0fe 0%,#f0f7ff 100%);padding:36px 40px;border-radius:12px;margin:24px 0;border:1px solid #d0e0fc;">
					<p style="font-size:11px;font-weight:600;color:#888;letter-spacing:1px;margin:0 0 12px;text-transform:uppercase;">Live Hero Preview</p>
					<h2 style="font-size:28px;font-weight:700;color:#1a1a2e;margin:0 0 12px;line-height:1.3;">
						<span id="preview_hero_title"><?php echo esc_html( $hero_title ); ?></span>
						<span id="preview_hero_highlight" style="color:#155dfc;"> <?php echo esc_html( $hero_highlight ); ?></span>
					</h2>
					<p id="preview_hero_desc" style="font-size:15px;color:#555;line-height:1.6;margin:0 0 16px;"><?php echo esc_html( $hero_description ); ?></p>
					<span id="preview_cta_btn" style="display:inline-block;padding:12px 28px;background:#155dfc;color:#fff;border-radius:8px;font-weight:600;font-size:14px;"><?php echo esc_html( $cta_text ); ?></span>
				</div>

				<?php submit_button( 'Save Settings', 'primary large', 'submit', true ); ?>
			</form>
		</div>
	</div>

	<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Live preview updates
		var fields = {
			'awards_hero_title':       'preview_hero_title',
			'awards_hero_highlight':   'preview_hero_highlight',
			'awards_hero_description': 'preview_hero_desc',
			'awards_hero_cta_text':    'preview_cta_btn',
		};
		Object.keys(fields).forEach(function(id) {
			var input   = document.getElementById(id);
			var preview = document.getElementById(fields[id]);
			if ( input && preview ) {
				input.addEventListener('input', function() {
					preview.textContent = this.value || this.getAttribute('placeholder') || '';
				});
			}
		});

		// Media uploader
		var uploadBtn  = document.getElementById('awards-upload-image-btn');
		var removeBtn  = document.getElementById('awards-remove-image-btn');
		var imageIdInput  = document.getElementById('awards_hero_image_id');
		var previewWrap   = document.getElementById('awards-hero-image-preview');

		if ( uploadBtn ) {
			uploadBtn.addEventListener('click', function(e) {
				e.preventDefault();
				var frame = wp.media({
					title: 'Select Hero Image',
					button: { text: 'Use This Image' },
					multiple: false
				});
				frame.on('select', function() {
					var attachment = frame.state().get('selection').first().toJSON();
					imageIdInput.value = attachment.id;
					var src = attachment.sizes && attachment.sizes.medium
						? attachment.sizes.medium.url : attachment.url;
					previewWrap.innerHTML = '<img src="' + src + '" style="max-width:300px;border-radius:8px;border:1px solid #ddd;" alt="">';
					if ( removeBtn ) removeBtn.style.display = 'inline-block';
				});
				frame.open();
			});
		}

		if ( removeBtn ) {
			removeBtn.addEventListener('click', function(e) {
				e.preventDefault();
				imageIdInput.value = 0;
				previewWrap.innerHTML = '<p style="color:#aaa;font-style:italic;">No image selected.</p>';
				this.style.display = 'none';
			});
		}
	});
	</script>
	<?php
}
