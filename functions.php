<?php
function register_unhastv_menus() {
  register_nav_menus(
    array(
      'header-nav' => 'Header Navigation',
      'footer-nav' => 'Footer Navigation'
     )
   );
 }

 add_action( 'init', 'register_unhastv_menus' );

 ?>