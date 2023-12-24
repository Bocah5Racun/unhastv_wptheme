<body>

<?php

wp_enqueue_script( 'sticky-controls', get_template_directory_uri() . '/assets/scripts/sticky-controls.js', NULL, NULL, true );
wp_enqueue_script( 'copypaste-controls', get_template_directory_uri() . '/assets/scripts/copypaste-controls.js', NULL, NULL, true );

get_header();

if( have_posts() ) the_post();

$cats = get_the_category();

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
    <?php echo $cats[0]->name; ?>
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
                const alertText = "Baca Artikel Ini di Unhas TV: ";
                copyToClipboard(alertText);
            })()'/>
        </div>
    </div>
    <div class="content-container">
        <?php the_content(); ?>
    </div>
    <div class="ad-example-space">
        <div class="example-ad">Adspace</div>
    </div>
</div>

</article>

<?php
// get up to 10 related articles based on categories and tags
?>
<div class="related-articles-container">

</div>

</main>

<?php get_footer(); ?>

</body>