<?php

global $shown_posts;

$loop_args = array(
    'post_type' => 'post',
    'ignore_sticky_posts' => true,
    'posts_per_page' => '15',
    'orderby' => 'date',
    'order' => 'DESC',
);

// filter out previously shown posts if this argument is false
if( $args['show_prev_posts'] === false ) $loop_args['post__not_in'] = $shown_posts;

/**
 * get $category_filter
 * if $category_filter !== 'semua' then filter by category
 */
$category_filter = $args['category_filter'];
$offset = isset( $args['offset'] ) ? $args['offset'] : null;

$category_id;
if( $category_filter ) :
    $loop_args['category_name'] = $category_filter;
    $category_id = get_category_link( get_category_by_slug( $category_filter ) );
endif;

if( $offset ) $loop_args['offset'] = $offset;

$the_query = new WP_QUERY( $loop_args );

if( $the_query->have_posts() ) :

?>

<div class="template--video-gallery container--constrained">
    
<div class="section-header"> 
    
<a class="section-header__inner-container" href="<?php if( isset( $category_id ) ) echo $category_id; ?>">

<h1><?= $category_filter ? get_category_by_slug( $category_filter )->name : "Latest"; ?></h1>
<span class="section-header__see-more">━ Lihat Semua</span>

</a>

</div>
    
<div class="template--video-gallery__inner">

<?php

while( $the_query->have_posts() ) :

$the_query->the_post();

$tags = get_the_tags();

array_push( $shown_posts, get_the_ID() );

if( $the_query->current_post == 0 ) :

?>

<div class="section__news-item--feature">
    <a class="section__news-item__link" href="<?= get_the_permalink(); ?>"><img src="<?= get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" class="video-gallery__thumbnail" /></a>
    <div class="section__news-item__meta">
        <a class="section__news-item__link" href="<?= get_the_permalink(); ?>"><h1 class="section__news-item__title line-limit"><?php the_title(); ?></h1></a>
        <div class="hero__news-item__date"><?= get_the_date(); ?></div>
        <div class="section__news-item__tags">
            <?php foreach( $tags as $tag ) : ?>
                <a href="<?= get_tag_link( $tag->term_id ); ?>"><span class="post-tag"><?= $tag->name; ?></span></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="video-gallery__video-list-container">

<div class="video-gallery__video">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3215141506790563"
        crossorigin="anonymous"></script>
    <!-- video-gallery-block -->
    <ins class="adsbygoogle"
        style="display:block; width: 100% !important;"
        data-ad-client="ca-pub-3215141506790563"
        data-ad-slot="9706712439"
        data-ad-format="rectangle, horizontal"
        data-full-width-responsive="false"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>

<?php else : ?>

    <div class="video-gallery__video">
    <a class="section__news-item__link" href="<?= get_the_permalink(); ?>"><img src="<?= get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>" class="video-gallery__thumbnail" />
    <div class="video-gallery__meta">
        <h1 class="video-gallery__title line-limit-3"><?php the_title(); ?></h1></a>
        <div class="hero__news-item__date"><?= get_the_date(); ?></div>
    </div>
    </div>

<?php endif; endwhile; ?>

</div>

</div>
</div>
</div>


<?php
endif;
wp_reset_postdata();
?>