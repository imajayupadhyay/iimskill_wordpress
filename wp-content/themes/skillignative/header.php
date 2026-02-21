<?php
/**
 * The header for our theme
 *
 * @package Skillignative
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
/* ── Header customizer values with fallbacks ── */
$logo_id      = get_theme_mod( 'header_logo', 0 );
$logo_alt     = get_theme_mod( 'header_logo_alt', get_bloginfo( 'name' ) );
$cta_text     = get_theme_mod( 'header_cta_text', 'Get Connected' );
$cta_url      = get_theme_mod( 'header_cta_url', '#' );
$cta_new_tab  = get_theme_mod( 'header_cta_new_tab', '' );

/* resolve logo: customizer upload → WP custom_logo → fallback static image */
if ( $logo_id ) {
    $logo_src = wp_get_attachment_image_url( $logo_id, 'full' );
} elseif ( has_custom_logo() ) {
    $logo_src = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' );
} else {
    $logo_src = get_template_directory_uri() . '/assets/images/iim-skills-official-logo.png';
}

$target = $cta_new_tab ? ' target="_blank" rel="noopener noreferrer"' : '';
?>
    <header class="header">
        <div class="header-container">
            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url( $logo_src ); ?>" alt="<?php echo esc_attr( $logo_alt ); ?>">
                </a>
            </div>

            <!-- Hamburger Menu -->
            <button class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <!-- Navigation -->
            <nav class="nav" id="nav">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'items_wrap'     => '<ul class="nav-list">%3$s</ul>',
                    'fallback_cb'    => 'skillignative_fallback_menu',
                    'walker'         => new Skillignative_Walker_Nav(),
                    'depth'          => 3,
                ) );
                ?>
                <a href="<?php echo esc_url( $cta_url ); ?>" class="cta-btn"<?php echo $target; ?>>
                    <?php echo esc_html( $cta_text ); ?>
                </a>
            </nav>
        </div>
    </header>
