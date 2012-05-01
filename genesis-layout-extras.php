<?php
/**
 * Main plugin file. This plugin for Genesis Theme Framework allows modifying of default layouts for
 * homepage, singular, archive, attachment, search, 404 and even bbPress 2.x pages via Genesis theme settings.
 *
 * @package   Genesis Layout Extras
 * @author    David Decker
 * @link      http://twitter.com/#!/deckerweb
 * @copyright Copyright 2011-2012, David Decker - DECKERWEB
 *
 * @origin    Based on the work of @WPChildThemes for original plugin called "Genesis Layout Manager" (C) 2010
 *
 * Plugin Name: Genesis Layout Extras
 * Plugin URI: http://genesisthemes.de/en/wp-plugins/genesis-layout-extras/
 * Description: This plugin for Genesis Theme Framework allows modifying of default layouts for homepage, singular, archive, attachment, search, 404 and even bbPress 2.x pages via Genesis theme settings.
 * Version: 1.3
 * Author: David Decker - DECKERWEB
 * Author URI: http://deckerweb.de/
 * License: GPLv2 or later
 * Text Domain: genesis-layout-extras
 * Domain Path: /languages/
 *
 * Copyright 2011-2012 David Decker - DECKERWEB
 *
 *     This file is part of Genesis Layout Extras,
 *     a plugin for WordPress.
 *
 *     Genesis Layout Extras is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 2 of the License, or (at your option)
 *     any later version.
 *
 *     Genesis Layout Extras is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Setting constants
 *
 * @since 1.0
 */
/** Plugin directory */
define( 'GLE_PLUGIN_DIR', dirname( __FILE__ ) );

/** Plugin base directory */
define( 'GLE_PLUGIN_BASEDIR', dirname( plugin_basename( __FILE__ ) ) );

/** Plugin settings field */
define( 'GLE_SETTINGS_FIELD', 'gle-settings' );


register_activation_hook( __FILE__, 'ddw_genesis_layout_extras_activation_check' );
/**
 * Checks for activated Genesis Framework before allowing plugin to activate
 *
 * @since 1.3
 */
function ddw_genesis_layout_extras_activation_check() {

	/**
	 * Look for translations to display for the activation message
	 * Look first in WordPress "languages" folder, then in plugin's "languages" folder
	 */
	load_plugin_textdomain( 'genesis-layout-extras', false, GLE_PLUGIN_BASEDIR . '/../../languages/genesis-layout-extras/' );
	load_plugin_textdomain( 'genesis-layout-extras', false, GLE_PLUGIN_BASEDIR . '/languages' );

	/** Check for activated Genesis Framework (= template/parent theme) */
	if ( basename( get_template_directory() ) != 'genesis' ) {

		/** If no Genesis, deactivate ourself */
		deactivate_plugins( plugin_basename( __FILE__ ) );  // Deactivate ourself

		/** Deactivation message */
		wp_die( sprintf( __( 'Sorry, you can&rsquo;t activate unless you have installed the %1$sGenesis Framework%2$s', 'genesis-layout-extras' ), '<a href="http://deckerweb.de/go/genesis/" target="_new">', '</a>' ) );

	}  // end-if Genesis check

}  // end of function ddw_genesis_layout_extras_activation_check


add_action( 'init', 'ddw_genesis_layout_extras_init' );
/**
 * Load the text domain for translation of the plugin.
 * Load admin helper functions - only within 'wp-admin'.
 * Load logic/functions for the frontend display - and only when on frontend.
 * 
 * @since 1.0
 * @version 1.1
 */
function ddw_genesis_layout_extras_init() {

	/** First look in WordPress' "languages" folder = custom & update-secure! */
	load_plugin_textdomain( 'genesis-layout-extras', false, GLE_PLUGIN_BASEDIR . '/../../languages/genesis-layout-extras/' );

	/** Then look in plugin's "languages" folder = default */
	load_plugin_textdomain( 'genesis-layout-extras', false, GLE_PLUGIN_BASEDIR . '/languages' );

	/** Load the admin and frontend functions only when needed */
	if ( is_admin() ) {
		require_once( GLE_PLUGIN_DIR . '/includes/gle-admin-options.php' );
		require_once( GLE_PLUGIN_DIR . '/includes/gle-admin-extras.php' );
		require_once( GLE_PLUGIN_DIR . '/includes/gle-admin-help.php' );
	} else {
		require_once( GLE_PLUGIN_DIR . '/includes/gle-frontend.php' );
	}

	/** Add "Settings Page" link to plugin page - only within 'wp-admin' */
	if ( is_admin() && current_user_can( 'manage_options' ) ) {
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ) , 'ddw_gle_settings_page_link' );
	}

}  // end of function ddw_genesis_layout_extras_init


/**
 * Return the defaults array for all setting options.
 *
 * @since 1.0
 * @version 1.2
 */
