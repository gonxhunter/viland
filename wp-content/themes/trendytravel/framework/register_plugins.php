<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.1
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

add_action( 'tgmpa_register', 'dt_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function dt_theme_register_required_plugins() {

	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$template_uri = get_template_directory().'/framework';

	$plugins = array(

		array(
			'name'     				=> 'LayerSlider Responsive WordPress Slider Plugin', // The plugin name
			'slug'     				=> 'LayerSlider', // The plugin slug (typically the folder name)
			'source'   				=> $template_uri . '/plugins/LayerSlider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		array(
			'name'     				=> 'Revolution Slider Plugin',
			'slug'     				=> 'revslider',
			'source'   				=> $template_uri . '/plugins/revslider.zip',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

		array(
			'name'     				=> 'DesignThemes Core Features Plugin',
			'slug'     				=> 'designthemes-core-features',
			'source'   				=> $template_uri . '/plugins/designthemes-core-features.zip',
			'required' 				=> true,
			'version' 				=> '1.2',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

		array(
			'name'     				=> 'Envato WordPress Toolkit',
			'slug'     				=> 'envato-wordpress-toolkit-master',
			'source'   				=> $template_uri . '/plugins/envato-wordpress-toolkit-master.zip',
			'required' 				=> false,
			'version' 				=> '1.7.2',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

		array(
			'name'     				=> 'WooCommerce',
			'slug'     				=> 'woocommerce',
			'required' 				=> false,
			'version' 				=> '2.4.10',
			'force_activation' 		=> false,
		),
		
		array(
			'name'     				=> 'YITH WooCommerce Wishlist',
			'slug'     				=> 'yith-woocommerce-wishlist',
			'required' 				=> false,
			'version' 				=> '2.0.12',
			'force_activation' 		=> false,
		),

		array(
			'name'     				=> 'YITH WooCommerce Zoom Magnifier',
			'slug'     				=> 'yith-woocommerce-zoom-magnifier',
			'required' 				=> false,
			'version' 				=> '1.2.12',
			'force_activation' 		=> false,
		),
		
		array(
			'name'     				=> 'Responsive Styled Google Maps Generator',
			'slug'     				=> 'responsive-maps-plugin',
			'source'   				=> $template_uri . '/plugins/responsive-maps-plugin.zip',
			'required' 				=> false,
			'version' 				=> '2.24',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

		array(
			'name' 					=> 'Contact Form 7',
			'slug' 					=> 'contact-form-7',
			'required' 				=> false,
			'version' 				=> '4.3',
			'force_activation' 		=> false,
		),

		array(
			'name' 					=> 'BBPress',
			'slug' 					=> 'bbpress',
			'required' 				=> false,
			'version' 				=> '2.5.8',
			'force_activation' 		=> false,
		),
		
		array(
			'name' 					=> 'BuddyPress',
			'slug' 					=> 'buddypress',
			'required' 				=> false,
			'version' 				=> '2.4.0',
			'force_activation' 		=> false,
		),
		
		array(
			'name' 					=> 'Like This',
			'slug' 					=> 'roses-like-this',
			'required'			 	=> false,
			'force_activation' 		=> false,
		),
		
		array(
			'name' 					=> 'The Events Calendar',
			'slug' 					=> 'the-events-calendar',
			'required' 				=> false,
			'version' 				=> '3.12.6',
			'force_activation' 		=> false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'iamd_text_domain' ),
			'menu_title'                      => __( 'Install Plugins', 'iamd_text_domain' ),
			'installing'                      => __( 'Installing Plugin: %s', 'iamd_text_domain' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'iamd_text_domain' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'iamd_text_domain' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'iamd_text_domain' ), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'iamd_text_domain' ), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'iamd_text_domain' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'iamd_text_domain' ), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'iamd_text_domain' ), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'iamd_text_domain' ), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'iamd_text_domain' ), // %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'iamd_text_domain' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'iamd_text_domain' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'iamd_text_domain' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'iamd_text_domain' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'iamd_text_domain' ), // %s = dashboard link.
			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( $plugins, $config );

}