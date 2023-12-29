<?php

global $shown_posts;

$loop_args = array(
    'post_type' => 'post',
    'ignore_sticky_posts' => true,
    'post__not_in' => $shown_posts,
    'posts_per_page' => '10',
    'orderby' => 'date',
    'order' => 'DESC',
);

/**
 * get $category_filter
 * if $category_filter !== 'semua' then filter by category
 */
$category_filter = $args['category_filter'];
if( $category_filter ) $loop_args['category_name'] = $category_filter;

$the_query = new WP_QUERY( $loop_args );

?>

<section id="hero" class="container--full-width">

<?php

while( $the_query->have_posts() ):
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

if( $the_query->current_post == 0 ): // check if first post

?>

<div class="hero__news-item--large">
    <img src="<?= get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" class="hero__news-item__thumbnail" />

    <div class="hero__news-item__overlay"></div>
    <a class="hero__news-item__link" href="<?php echo get_the_permalink(); ?>">
        <div class="hero__news-item__meta-container container--constrained">
            <div class="category-badge--with-background"><?php echo $the_category; ?></div>
            <h1 class="hero__news-item__title line-limit"><?php the_title(); ?></h1>
            <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
        </div>
    </a>
</div>

<?php
break;
endif;
endwhile;
?>
<div class="hero__slider container--constrained">
<div id="slider-prev" class="slider-prev slider-prev--black noselect"><img  src="<?php echo get_template_directory_uri(); ?>/assets/imgs/unhastv-slider-arrow.png" class="slider-icon flip-x to-yellow" /></div>
<div id="slider-next" class="slider-next slider-next--black noselect"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/unhastv-slider-arrow.png" class="slider-icon to-yellow" /></div>
<div class="hero__news-item-container slider-container">

<?php
while( $the_query->have_posts() ): // the remaining posts
$the_query->the_post();
if( $the_query->current_post == 0 ) continue; // skip first post
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
    <a class="hero__news-item__link" href="<?php echo get_the_permalink(); ?>">
        <div class="hero__news-item__image-container">
            <img src="<?= get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ); ?>" class="hero__news-item__thumbnail" />
            <div class="category-badge--with-background">
                <?php echo $the_category; ?>
            </div>
        </div>
        <div class="hero__news-item__meta-container">
            <h1 class="hero__news-item__title line-limit"><?php the_title(); ?></h1>
            <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
        </div>
    </a>
</div>

<?php
    endwhile;
    wp_reset_postdata();
?>

</div>
</div>

</section>