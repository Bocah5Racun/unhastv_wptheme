<!DOCTYPE html>
<html>
<head>
<meta charset="<?php bloginfo( "charset" ); ?>">
<title><?php wp_title( "|", true, "right" ); ?></title>
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
<?php wp_head(); ?>
</head>
<body>

<header id="unhastv-header">
    <div id="unhastv-header__brand-cta" class="container--constrained">
        <img id="unhastv-header__brand-logo" src="<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ); ?>" />
        <button type="button" id="unhastv-header__cta">
            <img id="unhastv-header__cta__record-icon" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-record.png" ?>" />Watch Unhas TV Live</button>
    </div>
    <div id="unhastv-header__main-nav">
        <?php wp_nav_menu( array(
            "theme_location" => "header-nav",
            "menu_class" => "container--constrained"
            )); ?>
    </div>
    <div id="unhastv-header__border-gradient"></div>
</header>