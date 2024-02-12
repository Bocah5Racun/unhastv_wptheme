<body>

<?php get_header(); ?>


<main class="container--constrained my-2">

<article>
<?php breadcrumbs(); ?>
<h1 class="large color--unhas-red my-2"><?= get_the_title(); ?></h1>
<div class="text-container">
<?= get_the_content(); ?>
</div>
</article>

</main>

<?php get_footer() ;?>
    
</body>
</html>