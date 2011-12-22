<?php
/**
 * Main plugin file. This plugin for Genesis Theme Framework allows modifying of default layouts for
 * homepage, singular, archive, attachment, search, 404 and even bbPress 2.x pages via Genesis theme settings.
 *
 * @package GenesisLayoutExtras
 * @author David Decker
 * @origin Based on the work of @WPChildThemes for original plugin called "Genesis Layout Manager" (C) 2010
 *
 * Plugin Name: Genesis Layout Extras
 * Plugin URI: http://genesisthemes.de/en/wp-plugins/genesis-layout-extras/
 * Description: This plugin for Genesis Theme Framework allows modifying of default layouts for homepage, singular, archive, attachment, search, 404 and even bbPress 2.x pages via Genesis theme settings.
 * Version: 1.2
 * Author: David Decker - DECKERWEB
 * Author URI: http://deckerweb.de/
 * License: GPLv2
 * Text Domain: genesis-layout-extras
 * Domain Path: /languages/
 */

/**
 * Setting constants
 *
 * @since 1.0
 */
define( 'GLE_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'GLE_PLUGIN_BASEDIR', dirname( plugin_basename( __FILE__ ) ) );
define( 'GLE_SETTINGS_FIELD', 'gle-settings' );


/**
 * The text domain for the plugin
 *
 * @since 1.0
 */
define( 'GLE_DOMAIN' , 'genesis-layout-extras' );


/**
 * Load the text domain for translation of the plugin
 * 
 * @since 1.0
 */
load_plugin_textdomain( 'genesis-layout-extras', false, GLE_PLUGIN_BASEDIR . '/languages' );


register_activation_hook( __FILE__, 'ddw_genesis_layout_extras_activation_check' );
/**
 * Checks for activated Genesis Framework and its minimum version before allowing plugin to activate
 *
 * @author Nathan Rice
 * @uses ddw_genesis_layout_extras_truncate()
 * @since 0.1
 * @version 1.1
 */
function ddw_genesis_layout_extras_activation_check() {

	$latest = '1.7';

	$theme_info = get_theme_data( get_template_directory() . '/style.css' );

	if ( basename( get_template_directory() ) != 'genesis' ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );  // Deactivate ourself
		wp_die( sprintf( __( 'Sorry, you can&rsquo;t activate unless you have installed the %1$sGenesis Framework%2$s', GLE_DOMAIN ), '<a href="http://deckerweb.de/go/genesis/" target="_new">', '</a>' ) );
	}

	$version = ddw_genesis_layout_extras_truncate( $theme_info['Version'], 3 );

	if ( version_compare( $version, $latest, '<' ) ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );  // Deactivate ourself
		wp_die( sprintf( __( 'Sorry, you can&rsquo;t activate without %1$sGenesis Framework %2$s%3$s or greater', GLE_DOMAIN ), '<a href="http://deckerweb.de/go/genesis/" target="_new">', $latest, '</a>' ) );
	}
}


/**
 * Used to cutoff a string to a set length if it exceeds the specified length
 *
 * @author Nick Croft
 * @link http://designsbynickthegeek.com/
 *
 * @since 0.1
 * @version 0.2
 * @param string $str Any string that might need to be shortened
 * @param string $length Any whole integer
 * @return string
 */
function ddw_genesis_layout_extras_truncate( $str, $length=10 ) {

	if ( strlen( $str ) > $length ) {
		return substr( $str, 0, $length );

	} else {
		$res = $str;
	}

	return $res;
}


add_filter( 'plugin_action_links_' . plugin_basename(__FILE__) , 'ddw_genesis_layout_extras_settings_link' );
/**
 * Add "Settings" link to plugin page
 *
 * @since 1.0
 */
function ddw_genesis_layout_extras_settings_link( $links ) {

	$ddw_gle_settings_link = sprintf( '<a href="%s" title="%s">%s</a>' , admin_url( 'admin.php?page=gle-layout-extras' ) , __( 'Go to the settings page', GLE_DOMAIN ) , __( 'Settings', GLE_DOMAIN ) );
	
	array_unshift( $links, $ddw_gle_settings_link );

	return $links;

}


add_filter( 'plugin_row_meta', 'ddw_genesis_layout_extras_plugin_links', 10, 2 );
/**
 * Add various support links to plugin page
 *
 * @since 1.1
 */
function ddw_genesis_layout_extras_plugin_links( $gle_links, $gle_file ) {

	if ( !current_user_can( 'install_plugins' ) )
		return $gle_links;

	if ( $gle_file == GLE_PLUGIN_BASEDIR . '/genesis-layout-extras.php' ) {
		$gle_links[] = '<a href="http://wordpress.org/extend/plugins/genesis-layout-extras/faq/" target="_new" title="' . __( 'FAQ', GLE_DOMAIN ) . '">' . __( 'FAQ', GLE_DOMAIN ) . '</a>';
		$gle_links[] = '<a href="http://wordpress.org/tags/genesis-layout-extras?forum_id=10" target="_new" title="' . __( 'Support', GLE_DOMAIN ) . '">' . __( 'Support', GLE_DOMAIN ) . '</a>';
		$gle_links[] = '<a href="' . __( 'http://genesisthemes.de/en/donate/', GLE_DOMAIN ) . '" target="_new" title="' . __( 'Donate', GLE_DOMAIN ) . '">' . __( 'Donate', GLE_DOMAIN ) . '</a>';
	}

	return $gle_links;
}


