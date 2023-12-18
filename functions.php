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
  add_theme_support( 'custom-logo' );
  add_theme_support( 'post-thumbnails' );
}

function unhastv_enqueue_styles() {
  wp_enqueue_style( 'unhastv-header-styles', get_template_directory_uri() . '/assets/styles/header.css', array(), '1.0', 'all' );
  wp_enqueue_style( 'unhastv-footer-styles', get_template_directory_uri() . '/assets/styles/footer.css', array(), '1.0', 'all' );
  wp_enqueue_style( 'unhastv-hero-styles', get_template_directory_uri() . '/assets/styles/hero.css', array(), '1.0', 'all' );
  wp_enqueue_style( 'unhastv-ads-styles', get_template_directory_uri() . '/assets/styles/ads.css', array(), '1.0', 'all' );
  wp_enqueue_style( 'unhastv-section-styles', get_template_directory_uri() . '/assets/styles/section-styles.css', array(), '1.0', 'all' );
  wp_enqueue_style( 'unhastv-badges-and-buttons-styles', get_template_directory_uri() . '/assets/styles/badges-buttons-styles.css', array(), '1.0', 'all' );
}

function unhastv_enqueue_scripts() {
}

/**
 * excerpt modifications
 */
function my_excerpt_length( $length ) {
  return 15;
}
function new_excerpt_more( $more ) {
  return '...' ;
}

