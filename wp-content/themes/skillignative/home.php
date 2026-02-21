<?php
/**
 * The blog posts index template (home.php)
 *
 * Used when a static front page is set and a Posts page is defined.
 * Matches the design of blog.html exactly.
 *
 * @package Skillignative
 */

get_header();

// Blog hero content — editable via Posts > Blog Settings in admin
$blog_hero_title    = get_option( '_blog_hero_title',    'Welcome to Our Blog' );
$blog_hero_subtitle = get_option( '_blog_hero_subtitle', 'Explore the latest insights, updates, and resources across various categories.' );

// Get all non-empty categories for the filter bar
$categories = get_categories( array(
	'orderby'    => 'name',
	'order'      => 'ASC',
	'hide_empty' => true,
) );

// Query ALL published posts (client-side JS handles filtering)
$blog_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );
?>

    <!-- Blog Hero Section -->
    <section class="blog-hero">
        <div class="blog-hero-container">
            <h1 class="blog-hero-title"><?php echo esc_html( $blog_hero_title ); ?></h1>
            <p class="blog-hero-subtitle"><?php echo esc_html( $blog_hero_subtitle ); ?></p>
        </div>
    </section>

    <!-- Blog Categories -->
    <section class="blog-categories">
        <div class="blog-categories-container">
            <div class="categories-slider-wrapper">
                <button class="category-nav category-nav-prev" id="categoryPrev">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                </button>

                <div class="categories-slider" id="categoriesSlider">
                    <button class="category-btn active" data-category="all">All Posts</button>
                    <?php foreach ( $categories as $cat ) : ?>
                    <button class="category-btn" data-category="<?php echo esc_attr( $cat->slug ); ?>">
                        <?php echo esc_html( $cat->name ); ?>
                    </button>
                    <?php endforeach; ?>
                </div>

                <button class="category-nav category-nav-next" id="categoryNext">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Blog Grid Section -->
    <section class="blog-grid-section">
        <div class="blog-grid-container">

            <?php if ( $blog_query->have_posts() ) :
                while ( $blog_query->have_posts() ) :
                    $blog_query->the_post();

                    $post_cats        = get_the_category();
                    $primary_cat_slug = $post_cats ? $post_cats[0]->slug : 'uncategorized';
                    $post_url         = get_permalink();
                    ?>

                    <article class="blog-card" data-category="<?php echo esc_attr( $primary_cat_slug ); ?>" data-url="<?php echo esc_url( $post_url ); ?>">
                        <div class="blog-card-content">
                            <h2 class="blog-card-title"><?php the_title(); ?></h2>

                            <div class="blog-card-meta-wrapper">
                                <div class="meta-left">
                                    <div class="meta-item">
                                        <span class="meta-label">Category:</span>
                                        <?php foreach ( $post_cats as $i => $cat ) : ?>
                                        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="meta-link" onclick="event.stopPropagation();"><?php echo esc_html( $cat->name ); ?></a><?php if ( $i < count( $post_cats ) - 1 ) echo ', '; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="meta-item">
                                        <span class="meta-label">Published:</span>
                                        <span class="meta-text"><?php echo get_the_date( 'F j, Y' ); ?></span>
                                    </div>
                                </div>
                                <div class="meta-right">
                                    <div class="meta-item">
                                        <span class="meta-label">Author:</span>
                                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="meta-link" onclick="event.stopPropagation();"><?php the_author(); ?></a>
                                    </div>
                                </div>
                            </div>

                            <p class="blog-card-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 25, '' ); ?>... <a href="<?php echo esc_url( $post_url ); ?>" class="read-more" onclick="event.stopPropagation();">Read More...</a>
                            </p>
                        </div>
                    </article>

                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <div style="grid-column:1/-1;text-align:center;padding:60px 20px;color:#666;">
                    <p style="font-size:18px;font-weight:600;">No articles found yet.</p>
                </div>
            <?php endif; ?>

        </div>

        <!-- Load More Button -->
        <div class="load-more-wrapper">
            <button class="btn-load-more">Load More Articles</button>
        </div>
    </section>

<?php get_footer(); ?>
