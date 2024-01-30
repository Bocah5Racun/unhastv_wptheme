<body>

<?php get_header(); ?>


<div class="container--constrained">

<article>
<?php breadcrumbs(); ?>
<h1 class="large color--unhas-red"><?= get_the_title(); ?></h1>
<?= get_the_content(); ?>
</article>

</div>

<?php get_footer() ;?>
    
</body>
</html>