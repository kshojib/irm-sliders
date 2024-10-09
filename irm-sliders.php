<?php
/**
 * Plugin Name: IRM Sliders
 * Plugin URI:  https://web.irm.co.il/
 * Description: Custom sliders for IRM
 * Version:     1.0.0
 * Author:      Shojib Khan (IRM)
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: irm-sliders
 */


 // Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Check for ACF Plugin
if (!class_exists('acf_pro')) {

    // Show admin notice if ACF isn't activated
    function irm_opc_acf_admin_notice() {
        ?>
        <div class="notice notice-error">
            <p><?php _e('IRM Sliders requires the Advanced Custom Fields PRO (ACF) plugin to be activated.', 'irm-sliders'); ?></p>
        </div>
        <?php
    }
    add_action('admin_notices', 'irm_opc_acf_admin_notice');

    // Don't load the rest of the plugin
    return;
}

// define version
define( 'IRM_SLIDERS_VERSION', '1.0.1' );

// Plugin directory path
define( 'IRM_SLIDERS_PATH', plugin_dir_path( __FILE__ ) );

// Plugin directory URL
define( 'IRM_SLIDERS_URL', plugin_dir_url( __FILE__ ) );

// Include required files
require_once IRM_SLIDERS_PATH . 'includes/post-type.php';
require_once IRM_SLIDERS_PATH . 'includes/shortcodes.php';
require_once IRM_SLIDERS_PATH . 'includes/acf-options.php';
require_once IRM_SLIDERS_PATH . 'includes/init.php';

/**
 * Enqueue styles and scripts.
 */
function irm_sliders_enqueue_scripts() {
    // Front-end styles
    wp_enqueue_style( 'irm-sliders-style', IRM_SLIDERS_URL . 'assets/styles/style.css' , array(), IRM_SLIDERS_VERSION, 'all' );

    wp_enqueue_style( 'irm-swiper-style', IRM_SLIDERS_URL . 'assets/styles/swiper.css' , array(), IRM_SLIDERS_VERSION, 'all' );

    // Front-end scripts
    wp_enqueue_script( 'irm-sliders-main-js', IRM_SLIDERS_URL . 'assets/scripts/main.js', array( 'jquery' ), IRM_SLIDERS_VERSION, true );

    wp_enqueue_script( 'irm-sliders-swiper-js', IRM_SLIDERS_URL . 'assets/scripts/swiper.js', array( 'jquery' ), IRM_SLIDERS_VERSION, true );

    wp_enqueue_script( 'irm-sliders-tweenMax_gsap-js', IRM_SLIDERS_URL . 'assets/scripts/tweenMax_gsap.js', array( 'jquery' ), IRM_SLIDERS_VERSION, true );



}

// Hook for enqueuing scripts and styles
add_action( 'wp_enqueue_scripts', 'irm_sliders_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'irm_sliders_enqueue_scripts' );

// Plugin activation hook
function irm_sliders_activate() {
    // do something
  
}
register_activation_hook( __FILE__, 'irm_sliders_activate' );

// Plugin deactivation hook
function irm_sliders_deactivate() {
    // do something
}
register_deactivation_hook( __FILE__, 'irm_sliders_deactivate' );