/**
 * Add contextual help tab to options page - prior WordPress 3.3
 *
 * @since 1.0
 * @version 1.1
 */
function ddw_genesis_layout_extras_contextual_help( $contextual_help, $screen_id, $screen ) {
 
	ob_start();
 
	echo '<h3>' . __( 'Plugin: Genesis Layout Extras', GLE_DOMAIN ) . '</h3>';

	echo '<h4>' . __( 'What the Plugin Does', GLE_DOMAIN ) . '</h4>';
	echo '<p>' . __( 'This plugin for the Genesis Theme Framework allows modifying of default layouts for homepage, singular, archive, attachment, search and 404 pages via an options page under the Genesis menu. In addition you can also modify the default layout option for pages generated by the bbPress 2.x forum plugin and the AgentPress Listings plugin.', GLE_DOMAIN ) . '</p>';
 
	echo '<h4>' . __( 'FAQ - Frequently Asked Questions', GLE_DOMAIN ) . '</h4>';
	echo '<p>' . __( '<strong>Q.:</strong> <em>Some settings seem to have no effect at all, what happens here?</em><br /><strong>A.:</strong> This has to do with priorities. In general, if there is a template for a specific page (archive) type, for example <code>image.php</code> for image attachment display, then Genesis & WordPress will always use that first for the content output AS LONG AS there is an layout setting function or filter in there. Only if there are no templates with layout settings found, the layout option settings will take full effect. So, if our example <code>image.php</code> has a layout filter set in this then has the higher priority but if there is no layout filter in there then the layout setting of the plugin will take effect! - Well, if you experience such cases just leave these fields on "Genesis Default" and you are good to go :-).', GLE_DOMAIN ) . '</p>';
	echo '<p>' . sprintf( __( '<strong>Q.:</strong> <em>There is a layout option for the plugin AgentPress Listings post type. What does that mean?</em><br /><strong>A.:</strong> You just can set the layout option for the archive pages of the "listings" post type. - &mdash; Of course, the plugin (and so the setting here) could be used with the %3$sAgentPress child theme%4$s and also with any other Genesis child theme, so this setting might come in really handy ;-).', GLE_DOMAIN ), '<a href="http://deckerweb.de/go/agentpress-listings/" target="_new" title="Plugin: AgentPress Listings ...">', '</a>', '<a href="http://deckerweb.de/go/genesis-agentpress-child-theme/" target="_new" title="AgentPress Genesis Child Theme ...">', '</a>' ) . '</p>';
	echo '<p>' . __( '<strong>Q.:</strong> <em>What means Reset of settings?</em><br /><strong>A.:</strong> Actually it just restores the default layout setting which is always defined in regular layout settings on the Genesis Theme Settings page.', GLE_DOMAIN ) . '</p>';
	echo '<p>' . __( '<strong>Q.:</strong> <em>Which settings are effected when doing a reset?</em><br /><strong>A.:</strong> ALL available options <em>on this page</em> are resetted to their defaults! So if you only want to reset <em>one</em> option and leave all other as they are then only change this one section and then click the SAVE button and you are done.', GLE_DOMAIN ) . '</p>';
	echo '<p>' . __( '<strong>Q.:</strong> <em>With my child theme some of the layout options have no effect, what happens here?</em><br /><strong>A.:</strong> This is the case when a child theme does not support one or more specific layout options. For example: When a child has unregistered the layout option "Sidebar-Sidebar-Content" then the plugin setting of "Sidebar-Sidebar-Content" will have no effect at all. This is absolutely logical behavior because the plugin can only set options which are supported by the active child theme.', GLE_DOMAIN ) . '</p>';

	echo '<h4>' . __( 'Author - License - Donations - Support - Rating &amp; Tips', GLE_DOMAIN ) . '</h4>';
	echo '<p>&bull; ' . sprintf( __( '<strong>Author:</strong> David Decker of %1$sdeckerweb.de%2$s and %3$sGenesisThemes%4$s - Join me at %5$sTwitter%6$s, %7$sFacebook%8$s and %9$sGoogle Plus%10$s :-)', GLE_DOMAIN ), '<a href="http://deckerweb.de/" target="_new">', '</a>', '<a href="http://genesisthemes.de/en/" target="_new">', '</a>', '<a href="http://twitter.com/#!/deckerweb" target="_new" title="Twitter @deckerweb ...">', '</a>', '<a href="http://www.facebook.com/deckerweb.service" target="_new" title="deckerweb Facebook ...">', '</a>', '<a href="http://deckerweb.de/+" target="_new" title="deckerweb Google Plus ...">', '</a>' ) . '</p>';
	echo '<p>&bull; ' . sprintf( __( '<strong>License:</strong> GPL v2 - %1$sMore info on the GPL license ...%2$s', GLE_DOMAIN ), '<a href="http://www.opensource.org/licenses/gpl-license.php" target="_new" title="GPL ...">', '</a>' ) . '</p>';
	echo '<p>&bull; ' . sprintf( __( '<strong>Donations:</strong> Please %1$sdonate to support the further maintenance and development%2$s of the plugin. <em>Thank you in advance!</em>', GLE_DOMAIN ), '<a href="' . __( 'http://genesisthemes.de/en/donate/', GLE_DOMAIN ) . '" target="_new">', '</a>' ) . '</p>';
	echo '<p>&bull; ' . sprintf( __( '<strong>Support:</strong> Done via %1$sWordPress.org plugin page support forum%2$s. - Maybe I will setup my own support forum in the future, though.', GLE_DOMAIN ), '<a href="http://wordpress.org/tags/genesis-layout-extras?forum_id=10" target="_new" title="WordPress.org Plugin Support Forum ...">', '</a>' ) . '</p>';
	echo '<p>&bull; ' . sprintf( __( '<strong>Rating &amp; Tips:</strong> If you like the plugin please %1$srate at WordPress.org%2$s with 5 stars. <em>Thank you!</em> &mdash; %3$sMore plugins for Genesis by DECKERWEB%4$s', GLE_DOMAIN ), '<a href="http://wordpress.org/extend/plugins/genesis-layout-extras/" target="_new">', '</a>', '<a href="http://wordpress.org/extend/plugins/tags/deckerweb" target="_new" title="DECKERWEB Genesis Plugins ...">', '</a>' ) . '</p>';

	return ob_get_clean();
}

