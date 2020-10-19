<?php get_header(); ?>


<main class="container page section">
<ul class="blog-entries">
    <!-- the wordpress loop -->
    <!-- the_post() function will have the information in the wordpress posts -->
    <?php  while (have_posts()): the_post(); ?>
   <?php get_template_part('template-parts/blog', 'loop'); ?>
   <!-- Recommended to use endwhile rather than brackets -->
   <?php endwhile; ?>
</main>


<?php get_footer(); ?>