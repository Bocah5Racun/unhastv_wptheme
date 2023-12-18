<!DOCTYPE html>
<html>
<head>
<meta charset="<?php bloginfo( "charset" ); ?>">
<title><?php bloginfo( 'name' ); ?> | <?php is_front_page() ? bloginfo( 'description' ) : wp_title(''); ?></title>
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
<?php wp_head(); ?>
</head>
<body>

<header id="unhastv-header">
    <div id="unhastv-header__brand-cta" class="container--constrained">
        <?php the_custom_logo(); ?>
        <?php
            $cta_text = get_theme_mod( 'cta_text' );
            if( $cta_text ) :
        ?>

        <a id="unhastv-header__cta" href="<?php echo get_theme_mod( 'cta_url' ); ?>" target="_blank">
            <img id="unhastv-header__cta__record-icon" src="<?php echo get_template_directory_uri() . "/assets/imgs/unhastv-record.png" ?>" />
            <?php echo $cta_text; ?>
        </a>

        <? endif; ?>
    </div>
    <div id="unhastv-header__main-nav">
        <?php wp_nav_menu( array(
            "theme_location" => "header-nav",
            "menu_id" => "menu-main-menu",
            "menu_class" => "container--constrained"
            ));
        ?>
    </div>
    <div id="unhastv-header__border-gradient"></div>
</header>