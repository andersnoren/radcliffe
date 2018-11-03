=== Radcliffe ===
Contributors: Anlino
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=anders%40andersnoren%2ese&lc=US&item_name=Free%20WordPress%20Themes%20from%20Anders%20Noren&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 4.4
Tested up to: 4.8
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

Backstretch.js
License: MIT License 
Source: https://raw.githubusercontent.com/srobbin/jquery-backstretch/


== Changelog ==

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