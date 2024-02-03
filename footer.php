<footer id="unhastv-footer" class="container">
    <div class="footer__main container--constrained">
        <div class="footer__branding">
            <?php the_custom_logo(); ?>
        </div>
        <div id="unhastv-footer__footer-nav">
            <?php wp_nav_menu( array(
                "theme_location" => "footer-nav",
                "menu_id" => "footer-menu",
                ));
            ?>
        </div>
        <div class="footer__socials">
            <a href="https://twitter.com/UNHAS_TV" target="_blank">
                <img loading="lazy" class="footer__socials__icon to-red" src="<?= get_template_directory_uri(); ?>/assets/imgs/unhastv-socials-twitterx.png" />
            </a>
            <a href="https://www.instagram.com/unhastvofficial/" target="_blank">
                <img loading="lazy" class="footer__socials__icon to-red" src="<?= get_template_directory_uri(); ?>/assets/imgs/unhastv-socials-instagram.png" />
            </a>
            <a href="https://www.youtube.com/@unhastv.official" target"_blank">
            <img loading="lazy" class="footer__socials__icon to-red" src="<?= get_template_directory_uri(); ?>/assets/imgs/unhastv-socials-youtube.png" />
            </a>
            <!-- <a href="https://www.youtube.com/@unhastv.official" target"_blank">
            <img loading="lazy" class="footer__socials__icon to-red" src="<?= get_template_directory_uri(); ?>/assets/imgs/unhastv-socials-facebook.png" />
            </a> -->
            <a href="https://www.tiktok.com/@unhastvofficial" target"_blank">
            <img loading="lazy" class="footer__socials__icon to-red" src="<?= get_template_directory_uri(); ?>/assets/imgs/unhastv-socials-tiktok.png" />
            </a>
        </div>
    </div>
    <div class="footer__copyright container--constrained">
        ©2023<?= ( date("Y") != "2023" ) ? "–" . date("Y") : "";?> <?= get_bloginfo( 'name' ); ?>. All rights reserved.
        <br />
        <a style="color: var(--unhas-yellow);" href="https://komkom.id" target="_blank">Designed by KOMKOM.id</a>
    </div>    
</footer>

<?php wp_footer(); ?>

</body>