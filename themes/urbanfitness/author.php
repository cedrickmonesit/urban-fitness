<?php get_header(); ?>


<main class="container page section">
    <?php
        $author = get_queried_object();
    ?>
    
    <h2 class="text-center primary-text">Author: 
        <?php
            //this is how to access objects in php using -> syntax
            echo $author->data->display_name;
        ?>
    </h2>
    <p class="text-center">
        <?php
            //pass in the ID from the $author object so it returns this specified author description
            echo get_the_author_meta('description', $author->data->ID);
        ?>
    </p>
    <ul class='blog-entries'>
    <!-- the wordpress loop -->
    <!-- the_post() function will have the information in the wordpress posts -->
    <?php  while (have_posts()): the_post(); ?>
   <?php get_template_part('template-parts/blog', 'loop'); ?>
   <!-- Recommended to use endwhile rather than brackets -->
   <?php endwhile; ?>
</ul>

</main>


<?php get_footer(); ?>