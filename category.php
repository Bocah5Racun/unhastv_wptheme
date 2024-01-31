<?php

wp_enqueue_script( 'sticky-controls', get_template_directory_uri() . '/assets/scripts/sticky-controls.js', NULL, NULL, true );

get_header();

if( have_posts() ) the_post();

$qo = get_queried_object();

?>

<main class="section archive-container my-3">

<div class="archive-container-header container--constrained">
    
<?php

// get the parent category id
$parent_cat_ID = ( $qo->parent == '0' ) ? $qo->cat_ID : $qo->parent;

$categories = get_categories( array( 'child_of' => $parent_cat_ID ));

?>

<h2 class="archive-header"><?= get_cat_name( $parent_cat_ID ); ?></h2>
</div>


<div class="section filter-by-container container--constrained">

<a href="<?= get_category_link( $parent_cat_ID ); ?>" class="category-filter <?php if( $parent_cat_ID == $qo->cat_ID ) : ?>category-filter--active<?php endif; ?>">Semua</a>

<?php

foreach( $categories as $category ) :
    
    ?>

<a href="<?= get_category_link( $category->cat_ID ); ?>" class="category-filter <?php if( $category->cat_ID == $qo->cat_ID ) : ?>category-filter--active<?php endif; ?>"><?= $category->name; ?></a>
    
    <?php endforeach; ?>

</div>

<hr />

<div class="section archive-posts-container container--constrained">

<div class="archive-posts-container__inner">

<?php

$loop_args = array(
    'post_type' => 'post',
    'ignore_sticky_posts' => true,
    'category_name' => get_cat_name( $qo->cat_ID),
    'posts_per_page' => '24',
    'orderby' => 'date',
    'order' => 'DESC',
);

$the_query = new WP_QUERY( $loop_args );
if( $the_query->have_posts() ) :

while( $the_query->have_posts() ) :
    $the_query->the_post();

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

<div class="archive-post">
<a href="<?= get_the_permalink(); ?>" class="archive-post__inner">
<img loading="lazy" src="<?= get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ); ?>" class="archive-post__thumbnail" />
<div>
<span class="archive-post__category category-badge"><?= $the_category; ?></span>
<h2 class="archive-post__title line-limit-3"><?= get_the_title(); ?></h2>
<span class="archive-post__author"><?= get_the_author(); ?></span>
<p class="archive-post__excerpt line-limit-3"><?= get_the_excerpt(); ?></p>
</div>
</a>
</div>

<?php
endwhile;

endif;
    

?>

</div>

</div>

<div class="section archive-pagination-container container--constrained">
</div>

</main>

<?php get_footer(); ?>