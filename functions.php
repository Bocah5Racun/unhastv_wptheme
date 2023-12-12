<?php
function register_unhastv_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
     )
   );
 }

 add_action( 'init', 'register_unhastv_menus' );

 ?>