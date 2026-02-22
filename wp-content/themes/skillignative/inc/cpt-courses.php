<?php
/**
 * Custom Post Type: Courses
 *
 * Registers the "course" CPT and "course_category" taxonomy
 * for the Popular Courses section on the homepage.
 *
 * @package Skillignative
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Course CPT.
 */
function skillignative_register_course_cpt() {
	$labels = array(
		'name'               => 'Courses',
		'singular_name'      => 'Course',
		'menu_name'          => 'Courses',
		'add_new'            => 'Add New Course',
		'add_new_item'       => 'Add New Course',
		'edit_item'          => 'Edit Course',
		'new_item'           => 'New Course',
		'view_item'          => 'View Course',
		'search_items'       => 'Search Courses',
		'not_found'          => 'No courses found',
		'not_found_in_trash' => 'No courses found in trash',
	);

	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'courses' ),
		'menu_icon'     => 'dashicons-welcome-learn-more',
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail', 'editor', 'page-attributes' ),
		'show_in_rest'  => true,
	);

	register_post_type( 'course', $args );
}
add_action( 'init', 'skillignative_register_course_cpt' );

/**
 * Register Course Category taxonomy.
 */
function skillignative_register_course_taxonomy() {
	$labels = array(
		'name'          => 'Course Categories',
		'singular_name' => 'Course Category',
		'search_items'  => 'Search Categories',
		'all_items'     => 'All Categories',
		'edit_item'     => 'Edit Category',
		'update_item'   => 'Update Category',
		'add_new_item'  => 'Add New Category',
		'new_item_name' => 'New Category Name',
		'menu_name'     => 'Categories',
	);

	$args = array(
		'hierarchical' => true,
		'labels'       => $labels,
		'show_ui'      => true,
		'rewrite'      => array( 'slug' => 'course-category' ),
		'show_in_rest' => true,
	);

	register_taxonomy( 'course_category', 'course', $args );
}
add_action( 'init', 'skillignative_register_course_taxonomy' );

/**
 * Add custom meta boxes for course details.
 */
