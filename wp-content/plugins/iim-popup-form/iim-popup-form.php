<?php
/**
 * Plugin Name: Popup Form
 * Description: Modern popup/modal form powered by Contact Form 7. Add class "open-popup-form" to any link or button to trigger the popup.
 * Version: 1.0.0
 * Author: Ajay Upadhyay
 * Requires Plugins: contact-form-7
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class IIM_Popup_Form {

    private static $instance = null;

    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
        add_action( 'wp_footer', array( $this, 'render_modal' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
    }

    /**
     * Admin settings page
     */
    public function add_settings_page() {
        add_options_page(
            'Popup Form',
            'Popup Form',
            'manage_options',
            'iim-popup-form',
            array( $this, 'settings_page_html' )
        );
    }

    public function register_settings() {
        register_setting( 'iim_popup_form', 'iim_popup_cf7_id' );
        register_setting( 'iim_popup_form', 'iim_popup_heading' );
        register_setting( 'iim_popup_form', 'iim_popup_subheading' );
    }

    public function settings_page_html() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        // Get all CF7 forms for dropdown
        $cf7_forms = array();
        if ( class_exists( 'WPCF7_ContactForm' ) ) {
            $forms = WPCF7_ContactForm::find();
            foreach ( $forms as $form ) {
                $cf7_forms[ $form->id() ] = $form->title();
            }
        }

        $selected_id  = get_option( 'iim_popup_cf7_id', '' );
        $heading       = get_option( 'iim_popup_heading', 'Get In Touch' );
        $subheading    = get_option( 'iim_popup_subheading', 'Fill in your details and we will get back to you shortly.' );
        ?>
        <div class="wrap">
            <h1>Popup Form Settings</h1>
            <form method="post" action="options.php">
                <?php settings_fields( 'iim_popup_form' ); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="iim_popup_cf7_id">Select Contact Form 7 Form</label></th>
                        <td>
                            <select name="iim_popup_cf7_id" id="iim_popup_cf7_id">
                                <option value="">-- Select a Form --</option>
                                <?php foreach ( $cf7_forms as $id => $title ) : ?>
                                    <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $selected_id, $id ); ?>>
                                        <?php echo esc_html( $title . ' (ID: ' . $id . ')' ); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <p class="description">Choose the CF7 form to display in the popup.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="iim_popup_heading">Popup Heading</label></th>
                        <td>
                            <input type="text" name="iim_popup_heading" id="iim_popup_heading"
                                   value="<?php echo esc_attr( $heading ); ?>" class="regular-text" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="iim_popup_subheading">Popup Subheading</label></th>
                        <td>
                            <input type="text" name="iim_popup_subheading" id="iim_popup_subheading"
                                   value="<?php echo esc_attr( $subheading ); ?>" class="regular-text" />
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>

            <hr />
            <h2>How to Use</h2>
            <p>Use <strong>any</strong> of these 3 methods to trigger the popup:</p>

            <h3>Method 1: Link with <code>href="#popup-form"</code> (Easiest - No class needed!)</h3>
            <pre>&lt;a href="#popup-form"&gt;Enquire Now&lt;/a&gt;</pre>

            <h3>Method 2: Class <code>open-popup-form</code></h3>
            <pre>&lt;a href="#" class="open-popup-form"&gt;Enquire Now&lt;/a&gt;</pre>

            <h3>Method 3: Data attribute <code>data-popup-form</code></h3>
            <pre>&lt;button data-popup-form&gt;Get Started&lt;/button&gt;</pre>

            <p><strong>Works anywhere</strong> on your site - header, footer, pages, posts, or any template.</p>
        </div>
        <?php
    }

    /**
     * Enqueue frontend CSS & JS
     */
    public function enqueue_assets() {
        $form_id = get_option( 'iim_popup_cf7_id', '' );
        if ( empty( $form_id ) ) {
            return;
        }

        // Ensure CF7 scripts load on all pages
        if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
            wpcf7_enqueue_scripts();
        }
        if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
            wpcf7_enqueue_styles();
        }

        wp_enqueue_style(
            'iim-popup-form',
            plugin_dir_url( __FILE__ ) . 'assets/popup-form.css',
            array(),
            '1.0.0'
        );

        wp_enqueue_script(
            'iim-popup-form',
            plugin_dir_url( __FILE__ ) . 'assets/popup-form.js',
            array(),
            '1.0.0',
            true
        );
    }

    /**
     * Render the modal HTML in footer
     */
    public function render_modal() {
        $form_id = get_option( 'iim_popup_cf7_id', '' );
        if ( empty( $form_id ) ) {
            return;
        }

        $heading    = get_option( 'iim_popup_heading', 'Get In Touch' );
        $subheading = get_option( 'iim_popup_subheading', 'Fill in your details and we will get back to you shortly.' );
        ?>
        <div id="iim-popup-overlay" class="iim-popup-overlay" aria-hidden="true">
            <div class="iim-popup-modal" role="dialog" aria-modal="true" aria-labelledby="iim-popup-title">
                <button class="iim-popup-close" aria-label="Close popup">&times;</button>
                <div class="iim-popup-header">
                    <h2 id="iim-popup-title"><?php echo esc_html( $heading ); ?></h2>
                    <?php if ( $subheading ) : ?>
                        <p class="iim-popup-subtitle"><?php echo esc_html( $subheading ); ?></p>
                    <?php endif; ?>
                </div>
                <div class="iim-popup-body">
                    <?php echo do_shortcode( '[contact-form-7 id="' . intval( $form_id ) . '"]' ); ?>
                </div>
            </div>
        </div>
        <?php
    }
}

IIM_Popup_Form::get_instance();
