=== Genesis Layout Extras ===
Contributors: daveshine
Donate link: http://genesisthemes.de/en/donate/
Tags: genesis, genesiswp, genesis framework, layout, layouts, layout manager, post, page, singular, attachment, search, taxonomoy, 404 error, 404 page, bbPress, CPT, AgentPress Listings, agentpress, deckerweb
Requires at least: 3.2
Tested up to: 3.3
Stable tag: 1.2

This plugin for Genesis Framework allows modifying of default layouts for homepage, various archive, attachment, search, 404 pages via theme options.

== Description ==

With this plugin for the popular Genesis Framework you can very easily modify the default layouts for homepage, singular pages (for posts and pages), various archive sections, author pages, attachment pages, search results pages, the 404 page - all done via a new theme options page. Just look for it at the submenu: Genesis > "Layout Extras".

As a smart bonus the plugin also includes the layout setting for the new bbPress 2.x forum plugin which itself is compatible to Genesis. Also added is the layout setting for the plugin "AgentPress Listings" which includes the custom post type "listings".

= Included Sections for a Default Layout Setting =
* Home Page (works with home.php or static page as front page)
* Search Page
* 404 Page
* "Post" Page (singular post views)
* "Page" Page (singular page views)
* Attachment Page (singluar attachment view)
* Author Page
* Date Archive Page (optional with setting for Year, Month, Day)
* Category Page
* Tag Page
* Taxonomy Page
* Plugin: AgentPress Listings (Archive Page for Custom Post Type "listing")
* Plugin: bbPress 2.x Forum (all areas)

= Localization =
* English (default) - always included
* German - always included
* Italian - user-submitted, thanks to [Marco Rosselli](http://www.prenotazionetraghetti.com/)
* .pot file (`genesis-layout-extras.pot`) for translators is also always included :)
* Your translation? - [Just send it in](http://genesisthemes.de/en/contact/)

**Please note: The plugin requires the Genesis Theme Framework**
The plugin has been tested with WordPress 3.2, 3.3 without any issues. It also works within Multisite installs - single activated and also network activated. Running with latest versions of Genesis and WordPress is always recommended.

Credit where credit is due: This plugin here is based on the work of WPChildThemes for the great "Genesis Layout Manager" Plugin.

[A plugin from deckerweb.de and GenesisThemes](http://genesisthemes.de/en/)

* [*GenesisFinder* - Find then create. Your Genesis Framework Search Engine.](http://genesisfinder.com/)
* Please support me by [following on Twitter](http://twitter.com/#!/deckerweb) and [my Facebook page](http://www.facebook.com/deckerweb.service) - Thank you! ;-)
* [Also see my other plugins](http://genesisthemes.de/en/wp-plugins/) or see [my WordPress.org profile page](http://profiles.wordpress.org/users/daveshine/)

== Installation ==

1. Upload the entire `genesis-layout-extras` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. In your Genesis Theme Setting menu go to "Layout Extras" setup your default layouts and you're good to go :).
4. General usage: Set layout options DIFFERENT from the Genesis default for special sections.

= Choose from one of the following layouts =
* Genesis Default (your default setting from Genesis Theme settings)
* Content-Sidebar
* Sidebar-Content
* Content-Sidebar-Sidebar
* Sidebar-Sidebar-Content
* Sidebar-Content-Sidebar
* Full Width Content

Note: This plugin has been tested with WordPress 3.2, 3.3 without any issues. It also works within Multisite installs - single activated and network activated, too. Remember, running with latest versions of Genesis and WordPress is always recommended.

== Frequently Asked Questions ==

= You can modify the layout of the plugin's AgentPress Listings post type. What does this mean? =
Nothing spectacular, you just can set the layout option for the archive pages of the "listings" post type. - Of course, the plugin (and so the setting in there) could be used with the AgentPress child theme and also with any other Genesis child theme, so this setting might come in really handy ;-).

= I noticed that some settings have no effect at all, what happens here? =
This has to do with priorities. In general, if there's a template for a specific page (archive) type, for example `image.php` for image attachment display, then Genesis & WordPress will always use that first for the content output AS LONG AS there's an layout setting function or filter in there. Only if there are no templates with layout settings found, the layout option settings will take full effect. So, if our example `image.php` has a layout filter set in this then has the higher priority but if there's no layout filter in there then the plugin's layout setting will take effect! - Well, if you experience such cases just leave these fields on "Genesis Default" and you're good to go :-). (You might call that a limitation of the plugin or whatever but that's the intended behavior of WordPress & Genesis.)

= With my child theme some of the layout options have no effect, what happens here? =
This is the case when a child theme doesn't support one or more specific layout options. For example: When a child has unregistered the layout option "Sidebar-Sidebar-Content" then the plugin setting of "Sidebar-Sidebar-Content" will have no effect at all. This is absolutely logical behavior because the plugin can only set options which are supported by the active child theme. (You can call that a limitation of the plugin or whatever but that's the behavior as of now. You could change your child theme or just re-register the specific layout option you want in your child theme.)

= What means Reset of settings? =
Actually it just restores the default layout setting which is always defined in regular layout settings on the Genesis Theme Settings page.

= Which settings are effected when doing a reset? =
**ALL** available options are resetted to their defaults!
So if you for example only want to reset *one* option and leave all other as they are then only change this one section and then click the SAVE button and you're done.

== Screenshots ==

1. Genesis Layout Extras options page
2. Contextual help tab open

== Changelog ==

= 1.2 =
* Added new help tab system for WordPress 3.3 -- this time the plugin is also still compatible with old contextual help prior WP 3.3 but PLEASE NOT that I will remove this soon and then the plugin will require WordPress 3.3+ so please update now your WordPress installation!
* Bugfix: Wrapped conditional around `genesis_get_option` function to allow error-free theme changing (from Genesis to a non-Genesis theme) -- Please note: this also fixes the Multisite errors when plugin is network activated! -- Props to WP.org user "greghile" for reporting the Multisite issue!
* Minor code and code documentation improvements
* Wording: Changed strings "bbPress 2.0" to "bbPress 2.x" to reflect ongoing development & releases of that forum plugin
* Added new Italian translation by [Marco Rosselli](http://www.prenotazionetraghetti.com/)
* Updated German translation files
* Updated included .pot file (`genesis-layout-extras.pot`) for translators
* Added banner image on WordPress.org for better plugin branding :)

= 1.1 =
* Improved homepage layout setting with adding the conditional statement `is_front_page()` so also static pages set as homepage (in WordPress: Settings > Reading) are now supported!
* Added new specific date layout options for Year, Month, Day - please note, that the general date setting will overwrite the other three settings (these have lower priority) - so, when in doubt, only use the general setting or leave on default
* Updated help texts where needed
* Added new user questions to FAQ section here
* Updated German translation files
* Updated included .pot file (`genesis-layout-extras.pot`) for translators
* Some more minor code tweaks and cosmetic changes :)

= 1.0 =
* New and forked version of the plugin under new name and authorship by David Decker of deckerweb.de and GenesisThemes
* Updated, improved and documented code
* Added separate options page under the Genesis menu - no longer hooking in to regular Genesis settings - this is more user friendly and less confusing (See Genesis > Layout Extras)
* Added new layout options for attachment page, bbPress Forum and AgentPress Listing custom post type
* Added contextual help - tab on the top right corner of the options page
* Added settings link to the plugin page section
* Fully localized the plugin, working out of the box!
* Added German translations (English included by default)
* Improved and documented plugin code
* Tested & proved compatibility with WordPress 3.3-aortic-dissection :-)

