=== Simple upcoming ===

Contributors: sgcoskey
Donate link: http://boolesrings.org
Tags: events, event, upcoming, calendar
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: 0.0

Yet another plugin to make a list of upcoming events.  Just add an
"EventDate" to any post, and then obtain a list of upcoming events
using the `[upcoming]` shortcode.

== Description ==

This is another simple plugin to add a little functionality of a
calendar to your blog.  With this plugin you can specify, for any of
your posts, an associated "Event Date" using the post editor.
Then, elsewhere on your site, you can retrieve a list of future events
using the `[upcoming]` shortcode.

The `[upcoming]` shortcode supports several options:

* category_name: If defined, show posts only from this category.  You can
provide multiple comma-separated category names.

* style: One of "list" (default), "excerpt", or "post".  If "list", then just
the titles are shown.  If "excerpt" then the post excerpt is placed below
the tittle.  If "post" then the title is promoted to
`<h2 class="upcoming-entry-title">` and the full post (up to the `[more]` tag)
is shown.

* null_text: If no results are returned, shows this text.  Defaults to
'(none)'.

* class_name: If defined, adds this class name to the generated <ul>.
Useful for custom styling.

* show_date: if defined, the date will precede the post title

* date_format: if writing the date, do so using this php date format

The output can then be further formatted using CSS.  We recommend the plugin
[Improved Simpler CSS](http://wordpress.org/extend/plugins/imporved-simpler-css/)
for easy modification to the output!

Fork this plugin on
[GitHub](http://github.com/scoskey/Simple-upcoming-wordpress-plugin)

== Installation ==

Nothing unusual here!

== Changelog ==

0.0 initial release