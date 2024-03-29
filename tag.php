<body>
    
<?php

wp_enqueue_script( 'sticky-controls', get_template_directory_uri() . '/assets/scripts/sticky-controls.js', NULL, NULL, true );

get_header();

$qo = get_queried_object();

?>

<main class="section archive-container my-3">

<div class="archive-container-header container--constrained">

<h2 class="archive-header my-1">Tag: <?= $qo->name; ?></h2>
</div>

<hr />

<div class="section archive-posts-container container--constrained">

<div class="archive-posts-container__inner">

<?php


if( have_posts() ) :

while( have_posts() ) :
    the_post();

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

<?php the_posts_pagination( array(
	'mid_size'  => 4,
	'prev_text' => __( '«', 'textdomain' ),
	'next_text' => __( '»', 'textdomain' ),
    ) );
?>

</div>

</main>

<?php get_footer(); ?>

</body>