if ( version_compare( $wp_version, '3.2.1', '>' ) && isset( $_GET['page'] ) && $_GET['page'] == 'gle-layout-extras' ) {

	add_action( 'contextual_help', 'ddw_genesis_layout_extras_contextual_help', 10, 3 );

}


/**
 * Add help tabs to options page - for WordPress 3.3 and higher
 *
 * @since 1.2
 */
function ddw_genesis_layout_extras_help_tabs() {
	global $_gle_settings_pagehook;

	$screen = get_current_screen();

	if( !class_exists( 'WP_Screen' ) || !$screen || $screen->id != $_gle_settings_pagehook )
		return;

	if ( version_compare( $wp_version, '3.3', '<' ) && !empty( $old_help ) ) {
		$screen->add_help_tab( array(
			'id'      => 'old-contextual-help',
			'title'   => '',
			'content' => '',
		) );
	}

	$screen->add_help_tab(array(
		'id' => 'gle-usage',
		'title' => __( 'What the Plugin Does', GLE_DOMAIN ),
		'content' => ddw_genesis_layout_extras_help_tab_content( 'gle-usage' )
	) );
	$screen->add_help_tab(array(
		'id' => 'gle-faq',
		'title' => __( 'FAQ - Frequently Asked Questions', GLE_DOMAIN ),
		'content' => ddw_genesis_layout_extras_help_tab_content( 'gle-faq' )
	) );
	$screen->add_help_tab(array(
		'id' => 'gle-autor-license',
		'title' => __( 'Author - License', GLE_DOMAIN ),
		'content' => ddw_genesis_layout_extras_help_tab_content( 'gle-autor-license' )
	) );
	$screen->add_help_tab(array(
		'id' => 'gle-support-donation-rating-tips',
		'title' => __( 'Support - Donations - Rating &amp; Tips', GLE_DOMAIN ),
		'content' => ddw_genesis_layout_extras_help_tab_content( 'gle-support-donation-rating-tips' )
	) );

}
 