function skillignative_course_meta_boxes() {
	add_meta_box(
		'skillignative_course_details',
		'Course Details',
		'skillignative_course_details_callback',
		'course',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'skillignative_course_meta_boxes' );

/**
 * Course details meta box callback.
 */
function skillignative_course_details_callback( $post ) {
	wp_nonce_field( 'skillignative_course_nonce', 'skillignative_course_nonce_field' );

	$duration   = get_post_meta( $post->ID, '_course_duration', true );
	$details    = get_post_meta( $post->ID, '_course_details', true );
	$btn_text   = get_post_meta( $post->ID, '_course_btn_text', true ) ?: 'More Info';
	$btn_url    = get_post_meta( $post->ID, '_course_btn_url', true ) ?: '#';
	$bg_color   = get_post_meta( $post->ID, '_course_bg_color', true ) ?: '#f5f0c8';
	$featured   = get_post_meta( $post->ID, '_course_featured', true );
	?>
	<style>
		.course-meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
		.course-meta-field { margin-bottom: 15px; }
		.course-meta-field label { display: block; font-weight: 600; margin-bottom: 5px; }
		.course-meta-field input[type="text"],
		.course-meta-field input[type="url"] { width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; }
		.course-meta-field input[type="color"] { width: 60px; height: 40px; padding: 2px; border: 1px solid #ddd; border-radius: 4px; cursor: pointer; }
		.course-meta-field .description { font-size: 12px; color: #666; margin-top: 4px; }
		.course-featured-toggle { display: flex; align-items: center; gap: 12px; background: #f0f6fc; border: 1px solid #c3d9f0; border-radius: 6px; padding: 12px 16px; margin-bottom: 18px; }
		.course-featured-toggle input[type="checkbox"] { width: 18px; height: 18px; accent-color: #155dfc; cursor: pointer; margin: 0; }
		.course-featured-toggle .featured-label { font-size: 14px; font-weight: 600; color: #1a1a2e; }
		.course-featured-toggle .featured-desc { font-size: 12px; color: #666; margin-top: 2px; }
	</style>

	<!-- Featured Toggle -->
	<div class="course-featured-toggle">
		<input type="checkbox" id="course_featured" name="course_featured" value="1" <?php checked( $featured, '1' ); ?>>
		<div>
			<div class="featured-label">⭐ Show on Homepage (Featured)</div>
			<div class="featured-desc">When checked, this course appears in the Popular Courses section on the homepage.</div>
		</div>
	</div>

	<div class="course-meta-grid">
		<div class="course-meta-field">
			<label for="course_duration">Duration</label>
			<input type="text" id="course_duration" name="course_duration" value="<?php echo esc_attr( $duration ); ?>" placeholder="e.g. 3-7 Months">
		</div>
		<div class="course-meta-field">
			<label for="course_bg_color">Card Background Color</label>
			<input type="color" id="course_bg_color" name="course_bg_color" value="<?php echo esc_attr( $bg_color ); ?>">
			<p class="description">Background color for the card image area</p>
		</div>
	</div>

	<div class="course-meta-field">
		<label for="course_details">Additional Details</label>
		<input type="text" id="course_details" name="course_details" value="<?php echo esc_attr( $details ); ?>" placeholder="e.g. Internship: 2 Months &nbsp; Fee Start: INR 59,900 + 18% GST">
		<p class="description">Internship info, fee, etc. HTML entities like &amp;nbsp; are allowed.</p>
	</div>

	<div class="course-meta-grid">
		<div class="course-meta-field">
			<label for="course_btn_text">Button Text</label>
			<input type="text" id="course_btn_text" name="course_btn_text" value="<?php echo esc_attr( $btn_text ); ?>">
		</div>
		<div class="course-meta-field">
			<label for="course_btn_url">Button URL</label>
			<input type="url" id="course_btn_url" name="course_btn_url" value="<?php echo esc_url( $btn_url ); ?>">
		</div>
	</div>

	<p class="description"><strong>Note:</strong> Use the <strong>Featured Image</strong> (right sidebar) to set the course card image. Assign a <strong>Course Category</strong> to place this course under a tab on the homepage.</p>
	<?php
}

/**
 * Save course meta.
 */
function skillignative_save_course_meta( $post_id ) {
	if ( ! isset( $_POST['skillignative_course_nonce_field'] ) ||
		 ! wp_verify_nonce( $_POST['skillignative_course_nonce_field'], 'skillignative_course_nonce' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( 'course' !== get_post_type( $post_id ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	$fields = array( 'course_duration', 'course_details', 'course_btn_text', 'course_btn_url', 'course_bg_color' );
	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
		}
	}

	// Featured checkbox — save 1 if checked, 0 if unchecked
	update_post_meta( $post_id, '_course_featured', isset( $_POST['course_featured'] ) ? '1' : '0' );
}
add_action( 'save_post', 'skillignative_save_course_meta' );

/**
 * Add custom columns to Course admin list.
 */
function skillignative_course_columns( $columns ) {
	$new = array();
	foreach ( $columns as $key => $val ) {
		$new[ $key ] = $val;
		if ( 'title' === $key ) {
			$new['course_featured'] = '⭐ Featured';
			$new['course_category'] = 'Category';
			$new['course_duration'] = 'Duration';
		}
	}
	return $new;
}
add_filter( 'manage_course_posts_columns', 'skillignative_course_columns' );

function skillignative_course_column_data( $column, $post_id ) {
	if ( 'course_featured' === $column ) {
		$featured = get_post_meta( $post_id, '_course_featured', true );
		echo '1' === $featured
			? '<span style="color:#155dfc;font-size:16px;" title="Featured on homepage">⭐</span>'
			: '<span style="color:#ccc;font-size:16px;" title="Not featured">☆</span>';
	}
	if ( 'course_category' === $column ) {
		$terms = get_the_terms( $post_id, 'course_category' );
		echo $terms ? esc_html( implode( ', ', wp_list_pluck( $terms, 'name' ) ) ) : '—';
	}
	if ( 'course_duration' === $column ) {
		echo esc_html( get_post_meta( $post_id, '_course_duration', true ) ?: '—' );
	}
}
add_action( 'manage_course_posts_custom_column', 'skillignative_course_column_data', 10, 2 );
