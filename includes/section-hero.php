<?php

global $shown_posts;

$loop_args = array(
    'post_type' => 'post',
    'post__not_in' => $shown_posts,
    'posts_per_page' => '5',
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
    <?php the_post_thumbnail( 'full', array( 'class' => 'hero__news-item__thumbnail' ) ); ?>
    <div class="hero__news-item__overlay"></div>
    <a class="hero__news-item__link" href="<?php echo get_the_permalink(); ?>">
        <div class="hero__news-item__meta-container container--constrained">
            <div class="category-badge--with-background"><?php echo $the_category; ?></div>
            <h1 class="hero__news-item__title"><?php the_title(); ?></h1>
            <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
        </div>
    </a>
</div>

<?php
break;
endif;
endwhile;
?>

<div class="hero__news-item-container container--constrained">

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
            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'hero__news-item__thumbnail' ) ); ?>
            <div class="category-badge--with-background">
                <?php echo $the_category; ?>
            </div>
        </div>
        <div class="hero__news-item__meta-container">
            <h1 class="hero__news-item__title"><?php the_title(); ?></h1>
            <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
        </div>
    </a>
</div>

<?php
    endwhile;
    wp_reset_postdata();
?>

</div>

</section>