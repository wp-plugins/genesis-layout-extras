<?php
/**
 * Main plugin file.
 * This plugin for Genesis Theme Framework allows modifying of default layouts for
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
 * Version: 1.4
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
		require_once( GLE_PLUGIN_DIR . '/includes/gle-admin-register-settings.php' );
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
