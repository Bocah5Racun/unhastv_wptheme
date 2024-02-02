<body>

<?php

wp_enqueue_script( 'sticky-controls', get_template_directory_uri() . '/assets/scripts/sticky-controls.js', NULL, NULL, true );
wp_enqueue_script( 'copypaste-controls', get_template_directory_uri() . '/assets/scripts/copypaste-controls.js', NULL, NULL, true );

get_header();

if( have_posts() ) the_post();

$the_post_cats = get_the_category();
$the_category_id;
$the_category_slug;

if( $the_post_cats ) {
    $the_category_id = $the_post_cats[0]->cat_ID;
    $the_category_slug = $the_post_cats[0]->slug;
}

//Adding adsense ad unit inside the article
//Insert ads after every third paragraph of single post content.
add_filter( 'the_content', 'prefix_insert_post_ads' );
function prefix_insert_post_ads( $content ) {
	//CHANGE BELOW AdSense CODE WITH YOUR OWN CODE
	$ad_code = '
    <div class="single-adspace">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3215141506790563"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle"
            style="display:block; text-align:center;"
            data-ad-layout="in-article"
            data-ad-format="fluid"
            data-ad-client="ca-pub-3215141506790563"
            data-ad-slot="8727660920"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
';
    if ( is_single() ) {
	//CHANGE 3 TO DESIRED NUMBER YOU WANT ADVERT TO BE APPEARED
        return prefix_insert_after_paragraph( $ad_code, 5, $content );
    }
    return $content;
}
// Parent Function that makes the magic happen
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
        if ( ( ($index + 1) % $paragraph_id ) == 0 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
    return implode( '', $paragraphs );
}

?>

<main class="container--constrained my-2">

<article>

<div class="single-breadcrumbs">
<?php breadcrumbs(); ?>
</div>

<div class="single-header my-2">
<?php if( $the_post_cats ): ?>
<a href="<?= get_category_link( $the_category_id ); ?>"class="single-category category-badge--with-background">
    <?php echo $the_post_cats[0]->name; ?>
</a>
<?php endif; ?>
<h1 class="single-title"><?php the_title(); ?></h1>
<div class="single-meta">
<?php if( get_post_type() != 'iklan' ): ?>
    <span class="single-author">Oleh <?php the_author(); ?></span> •
    <span class="single-date"><?php the_date(); ?></span>
<?php endif; ?>
</div>
<?php the_post_thumbnail( 'full', array( 'class' => 'single-feature-image my-2' ) ); ?>
</div>

<div class="single-body-container">
    <div class="socials-container sticky">
        <div class="socials-header">Share</div>
        <div class="socials-icons">
            <img loading="lazy" class="socials-icon to-red" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-twitterx.png" ?>" title="Bagikan artikel ini lewat Twitter/X" />
            <img loading="lazy" class="socials-icon to-red" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-facebook.png" ?>" title="Bagikan artikel ini lewat Facebook" />
            <img loading="lazy" class="socials-icon to-red" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-whatsapp.png" ?>" title="Bagikan artikel ini lewat WhatsApp" />
            <img loading="lazy" class="socials-icon to-red" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-email.png" ?>" title="Bagikan artikel ini lewat email" />
            <img loading="lazy" class="socials-icon to-red copy" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-copy.png" ?>" title="Salin link artikel ini ke clipboard" onclick='( ()=> {
                const alertText = "Baca Artikel Ini di Unhas TV: <?php echo get_the_permalink(); ?>";
                copyToClipboard(alertText);
            })()'/>
        </div>
    </div>
    <div class="content-container text-container">
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
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3215141506790563"
            crossorigin="anonymous"></script>
        <!-- single-vertical -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-3215141506790563"
            data-ad-slot="4175485471"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
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
            <img loading="lazy" src="<?= get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ); ?>" class="thumbnail" />
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

if( $the_post_cats):

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
        <img loading="lazy" src="<?= get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ); ?>" class="thumbnail" />
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
endif;
?>

</div>
</div>

</main>

<?php get_footer(); ?>

</body>