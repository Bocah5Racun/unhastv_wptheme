<?php
function register_unhastv_menus() {
  register_nav_menus(
    array(
      'header-nav' => 'Header Navigation',
      'footer-nav' => 'Footer Navigation'
     )
   );
 }
 function unhastv_theme_setup(){
  add_theme_support('post-thumbnails');
}

function unhastv_enqueue_styles() {
  wp_enqueue_style( 'unhastv-header-styles', get_template_directory_uri() . '/assets/styles/header.css', array(), '1.0', 'all' );
  wp_enqueue_style( 'unhastv-hero-styles', get_template_directory_uri() . '/assets/styles/hero.css', array(), '1.0', 'all' );
}

 add_action( 'wp_enqueue_scripts', 'unhastv_enqueue_styles' );
 add_action( 'after_setup_theme', 'unhastv_theme_setup' );
 add_action( 'init', 'register_unhastv_menus' );

 ?>