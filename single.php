<body>

<?php

wp_enqueue_script( 'slider-controls', get_template_directory_uri() . '/assets/scripts/slider-controls.js', NULL, NULL, true );

get_header();

if( have_posts() ) the_post();

$cats = get_the_category_list();

?>

<main class="container--constrained">

<article>

<div class="single-meta">
<div class="single-breadcrumb"></div>
<h1 class="single-title"><?php the_title(); ?></h1>
<div class="single-author"><?php the_author(); ?></div>
<div class="single-date"><?php the_date(); ?></div>
</div>

<?php the_post_thumbnail( 'large', array( 'class' => 'single-feature-image' ) ); ?>

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