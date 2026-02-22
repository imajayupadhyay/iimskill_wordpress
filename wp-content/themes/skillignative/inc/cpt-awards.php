<?php
/**
 * Custom Post Type: Awards
 *
 * Registers the "award" CPT for the Awards & Media Coverage section.
 * Each award post = one media card on the listing page.
 *
 * @package Skillignative
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Award CPT.
 */
function skillignative_register_award_cpt() {
	$labels = array(
		'name'               => 'Awards',
		'singular_name'      => 'Award',
		'menu_name'          => 'Awards',
		'add_new'            => 'Add New Award',
		'add_new_item'       => 'Add New Award',
		'edit_item'          => 'Edit Award',
		'new_item'           => 'New Award',
		'view_item'          => 'View Award',
		'view_items'         => 'View Awards',
		'search_items'       => 'Search Awards',
		'not_found'          => 'No awards found',
		'not_found_in_trash' => 'No awards found in trash',
		'all_items'          => 'All Awards',
	);

	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'has_archive'   => false,
		'rewrite'       => array( 'slug' => 'award' ),
		'menu_icon'     => 'dashicons-awards',
		'menu_position' => 6,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'  => true,
	);

	register_post_type( 'award', $args );
}
add_action( 'init', 'skillignative_register_award_cpt' );

/**
 * Add custom meta box for award details.
 */
function skillignative_award_meta_boxes() {
	add_meta_box(
		'skillignative_award_details',
		'Award / Media Details',
		'skillignative_award_details_callback',
		'award',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'skillignative_award_meta_boxes' );

/**
 * Award details meta box callback.
 */
function skillignative_award_details_callback( $post ) {
	wp_nonce_field( 'skillignative_award_nonce', 'skillignative_award_nonce_field' );

	$source       = get_post_meta( $post->ID, '_award_source', true );
	$external_url = get_post_meta( $post->ID, '_award_external_url', true );
	?>
	<style>
		.award-meta-field { margin-bottom: 18px; }
		.award-meta-field label { display: block; font-weight: 600; margin-bottom: 5px; color: #1d2327; }
		.award-meta-field input[type="text"],
		.award-meta-field input[type="url"] { width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
		.award-meta-field .description { font-size: 12px; color: #666; margin-top: 5px; }
		.award-meta-tips { background: #f0f6fc; border-left: 4px solid #155dfc; padding: 12px 16px; border-radius: 0 6px 6px 0; font-size: 13px; color: #444; }
		.award-meta-tips strong { color: #155dfc; }
	</style>

	<div class="award-meta-field">
		<label for="award_source">Source / Publication Name</label>
		<input type="text" id="award_source" name="award_source"
			value="<?php echo esc_attr( $source ); ?>"
			placeholder="e.g. The Hindu, Forbes India, Mid-Day, Economic Times">
		<p class="description">The media outlet or publication that featured this award/article. Displayed as a label on the card.</p>
	</div>

	<div class="award-meta-field">
		<label for="award_external_url">External Article URL <em style="font-weight:400;color:#888;">(optional)</em></label>
		<input type="url" id="award_external_url" name="award_external_url"
			value="<?php echo esc_url( $external_url ); ?>"
			placeholder="https://www.thehindu.com/article/...">
		<p class="description">Link to the original published article. If filled, the "Read More" button on the listing page links here (opens in new tab). Leave empty to link to this post's detail page on this site.</p>
	</div>

	<div class="award-meta-tips">
		<strong>Tips:</strong><br>
		&bull; Set the <strong>Featured Image</strong> (right sidebar) — this is the card image (media logo or article photo).<br>
		&bull; Use the <strong>Excerpt</strong> box (below the editor) for the short card description shown on the listing page.<br>
		&bull; The post <strong>Title</strong> = the card headline.<br>
		&bull; The full <strong>Editor content</strong> = the article body shown on the detail page.
	</div>
	<?php
}

/**
 * Save award meta.
 */
function skillignative_save_award_meta( $post_id ) {
	if ( ! isset( $_POST['skillignative_award_nonce_field'] ) ||
		 ! wp_verify_nonce( $_POST['skillignative_award_nonce_field'], 'skillignative_award_nonce' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( 'award' !== get_post_type( $post_id ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['award_source'] ) ) {
		update_post_meta( $post_id, '_award_source', sanitize_text_field( wp_unslash( $_POST['award_source'] ) ) );
	}
	if ( isset( $_POST['award_external_url'] ) ) {
		update_post_meta( $post_id, '_award_external_url', esc_url_raw( wp_unslash( $_POST['award_external_url'] ) ) );
	}
}
add_action( 'save_post', 'skillignative_save_award_meta' );

/**
 * Add custom columns to Award admin list.
 */
function skillignative_award_columns( $columns ) {
	$new = array();
	foreach ( $columns as $key => $val ) {
		$new[ $key ] = $val;
		if ( 'title' === $key ) {
			$new['award_source']       = 'Publication';
			$new['award_external_url'] = 'Link';
		}
	}
	return $new;
}
add_filter( 'manage_award_posts_columns', 'skillignative_award_columns' );

function skillignative_award_column_data( $column, $post_id ) {
	if ( 'award_source' === $column ) {
		$source = get_post_meta( $post_id, '_award_source', true );
		echo $source ? esc_html( $source ) : '<span style="color:#aaa;">—</span>';
	}
	if ( 'award_external_url' === $column ) {
		$url = get_post_meta( $post_id, '_award_external_url', true );
		if ( $url ) {
			echo '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener noreferrer" style="color:#155dfc;">External ↗</a>';
		} else {
			echo '<span style="color:#888;">Internal</span>';
		}
	}
}
add_action( 'manage_award_posts_custom_column', 'skillignative_award_column_data', 10, 2 );
