<!DOCTYPE html>
<html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
<?php wp_head(); ?>
</head>
<body>

<header id="unhastv-header">
    <div id="unhastv-header__brand-cta"></div>
    <div id="unhastv-header__main-nav">
        <?php wp_nav_menu( array('theme_location' => 'header-nav' ) ); ?>
    </div>
</header>