function unhastv_customize_register( $wp_customize ) {
  /**
   * code for the cta customizer
   */
  $wp_customize->add_section( 'cta_customizer', array(
    'title' => __('⋆ Unhas TV: Sesuaikan CTA'),
    'description' => 'Sesuaikan tombol CTA di bagian header.',
    'priority' => 101,
  ) );
  $wp_customize->add_setting( 'cta_text', array(
    'default' => 'Watch Unhas TV Live',
  ) );
  $wp_customize->add_control( 'cta_text_input', array(
    'settings' => 'cta_text',
    'label' => 'CTA Text',
    'description' => 'Teks yang tertulis di dalam tombol CTA di header halaman depan.',
    'section' => 'cta_customizer',
    'type' => 'text',
  ) );
  $wp_customize->add_setting( 'cta_url', array(
    'default' => 'https://www.youtube.com/@unhastv.official',
  ) );
  $wp_customize->add_control( 'cta_url_input', array(
    'settings' => 'cta_url',
    'label' => 'CTA URL',
    'description' => 'URL tombol CTA.',
    'section' => 'cta_customizer',
    'type' => 'url',
  ) );

  /**
   * code for the hero section customizer
   */
  $wp_customize->add_section( 'hero_customizer', array(
    'title' => __('⋆ Unhas TV: Sesuaikan Hero', 'TextDomain'),
    'description' => 'Sesuaikan seksi Hero dari blog.',
    'priority' => 102,
  ) );

  $categories = get_categories();
  $cats = ['' => 'Semua'];
  $i = 0;

  foreach($categories as $category){
    if($i==0){
      $default = '';
      $i++;
    }
    $cats[$category->slug] = $category->name;
  }

  $wp_customize->add_setting ('hero_category', array(
    'default'        => $default
  ) );

  $wp_customize->add_control( 'cat_select_box', array(
    'settings' => 'hero_category',
    'label'   => 'Kategori',
    'description' => 'Tampilkan post dari kategori ini di seksi Hero.',
    'section'  => 'hero_customizer',
    'type'    => 'select',
    'choices' => $cats,
  ) );

  /**
   * code for the section 1 customizer
   */
  $section_templates = [
    'none' => 'Disembunyikan',
    'simple-grid' => 'Simple Grid',
    'single-row-slideshow' => '1 Row, Slideshow',
    'three-columns-feature-left' => '3 Columns, Feature Post Left',
    'two-columns-feature-left' => '2 Columns, Feature Post Left',
    'three-rows-staggered-columns' => '3 Rows, Staggered Columns',
  ];

  $wp_customize->add_section( 'section1_customizer', array(
    'title' => __('⋆ Unhas TV: Sesuaikan Section 1'),
    'description' => 'Sesuaikan seksi-seksi yang ditampilkan di halaman depan.',
    'priority' => 103,
  ) );
  $wp_customize->add_setting( 'section1_template', array(
    'default' => 'three-columns-feature-left',
  ) );
  $wp_customize->add_control( 'section1_selector', array(
    'settings' => 'section1_template',
    'label' => 'Section 1 Template',
    'description' => 'Pilih template untuk Section 1.',
    'section' => 'section1_customizer',
    'type' => 'select',
    'choices' => $section_templates,
  ) );

  $wp_customize->add_setting ('section1_category', array(
    'default' => ''
  ) );
  $wp_customize->add_control( 'section1_category_box', array(
    'settings' => 'section1_category',
    'label'   => 'Kategori',
    'description' => 'Tampilkan pos dari kategori ini di Section 1.',
    'section'  => 'section1_customizer',
    'type'    => 'select',
    'choices' => $cats,
  ) );

  $wp_customize->add_setting ('section1_offset', array(
    'default' => 0,
  ) );
  $wp_customize->add_control( 'section1_offset_input', array(
    'settings' => 'section1_offset',
    'label'   => 'Offset',
    'description' => 'Dimulai dari pos ke-berapa?',
    'section'  => 'section1_customizer',
    'type'    => 'number',
  ) );

  /**
   * code for the section 2 customizer
   */
  $wp_customize->add_section( 'section2_customizer', array(
    'title' => __('⋆ Unhas TV: Sesuaikan Section 2'),
    'description' => 'Sesuaikan seksi-seksi yang ditampilkan di halaman depan.',
    'priority' => 104,
  ) );
  $wp_customize->add_setting( 'section2_template', array(
    'default' => 'three-columns-feature-left',
  ) );
  $wp_customize->add_control( 'section2_selector', array(
    'settings' => 'section2_template',
    'label' => 'Section 2 Template',
    'description' => 'Pilih template untuk Section 2.',
    'section' => 'section2_customizer',
    'type' => 'select',
    'choices' => $section_templates,
  ) );

  $wp_customize->add_setting ('section2_category', array(
    'default' => ''
  ) );

  $wp_customize->add_control( 'section2_category_box', array(
    'settings' => 'section2_category',
    'label'   => 'Kategori',
    'description' => 'Tampilkan pos dari kategori ini di Section 2.',
    'section'  => 'section2_customizer',
    'type'    => 'select',
    'choices' => $cats,
  ) );

  $wp_customize->add_setting ('section2_offset', array(
    'default' => 0,
  ) );
  $wp_customize->add_control( 'section2_offset_input', array(
    'settings' => 'section2_offset',
    'label'   => 'Offset',
    'description' => 'Dimulai dari pos ke-berapa?',
    'section'  => 'section2_customizer',
    'type'    => 'number',
  ) );

  /**
   * code for the section 3 customizer
   */
  $wp_customize->add_section( 'section3_customizer', array(
    'title' => __('⋆ Unhas TV: Sesuaikan Section 3'),
    'description' => 'Sesuaikan seksi-seksi yang ditampilkan di halaman depan.',
    'priority' => 104,
  ) );
  $wp_customize->add_setting( 'section3_template', array(
    'default' => 'three-columns-feature-left',
  ) );
  $wp_customize->add_control( 'section3_selector', array(
    'settings' => 'section3_template',
    'label' => 'Section 3 Template',
    'description' => 'Pilih template untuk Section 3.',
    'section' => 'section3_customizer',
    'type' => 'select',
    'choices' => $section_templates,
  ) );

  $wp_customize->add_setting ('section3_category', array(
    'default' => ''
  ) );

  $wp_customize->add_control( 'section3_category_box', array(
    'settings' => 'section3_category',
    'label'   => 'Kategori',
    'description' => 'Tampilkan pos dari kategori ini di Section 3.',
    'section'  => 'section3_customizer',
    'type'    => 'select',
    'choices' => $cats,
  ) );

  $wp_customize->add_setting ('section3_offset', array(
    'default' => 0,
  ) );
  $wp_customize->add_control( 'section3_offset_input', array(
    'settings' => 'section3_offset',
    'label'   => 'Offset',
    'description' => 'Dimulai dari pos ke-berapa?',
    'section'  => 'section3_customizer',
    'type'    => 'number',
  ) );

  /**
   * code for the section 4 customizer
   */
  $wp_customize->add_section( 'section4_customizer', array(
    'title' => __('⋆ Unhas TV: Sesuaikan Section 4'),
    'description' => 'Sesuaikan seksi-seksi yang ditampilkan di halaman depan.',
    'priority' => 104,
  ) );
  $wp_customize->add_setting( 'section4_template', array(
    'default' => 'three-columns-feature-left',
  ) );
  $wp_customize->add_control( 'section4_selector', array(
    'settings' => 'section4_template',
    'label' => 'Section 4 Template',
    'description' => 'Pilih template untuk Section 4.',
    'section' => 'section4_customizer',
    'type' => 'select',
    'choices' => $section_templates,
  ) );

  $wp_customize->add_setting ('section4_category', array(
    'default' => ''
  ) );

  $wp_customize->add_control( 'section4_category_box', array(
    'settings' => 'section4_category',
    'label'   => 'Kategori',
    'description' => 'Tampilkan pos dari kategori ini di Section 4.',
    'section'  => 'section4_customizer',
    'type'    => 'select',
    'choices' => $cats,
  ) );

  $wp_customize->add_setting ('section4_offset', array(
    'default' => 0,
  ) );
  $wp_customize->add_control( 'section4_offset_input', array(
    'settings' => 'section4_offset',
    'label'   => 'Offset',
    'description' => 'Dimulai dari pos ke-berapa?',
    'section'  => 'section4_customizer',
    'type'    => 'number',
  ) );

  /**
   * code for the section 4 customizer
   */
  $wp_customize->add_section( 'section5_customizer', array(
    'title' => __('⋆ Unhas TV: Sesuaikan Section 5'),
    'description' => 'Sesuaikan seksi-seksi yang ditampilkan di halaman depan.',
    'priority' => 104,
  ) );
  $wp_customize->add_setting( 'section5_template', array(
    'default' => 'three-columns-feature-left',
  ) );
  $wp_customize->add_control( 'section5_selector', array(
    'settings' => 'section5_template',
    'label' => 'Section 5 Template',
    'description' => 'Pilih template untuk Section 5.',
    'section' => 'section5_customizer',
    'type' => 'select',
    'choices' => $section_templates,
  ) );

  $wp_customize->add_setting ('section5_category', array(
    'default' => ''
  ) );

  $wp_customize->add_control( 'section5_category_box', array(
    'settings' => 'section5_category',
    'label'   => 'Kategori',
    'description' => 'Tampilkan pos dari kategori ini di Section 5.',
    'section'  => 'section5_customizer',
    'type'    => 'select',
    'choices' => $cats,
  ) );

  $wp_customize->add_setting ('section5_offset', array(
    'default' => 0,
  ) );
  $wp_customize->add_control( 'section5_offset_input', array(
    'settings' => 'section5_offset',
    'label'   => 'Offset',
    'description' => 'Dimulai dari pos ke-berapa?',
    'section'  => 'section5_customizer',
    'type'    => 'number',
  ) );
}
  
add_action( 'init', 'register_unhastv_menus' );
add_action( 'customize_register', 'unhastv_customize_register' );
add_action( 'wp_enqueue_scripts', 'unhastv_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'unhastv_enqueue_scripts' );
add_action( 'after_setup_theme', 'unhastv_theme_setup' );
add_filter( 'excerpt_length', 'my_excerpt_length' );
add_filter( 'excerpt_more', 'new_excerpt_more' );

 ?>