function ddw_genesis_layout_extras_help_tab_content( $tab = 'gle-usage' ) {
	if ( $tab == 'gle-usage' ) {

		ob_start();
			echo '<h3>' . __( 'Plugin: Genesis Layout Extras', GLE_DOMAIN ) . '</h3>';

			echo '<h4>' . __( 'What the Plugin Does', GLE_DOMAIN ) . '</h4>';
			echo '<p>' . __( 'This plugin for the Genesis Theme Framework allows modifying of default layouts for homepage, singular, archive, attachment, search and 404 pages via an options page under the Genesis menu. In addition you can also modify the default layout option for pages generated by the bbPress 2.x forum plugin and the AgentPress Listings plugin.', GLE_DOMAIN ) . '</p>';

		return ob_get_clean();

	} elseif ( $tab == 'gle-faq' ) {

		ob_start();
			echo '<h3>' . __( 'Plugin: Genesis Layout Extras', GLE_DOMAIN ) . '</h3>';

			echo '<h4>' . __( 'FAQ - Frequently Asked Questions', GLE_DOMAIN ) . '</h4>';
			echo '<p>' . __( '<strong>Q.:</strong> <em>Some settings seem to have no effect at all, what happens here?</em><br /><strong>A.:</strong> This has to do with priorities. In general, if there is a template for a specific page (archive) type, for example <code>image.php</code> for image attachment display, then Genesis & WordPress will always use that first for the content output AS LONG AS there is an layout setting function or filter in there. Only if there are no templates with layout settings found, the layout option settings will take full effect. So, if our example <code>image.php</code> has a layout filter set in this then has the higher priority but if there is no layout filter in there then the layout setting of the plugin will take effect! - Well, if you experience such cases just leave these fields on "Genesis Default" and you are good to go :-).', GLE_DOMAIN ) . '</p>';
			echo '<p>' . sprintf( __( '<strong>Q.:</strong> <em>There is a layout option for the plugin AgentPress Listings post type. What does that mean?</em><br /><strong>A.:</strong> You just can set the layout option for the archive pages of the "listings" post type. - &mdash; Of course, the plugin (and so the setting here) could be used with the %3$sAgentPress child theme%4$s and also with any other Genesis child theme, so this setting might come in really handy ;-).', GLE_DOMAIN ), '<a href="http://deckerweb.de/go/agentpress-listings/" target="_new" title="Plugin: AgentPress Listings ...">', '</a>', '<a href="http://deckerweb.de/go/genesis-agentpress-child-theme/" target="_new" title="AgentPress Genesis Child Theme ...">', '</a>' ) . '</p>';
			echo '<p>' . __( '<strong>Q.:</strong> <em>What means Reset of settings?</em><br /><strong>A.:</strong> Actually it just restores the default layout setting which is always defined in regular layout settings on the Genesis Theme Settings page.', GLE_DOMAIN ) . '</p>';
			echo '<p>' . __( '<strong>Q.:</strong> <em>Which settings are effected when doing a reset?</em><br /><strong>A.:</strong> ALL available options <em>on this page</em> are resetted to their defaults! So if you only want to reset <em>one</em> option and leave all other as they are then only change this one section and then click the SAVE button and you are done.', GLE_DOMAIN ) . '</p>';
			echo '<p>' . __( '<strong>Q.:</strong> <em>With my child theme some of the layout options have no effect, what happens here?</em><br /><strong>A.:</strong> This is the case when a child theme does not support one or more specific layout options. For example: When a child has unregistered the layout option "Sidebar-Sidebar-Content" then the plugin setting of "Sidebar-Sidebar-Content" will have no effect at all. This is absolutely logical behavior because the plugin can only set options which are supported by the active child theme.', GLE_DOMAIN ) . '</p>';

		return ob_get_clean();

	} elseif ( $tab == 'gle-autor-license' ) {

		ob_start();
			echo '<h3>' . __( 'Plugin: Genesis Layout Extras', GLE_DOMAIN ) . '</h3>';

			echo '<h4>' . __( 'Author - License', GLE_DOMAIN ) . '</h4>';
			echo '<p>&bull; ' . sprintf( __( '<strong>Author:</strong> David Decker of %1$sdeckerweb.de%2$s and %3$sGenesisThemes%4$s - Join me at %5$sTwitter%6$s, %7$sFacebook%8$s and %9$sGoogle Plus%10$s :-)', GLE_DOMAIN ), '<a href="http://deckerweb.de/" target="_new">', '</a>', '<a href="http://genesisthemes.de/en/" target="_new">', '</a>', '<a href="http://twitter.com/#!/deckerweb" target="_new" title="Twitter @deckerweb ...">', '</a>', '<a href="http://www.facebook.com/deckerweb.service" target="_new" title="deckerweb Facebook ...">', '</a>', '<a href="http://deckerweb.de/+" target="_new" title="deckerweb Google Plus ...">', '</a>' ) . '</p>';
	echo '<p>&bull; ' . sprintf( __( '<strong>License:</strong> GPL v2 - %1$sMore info on the GPL license ...%2$s', GLE_DOMAIN ), '<a href="http://www.opensource.org/licenses/gpl-license.php" target="_new" title="GPL ...">', '</a>' ) . '</p>';

		return ob_get_clean();

	} elseif ( $tab == 'gle-support-donation-rating-tips' ) {

		ob_start();
			echo '<h3>' . __( 'Plugin: Genesis Layout Extras', GLE_DOMAIN ) . '</h3>';

			echo '<h4>' . __( 'Support - Donations - Rating &amp; Tips', GLE_DOMAIN ) . '</h4>';
			echo '<p>&bull; ' . sprintf( __( '<strong>Donations:</strong> Please %1$sdonate to support the further maintenance and development%2$s of the plugin. <em>Thank you in advance!</em>', GLE_DOMAIN ), '<a href="' . __( 'http://genesisthemes.de/en/donate/', GLE_DOMAIN ) . '" target="_new">', '</a>' ) . '</p>';
			echo '<p>&bull; ' . sprintf( __( '<strong>Support:</strong> Done via %1$sWordPress.org plugin page support forum%2$s. - Maybe I will setup my own support forum in the future, though.', GLE_DOMAIN ), '<a href="http://wordpress.org/tags/genesis-layout-extras?forum_id=10" target="_new" title="WordPress.org Plugin Support Forum ...">', '</a>' ) . '</p>';
			echo '<p>&bull; ' . sprintf( __( '<strong>Rating &amp; Tips:</strong> If you like the plugin please %1$srate at WordPress.org%2$s with 5 stars. <em>Thank you!</em> &mdash; %3$sMore plugins for Genesis by DECKERWEB%4$s', GLE_DOMAIN ), '<a href="http://wordpress.org/extend/plugins/genesis-layout-extras/" target="_new">', '</a>', '<a href="http://wordpress.org/extend/plugins/tags/deckerweb" target="_new" title="DECKERWEB Genesis Plugins ...">', '</a>' ) . '</p>';

		return ob_get_clean();

	}

}


