<?php
/**
 * The template for displaying single blog posts
 *
 * Matches the design of detail.html exactly.
 *
 * @package Skillignative
 */

get_header();

while ( have_posts() ) :
	the_post();

	$post_cats   = get_the_category();
	$primary_cat = $post_cats ? $post_cats[0] : null;
	$author_id   = get_the_author_meta( 'ID' );
	$author_name = get_the_author();
	$author_bio  = get_the_author_meta( 'description' );
	$author_avatar_url = get_avatar_url( $author_id, array( 'size' => 80 ) );

	// Sidebar image — from admin option, fallback to theme asset
	$sidebar_image_id = (int) get_option( '_blog_sidebar_image_id', 0 );
	$sidebar_img      = $sidebar_image_id
		? wp_get_attachment_url( $sidebar_image_id )
		: get_template_directory_uri() . '/assets/images/DSMC-demo.jpg';

	// CF7 form ID — from admin option
	$sidebar_cf7_id = (int) get_option( '_blog_sidebar_cf7_id', 0 );

	// Related posts - same category, exclude current
	$related_args = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 3,
		'post__not_in'   => array( get_the_ID() ),
		'orderby'        => 'date',
		'order'          => 'DESC',
	);
	if ( $primary_cat ) {
		$related_args['category__in'] = array( $primary_cat->term_id );
	}
	$related_posts = new WP_Query( $related_args );
	?>

    <!-- Blog Detail Hero -->
    <section class="blog-detail-hero">
        <div class="blog-detail-container">
            <div class="blog-detail-content">
                <div class="article-header">
                    <h1 class="article-title"><?php the_title(); ?></h1>
                    <div class="article-meta">
                        <span class="meta-date"><?php echo get_the_date( 'F j, Y' ); ?></span>
                        <span class="meta-separator">|</span>
                        <a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" class="meta-author"><?php echo esc_html( $author_name ); ?></a>
                        <?php if ( $primary_cat ) : ?>
                        <span class="meta-separator">|</span>
                        <a href="<?php echo esc_url( get_category_link( $primary_cat->term_id ) ); ?>" class="meta-category"><?php echo esc_html( $primary_cat->name ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content Section -->
    <section class="article-content-section">
        <div class="blog-detail-container">
            <div class="blog-detail-content">

                <!-- Article Body -->
                <article class="article-body">
                    <?php the_content(); ?>
                </article>

                <!-- Author Bio -->
                <div class="author-bio">
                    <div class="author-avatar">
                        <img src="<?php echo esc_url( $author_avatar_url ); ?>" alt="<?php echo esc_attr( $author_name ); ?>">
                    </div>
                    <div class="author-info">
                        <h3 class="author-name"><?php echo esc_html( $author_name ); ?></h3>
                        <p class="author-description">
                            <?php echo $author_bio ? esc_html( $author_bio ) : 'Expert educator and digital marketing professional at IIM SKILLS, helping learners build successful careers through industry-relevant courses.'; ?>
                        </p>
                    </div>
                </div>

                <!-- Related Articles -->
                <?php if ( $related_posts->have_posts() ) : ?>
                <div class="related-articles">
                    <h2 class="related-title">Related Articles</h2>
                    <div class="related-grid">
                        <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="related-card">
                            <h3><?php the_title(); ?></h3>
                            <p class="related-meta"><?php echo get_the_date( 'F j, Y' ); ?></p>
                        </a>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php endif; ?>

            </div><!-- .blog-detail-content -->

            <!-- Sticky Sidebar -->
            <aside class="blog-sidebar">
                <div class="sidebar-sticky">
                    <div class="sidebar-card">
                        <div class="sidebar-image">
                            <img src="<?php echo esc_url( $sidebar_img ); ?>" alt="Get Connected with IIM SKILLS">
                        </div>
                        <div class="sidebar-form">
                            <?php if ( $sidebar_cf7_id && function_exists( 'wpcf7_contact_form' ) ) : ?>
                                <?php echo do_shortcode( '[contact-form-7 id="' . $sidebar_cf7_id . '" title="Blog Sidebar Enquiry Form"]' ); ?>
                            <?php else : ?>
                                <!-- Fallback static form if CF7 is unavailable -->
                                <form id="sidebarForm">
                                    <div class="form-group">
                                        <input type="text" class="form-input" placeholder="Name*" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-input" placeholder="Email*" required>
                                    </div>
                                    <div class="form-group phone-group">
                                        <div class="phone-input-wrapper">
                                            <div class="country-code">
                                                <img src="https://flagcdn.com/w20/in.png" alt="India" width="20" height="15">
                                                <span>+91</span>
                                            </div>
                                            <input type="tel" class="form-input phone-input" placeholder="Phone Number*" required>
                                        </div>
                                    </div>
                                    <div class="form-group checkbox-group">
                                        <label class="checkbox-label">
                                            <input type="checkbox" required>
                                            <span class="checkbox-text">I agree to the <a href="#">Terms</a> and <a href="#">Privacy Policy</a>.</span>
                                        </label>
                                    </div>
                                    <button type="submit" class="form-submit">Submit</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </aside>

        </div><!-- .blog-detail-container -->
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>