function ddw_genesis_layout_extras_defaults() {

	$options = array(
		'ddw_genesis_layout_home' => '',
		'ddw_genesis_layout_search' => '',
		'ddw_genesis_layout_search_not_found' => '',
		'ddw_genesis_layout_404' => '',
		'ddw_genesis_layout_post' => '',
		'ddw_genesis_layout_page' => '',
		'ddw_genesis_layout_attachment' => '',
		'ddw_genesis_layout_author' => '',
		'ddw_genesis_layout_date' => '',
		'ddw_genesis_layout_date_year' => '',
		'ddw_genesis_layout_date_month' => '',
		'ddw_genesis_layout_date_day' => '',
		'ddw_genesis_layout_category' => '',
		'ddw_genesis_layout_tag' => '',
		'ddw_genesis_layout_taxonomy' => '',
		'ddw_genesis_layout_cpt_apl_listing' => '',
		'ddw_genesis_layout_cpt_apl_features' => '',
		'ddw_genesis_layout_cpt_gmp_video' => '',
		'ddw_genesis_layout_cpt_gmp_video_slideshow' => '',
		'ddw_genesis_layout_cpt_gmp_video_category' => '',
		'ddw_genesis_layout_cpt_gmp_video_tag' => '',
		'ddw_genesis_layout_cpt_wcjs_product_cat' => '',
		'ddw_genesis_layout_cpt_wcjs_product_tag' => '',
		'ddw_genesis_layout_cpt_edd_download' => '',
		'ddw_genesis_layout_cpt_edd_download_category' => '',
		'ddw_genesis_layout_cpt_edd_download_tag' => '',
		'ddw_genesis_layout_bbpress' => '',
		'ddw_genesis_layout_cpt_themedy_products' => '',
		'ddw_genesis_layout_cpt_themedy_product_category' => '',
		'ddw_genesis_layout_cpt_themedy_photo_gallery' => ''
	);

	return apply_filters( 'ddw_genesis_layout_extras_settings_defaults', $options );

}  // end of function ddw_genesis_layout_extras_defaults


add_action( 'genesis_settings_sanitizer_init', 'ddw_genesis_layout_extras_sanitization' );
/**
 * Add all settings to Genesis sanitization - for security.
 *
 * @since 1.0
 * @version 1.2
 */
function ddw_genesis_layout_extras_sanitization() {

	genesis_add_option_filter( 'no_html', GLE_SETTINGS_FIELD,
		array(
			'ddw_genesis_layout_home',
			'ddw_genesis_layout_search',
			'ddw_genesis_layout_search_not_found',
			'ddw_genesis_layout_404',
			'ddw_genesis_layout_post',
			'ddw_genesis_layout_page',
			'ddw_genesis_layout_attachment',
			'ddw_genesis_layout_author',
			'ddw_genesis_layout_date',
			'ddw_genesis_layout_date_year',
			'ddw_genesis_layout_date_month',
			'ddw_genesis_layout_date_day',
			'ddw_genesis_layout_category',
			'ddw_genesis_layout_tag',
			'ddw_genesis_layout_taxonomy',
			'ddw_genesis_layout_cpt_apl_listing',
			'ddw_genesis_layout_cpt_apl_features',
			'ddw_genesis_layout_cpt_gmp_video',
			'ddw_genesis_layout_cpt_gmp_slideshow',
			'ddw_genesis_layout_cpt_gmp_video_category',
			'ddw_genesis_layout_cpt_gmp_video_tag',
			'ddw_genesis_layout_cpt_wcjs_product_cat',
			'ddw_genesis_layout_cpt_wcjs_product_tag',
			'ddw_genesis_layout_cpt_edd_download',
			'ddw_genesis_layout_cpt_edd_download_category',
			'ddw_genesis_layout_cpt_edd_download_tag',
			'ddw_genesis_layout_bbpress',
			'ddw_genesis_layout_cpt_themedy_products',
			'ddw_genesis_layout_cpt_themedy_product_category',
			'ddw_genesis_layout_cpt_themedy_photo_gallery'
		) );

}  // end of function ddw_genesis_layout_extras_sanitization


add_action( 'admin_init', 'ddw_genesis_layout_extras_register_settings' );
/**
 * Register the settings field for the plugin.
 *
 * @since 1.0
 * @version 1.1
 */
function ddw_genesis_layout_extras_register_settings() {

	/** Register settings field */
	register_setting( GLE_SETTINGS_FIELD, GLE_SETTINGS_FIELD );

	/** Add the defaults to this settings field */
	add_option( GLE_SETTINGS_FIELD, ddw_genesis_layout_extras_defaults() );
 
	/** Add Reset functionality to settings field */
	if ( function_exists ( 'genesis_get_option' ) && genesis_get_option( 'reset', GLE_SETTINGS_FIELD ) ) {
		update_option( GLE_SETTINGS_FIELD, ddw_genesis_layout_extras_defaults() );
		genesis_admin_redirect( 'gle-layout-extras', array( 'reset' => 'true' ) );
		exit;
	}

}  // end of function ddw_genesis_layout_extras_register_settings
