<?php

/**
 * [kotak_beli] shortcode
 * 
 * Accepts product_id and populates in box.
 * If product_id is empty, then it takes product name and price then populates into buybox.
 * 
 * @param array $atts   Shortcode attributes ($product_id, $product_name, $product_price)
 * 
 */
function show_buybox( $atts = [] ) {
    
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );

    $product_name = '';
    $product_price = '';


    if( isset( $atts['product_id'] ) ) {
        $product_data = wc_get_product( $atts['product_id'] );
        $product_name = $product_data->get_name();
        $product_price = $product_data->get_price();
    }

    if( !$product_name || !$product_price ) {
        $product_name = $atts['product_name'];
        $product_price = $atts['product_price'];
    }

    include( __DIR__ . "/includes/buybox.php" );
}

add_shortcode( 'kotak_beli', 'show_buybox');