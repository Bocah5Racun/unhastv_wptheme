<?php

$loop_args = array(
    'post_type' => 'post',
    'posts_per_page' => '7',
    'orderby' => 'date',
    'order' => 'DESC',
);

/**
 * get $category_filter
 * if $category_filter !== 'semua' then filter by category
 */
$category_filter = $args['category_filter'];
$offset = isset( $args['offset'] ) ? $args['offset'] : null;

if( $category_filter ) $loop_args['category_name'] = $category_filter;
if( $offset ) $loop_args['offset'] = $offset;

$the_query = new WP_QUERY( $loop_args );

if( $the_query->have_posts() ):
endif;

?>