<?php

get_header();

if( have_posts() ):
    the_post();

    $meta = get_post_meta( $post->ID, 'meta_produk', true);

?>


<main class="container--constrained my-2">

<div class="single-breadcrumbs container--constrained my-2">
<?php breadcrumbs(); ?>
</div>

<div id="single-produk-container">

<div id="left-track">
    <div id="produk-img-container">
        <?php the_post_thumbnail( wp_is_mobile() ? 'medium' : 'medium_large', array( 'class' => 'thumbnail' )) ;?>
    </div>
    <div>
        <img src="<?= get_template_directory_uri() . "/assets/imgs/unhastv-delivery.png"; ?>" class="to-red icon" />Hanya tersedia di daerah Kota Makassar.
    </div>
</div>
<article id="center-track">
    <h2><?= the_title(); ?></h2>
    <div id="harga-container">Rp<?= number_format( $meta['harga'], 0, ',', '.'); ?>/<?= $meta['satuan']; ?></div>
    <div id="produk-tabs-container">
        <ul id="produk-tabs">
            <li data-active="deskripsi" onclick="setActiveTab(this)">Deskripsi Produk</li>
            <?php if( $meta['detail'] ): ?>
                <li data-active="informasi" onclick="setActiveTab(this)">Info Penting</li>
            <?php endif; ?>
        </ul>
        <div id="produk-selector"></div>
    </div>
    <div id="produk-text">
        <div id="produk-description">
            <?php if( $meta['minimum'] > 0 ): ?>
            <p>
                <b>Min. Pemesanan:</b> <?= $meta['minimum']; ?>
            </p>
            <?php endif; ?>
            <?= the_content(); ?>
        </div>
        <div id="produk-detail">
            <?= $meta['detail'] ?? $meta['detail']; ?>
        </div>
    </div>
</article>
<div id="right-track">
    <section id="buybox">
        <h3>Pesan Produk Ini</h3>
        <div class="buybox-row">
            <input id="jumlah" type="number" value=1 min=1 onchange="calculateSubtotal(this)" />
            <label for="jumlah">Jumlah <?= ucfirst( $meta['satuan'] ); ?></label>
        </div>
        <div class="buybox-row subtotal">
            <div>Subtotal</div>
            <div id="subtotal-container">Rp<span id="subtotal-text"><?= number_format( $meta['harga'], 0, ',', '.' ); ?></span></div>
        </div>
        <button>Pesan Sekarang!</button>
    </section>
</div>

</main>

<script>

    const descTab = document.querySelector('[data-active="deskripsi"]')
    const infoTab = document.querySelector('[data-active="informasi"]')
    const description = document.getElementById("produk-description")
    const detail = document.getElementById("produk-detail")
    const selector = document.getElementById("produk-selector")

    console.log(descTab.offsetWidth)

    selector.style.width = `${descTab.offsetWidth}px`
    selector.style.left = `${descTab.offsetLeft}px`

    const setActiveTab = ( obj ) => {
        const offset = obj.offsetLeft
        const width = obj.offsetWidth
        const dataActive = obj.dataset.active

        console.log(dataActive)

        if(dataActive == "deskripsi") {
            description.style.display = "block"
            detail.style.display = "none"
            selector.style.width = `${descTab.offsetWidth}px`
            selector.style.left = `${descTab.offsetLeft}px`
        } else {
            description.style.display = "none"
            detail.style.display = "block"
            selector.style.width = `${infoTab.offsetWidth}px`
            selector.style.left = `${infoTab.offsetLeft}px`
        }
    }

    let total = 1;
    const subtotalDiv = document.getElementById("subtotal-text")

    const calculateSubtotal = ( obj ) => {
        total = obj.value
        const subtotal = <?= $meta['harga']; ?> * total

        subtotalDiv.innerHTML = subtotal.toLocaleString('id-ID')
    }
</script>

<?php 
endif;
get_footer();
?>