/**
 * Return the defaults array
 *
 * @since 1.0
 * @version 1.1
 */
function ddw_genesis_layout_extras_defaults() {

	$options = array(
		'ddw_genesis_layout_home' => '',
		'ddw_genesis_layout_search' => '',
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
		'ddw_genesis_layout_bbpress' => ''
	);

	return apply_filters( 'ddw_genesis_layout_extras_settings_defaults', $options );

}


add_action( 'genesis_settings_sanitizer_init', 'ddw_genesis_layout_extras_sanitization' );
/**
 * Add settings to Genesis sanitization
 *
 * @since 1.0
 * @version 1.1
 */
function ddw_genesis_layout_extras_sanitization() {

	genesis_add_option_filter( 'no_html', GLE_SETTINGS_FIELD,
		array(
			'ddw_genesis_layout_home',
			'ddw_genesis_layout_search',
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
			'ddw_genesis_layout_bbpress'
		) );

}


add_action( 'admin_init', 'ddw_genesis_layout_extras_register_settings' );
/**
 * Register the settings field
 *
 * @since 1.0
 * @version 1.1
 */
function ddw_genesis_layout_extras_register_settings() {

	// Register settings field
	register_setting( GLE_SETTINGS_FIELD, GLE_SETTINGS_FIELD );

	// Add the defaults to this settings field
	add_option( GLE_SETTINGS_FIELD, ddw_genesis_layout_extras_defaults() );
 
	// Add Reset functionality to settings field
	if ( function_exists ( 'genesis_get_option' ) && genesis_get_option( 'reset', GLE_SETTINGS_FIELD ) ) {
		update_option( GLE_SETTINGS_FIELD, ddw_genesis_layout_extras_defaults() );
		genesis_admin_redirect( 'gle-layout-extras', array( 'reset' => 'true' ) );
		exit;
	}

}


add_action( 'admin_notices', 'ddw_genesis_layout_extras_notices' );
/**
 * Admin notices when successfully saving or resetting settings
 *
 * @since 1.0
 */
function ddw_genesis_layout_extras_notices() {

	if ( ! isset( $_REQUEST['page'] ) || $_REQUEST['page'] != 'gle-layout-extras' )
		return;

	if ( isset( $_REQUEST['reset'] ) && 'true' == $_REQUEST['reset'] )
		echo '<div id="message" class="updated"><p><strong>' . __( 'ALL extra layout settings were reset to their Genesis default option.', GLE_DOMAIN ) . '</strong></p></div>';
	elseif ( isset( $_REQUEST['settings-updated'] ) && $_REQUEST['settings-updated'] == 'true' )
		echo '<div id="message" class="updated"><p><strong>' . __( 'The extra layout settings have been saved successfully.', GLE_DOMAIN ) . '</strong></p></div>';

}


add_action( 'admin_menu', 'ddw_genesis_layout_extras_theme_settings_init', 15 );
/**
 * This is a necessary go-between to get our scripts and boxes loaded
 * on the theme settings page only, and not the rest of the admin
 *
 * @since 1.0
 */
function ddw_genesis_layout_extras_theme_settings_init() {

	global $_gle_settings_pagehook;

	// Add "Layout Extras" submenu
	$_gle_settings_pagehook = add_submenu_page( 'genesis', __('Genesis Layout Extras', GLE_DOMAIN ), __( 'Layout Extras', GLE_DOMAIN ), 'manage_options', 'gle-layout-extras', 'ddw_genesis_layout_extras_settings_admin');

	// Load scripts and metaboxes
	add_action( 'load-'.$_gle_settings_pagehook, 'ddw_genesis_layout_extras_theme_settings_scripts' );
	add_action( 'load-'.$_gle_settings_pagehook, 'ddw_genesis_layout_extras_theme_settings_boxes' );

	// Load help tabs for WordPress 3.3 and higher
	add_action( 'load-'.$_gle_settings_pagehook, 'ddw_genesis_layout_extras_help_tabs' );
} 


