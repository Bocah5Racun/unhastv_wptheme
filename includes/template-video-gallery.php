<?php

global $shown_posts;

$loop_args = array(
    'post_type' => 'post',
    'ignore_sticky_posts' => true,
    // 'post__not_in' => $shown_posts,
    'posts_per_page' => '16',
    'orderby' => 'date',
    'order' => 'DESC',
);

/**
 * get $category_filter
 * if $category_filter !== 'semua' then filter by category
 */
$category_filter = $args['category_filter'];
$offset = isset( $args['offset'] ) ? $args['offset'] : null;

$category_id;
if( $category_filter ) :
    $loop_args['category_name'] = $category_filter;
    $category_id = get_category_link( get_category_by_slug( $category_filter ) );
endif;

if( $offset ) $loop_args['offset'] = $offset;

$the_query = new WP_QUERY( $loop_args );

if( $the_query->have_posts() ) :

?>

<div class="template--video-gallery container--constrained">
    
<div class="section-header"> 
    
<a class="section-header__inner-container"

<?php if( isset( $category_id ) ) : ?>
href="<?php echo $category_id ?>"
<?php endif; ?>

>

<h1><?php echo $category_filter ? get_category_by_slug( $category_filter )->name : "Latest"; ?></h1>

</a>

</div>
    
<div class="template--video-gallery__inner">

<?php

while( $the_query->have_posts() ) :

$the_query->the_post();

array_push( $shown_posts, get_the_ID() );

if( $the_query->current_post == 0 ) :

?>

<div class="section__news-item--feature">
    <a class="section__news-item__link" href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class' => 'section__news-item__thumbnail' ) ); ?></a>
    <div class="section__news-item__meta">
        <a class="section__news-item__link" href="<?php echo get_the_permalink(); ?>"><h1 class="section__news-item__title line-limit"><?php the_title(); ?></h1></a>
        <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
    </div>
</div>

<div class="video-gallery__video-list-container">

<?php else : ?>

    <div class="video-gallery__video">
    <a class="section__news-item__link" href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail( 'medium', array( 'class' => 'video-gallery__thumbnail' ) ); ?></a>
    <div class="video-gallery__meta">
        <a class="section__news-item__link" href="<?php echo get_the_permalink(); ?>"><h1 class="video-gallery__title line-limit-3"><?php the_title(); ?></h1></a>
        <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
    </div>
    </div>

<?php endif; endwhile; ?>

</div>

</div>
</div>
</div>


<?php
endif;
wp_reset_postdata();
?>