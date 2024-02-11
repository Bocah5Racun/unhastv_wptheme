<body>

<?php

get_header();

if( have_posts() ):
    the_post();

?>

<main id="taxonomy" class="container--constrained my-2">

</main>

<?php 
endif;
get_footer();
?>

</body>