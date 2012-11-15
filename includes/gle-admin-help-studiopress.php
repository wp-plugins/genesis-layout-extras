<?php
/**
 * Helper functions for the admin - help tabs for supported StudioPress child themes - only if active.
 *
 * @package    Genesis Layout Extras
 * @subpackage Admin Help
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2011-2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-layout-extras/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.6.0
 */

/**
 * Add optional help tab content for supported child themes by StudioPress.
 *
 * @since 1.6.0
 */
function ddw_gle_admin_help_studiopress() {

	echo '<h3>' . __( 'Plugin: Genesis Layout Extras', 'genesis-layout-extras' ) . ' <small>v' . esc_attr( ddw_gle_plugin_get_data( 'Version' ) ) . '</small></h3>';

		echo '<h4>' . __( 'Custom Post Types by Child Themes', 'genesis-layout-extras' ) . ' &mdash; ' . __( 'by StudioPress', 'genesis-layout-extras' ) . '</h4>';

		/** Child Themes by StudioPress: Minimum 2.0 / Executive 2.0 */
		if ( post_type_exists( 'portfolio' ) ) {

			if ( function_exists( 'minimum_portfolio_post_type' ) ) {
				$gle_sp_theme_check = 'Minimum 2.0';
			} elseif ( function_exists( 'executive_portfolio_post_type' ) ) {
				$gle_sp_theme_check = 'Executive 2.0';
			}

			echo '<p>' . sprintf( __( 'Child Theme: %s by StudioPress', 'genesis-layout-extras' ), $gle_sp_theme_check ) .
				'<ul>' .
					'<li>' . __( 'Portfolio Post Type Layout (archive)', 'genesis-layout-extras' ) . '</li>' .
				'</ul></p>';

		}  // end-if StudioPress check

}  // end of function ddw_gle_admin_help_studiopress
