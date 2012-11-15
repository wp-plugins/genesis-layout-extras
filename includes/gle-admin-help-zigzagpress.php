<?php
/**
 * Helper functions for the admin - help tabs for supported ZigZagPress child themes - only if active.
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
 * Add optional help tab content for supported child themes by ZigZagPress.
 *
 * @since 1.6.0
 */
function ddw_gle_admin_help_zigzagpress() {

	echo '<h3>' . __( 'Plugin: Genesis Layout Extras', 'genesis-layout-extras' ) . ' <small>v' . esc_attr( ddw_gle_plugin_get_data( 'Version' ) ) . '</small></h3>';

		echo '<h4>' . __( 'Custom Post Types by Child Themes', 'genesis-layout-extras' ) . ' &mdash; ' . __( 'by StudioPress', 'genesis-layout-extras' ) . '</h4>';

		/** Child Themes by ZigZagPress: Megalithe / Engrave / Vanilla */
		if ( post_type_exists( 'portfolio' ) ) {

			if ( CHILD_THEME_NAME == 'Megalithe' ) {
				$gle_zzp_theme_check = 'Megalithe';
			} elseif ( CHILD_THEME_NAME == 'Engrave Theme' ) {
				$gle_zzp_theme_check = 'Engrave';
			} elseif ( CHILD_THEME_NAME == 'Vanilla' ) {
				$gle_zzp_theme_check = 'Vanilla';
			}

			echo '<p>' . sprintf( __( 'Child Theme: %s by ZigZagPress', 'genesis-layout-extras' ), $gle_zzp_theme_check ) .
				'<ul>' .
					'<li>' . __( 'Portfolio Post Type Layout (archive)', 'genesis-layout-extras' ) . '</li>' .
					'<li>' . __( 'Portfolio Categories Taxonomy Layout', 'genesis-layout-extras' ) . '</li>' .
				'</ul></p>';

		}  // end-if ZigZagPress check

}  // end of function ddw_gle_admin_help_zigzagpress
