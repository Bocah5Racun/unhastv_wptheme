<body>

<?php

wp_enqueue_script( 'sticky-controls', get_template_directory_uri() . '/assets/scripts/sticky-controls.js', NULL, NULL, true );

get_header();

if( have_posts() ) the_post();

$archive_title = get_the_archive_title();

?>

<main class="archive-container container--constrained">

<h2 class="archive-header"></h2>

This is the content for the <?= $archive_title; ?> archive.

</main>

<?php get_footer(); ?>

</body>