/**
 * Loads scripts used in options page
 *
 * @since 1.0
 */
function ddw_genesis_layout_extras_theme_settings_scripts() {
	wp_enqueue_script( 'common' );
	wp_enqueue_script( 'wp-lists' );
	wp_enqueue_script( 'postbox' );
}


/**
 * Add meta box to options page
 *
 * @since 0.1
 * @version 1.1
 */
function ddw_genesis_layout_extras_theme_settings_boxes() {

	// Add meta box and its title
	global $_gle_settings_pagehook;

	add_meta_box( 'genesis-layout-extras-box', __( 'Genesis Layout Extras', GLE_DOMAIN ), 'ddw_genesis_layout_extras_box', $_gle_settings_pagehook, 'column1' );
}

	// Setting up the setting fields & labels
	function ddw_genesis_layout_extras_box() {

		// Description - user info
		echo '<p><span class="description">' . sprintf( __( 'Here you can set up a <strong>default</strong> layout option for various extra archive pages and other special pages. %1$sGenesis Default%2$s in the drop-down menus below always means the chosen default layout option in the regular <a href="%3$s">Genesis layout settings</a>.', GLE_DOMAIN ), '<code style="font-style: normal; color: #333;">', '</code>', admin_url( 'admin.php?page=genesis#genesis-theme-settings-layout' ) ) . '</span></p>';

		echo '<hr class="div" />';

		// Special sections
		echo '<h4>' . __( 'Special Sections', GLE_DOMAIN ) . '</h4>';

			ddw_genesis_layout_extras_option( __( 'Hompage Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_home' );

				echo '<p><span class="description">' . sprintf( __( 'This setting works for homepage templates (file %1$shome.php%2$s is there - %1$sis_home()%2$s) <u>and</u> also for static pages as front page (%1$sis_front_page()%2$s).', GLE_DOMAIN ), '<code style="font-style: normal; color: #333;">', '</code>' ) . '</span></p>';

			ddw_genesis_layout_extras_option( __( 'Search Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_search' );
			ddw_genesis_layout_extras_option( __( '404 Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_404' );

			echo '<hr class="div" />';

		// Singular pages
		echo '<h4>' . __( 'Singular Pages', GLE_DOMAIN ) . '</h4>';

			ddw_genesis_layout_extras_option( __( 'Post Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_post' );
			ddw_genesis_layout_extras_option( __( 'Page Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_page' );
			ddw_genesis_layout_extras_option( __( 'Attachment Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_attachment' );

			echo '<hr class="div" />';

		// Archive sections
		echo '<h4>' . __( 'Archive Sections', GLE_DOMAIN ) . '</h4>';

			ddw_genesis_layout_extras_option( __( 'Author Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_author' );
			ddw_genesis_layout_extras_option( __( 'Date Archive Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_date' );

				echo '<p><span class="description">' . sprintf( __( 'This is the general setting for date archives and overwrites the following three settings (Year, Month, Day)! So, if you setup any of the following three settings then let this one here on %1$sGenesis Default%2$s.', GLE_DOMAIN ), '<code style="font-style: normal; color: #333;">', '</code>' ) . '</span></p>';

			ddw_genesis_layout_extras_option( '&middot; ' . __( 'Date Archive - Year Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_date_year' );
			ddw_genesis_layout_extras_option( '&middot; ' . __( 'Date Archive - Month Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_date_month' );
			ddw_genesis_layout_extras_option( '&middot; ' . __( 'Date Archive - Day Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_date_day' );
			ddw_genesis_layout_extras_option( __( 'Category Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_category' );
			ddw_genesis_layout_extras_option( __( 'Tag Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_tag' );
			ddw_genesis_layout_extras_option( __( 'Taxonomy Page Layout: ', GLE_DOMAIN ), 'ddw_genesis_layout_taxonomy' );

			echo '<hr class="div" />';

		// Special Custom Post Type sections
		echo '<h4>' . __( 'Special Custom Post Type Sections', GLE_DOMAIN ) . '</h4>';

			ddw_genesis_layout_extras_option( __( 'AgentPress Listing Post Type Layout (archive): ', GLE_DOMAIN ), 'ddw_genesis_layout_cpt_apl_listing' );

			echo '<p><span class="description">' . sprintf( __( 'For this setting to take any effect the %1$splugin <em>AgentPress Listings</em>%2$s needs to be installed first. &mdash; Of course, the plugin (and so the setting here) could be used with the %3$sAgentPress child theme%4$s and also with any other Genesis child theme, so this setting might come in really handy ;-).', GLE_DOMAIN ), '<a href="http://deckerweb.de/go/agentpress-listings/" target="_new" title="Plugin: AgentPress Listings ...">', '</a>', '<a href="http://deckerweb.de/go/genesis-agentpress-child-theme/" target="_new" title="AgentPress Genesis Child Theme ...">', '</a>' ) . '</span></p>';

			echo '<hr class="div" />';

		// bbPress 2.x Forum section
		echo '<h4>' . __( 'Plugin: bbPress 2.x Forum Section', GLE_DOMAIN ) . '</h4>';

			ddw_genesis_layout_extras_option( __( 'bbPress 2.x Forum Layout (all areas): ', GLE_DOMAIN ), 'ddw_genesis_layout_bbpress' );

			echo '<p><span class="description">' . sprintf( __( 'For this setting to take any effect the %1$splugin <em>bbPress 2.x</em>%2$s needs to be installed first.', GLE_DOMAIN ), '<a href="http://wordpress.org/extend/plugins/bbpress/" target="_new" title="Plugin: bbPress 2.x Forum ...">', '</a>' ) . '</span></p>';

	}

	// Setting up the drop-down menus
	function ddw_genesis_layout_extras_option( $title, $option ) { ?>

		<p><?php echo $title; ?>
		<select name="<?php echo GLE_SETTINGS_FIELD; ?>[<?php echo $option; ?>]">
			<option style="padding-right:10px;" value="" <?php selected( '', genesis_get_option( $option, GLE_SETTINGS_FIELD ) ); ?>><?php _e( 'Genesis Default', GLE_DOMAIN ); ?></option>
			<option style="padding-right: 10px; background-color: #eee;" value="content-sidebar" <?php selected( 'content-sidebar', genesis_get_option( $option, GLE_SETTINGS_FIELD ) ); ?>><?php _e( 'Content-Sidebar', GLE_DOMAIN); ?></option>
			<option style="padding-right: 10px; background-color: #eee;" value="sidebar-content" <?php selected( 'sidebar-content', genesis_get_option( $option, GLE_SETTINGS_FIELD ) ); ?>><?php _e( 'Sidebar-Content', GLE_DOMAIN ); ?></option>
			<option style="padding-right: 10px; background-color: #fafafa;" value="content-sidebar-sidebar" <?php selected( 'content-sidebar-sidebar', genesis_get_option( $option, GLE_SETTINGS_FIELD ) ); ?>><?php _e( 'Content-Sidebar-Sidebar', GLE_DOMAIN ); ?></option>
			<option style="padding-right: 10px; background-color: #fafafa;" value="sidebar-sidebar-content" <?php selected( 'sidebar-sidebar-content', genesis_get_option( $option, GLE_SETTINGS_FIELD ) ); ?>><?php _e( 'Sidebar-Sidebar-Content', GLE_DOMAIN ); ?></option>
			<option style="padding-right: 10px; background-color: #fafafa;" value="sidebar-content-sidebar" <?php selected( 'sidebar-content-sidebar', genesis_get_option( $option, GLE_SETTINGS_FIELD ) ); ?>><?php _e( 'Sidebar-Content-Sidebar', GLE_DOMAIN ); ?></option>
			<option style="padding-right: 10px; background-color: #ddd;" value="full-width-content" <?php selected( 'full-width-content', genesis_get_option( $option, GLE_SETTINGS_FIELD ) ); ?>><?php _e( 'Full Width Content', GLE_DOMAIN ); ?></option>
		</select></p>

		<?php

	}

add_filter( 'genesis_pre_get_option_site_layout', 'ddw_genesis_layout_extras_filter', 101 );
/**
 * Manage Genesis layouts for extra sections
 *
 * @uses filter: genesis_pre_get_option_site_layout
 * @since 0.1
 * @version 1.1
 */
function ddw_genesis_layout_extras_filter( $opt ) {

	if ( is_home() || is_front_page() && genesis_get_option( 'ddw_genesis_layout_home', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_home', GLE_SETTINGS_FIELD );

	elseif ( is_404() && genesis_get_option( 'ddw_genesis_layout_404', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_404', GLE_SETTINGS_FIELD );

	elseif ( is_search() && genesis_get_option('ddw_genesis_layout_search', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_search', GLE_SETTINGS_FIELD );

	elseif ( is_date() && genesis_get_option( 'ddw_genesis_layout_date', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_date', GLE_SETTINGS_FIELD );

	elseif ( is_year() && genesis_get_option( 'ddw_genesis_layout_date_year', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_date_year', GLE_SETTINGS_FIELD );

	elseif ( is_month() && genesis_get_option( 'ddw_genesis_layout_date_month', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_date_month', GLE_SETTINGS_FIELD );

	elseif ( is_day() && genesis_get_option( 'ddw_genesis_layout_date_day', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_date_day', GLE_SETTINGS_FIELD );

	elseif ( is_author() && genesis_get_option( 'ddw_genesis_layout_author', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_author', GLE_SETTINGS_FIELD );

	elseif ( is_category() && genesis_get_option( 'ddw_genesis_layout_category', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_category', GLE_SETTINGS_FIELD );

	elseif ( is_tag() && genesis_get_option( 'ddw_genesis_layout_tag', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_tag', GLE_SETTINGS_FIELD );

	elseif ( is_tax() && genesis_get_option( 'ddw_genesis_layout_taxonomy', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_taxonomy', GLE_SETTINGS_FIELD );

	elseif ( is_single() && genesis_get_option( 'ddw_genesis_layout_post', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_post', GLE_SETTINGS_FIELD );

	elseif ( is_page() && genesis_get_option( 'ddw_genesis_layout_page', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_page', GLE_SETTINGS_FIELD );

	elseif ( is_attachment() && genesis_get_option( 'ddw_genesis_layout_attachment', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_attachment', GLE_SETTINGS_FIELD );

	elseif ( is_post_type_archive( 'listing' ) && genesis_get_option( 'ddw_genesis_layout_cpt_apl_listing', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_cpt_apl_listing', GLE_SETTINGS_FIELD );

	return $opt;

}

add_filter( 'bbp_genesis_force_full_content_width', 'ddw_genesis_layout_extras_bbpress_filter', 101 );
/**
 * Manage Genesis layouts for bbPress 2.x Forum section (plugin)
 *
 * @uses filter: bbp_genesis_force_full_content_width
 * @since 1.0
 */
function ddw_genesis_layout_extras_bbpress_filter( $opt ) {

	if ( is_bbpress() && genesis_get_option( 'ddw_genesis_layout_bbpress', GLE_SETTINGS_FIELD ) )
		$opt = genesis_get_option( 'ddw_genesis_layout_bbpress', GLE_SETTINGS_FIELD );

	return $opt;

}


add_filter( 'screen_layout_columns', 'ddw_genesis_layout_extras_settings_layout_columns', 10, 2 );
/**
 * Setting 1 column for meta box
 *
 * @since 1.0
 */
function ddw_genesis_layout_extras_settings_layout_columns( $columns, $screen ) {

	global $_gle_settings_pagehook;

	if ( $screen == $_gle_settings_pagehook ) {

		// This page should have 1 column option
		$columns[$_gle_settings_pagehook] = 1;

	}

	return $columns;

}


/**
 * This function is what actually gets output to the page. It handles the markup,
 * builds the form, outputs necessary JS stuff, and fires <code>do_meta_boxes()</code>
 *
 * @since 1.0
 */
function ddw_genesis_layout_extras_settings_admin() {
		global $_gle_settings_pagehook, $screen_layout_columns;

		$width = "width: 99%;";
		$hide2 = $hide3 = " display: none;";
?>
		<div id="gs" class="wrap genesis-metaboxes">
		<form method="post" action="options.php">

			<?php wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false ); ?>
			<?php wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false ); ?>
			<?php settings_fields( GLE_SETTINGS_FIELD );  // important!  ?>

			<?php screen_icon( 'themes' ); ?>
			<h2>
				<?php _e( 'Genesis - Layout Extras', GLE_DOMAIN ); ?>
			</h2>

			<div class="bottom-buttons"><br />
				<input type="submit" class="button-primary genesis-h2-button" value="<?php _e( 'Save Settings', GLE_DOMAIN ) ?>" />
				<input type="submit" class="button-highlighted genesis-h2-button" name="<?php echo GLE_SETTINGS_FIELD; ?>[reset]" value="<?php _e( 'Reset Settings', GLE_DOMAIN ); ?>" onclick="return genesis_confirm('<?php echo esc_js( __( 'Are you sure you want to reset? - When resetting, ALL extra layout settings will be set to their Genesis default option!', GLE_DOMAIN ) ); ?>');" />
			</div><!-- .bottom-buttons -->

			<div class="metabox-holder">
				<div class="postbox-container" style="<?php echo $width; ?>">
					<?php do_meta_boxes( $_gle_settings_pagehook, 'column1', null ); ?>
				</div>
			</div>

			<div class="bottom-buttons">
				<input type="submit" class="button-primary" value="<?php _e('Save Settings', GLE_DOMAIN ) ?>" />
				<input type="submit" class="button-highlighted" name="<?php echo GLE_SETTINGS_FIELD; ?>[reset]" value="<?php _e( 'Reset Settings', GLE_DOMAIN ); ?>" onclick="return genesis_confirm('<?php echo esc_js( __( 'Are you sure you want to reset? - When resetting, ALL extra layout settings will be set to their Genesis default option!', GLE_DOMAIN ) ); ?>');" />
			</div><!-- .bottom-buttons -->

		</form>
		</div>
		<script type="text/javascript">
			//<![CDATA[
			jQuery(document).ready( function($) {
				// close postboxes that should be closed
				$( '.if-js-closed' ).removeClass( 'if-js-closed' ).addClass( 'closed' );
				// postboxes setup
				postboxes.add_postbox_toggles( '<?php echo $_gle_settings_pagehook; ?>' );
			});
			//]]>
		</script>

<?php
}
