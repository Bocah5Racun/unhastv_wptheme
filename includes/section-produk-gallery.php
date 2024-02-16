<?php 

$produk_args = array(
    'post_type'         => 'produk',
    'posts_per_page'    => '4',
    'orderby'           => 'rand'
);

$produk_query = new WP_QUERY( $produk_args );

if( $produk_query->have_posts() ):

?>

<div id="produk-gallery-container" class="container--constrained my-2">
    <div id="gallery-row">
        <div id="gallery-desc">
            <h1>Hadin Coklat & Akuadin</h1>
            <p>Cokelat berkualitas tinggi dan air minum murni untuk kesegaran sempurna.</p>
            <p style="font-weight: 700; font-size: 115%">Rasakan kelezatan dan kesegaran lokal!</p>
            <!-- <a href="">Lihat Semua Produk</a> -->
        </div>
        <ul id="gallery-carousel">

<?php


while( $produk_query->have_posts() ):

$produk_query->the_post();
$meta = get_post_meta( $post->ID, 'meta_produk', true );

?>
            <li>
                <a href="<?= get_permalink(); ?>">
                    <?php the_post_thumbnail( wp_is_mobile() ? 'medium' : 'medium_large', array( 'class' => 'thumbnail' ) ); ?>
                    <div class="produk-row produk-name line-limit"><?= get_the_title(); ?></div>
                    <div class="produk-row produk-price">Rp<?= ( isset( $meta['satuan'] ) && isset( $meta['harga'] ) ) ? number_format( $meta['harga'], 0, ',', '.') : '0.-'; ?></div>
                </a>
            </li>

<?php endwhile; ?>

        </ul>
    </div>
</div>

<?php
endif;
?>