<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="<?php bloginfo( "charset" ); ?>">
<title><?php bloginfo( 'name' ); ?> | <?php is_front_page() ? bloginfo( 'description' ) : wp_title(''); ?></title>
<link rel="stylesheet" href="<?= esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
<?php wp_head(); ?>
</head>
<body>

<div id="sticky-header" class="sticky-header--conceal">
    <div id="sticky-header__inner" class="container--constrained">
        <div class="sticky-header__brand"><?php the_custom_logo(); ?></div>
        <div class="unhastv-header__main-nav">
            <?php wp_nav_menu( array(
                "theme_location" => "header-nav",
                "menu_class" => "menu-main-menu"
                ));
            ?>
        </div>
        <?php
            $cta_text = get_theme_mod( 'cta_text' );
            if( $cta_text ) :
        ?>

        <a id="sticky-header__cta" href="<?= get_theme_mod( 'cta_url' ); ?>" target="_blank">
            <img class="header__cta__record-icon" src="<?= get_template_directory_uri() . "/assets/imgs/unhastv-record.png" ?>" />
            <?= $cta_text; ?>
        </a>

        <?php endif; ?>
    </div>
    <div class="header__border-gradient"></div>
</div>

<header id="unhastv-header">
    <div id="unhastv-header__brand-cta" class="container--constrained">
        <?php the_custom_logo(); ?>
        <?php
            if( $cta_text ) :
        ?>

        <a id="unhastv-header__cta" href="<?= get_theme_mod( 'cta_url' ); ?>" target="_blank">
            <img class="header__cta__record-icon" src="<?= get_template_directory_uri() . "/assets/imgs/unhastv-record.png" ?>" />
            <?= $cta_text; ?>
        </a>

        <?php endif; ?>
    </div>
    <div class="unhastv-header__main-nav">
        <?php wp_nav_menu( array(
            "theme_location" => "header-nav",
            "menu_class" => "menu-main-menu container--constrained"
            ));
        ?>
    </div>
    <div class="header__border-gradient"></div>
</header>