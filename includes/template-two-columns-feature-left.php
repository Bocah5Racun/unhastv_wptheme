<?php

global $shown_posts;

$loop_args = array(
    'post_type' => 'post',
    'ignore_sticky_posts' => true,
    'posts_per_page' => '6',
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

if( $the_query->have_posts() ):

?>

<div class="template--two-columns-feature-left container--constrained">
<div class="section-header"> 
    
<a class="section-header__inner-container" href="<?php if( isset( $category_id ) ) echo $category_id; ?>">

<h1><?php echo $category_filter ? get_category_by_slug( $category_filter )->name : "Latest"; ?></h1>
<span class="section-header__see-more">━ Lihat Semua</span>

</a>

</div>

<div class="template--two-columns-feature-left__inner-container">

<?php

while( $the_query->have_posts() ):

$the_query->the_post();
array_push( $shown_posts, get_the_ID() );

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

if( $the_query->current_post == 0 ):

?>

<div class="section__news-item--feature">
    <a class="section__news-item__link" href="<?php echo get_the_permalink(); ?>">
        <img src="<?= get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" class="section__news-item__thumbnail" />
        <div class="hero__news-item__overlay"></div>
        <div class="section__news-item__meta-container">
            <div class="category-badge--with-background">
                <?php echo $the_category; ?>
            </div>
            <h1 class="section__news-item__title line-limit"><?php the_title(); ?></h1>
            <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
        </div>
    </a>
</div>

<div class="section__news-item">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3215141506790563"
        crossorigin="anonymous"></script>
    <!-- two-col-ft-left-block -->
    <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-3215141506790563"
        data-ad-slot="7272120785"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>

<?php else: ?>

<div class="section__news-item">
    <div class="section__news-item__link">
        <div class="section__news-item__meta-container">
            <div class="category-badge">
                <?php echo $the_category; ?>
            </div>
            <a href="<?php echo get_the_permalink(); ?>">
                <h1 class="section__news-item__title line-limit"><?php the_title(); ?></h1>
            </a>       
            <p class="line-limit"><?php echo get_the_excerpt(); ?></p>
            <div class="hero__news-item__date"><?php echo get_the_date(); ?></div>
        </div>
        <a href="<?php echo get_the_permalink(); ?>">
        <img src="<?= get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>" class="section__news-item__thumbnail" />
        </a>
    </div>
</div>

<?php

endif;
endwhile;
endif;

wp_reset_postdata();

?>
</div>
</div>