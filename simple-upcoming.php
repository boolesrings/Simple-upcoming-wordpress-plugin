<?php
  /*
   * Plugin Name: Simple upcoming
   * Description: Assign an event date to any post.  List your upcoming events using the shortcode [upcoming].
   * Version: 0.0
   * Author: Samuel Coskey, Victoria Gitman
   * Author URI: http://boolesrings.org
   */

  // Usage example:
  // [upcoming cat=talks]
function upcoming_loop( $atts ) {
  global $more;
  global $post;

  // Arguments to the shortcode
  extract( shortcode_atts( array(
				 'cat' => '',
				 ), $atts ) );

  // query the database for the posts with EventDate
  // query syntax:
  // http://codex.wordpress.org/Class_Reference/WP_Query#Parameters
  $query = "";
  if ( $cat ) {
    $query .= "cat=" . $cat . '&';
  }
  $query .= 'orderby=meta_value&meta_key=EventDate';
  add_filter( 'posts_where', 'where_future' );
  $query_results = new WP_Query($query);
  remove_filter( 'posts_where', 'where_future' );
  
  // building the output
  $ret_val = "<div class='upcoming'>";
  while ($query_results->have_posts()) {
    $query_results->the_post();
    
    $ret_val .= "<h2>";
    $ret_val .= "<a href='" . get_permalink() . "'>";
    $ret_val .= the_title( '', '', false);
    $ret_val .= "</a>";
    $ret_val .= "</h2>";
    // Tell wordpress to respect the [more] tag:
    $more = 0;
    $ret_val .= "<div>" .apply_filters( 'the_content', get_the_content() ). "</div>";
    echo get_post_meta($post->ID,'EventDate',true);
  }
  wp_reset_postdata();
  $ret_val .= "</div>";

  return $ret_val;
  }

// additional filter on the query
// needed since we don't know what day it is
// http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
function where_future ($where) {
  $where .= "AND STR_TO_DATE(meta_value,'%m/%d/%Y') >= CURDATE()";
  return $where;
}

add_shortcode( 'upcoming', 'upcoming_loop' );

?>