<?php get_header(); ?>

<main>
    <section id="hero">
        <?php
        
            // grabs and displays the 5 latest news items
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => '5',
                'orderby' => 'date',
                'order' => 'DESC',
                'category_name' => 'news'
            );

            $the_query = new WP_Query( $args );

            if( $the_query->have_posts() ) :
                // show posts
                while( $the_query->have_posts() ) :
                    $the_query->the_post();
                    the_title();
                    the_excerpt();
                endwhile;
            endif;
            
            wp_reset_postdata();

        ?>
    </section>
    <section class="adspace--lg--landscape"></section>
    <section id="latest-news"></section>
    <section id="latest-program"></section>
    <section id="unhas-talk"></section>
    <section class="adspace--fullwidth"></section>
    <section id="tahukah-kamu"></section>
    <section class="adspace--lg-landscape"></section>
    <section id="unhas-academy"></section>
</main>

<?php get_footer(); ?>