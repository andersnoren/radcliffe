=== Eksell ===
Contributors: Anlino
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=anders%40andersnoren%2ese&lc=US&item_name=Free%20WordPress%20Themes%20from%20Anders%20Noren&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 4.5
Requires PHP: 5.4
Tested up to: 5.7.1
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


== Installation ==

1. Upload the theme
2. Activate the theme

All theme specific options are handled through the WordPress Customizer.


== Licenses ==

Open Sans
License: SIL Open Font License, 1.1 
Source: https://fonts.google.com/specimen/Open+Sans

Crimson Text
License: SIL Open Font License, 1.1 
Source: https://fonts.google.com/specimen/Crimson+Text

Abril Fatface
License: SIL Open Font License, 1.1 
Source: https://fonts.google.com/specimen/Abril+Fatface

FontAwesome
License: SIL Open Font License, 1.1 
Source: https://fontawesome.io

screenshot.png post images
License: CC0 Public Domain 
Source: http://www.unsplash.com


== Changelog ==

Version 2.0.0 (2020-12-XX)
-------------------------
- Fixed border radius of sub menu item when it's the only child.
- Made the main menu sub menus accessible with keyboard navigation.
- Removed global removal of focus outline.
- Reworked the CSS reset to inherit instead of unset, and use more browser default styles.
- Made links underlined by default.
- General CSS cleanup.
- Removed all title attributes, changed to screen-reader-text where appropriate.
- Made most of the old post-content styles global, and moved them to the new Element Base CSS section.
- Only output custom accent color CSS if the accent color is different from the default color.
- Cleaned up structure of the Customizer code, and moved it to its own class.
- Removed the languages folder.
- Moved the js and images folder to the new /assets/ folder, and created a new /css/ folder for the editor styles.
- Add support for the Core custom logo feature, and only output the radcliffe_logo Customizer fields if they already have a value.
- Simplified the archive header in index.php, and added output of archive description instead of tag description.
- Flexed the site header.
- Deleted license.txt.
- Merged page.php‚ single.php and image.php into singular.php.
- Converted the theme screenshot to JPG, reducing file size.
- Removed searchform.php, adapted styles to the default search form instead. Added a get_search_form filter to include the placeholder attribute.
- Replaced the mobile nav search form with the default search form and updated styles.
- Reduced footprint in template-archive.php by including singular.php and moving the markup output to an action.
- Added filters for get_the_archive_title/_description to make it work for search as well.
- Removed admin CSS output for the featured image, since it hasn't been needed for a long time.
- Cleaned up functions.php.
- Removed all 1X icons, added use of 2X icons by default, and compressed all icons.
- Removed live preview of the Customizer accent color setting.
- Made the Radcliffe_Customize class pluggable.
- Restructured the Customizer accent color setting to use an array of filterable properties and elements.
- Updated theme author URL to remove www.
- Updated CSS reset to inherit instead of unset, and rely more on default styles for elements.
- Updated HEAD meta tags to not disable user scalability.
- Added skip link, and added a corresponding ID to the main element.
- Switched to HTML5 markup for search forms, and updated search form styles with the new targets.
- Removed the post-image image size, and set the post thumbnail size to that size instead.
- Added escaping of home_url() in the footer.
- Switched to HTML5 elements where suitable.
- Replaced clearing divs with the new group class, or switched them to flex.
- Changed the navigation toggle into a button, making it keyboard accessible.
- Made the navigation toggle align with the content.
- Search toggle: Only move focus to the search field when we're toggling the form to be visible.
- Updated screenshot resolution to 1200x900px.
- Added theme tags for block-styles, wide-blocks.
- Added "Requires PHP" and "Tested up to" values to style.css.
- Bumped "Requires at least" to 4.5, since Radcliffe now uses custom_logo.
- Set all uppercase text to use lining numerals.
- Replaced the "bold" CSS property value with 700.
- Updated the posts navigation to use the_posts_navigation().
- Updated the post navigation to use the_post_navigation().
- Added a archive header and search form when viewing a search results page without results.
- Made letter spacing em based.
- Cleaned up comments nav.
- Cleaned up Customizer accent color targets.
- Added a loop for outputting the footer widget areas.

Version 1.30 (2019-04-07)
-------------------------
- Added the new wp_body_open() function, along with a function_exists check

Version 1.29 (2019-01-13)
-------------------------
- Updated the CSS so that the min-height of posts doesn't apply to posts without a featured image
- Fixed margin of the last item in Block: Gallery

Version 1.28 (2018-12-19)
-------------------------
- Fixed the archive-nav width

Version 1.27 (2018-12-07)
-------------------------
- Fixed Gutenberg style changes required due to changes in the block editor CSS and classes
- Fixed the Classic Block TinyMCE buttons being set to the wrong font

