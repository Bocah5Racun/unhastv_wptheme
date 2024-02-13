<!DOCTYPE html>
<?php session_start(); ?>
<html lang="id">
<head>
<meta charset="<?php bloginfo( "charset" ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php bloginfo( 'name' ); ?> | <?php is_front_page() ? bloginfo( 'description' ) : wp_title(''); ?></title>
<link rel="stylesheet" href="<?= esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3215141506790563"
    crossorigin="anonymous"></script>
<?php
wp_head();
$cta_text = get_theme_mod( 'cta_text' );

?>
</head>
<body>

<?php

// check if popups are allowed on this page
if( get_theme_mod( 'popup-show', true ) ):

    // check popup session
if( !isset( $_SESSION["popup-timeout"] ) || (time() - $_SESSION["popup-timeout"] > get_theme_mod( 'popup-timeout', 10)) ) :

    $_SESSION["popup-timeout"] = time();
        
    $popup_settings = array(
        'penyedia'      => get_theme_mod( 'popup-penyedia', 'kustom' ),
        'show_on_all'   => get_theme_mod( 'popup-which-pages', false ),
        'iklan_id'      => get_theme_mod( 'popup-post', false ),
        'iklan_url'     => get_theme_mod( 'popup-url', '' ),
    );

    if( is_front_page() || $popup_settings['show_on_all'] ):
        if( $popup_settings['iklan_id'] ):
?>

<div id="popup-overlay">
    <div id="popup-container">
        <div id="popup-close" onclick="closeOverlay()">
            <img src="<?= get_template_directory_uri() . '/assets/imgs/unhastv-close.png'; ?>"></div>
        <?php
        if( $popup_settings['penyedia'] == 'kustom' ):
        ?>
        <a href="<?= $popup_settings['iklan_url'] ? $popup_settings['iklan_url'] : get_permalink( $popup_settings['iklan_id'] ); ?>">
            <img src="<?= get_the_post_thumbnail_url( $popup_settings['iklan_id'], 'large'); ?>" class="popup-image">
        </a>
        <?php endif; ?>
        <?php if ($popup_settings['penyedia'] == 'google' ): ?>
            This is a Google Ad.
        <?php endif; ?>
    </div>
</div>
    
<?php
endif;
endif;
endif;
endif;
?>

<div id="mobile-menu">
    <img id="mobile-menu-close" onclick="toggleMenu()" src="<?= get_template_directory_uri() . "/assets/imgs/unhastv-close.png" ; ?> " />
    <div class="mobile-menu__brand"><?php the_custom_logo(); ?></div>
    
    <?php
            if( $cta_text ) :
        ?>
    <a id="mobile-menu__cta" href="<?= get_theme_mod( 'cta_url' ); ?>" title="<?= $cta_text; ?>" target="_blank">
            <img loading="lazy" class="header__cta__record-icon" src="<?= get_template_directory_uri() . "/assets/imgs/unhastv-record.png" ?>" />
            <span class="cta-text"><?= $cta_text; ?></span>
        </a>
    <?php endif; ?>
<?php wp_nav_menu( array(
    "theme_location" => "header-nav",
    "menu_class" => "menu-main-menu"
    ));
?>
<div class="mobile-menu__footer">
    <span>©2023<?= ( date("Y") != "2023" ) ? "–" . date("Y") : "";?> <?= get_bloginfo( 'name' ); ?>. All rights reserved.</span>
</div>
</div>

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
            if( $cta_text ) :
        ?>
        <a id="sticky-header__cta" href="<?= get_theme_mod( 'cta_url' ); ?>" title="<?= $cta_text; ?>" target="_blank">
            <img loading="lazy" class="header__cta__record-icon" src="<?= get_template_directory_uri() . "/assets/imgs/unhastv-record.png"; ?>" />
            <span class="cta-text"><?= $cta_text; ?></span>
        </a>

        <?php endif; ?>
        <div class="burger-icon-container" onclick="toggleMenu()">
            <img src="<?= get_template_directory_uri() . "/assets/imgs/unhastv-menu.png"; ?>" />
        </div>
    </div>
    <div class="header__border-gradient"></div>
</div>

<header id="unhastv-header">
    <div id="unhastv-header__brand-cta" class="container--constrained">
        <?php the_custom_logo(); ?>
                
        <?php
            if( $cta_text ) :
        ?>

        <a id="unhastv-header__cta" href="<?= get_theme_mod( 'cta_url' ); ?>" title="<?= $cta_text; ?>" target="_blank">
            <img loading="lazy" class="header__cta__record-icon" src="<?= get_template_directory_uri() . "/assets/imgs/unhastv-record.png" ?>" />
            <span class="cta-text"><?= $cta_text; ?></span>
        </a>

        <?php endif; ?>
        <div class="burger-icon-container" onclick="toggleMenu()">
            <img src="<?= get_template_directory_uri() . "/assets/imgs/unhastv-menu.png"; ?>" />
        </div>
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