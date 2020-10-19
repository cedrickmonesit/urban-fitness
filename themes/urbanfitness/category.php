<?php get_header(); ?>


<main class="container page section">
    <?php
        $category = get_queried_object();
    ?>


    <div class="text-center">    
        <h2>
            Category:
            <?php
                echo $category->name;
            ?>
        </h2>
        <?php echo category_description($category->ID); ?>
    </div>
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