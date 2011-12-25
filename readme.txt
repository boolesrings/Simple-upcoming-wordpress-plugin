=== Simple upcoming ===

Contributors: sgcoskey
Donate link: http://boolesrings.org
Tags: events, event, upcoming, calendar
Requires at least: 3.0
Tested up to: 3.3
Stable tag: 0.1.3

Make an upcoming events calendar.  Just add an "Event Date" to any
post, and then use the [upcoming] shortcode to list upcoming events.

== Description ==

This is another simple plugin to add a little functionality of a
calendar to your blog.  With this plugin you can specify, for any of
your posts, an associated "Event Date" using a new widget in the post
editor.  Then, elsewhere on your site, you can retrieve a list of
future events using the `[upcoming]` shortcode on any post or page.

The shortcode supports several options:

* **category_name**: If defined, show posts only from this category.
You can provide multiple comma-separated category names.

* **style**: One of *list* (default), *excerpt*, or *post*.  If it is
*list*, then only the titles are shown.  If it is *excerpt*, then the
post excerpt is placed below the tittle.  If it is *post* then the title
is promoted to `<h2 class="upcoming-entry-title">` and the full
post (up to the `[more]` tag) is shown.

* **null_text**: If no results are returned, shows this text.
Defaults to `(none)`.

* **class_name**: If defined, adds this class name to the generated `<ul>` tag.
Useful for custom styling.

* **show_date**: if defined, the date will precede the post title

* **date_format**: if showing the date, this php date format will be
used.  The default is `"F j, Y"`, which means e.g., May 12, 2012.

The output can then be further formatted using CSS.  We recommend the
plugin [Improved Simpler
CSS](http://wordpress.org/extend/plugins/imporved-simpler-css/) for
quickly styling your upcoming events list (and your site)!

Report bugs, give feedback, or fork this plugin on
[GitHub](http://github.com/scoskey/Simple-upcoming-wordpress-plugin).

== Installation ==

Nothing unusual here!

== Changelog ==

0.1.3 bug fix: added nopaging so all relevant posts appear

0.1.2 bug fix: sticky posts were always appearing

0.1.1 bug fix: non-empty input to the "event date" box wasn't working
(accidentally introduced in the last bug fix)

0.1 bug fix: empty input to the "event date" box wasn't working

0.0 initial release
