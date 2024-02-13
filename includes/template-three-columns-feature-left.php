<?php

global $shown_posts;

$loop_args = array(
    'post_type' => 'post',
    'ignore_sticky_posts' => true,
    'posts_per_page' => '8',
    'orderby' => 'date',
    'order' => 'DESC',
);

// filter out previously shown posts if this argument is false
if( $args['show_prev_posts'] === false ) $loop_args['post__not_in'] = $shown_posts;

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

if( $the_query->have_posts() ):

?>

<div class="template--three-columns-feature-left container--constrained">
    
<div class="section-header"> 
    
<a class="section-header__inner-container" href="<?php if( isset( $category_id ) ) echo $category_id; ?>"  title="<?= $category_id; ?>">

<h1><?= $category_filter ? get_category_by_slug( $category_filter )->name : "Latest"; ?></h1>

</a>

</div>

<div class="template--three-columns-feature-left__inner-container">

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

if( $the_query->current_post == 0 ):

?>

<div class="section__news-item--feature">
    <a class="section__news-item__link" href="<?php echo get_the_permalink(); ?>" title="<?= get_the_title(); ?>">
        <?php the_post_thumbnail( wp_is_mobile() ? 'medium' : 'large', array( 'loading' => 'lazy', 'class' => 'section__news-item__thumbnail' ) ); ?>
        <div class="hero__news-item__overlay"></div>
        <div class="section__news-item__meta-container">
            <div class="category-badge--with-background">
                <?php echo $the_category; ?>
            </div>
            <h1 class="section__news-item__title line-limit"><?php the_title(); ?></h1>
            <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
        </div>
    </a>
</div>

<?php else: ?>

<div class="section__news-item">
    <a class="section__news-item__link" href="<?php echo get_the_permalink(); ?>" title="<?= get_the_title(); ?>">
        <?php the_post_thumbnail( wp_is_mobile() ? 'thumbnail' : 'medium_large', array( 'loading' => 'lazy', 'class' => 'section__news-item__thumbnail' ) ); ?>
        <div class="section__news-item__meta-container">
            <div class="category-badge">
                <?php echo $the_category; ?>
            </div>
            <h1 class="hero__news-item__title"><?php the_title(); ?></h1>
            <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
        </div>
    </a>
</div>

<?php
endif;
endwhile;
endif;
wp_reset_postdata();

?>
</div>
</div>