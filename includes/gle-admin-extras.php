<?php
/**
 * Helper functions for the admin - plugin links.
 *
 * @package    Genesis Layout Extras
 * @subpackage Admin
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2011-2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-layout-extras/
 * @link       http://twitter.com/#!/deckerweb
 *
 * @since 1.0
 * @version 1.1
 */

/**
 * Add "Settings" link to plugin page
 *
 * @since 1.0
 *
 * @param  $gle_links
 * @param  $gle_settings_link
 * @return strings widgets link
 */
function ddw_gle_settings_page_link( $gle_links ) {

	$gle_settings_link = sprintf( '<a href="%s" title="%s">%s</a>' , admin_url( 'admin.php?page=gle-layout-extras' ) , __( 'Go to the settings page', 'genesis-layout-extras' ) , __( 'Settings', 'genesis-layout-extras' ) );
	
	array_unshift( $gle_links, $gle_settings_link );

	return $gle_links;

}  // end of function ddw_gle_settings_page_link


add_filter( 'plugin_row_meta', 'ddw_gle_plugin_links', 10, 2 );
/**
 * Add various support links to plugin page
 *
 * @since 1.1
 *
 * @param  $gle_links
 * @param  $gle_file
 * @return strings plugin links
 */
function ddw_gle_plugin_links( $gle_links, $gle_file ) {

	if ( ! current_user_can( 'install_plugins' ) )
		return $gle_links;

	if ( $gle_file == GLE_PLUGIN_BASEDIR . '/genesis-layout-extras.php' ) {
		$gle_links[] = '<a href="http://wordpress.org/extend/plugins/genesis-layout-extras/faq/" target="_new" title="' . __( 'FAQ', 'genesis-layout-extras' ) . '">' . __( 'FAQ', 'genesis-layout-extras' ) . '</a>';
		$gle_links[] = '<a href="http://wordpress.org/tags/genesis-layout-extras?forum_id=10" target="_new" title="' . __( 'Support', 'genesis-layout-extras' ) . '">' . __( 'Support', 'genesis-layout-extras' ) . '</a>';
		$gle_links[] = '<a href="' . __( 'http://genesisthemes.de/en/donate/', 'genesis-layout-extras' ) . '" target="_new" title="' . __( 'Donate', 'genesis-layout-extras' ) . '">' . __( 'Donate', 'genesis-layout-extras' ) . '</a>';
	}

	return $gle_links;

}  // end of function ddw_gle_plugin_links
