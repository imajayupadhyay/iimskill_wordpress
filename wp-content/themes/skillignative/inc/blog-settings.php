<?php
/**
 * Blog Settings — Submenu under Posts
 *
 * Adds a "Blog Settings" page under Posts in the admin.
 * Lets admin edit the Blog listing page hero title and subtitle.
 * Values stored as wp_options: _blog_hero_title, _blog_hero_subtitle
 *
 * @package Skillignative
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the submenu page under Posts.
 */
function skillignative_blog_settings_menu() {
	add_submenu_page(
		'edit.php',                          // Parent: Posts menu
		'Blog Settings',                     // Page title
		'Blog Settings',                     // Menu label
		'manage_options',                    // Capability
		'skillignative-blog-settings',       // Slug
		'skillignative_blog_settings_page'   // Callback
	);
}
add_action( 'admin_menu', 'skillignative_blog_settings_menu' );

/**
 * Handle form save.
 */
function skillignative_blog_settings_save() {
	if (
		! isset( $_POST['skillignative_blog_settings_nonce'] ) ||
		! wp_verify_nonce( $_POST['skillignative_blog_settings_nonce'], 'skillignative_blog_settings_save' )
	) {
		return;
	}
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	update_option( '_blog_hero_title',    sanitize_text_field( wp_unslash( $_POST['_blog_hero_title'] ?? '' ) ) );
	update_option( '_blog_hero_subtitle', sanitize_textarea_field( wp_unslash( $_POST['_blog_hero_subtitle'] ?? '' ) ) );

	// Redirect with success message
	wp_safe_redirect( add_query_arg( array( 'page' => 'skillignative-blog-settings', 'saved' => '1' ), admin_url( 'edit.php' ) ) );
	exit;
}
add_action( 'admin_post_skillignative_blog_settings_save', 'skillignative_blog_settings_save' );

/**
 * Render the settings page.
 */
function skillignative_blog_settings_page() {
	$title    = get_option( '_blog_hero_title',    'Welcome to Our Blog' );
	$subtitle = get_option( '_blog_hero_subtitle', 'Explore the latest insights, updates, and resources across various categories.' );
	$saved    = isset( $_GET['saved'] ) && '1' === $_GET['saved'];
	?>
	<div class="wrap">
		<h1>
			<span style="font-size:20px;">📝</span> Blog Settings
		</h1>
		<p style="color:#666;margin-bottom:20px;">Edit the hero section displayed at the top of the blog listing page.</p>

		<?php if ( $saved ) : ?>
		<div class="notice notice-success is-dismissible" style="margin-bottom:20px;">
			<p><strong>Settings saved successfully!</strong></p>
		</div>
		<?php endif; ?>

		<div style="max-width:700px;">
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="skillignative_blog_settings_save">
				<?php wp_nonce_field( 'skillignative_blog_settings_save', 'skillignative_blog_settings_nonce' ); ?>

				<table class="form-table" role="presentation">
					<tr>
						<th scope="row">
							<label for="blog_hero_title">Hero Title</label>
						</th>
						<td>
							<input
								type="text"
								id="blog_hero_title"
								name="_blog_hero_title"
								value="<?php echo esc_attr( $title ); ?>"
								class="large-text"
								placeholder="Welcome to Our Blog"
							>
							<p class="description">The large heading displayed in the blog hero section.</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="blog_hero_subtitle">Hero Subtitle</label>
						</th>
						<td>
							<textarea
								id="blog_hero_subtitle"
								name="_blog_hero_subtitle"
								rows="3"
								class="large-text"
								placeholder="Explore the latest insights..."
							><?php echo esc_textarea( $subtitle ); ?></textarea>
							<p class="description">The paragraph text below the heading.</p>
						</td>
					</tr>
				</table>

				<!-- Live Preview -->
				<div style="background:linear-gradient(135deg,#e8f0fe 0%,#f0f7ff 50%,#e8f0fe 100%);padding:40px;border-radius:12px;text-align:center;margin:20px 0;border:1px solid #d0e0fc;">
					<p style="font-size:11px;font-weight:600;color:#888;letter-spacing:1px;margin:0 0 12px;text-transform:uppercase;">Live Preview</p>
					<h2 id="preview_title" style="font-size:32px;font-weight:700;color:#1a1a2e;margin:0 0 12px;"><?php echo esc_html( $title ); ?></h2>
					<p id="preview_subtitle" style="font-size:16px;color:#555;line-height:1.6;margin:0;max-width:600px;margin:0 auto;"><?php echo esc_html( $subtitle ); ?></p>
				</div>

				<?php submit_button( 'Save Settings', 'primary large', 'submit', true ); ?>
			</form>
		</div>
	</div>

	<script>
	document.addEventListener('DOMContentLoaded', function() {
		var titleInput    = document.getElementById('blog_hero_title');
		var subtitleInput = document.getElementById('blog_hero_subtitle');
		var previewTitle  = document.getElementById('preview_title');
		var previewSubtitle = document.getElementById('preview_subtitle');

		if (titleInput && previewTitle) {
			titleInput.addEventListener('input', function() {
				previewTitle.textContent = this.value || 'Welcome to Our Blog';
			});
		}
		if (subtitleInput && previewSubtitle) {
			subtitleInput.addEventListener('input', function() {
				previewSubtitle.textContent = this.value || 'Explore the latest insights...';
			});
		}
	});
	</script>
	<?php
}