= 0.1 =
* First release (former author "WPChildThemes")

== Upgrade Notice ==

= 1.2 =
Several changes - Bugfix regarding theme changes and Multisite installs. Updated help system to fit better into WordPress 3.3. Added Italian translation. Other minor tweaks and improvements. Also updated German translations and .pot file for all translators.

= 1.1 =
Several changes - Enhanced homepage and date archive settings, improved info, help and documentation texts (contextual help and plugin's readme.txt).

= 1.0 =
All changed - Actually a whole new plugin, updated all over the place. Also the plugin name and authorship changed.

= 0.1 =
First (and to date only) release under former plugin name and by former plugin author.

== Translations ==

* English - default, always included
* German: Deutsch - immer dabei! [Download auch via deckerweb.de](http://deckerweb.de/material/sprachdateien/genesis-plugins/#genesis-layout-extras)
* Italian: Italiano - user-submitted by [Marco Rosselli](http://www.prenotazionetraghetti.com/)

== Additional Info ==
**Security:** The plugin uses the Genesis Sanitization class for checking and filtering all custom inputs. Further, the plugin uses WordPress and Genesis Framework APIs and coding standards to the highest possible extend. Just to make sure you get a quality, future-proof product.

**Idea Behind / Philosophy:** I had liked the general approach of the former plugin (I forked from) - which provided a simple and great way to set a few needed options. Since it seemed no longer to be developed and updated I just decided to make a fork of it and add some additional functionality like setting the layout setting for the (awesome!) bbPress 2.x forum plugin in Genesis. And, I wanted this all on an extra options page, divided from the general Genesis settings because that is much more user friendly IMHO. In addition I added full inline documentation including the contextual help function provided by WordPress itself to create a more seamless user experience.
