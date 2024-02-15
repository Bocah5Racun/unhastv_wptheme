<?php

wp_enqueue_script( 'slider-controls', get_template_directory_uri() . '/assets/scripts/slider-controls.js', NULL, NULL, true );

get_header();

$section_cats = [
    "hero" => get_theme_mod( 'hero_category' ),
    "section1" => get_theme_mod( 'section1_category' ),
    "section2" => get_theme_mod( 'section2_category' ),
    "section3" => get_theme_mod( 'section3_category' ),
    "section4" => get_theme_mod( 'section4_category' ),
    "section5" => get_theme_mod( 'section5_category' ),
    "section6" => get_theme_mod( 'section6_category' ),
];

global $shown_posts;
$shown_posts = [];

?>

<?php
get_template_part(
    'includes/section',
    'hero',
    array(
    'category_filter' => $section_cats['hero'],
) );
?>
<main>

    <section id="section-1" class="section">
        <?php
            get_template_part(
                'includes/template',
                get_theme_mod( 'section1_template'),
                array(
                    'category_filter' => $section_cats['section1'],
                    'offset' => get_theme_mod( 'section1_offset' ),
                    'show_prev_posts' => get_theme_mod( 'section1_show_previous_posts' ),
                )
            );
        ?>
    </section>

    <hr />

    <section id="section-2" class="section">
        <?php
            get_template_part(
                'includes/template',
                get_theme_mod( 'section2_template'),
                array(
                    'category_filter' => $section_cats['section2'],
                    'offset' => get_theme_mod( 'section2_offset' ),
                    'show_prev_posts' => get_theme_mod( 'section2_show_previous_posts' ),
                )
            );
        ?>
    </section>

    <hr />

    <section id="section-3" class="section">
        <?php
            get_template_part(
                'includes/template',
                get_theme_mod( 'section3_template'),
                array(
                    'category_filter' => $section_cats['section3'],
                    'offset' => get_theme_mod( 'section3_offset' ),
                    'show_prev_posts' => get_theme_mod( 'section3_show_previous_posts' ),
                )
            );
        ?>
    </section>

    <hr />

    <section id="section-4" class="section">
        <?php
            get_template_part(
                'includes/template',
                get_theme_mod( 'section4_template'),
                array(
                    'category_filter' => $section_cats['section4'],
                    'offset' => get_theme_mod( 'section4_offset' ),
                    'show_prev_posts' => get_theme_mod( 'section4_show_previous_posts' ),
                )
            );
        ?>
    </section>

    <hr />

    <section id="section-5" class="section">
        <?php
            get_template_part(
                'includes/template',
                get_theme_mod( 'section5_template'),
                array(
                    'category_filter' => $section_cats['section5'],
                    'offset' => get_theme_mod( 'section5_offset' ),
                    'show_prev_posts' => get_theme_mod( 'section5_show_previous_posts' ),
                )
            );
        ?>
    </section>

    <hr />

    <section id="section-6" class="section">
        <?php
            get_template_part(
                'includes/template',
                get_theme_mod( 'section6_template'),
                array(
                    'category_filter' => $section_cats['section6'],
                    'offset' => get_theme_mod( 'section6_offset' ),
                    'show_prev_posts' => get_theme_mod( 'section6_show_previous_posts' ),
                )
            );
        ?>
    </section>

</main>

<?php get_footer(); ?>

</body>