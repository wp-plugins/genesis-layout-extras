<?php
/**
 * Helper functions for the admin - help tabs for supported child themes - only if active.
 *
 * @package    Genesis Layout Extras
 * @subpackage Admin Help
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2011-2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-layout-extras/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.3
 */

/**
 * Add optional help tab content for supported child themes by Themedy.
 *
 * @since 1.3
 */
function ddw_gle_admin_help_themedy() {

	echo '<h3>' . __( 'Plugin: Genesis Layout Extras', 'genesis-layout-extras' ) . '</h3>';

		echo '<h4>' . __( 'Custom Post Types by Child Themes', 'genesis-layout-extras' ) . ' &mdash; ' . __( 'by Themedy Themes Brand', 'genesis-layout-extras' ) . '</h4>';

		/** Child Theme: Clip Cart - by Themedy */
		if ( post_type_exists( 'products' ) ) {

			echo '<p>' . __( 'Child Theme: Clip Cart by Themedy Themes', 'genesis-layout-extras' ) .
				'<ul>' .
					'<li>' . __( 'Products Post Type Layout (archive)', 'genesis-layout-extras' ) . '</li>' .
					'<li>' . __( 'Product Categories Taxonomy Layout', 'genesis-layout-extras' ) . '</li>' .
				'</ul></p>';

		}  // end-if Clip Cart check

		/** Child Theme: Stage - by Themedy */
		if ( post_type_exists( 'photo' ) ) {

			echo '<p>' . __( 'Child Theme: Stage by Themedy Themes', 'genesis-layout-extras' ) .
				'<ul>' .
					'<li>' . __( 'Photo Galleries Taxonomy Layout', 'genesis-layout-extras' ) . '</li>' .
				'</ul></p>';

		}  // end-if Stage check

}  // end of function ddw_gle_admin_help_themedy
