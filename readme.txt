=== Genesis Layout Extras ===
Contributors: daveshine
Donate link: http://genesisthemes.de/en/donate/
Tags: genesis, genesiswp, genesis framework, layout, layouts, layout manager, post, page, singular, attachment, search, taxonomoy, 404 error, 404 page, bbPress, CPT, AgentPress Listings, agentpress, deckerweb
Requires at least: 3.2
Tested up to: 3.3-aortic-dissection
Stable tag: 1.0

This plugin for Genesis Framework allows modifying of default layouts for homepage, various archive, attachment, search, 404 pages via theme options.

== Description ==

With this plugin for the popular Genesis Framework you can very easily modify the default layouts for homepage, singular pages (for posts and pages), various archive sections, author pages, attachment pages, search results pages, the 404 page - all done via a new theme options page. Just look for it at the submenu: Genesis > "Layout Extras".

As a smart bonus the plugin also includes the layout setting for the new bbPress 2.0 forum plugin which itself is compatible to Genesis. Also added is the layout setting for the plugin "AgentPress Listings" which includes the custom post type "listings".

= Included Sections for a Default Layout Setting =
* Home Page
* Search Page
* 404 Page
* "Post" Page
* "Page" Page
* Attachment Page (singluar attachment view)
* Author Page
* Date Archive Page
* Category Page
* Tag Page
* Taxonomy Page
* Plugin: AgentPress Listings (Custom Post Type "listing")
* Plugin: bbPress 2.0 Forum

= Localization =
* English (default) - always included
* German - always included
* Your translation? - [Just send it in](http://genesisthemes.de/en/contact/)

**Please note: The plugin requires the [Genesis Theme Framework](http://deckerweb.de/go/genesis/)** (aff link)

Credit where credit is due: This plugin here is based on the work of WPChildThemes for the great "Genesis Layout Manager" Plugin.

[A plugin from deckerweb.de and GenesisThemes](http://genesisthemes.de/en/)

* [*GenesisFinder* - Find then create. Your Genesis Framework Search Engine.](http://genesisfinder.com/)
* Please support me by [following on Twitter](http://twitter.com/#!/deckerweb) and [my Facebook page](http://www.facebook.com/deckerweb.service) - Thank you! ;-)
* [Also see my other plugins](http://genesisthemes.de/en/wp-plugins/) or see [my WordPress.org profile page](http://profiles.wordpress.org/users/daveshine/)

== Installation ==

1. Upload the entire `genesis-layout-extras` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. In your Genesis Theme Setting menu go to "Layout Extras" setup your default layouts and you're good to go :).

== Frequently Asked Questions ==

= With my child theme some of the layout options have no effect, what happens here? =
This is the case when a child theme doesn't support one or more specific layout options. For example: When a child has unregistered the layout option "Sidebar-Sidebar-Content" then the plugin setting of "Sidebar-Sidebar-Content" will have no effect at all. This is absolutely logical behavior because the plugin can only set options which are supported by the active child theme. (You can call that a limitation of the plugin or whatever but that's the behavior as of now. You could change your child theme or just re-register the specific layout option you want in your child theme.)

= What means Reset of settings? =
Actually it just restores the default layout setting which is always defined in regular layout settings on the Genesis Theme Settings page.

= Which settings are effected when doing a reset? =
ALL available options are resetted to their defaults!
So if you only want to reset one option and leave all other as they are then only change this one section and then click the SAVE button and you're done.

== Screenshots ==

1. Genesis Layout Extras options page
2. Contextual help tab open

== Changelog ==

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

= 1.0 =
All changed - Actually a whole new plugin, updated all over the place. Also the plugin name and authorship changed.

= 0.1 =
First (and to date only) release under former plugin name and by former plugin author.

== Translations ==

* English - default, always included
* German: Deutsch - immer dabei! [Download auch via deckerweb.de](http://deckerweb.de/material/sprachdateien/genesis-plugins/#genesis-layout-extras)

== Other Info ==
**Security:** The plugin uses the Genesis Sanitization class for checking and filtering all custom inputs. Further, the plugin uses WordPress and Genesis Framework APIs and coding standards to the highest possible extend. Just to make sure you get a quality, future-proof product.
