<?php
/*
 * Plugin Name: Simple upcoming
 * Description: Assign an event date to any post.  List your upcoming events using the shortcode [upcoming].
 * Version: 0.0
 * Author: Samuel Coskey, Victoria Gitman
 * Author URI: http://boolesrings.org
*/

/*
 * The shortcode which shows a list of future events.
 * Usage example:
 * [upcoming category_name="talks" show_excerpt="yeah"]
*/
add_shortcode( 'upcoming', 'upcoming_loop' );

function upcoming_loop( $atts ) {
	global $more;
	global $post;

	// Arguments to the shortcode
	extract( shortcode_atts(  array(
        	'category_name' => '',
		'show_date' => '',
		'date_format' => 'F j, Y',
		'show_excerpt' => ''
	), $atts ) );

	/*
	 * query the database for the posts with EventDate in the future
	 * query syntax: http://codex.wordpress.org/Class_Reference/WP_Query#Parameters
	*/
	$query = "";
	if ( $category_name ) {
		$query .= "category_name=" . $category_name . '&';
	}
	$query .= 'meta_key=EventDate&orderby=meta_value';
	add_filter( 'posts_where', 'where_future' );
	$query_results = new WP_Query($query);
	remove_filter( 'posts_where', 'where_future' );
	
	// building the output
	$ret_val = "<ul class='upcoming'>";
	while ( $query_results->have_posts() ) {
		$query_results->the_post();
		$ret_val .='<li>';
		if ( $show_date ) {
			$ret_val .= "<span class='upcoming_date'>";
			$ret_val .= date($date_format,
					strtotime(get_post_meta($post->ID, 'EventDate',true)));
			$ret_val .= "</span>";
			$ret_val .= "<span class='upcoming_date_sep'>: </span>\n";
		}
		$ret_val .= "<span class='upcoming_title'><a href='" . get_permalink() . "'>";
		$ret_val .= the_title( '', '', false);
		$ret_val .= "</a></span>\n";
	        if ( $show_excerpt ) {
			$ret_val .= "<div>\n";
			$more = 0; // Tell wordpress to respect the [more] tag for the next line:
			$ret_val .= apply_filters( 'the_content', get_the_content() );
			$ret_val .= "</div>\n";
		}
		$ret_val .="</li>";
	}
	wp_reset_postdata();
	$ret_val .= "</ul>";

	return $ret_val;
}

/*
 * additional filter on the query
 * needed since we don't know what day it is
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
*/
function where_future ($where) {
	$where .= "AND STR_TO_DATE(meta_value,'%m/%d/%Y') >= CURDATE()";
	return $where;
}

/*
 * Load our default style sheet
*/
add_action( 'wp_print_styles', 'enqueue_my_styles' );
function enqueue_my_styles() {
	wp_register_style( 'simple-upcoming-styles',
			plugins_url('simple-upcoming-styles.css', __FILE__) );
	wp_enqueue_style( 'simple-upcoming-styles' );
}

?>