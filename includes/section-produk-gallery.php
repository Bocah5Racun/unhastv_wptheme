<?php 

$produk_args = array(
    'post_type'         => 'produk',
    'posts_per_page'    => '4',
    'orderby'           => 'rand'
);

$produk_query = new WP_QUERY( $produk_args );

if( $produk_query->have_posts() ):

?>

<div id="produk-gallery-container" class="container--constrained">
    <div id="gallery-row">
        <div id="gallery-desc">
            <h1>Produk Hadin & Akuadin</h1>
            <p>Hadin Cokelat Celebes diolah secara eksklusif dari biji kakao pilihan berkualitas tinggi dari Sulawesi.</p>
            <!-- <a href="<?= get_site_url() . "/semua-produk/"; ?>">Lihat Semua Produk</a> -->
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