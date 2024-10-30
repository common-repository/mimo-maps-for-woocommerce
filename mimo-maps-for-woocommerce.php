
<?php

/**
 *
 * @package   Mimo_Maps_For_Woocommerce_Display
 * @author    Mimo <mail@mimo.studio>
 * @license   GPL-2.0+
 * @link      http://mimo.studio
 * @copyright 2015 Mimo
 *
 * @wordpress-plugin
 * Plugin Name:       Mimo Maps for Woocommerce
 * Plugin URI:        http://mimo.studio
 * Description:       Map your Woocommerce products
 * Version:           2.0
 * Author:            mimothemes
 * Author URI:        http://mimo.studio
 * Text Domain:       mimo-maps-for-woocommerce
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * WordPress-Plugin-Boilerplate-Powered: v1.1.2
 */



// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

/*
 * ------------------------------------------------------------------------------
 * Public-Facing Functionality
 * ------------------------------------------------------------------------------
 */

/*
 * Load library for simple and fast creation of Taxonomy and Custom Post Type
 */

require_once( plugin_dir_path( __FILE__ ) . 'includes/Taxonomy_Core/Taxonomy_Core.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/CPT_Core/CPT_Core.php' );

/*
 * Load template system
 */

require_once( plugin_dir_path( __FILE__ ) . 'includes/template.php' );

/*
 * Load Widgets Helper
 */

require_once( plugin_dir_path( __FILE__ ) . 'includes/Widgets-Helper/wph-widget-class.php' );


/*
 * Load Language wrapper function for WPML/Ceceppa Multilingua/Polylang
 */

require_once( plugin_dir_path( __FILE__ ) . 'includes/language.php' );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-mimo-maps-for-woocommerce.php' );


/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *

 */

register_activation_hook( __FILE__, array( 'Mimo_Maps_For_Woocommerce_Display', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Mimo_Maps_For_Woocommerce_Display', 'deactivate' ) );



add_action( 'plugins_loaded', array( 'Mimo_Maps_For_Woocommerce_Display', 'get_instance' ), 9999 );

/*
 * -----------------------------------------------------------------------------
 * Dashboard and Administrative Functionality
 * -----------------------------------------------------------------------------
*/



if ( is_admin() && (!defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-mimo-maps-for-woocommerce-admin.php' );
	add_action( 'plugins_loaded', array( 'Mimo_Maps_For_Woocommerce_Admin', 'get_instance' ) );
}
