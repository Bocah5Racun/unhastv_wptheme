<body>

<?php

wp_enqueue_script( 'sticky-controls', get_template_directory_uri() . '/assets/scripts/sticky-controls.js', NULL, NULL, true );
wp_enqueue_script( 'copypaste-controls', get_template_directory_uri() . '/assets/scripts/copypaste-controls.js', NULL, NULL, true );

get_header();

if( have_posts() ) the_post();

$the_post_cats = get_the_category();
$the_category_slug = $the_post_cats[0]->slug;

?>

<main class="container--constrained">

<article>

<div class="single-breadcrumbs">
<?php if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
};
?>
</div>

<div class="single-header">
<div class="single-category category-badge--with-background">
    <?php echo $the_post_cats[0]->name; ?>
</div>
<h1 class="single-title"><?php the_title(); ?></h1>
<div class="single-meta">
<span class="single-author">Oleh <?php the_author(); ?></span> •
<span class="single-date"><?php the_date(); ?></span>
</div>
<?php the_post_thumbnail( 'full', array( 'class' => 'single-feature-image' ) ); ?>
</div>

<div class="single-body-container">
    <div class="socials-container sticky">
        <div class="socials-header">Share</div>
        <div class="socials-icons">
            <img class="socials-icon to-red" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-twitterx.png" ?>" title="Bagikan artikel ini lewat Twitter/X" />
            <img class="socials-icon to-red" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-facebook.png" ?>" title="Bagikan artikel ini lewat Facebook" />
            <img class="socials-icon to-red" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-whatsapp.png" ?>" title="Bagikan artikel ini lewat WhatsApp" />
            <img class="socials-icon to-red" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-email.png" ?>" title="Bagikan artikel ini lewat email" />
            <img class="socials-icon to-red copy" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-copy.png" ?>" title="Salin link artikel ini ke clipboard" onclick='( ()=> {
                const alertText = "Baca Artikel Ini di Unhas TV: <?php echo get_the_permalink(); ?>";
                copyToClipboard(alertText);
            })()'/>
        </div>
    </div>
    <div class="content-container">
        <?php the_content(); ?>
        <div class="single-post-tags">

<?php
// show all the tags for the post
$tags = get_the_tags();
$post_id = get_the_ID();

if( $tags ) :
foreach( $tags as $tag ) : ?>
            <a href="<?php echo get_tag_link( $tag->term_id ); ?>"><span class="post-tag"><?php echo $tag->name; ?></span></a>
<?php endforeach; endif; ?>
        </div>
    </div>
    <div class="ad-example-space">
        <div class="example-ad">Adspace</div>
    </div>
</div>

</article>

<?php
// get up to 8 related articles based on categories and tags
$tags = get_the_tags();
$tag_ids = array();

if( $tags ) :
foreach( $tags as $tag ) $tag_ids[] = $tag->term_id;

$query_args = array(
    'posts_per_page' => '4',
    'tag__in' => $tag_ids,
    'orderby' => 'rand',
    'post__not_in' => array( get_the_ID() ),
);

$the_query = new WP_QUERY( $query_args );

?>

<?php if( $the_query->have_posts() ) : ?>

<div class="related-articles-container">
    <h2 class="related-articles-container__header">Artikel Terkait</h2>

<div class="related-articles-container__inner">

<?php while( $the_query->have_posts() ):
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

<div class="related-article">
    <a class="link" href="<?php echo get_the_permalink(); ?>">
        <div class="image-container">
            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'thumbnail' ) ); ?>
            <div class="category-badge--with-background">
            <?php echo $the_category; ?>
            </div>
        </div>
        <h1 class="title line-limit-3"><?php the_title(); ?></h1>
    </a>
    <div class="date"><?php echo get_the_date(); ?></div>
</div>

<?php
wp_reset_postdata();
endwhile;
endif;
endif;

?>
</div>

<?php

$query_args = array(
    'posts_per_page' => '4',
    'category_name' => $the_category_slug,
    'orderby' => 'date',
    'post__not_in' => array( $post_id ),
);

$the_query = new WP_QUERY( $query_args );

if( !$the_query->have_posts() ) $the_query = new WP_QUERY( array( 'posts_per_page' => '4', 'orderby' => 'random', 'post__not_in' => array( $post_id ) ) );

if( $the_query->have_posts() ):

?>

<div class="related-articles-container">
    <h2 class="related-articles-container__header">Artikel <?= $tags ? $the_post_cats[0]->name : ""; ?> Lain</h2>

<div class="related-articles-container__inner">

<?php


while( $the_query->have_posts() ):

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

<div class="related-article">
    <a class="link" href="<?php echo get_the_permalink(); ?>">
        <div class="image-container">
            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'thumbnail' ) ); ?>
            <div class="category-badge--with-background">
            <?php echo $the_category; ?>
            </div>
        </div>
        <h1 class="title line-limit-3"><?php the_title(); ?></h1>
    </a>
    <div class="date"><?php echo get_the_date(); ?></div>
</div>

<?php
endwhile;
endif;
?>

</div>
</div>

</main>

<?php get_footer(); ?>

</body>