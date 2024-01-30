<body>

<?php get_header(); ?>


<main class="container--constrained">

<article>
<?php breadcrumbs(); ?>
<h1 class="large color--unhas-red"><?= get_the_title(); ?></h1>
<?= get_the_content(); ?>
</article>

</main>

<?php get_footer() ;?>
    
</body>
</html>