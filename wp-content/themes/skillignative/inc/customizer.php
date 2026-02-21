<?php
/**
 * Skillignative Theme Customizer
 *
 * @package Skillignative
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skillignative_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'skillignative_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'skillignative_customize_partial_blogdescription',
			)
		);
	}

	/* ============================================================
	   HEADER SETTINGS SECTION
	   Appearance → Customize → Header Settings
	   ============================================================ */
	$wp_customize->add_section( 'skillignative_header', array(
		'title'       => __( 'Header Settings', 'skillignative' ),
		'description' => __( 'Control the header logo, CTA button text and link.', 'skillignative' ),
		'priority'    => 30,
	) );

	/* ── Logo (image upload) ── */
	$wp_customize->add_setting( 'header_logo', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'header_logo', array(
		'label'       => __( 'Header Logo', 'skillignative' ),
		'description' => __( 'Upload your logo. Recommended size: 200×60 px. Leave empty to use the default theme logo.', 'skillignative' ),
		'section'     => 'skillignative_header',
		'mime_type'   => 'image',
		'priority'    => 10,
	) ) );

	/* ── Logo Alt Text ── */
	$wp_customize->add_setting( 'header_logo_alt', array(
		'default'           => get_bloginfo( 'name' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'header_logo_alt', array(
		'label'    => __( 'Logo Alt Text', 'skillignative' ),
		'section'  => 'skillignative_header',
		'type'     => 'text',
		'priority' => 20,
	) );

	/* ── CTA Button Text ── */
	$wp_customize->add_setting( 'header_cta_text', array(
		'default'           => 'Get Connected',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'header_cta_text', array(
		'label'       => __( 'CTA Button Text', 'skillignative' ),
		'description' => __( 'Text shown on the header call-to-action button.', 'skillignative' ),
		'section'     => 'skillignative_header',
		'type'        => 'text',
		'priority'    => 30,
	) );

	/* ── CTA Button URL ── */
	$wp_customize->add_setting( 'header_cta_url', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'header_cta_url', array(
		'label'       => __( 'CTA Button URL', 'skillignative' ),
		'description' => __( 'Where the CTA button links to (e.g. a contact page or form).', 'skillignative' ),
		'section'     => 'skillignative_header',
		'type'        => 'url',
		'priority'    => 40,
	) );

	/* ── CTA Button — open in new tab? ── */
	$wp_customize->add_setting( 'header_cta_new_tab', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'header_cta_new_tab', array(
		'label'    => __( 'Open CTA link in new tab', 'skillignative' ),
		'section'  => 'skillignative_header',
		'type'     => 'checkbox',
		'priority' => 50,
	) );
}
add_action( 'customize_register', 'skillignative_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function skillignative_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function skillignative_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skillignative_customize_preview_js() {
	wp_enqueue_script( 'skillignative-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'skillignative_customize_preview_js' );