Version 1.26 (2018-12-06)
-------------------------
- Replaced Backstretch.js with pure CSS
- Adjusted the structure of post previews so long titles won't cause the preview to overflow vertically
- Added word-wrap to post titles
- Removed old CSS vendor prefixes
- Replaced archive.php and search.php with a smarter index.php
- Minor code tweaks, cleanup
- Made comments_popup_link() strings translateable

Version 1.25 (2018-11-30)
-------------------------
- Fixed Gutenberg editor styles font being overwritten

Version 1.24 (2018-11-03)
-------------------------
- Fixed the archive template date

Version 1.23 (2018-10-07)
-------------------------
- Updated theme description

Version 1.22 (2018-10-07)
-------------------------
- Updated with Gutenberg support
	- Gutenberg editor styles
	- Styling of Gutenberg blocks
	- Custom Baskerville Gutenberg palette
	- Custom Baskerville Gutenberg typography styles
- Added option to disable Google Fonts with a translateable string
- Improved compatibility with < PHP 5.5
- Various fixes

Version 1.21 (2018-05-24)
-------------------------
- Fixed output of comments cookie checkbox

Version 1.20 (2017-12-03)
-------------------------
- The pluggable update: all functions in functions.php are now pluggable

Version 1.19 (2017-11-28)
-------------------------
- Fixed the wrong variable being fed into Backstretch on single posts

Version 1.18 (2017-11-26)
-------------------------
- Updated to the new readme.txt format, with changelog.txt incorporated into it
- Added a demo link to the stylesheet theme description
- Fixed notice in comments.php
- Changed closing element comment structure
- General code cleanup, improvements in readability
- Removed duplicate comment-reply enqueueing from the header (already in functions)
- SEO improvements (title structure, mostly)
- Better handling of edge cases (missing title, missing content)
- Added word-break to titles on the archive template
- Restructured query on the archive page template

Version 1.17 (2016-06-18)
-------------------------
- Added the new theme directory tags

Version 1.16 (2016-04-02)
-------------------------
- Fixed margins on respond inputs

Version 1.15 (2016-03-12)
-------------------------
- Removed wp_title() function from header.php

Version 1.14 (2015-08-25)
-------------------------
- Fixed an issue with overflowing images
- Added the .screen-reader-text class

Version 1.13 (2015-08-11)
------------------------- 
- Replaced the title function with support for title-tag
- Queued comment-reply
- Added UTF-8 as charset in style.css
- Changed titles on singular to h1 for SEO reasons

Version 1.12 (2015-01-27)
------------------------- 
- Added another missing sanitize callback (for radcliffe_logo)

Version 1.11 (2015-01-27)
------------------------- 
- Added a sanitize callback for the custom accent color setting
- Removed the shortcode adjusting the display of captions
- Adjusted the display of image alignments
- Adjusted the styling of blockquotes for readability

Version 1.10 (2015-01-27)
------------------------- 
- Fixed an error with center aligned images in the post content (again)

Version 1.09 (2014-10-01)
------------------------- 
- Fixed an error with center aligned images in the post content

Version 1.08 (2014-09-25)
------------------------- 
- Fixed faulty styling of the search form button on some pages

Version 1.07 (2014-08-06)
------------------------- 
- Added a missing namespace, updated the Swedish translation
- Updated style.css for brevity and browser compatibility
- Updated the editor style to be better structured and include post forms/inputs
- Updated screenshot.png
- Updated readme.txt with licensing information for screenshot.png

Version 1.06 (2014-08-03)
------------------------- 
- Fixed a bug which prevented featured images from being set

Version 1.05 (2014-08-02)
------------------------- 
- Fixed an issue with the HTML declaration in header.php
- Removed a non-printable character from footer.php

Version 1.04 (2014-08-02)
------------------------- 
- Fixed some missing tags in header.php
- Syntax improvements to functions.php
- Removed the email and Twitter icons in the post meta due to request from theme reviewer
- Added a missing string in the Swedish translation

Version 1.03 (2014-08-01)
------------------------- 
- Improved the styling of the header
- Added styling for forms in the post content CSS
- Various other styling improvements/adjustments
– Updated the custom color element classes in functions.php

Version 1.02 (2014-06-30)
------------------------- 
- Added closing tag for HTML element in header.php
– Removed superfluous fourth argument for comments_number() in content.php
– Removed unused support for custom image header in functions.php (and related theme tags in style.css)
– Added missing prefixes to functions.php

Version 1.01 (2014-06-12)
------------------------- 
- Added wp_link_pages(); and page-links styling
- Added styling for .sticky and .bypostauthor

Version 1.00 (2014-06-12)
------------------------- 