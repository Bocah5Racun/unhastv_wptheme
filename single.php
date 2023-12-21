<body>

<?php

wp_enqueue_script( 'slider-controls', get_template_directory_uri() . '/assets/scripts/slider-controls.js', NULL, NULL, true );

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
<div class="single-author"><?php the_author(); ?></div>
<div class="single-date"><?php the_date(); ?></div>
<?php the_post_thumbnail( 'full', array( 'class' => 'single-feature-image' ) ); ?>
</div>

<div class="single-body-container">
    <div class="socials-container">
        <div class="socials-header">Share</div>
        <div class="socials-icons">
            <img class="to-red" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-twitterx.png" ?>" />
            <img class="to-red" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-facebook.png" ?>" />
            <img class="to-red" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-socials-email.png" ?>" />
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


</main>

<?php get_footer(); ?>

</body>