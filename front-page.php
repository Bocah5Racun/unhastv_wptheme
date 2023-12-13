<?php get_header(); ?>

<main>
    <section id="hero" class="container--full-width">
        <div id="hero-inner-container" class="container--constrained">
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
                $index = 0;
                while( $the_query->have_posts() ) :
                    $the_query->the_post();
                    ?>

                    <div class="hero__news-item">
                        <?php if($index == 0) : ?>
                            <div class="hero__news-item__overlay"></div>
                        <?php endif; ?>
                        <img class="hero__news-item__thumbnail" src="<?php echo get_the_post_thumbnail_url(); ?>" />
                        <div class="hero__news-item__meta-container">
                            <h1 class="hero__news-item__header"><?php the_title(); ?></h1>
                            <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
                        </div>
                    </div>
                <?php
                    $index++;
                    endwhile;
                    endif;
            
                    wp_reset_postdata();
                ?>
        </div>
    </section>
    <section class="adspace--lg--landscape"></section>
    <section id="latest-news">
    <?php
        
        // grabs and displays the 7 latest news items
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => '7',
            'orderby' => 'date',
            'order' => 'DESC',
            'category_name' => 'news',
            'offset' => '5'
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
    <section id="latest-program"></section>
    <section id="unhas-talk"></section>
    <section class="adspace--fullwidth"></section>
    <section id="tahukah-kamu"></section>
    <section class="adspace--lg-landscape"></section>
    <section id="unhas-academy"></section>
</main>

<?php get_footer(); ?>