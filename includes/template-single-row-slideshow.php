<?php

global $shown_posts;

$loop_args = array(
    'post_type' => 'post',
    'ignore_sticky_posts' => true,
    'post__not_in' => $shown_posts,
    'posts_per_page' => '8',
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

<div class="template--single-row-slideshow container--constrained">
    
<div class="section-header"> 
    
<a class="section-header__inner-container"

<?php if( !empty( $category_id ) ) : ?>
href="<?php echo $category_id ?>"
<?php endif; ?>

>

<h1><?php echo $category_filter ? get_category_by_slug( $category_filter )->name : "Latest"; ?></h1>

</a>

</div>
    
<div class="template--single-row-slideshow__inner">

<div id="slider-prev" class="slider-prev slider-prev noselect"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/unhastv-slider-arrow.png" class="slider-icon flip-x" /></div>
<div id="slider-next" class="slider-next slider-next noselect"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/unhastv-slider-arrow.png" class="slider-icon" /></div>

<div id="template--singlerow-slideshow__slider-container" class="slider-container">

<?php

while( $the_query->have_posts() ) :

$the_query->the_post();

array_push( $shown_posts, get_the_ID() );

/**
 * get the first sub-category.
 * if no sub-category, get the first category.
 */
$cats = get_the_category();
$the_category = "";

if( count($cats) > 0 ):
    foreach( $cats as $cat ):
        if( $cat->parent != 0 ):
            $the_category = $cat->name;
            break;
        endif;
    endforeach;
endif;

if( strlen( $the_category ) == 0 ):
    $the_category = $cats[0]->name;
endif;

?>

<div class="hero__news-item">
    <a class="section__news-item__link" href="<?php echo get_the_permalink(); ?>">
    <div class="hero__news-item__image-container">
        <?php the_post_thumbnail( 'medium_large', array( 'class' => 'hero__news-item__thumbnail' ) ); ?>

        <?php if( strlen( $category_filter > 0 ) ): ?>
        <div class="category-badge--with-background">
            <?php echo $the_category; ?>
        </div>
        <?php endif; ?>
    </div>
    <h1 class="section__news-item__title line-limit"><?php the_title(); ?></h1>
    </a>
    <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
</div>

<?php endwhile; ?>

</div>
</div>
</div>


<?php
endif;
wp_reset_postdata();
?>